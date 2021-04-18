<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    //

    public function index()
    {
        $emp_id = session()->get('account.emp_id');

        $users = DB::select('
            select * from
            account_info a
            join psn_infor on a.emp_id = psn_infor.emp_id
            where role != 1
            and active != 0
            order by a.emp_id;
        ');

        //dd($users);

        //dd($this->getTotalTickets(8));

        //Sample tasks detail on the right, using emp_id = 8;
        $tasks = $this->getRelatedTasks(session()->get('account.emp_id'));

        $user_data = array();
        $n = 0;
        foreach ($users as $user) {
            $n++;
            $user_data[$n]['emp_id'] = $user->emp_id;
            $user_data[$n]['full_name'] = $user->full_name;
            $user_data[$n]['open_tickets'] = 0;
            $user_data[$n]['processing_tickets'] = 0;
            $user_data[$n]['finished_tickets'] = 0;
            $user_data[$n]['on_time'] = 0;
            $user_data[$n]['breached_dl'] = 0;
            $total_tickets = $this->getTotalTickets($user->emp_id);
            $on_time_count = $this->getOnTimeTickets($user->emp_id)[0]->total;
            $breached_dl_count = $this->getBreachedDeadLineTickets($user->emp_id)[0]->total;
            if(!empty($on_time_count)){
                $user_data[$n]['on_time'] = $on_time_count;
            }
            if(!empty($breached_dl_count)){
                $user_data[$n]['breached_dl'] = $breached_dl_count;
            }
            foreach ($total_tickets as $t){
                switch ($t->task_state_id){
                    case "1":
                        $user_data[$n]['open_tickets'] = $t->total_tickets;
                        break;
                    case "2":
                        $user_data[$n]['processing_tickets'] = $t->total_tickets;
                        break;
                    case "5":
                        $user_data[$n]['finished_tickets'] = $t->total_tickets;
                        break;
                }
            }
        }

        //dd($user_data);

        $my_stats = $this->getMyStatistics($emp_id);

        return view('monitoring')->with([
            'user_data' => $user_data,
            'tasks' => $tasks,
            'my_stats' => $my_stats
        ]);
    }

    public function getTotalTickets($emp_id): array
    {
        return DB::select('
        select count(*) as `total_tickets`, task_state_id
        from task
        where task_id in (select distinct(task_phase_history.task_id)
                          from task_phase_history
                                   join task on task_phase_history.task_id = task.task_id
                          where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?))
        
        group by task_state_id
        order by task_state_id;
        ',[$emp_id, $emp_id]
        );
    }

    public function getOnTimeTickets($emp_id): array
    {
        return DB::select('
        select count(*) as `total`
        from task
        where task_id in (select distinct(task_phase_history.task_id)
                          from task_phase_history
                                   join task on task_phase_history.task_id = task.task_id
                          where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?))
            and finish_date is not null
            and due_date > task.finish_date;
        ', [$emp_id, $emp_id]);
    }

    public function getBreachedDeadLineTickets($emp_id): array
    {
        return DB::select('
        select count(*) as `total`
        from task
        where task_id in (select distinct(task_phase_history.task_id)
                          from task_phase_history
                                   join task on task_phase_history.task_id = task.task_id
                          where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?))
        and ((finish_date is not null and due_date < task.finish_date)
        or (due_date < CURDATE()));
        ',
            [$emp_id, $emp_id]
        );
    }

    public function getJsonRelatedTask($emp_id): \Illuminate\Http\JsonResponse
    {
        $user = DB::table('account_info')
            ->join('psn_infor','account_info.emp_id','=','psn_infor.emp_id')
            ->where('account_info.emp_id','=',$emp_id)
            ->first();
        $tasks = $this->getRelatedTasks($emp_id);
        $my_stats = $this->getMyStatistics($emp_id);
        $res = [
            "user" => $user,
            "tasks" => $tasks,
            "my_stats" => $my_stats
        ];
        return response()->json($res);
    }

    public function getRelatedTasks($emp_id): array
    {
        //this function is not applied yet
        return DB::select('
        select
           task_id,
           tjt.`desc` as task_job_type,
           task_title,
           tp.`desc`                                                as phase,
           start_date,
           due_date,
           effort,
           coalesce(datediff(curdate(), start_date), "not started") as `duration`
        from task
                 join project p on task.project_id = p.project_id
                 join task_state ts on task.task_state_id = ts.task_state_id
                 join task_job_type tjt on task.task_job_type_id = tjt.task_job_type_id
                 join priority p2 on task.priority = p2.priority_id
                 join task_phase tp on tp.task_phase_id = task.phase
                 left outer join account_info ai on ai.emp_id = task.assignee_id
                 left outer join psn_infor pi on ai.emp_id = pi.emp_id
                 join account_info a on a.emp_id = task.created_by_id
                 join psn_infor pi2 on a.emp_id = pi2.emp_id
        where task_id in (
            select distinct(task_phase_history.task_id)
            from task_phase_history
                     join task on task_phase_history.task_id = task.task_id
            where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?)
        )
        order by task_id desc
        ',
            [$emp_id, $emp_id]
        );
    }

    public function getMyStatistics($emp_id){
        $stats = array();

        $stats['latest_task']['id'] = "Not available";
        $stats['latest_task']['title'] = "Not available";
        $stats['total_tasks'] = "Not available";
        $stats['on_time_rate'] = "Not available";
        $stats['breached_rate'] = "Not available";

        $latest_task = DB::select('
            select task_phase_history.*, t.task_title from task_phase_history
            join task t on task_phase_history.task_id = t.task_id
            where task_phase_history.assignee_id = ? or changed_by_id = ?
            order by task_phase_history_id desc
            limit 1
        ', [$emp_id, $emp_id]
        );

        $total_tasks = DB::select('
        select count(distinct(task_phase_history.task_id)) as `total_count`
        from task_phase_history
                 join task on task_phase_history.task_id = task.task_id
        where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?)
        ', [$emp_id, $emp_id]);

        $breached_dl_count = $this->getBreachedDeadLineTickets($emp_id)[0]->total;

//        dd($total_tasks, $breached_dl_count);
        if ($total_tasks[0]->total_count != 0){
            $breached_rate = round($breached_dl_count/$total_tasks[0]->total_count, 2)*100;
            $on_time_rate = 100 - $breached_rate;
            $stats['total_tasks'] = $total_tasks[0]->total_count;
            $stats['on_time_rate'] = $on_time_rate . ' percent(s)';
            $stats['breached_rate'] = $breached_rate . ' percent(s)';
        }

        if ($latest_task != null){
            $stats['latest_task']['id'] = $latest_task[0]->task_id;
            $stats['latest_task']['title'] = $latest_task[0]->task_title;
        }
        return $stats;
    }
}
