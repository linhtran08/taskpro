<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    //

    public function index()
    {
        $users = DB::select('
            select * from
            account_info a
            join psn_infor on a.emp_id = psn_infor.emp_id
            where role != 1
            and active != 0
        ');

        //dd($users);

        //dd($this->getTotalTickets(8));
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

        return view('monitoring')->with([
            'user_data' => $user_data,
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

    public function getRelatedTasks($emp_id): array
    {
        //this function is not applied yet
        return DB::select('
        select
           task_id,
           tjt.`desc` as task_job_type,
           task_title,
           start_date,
           due_date,
           effort,
           coalesce(datediff(curdate(), start_date), "not started") as `duration(days)`
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
        )',
            [$emp_id, $emp_id]
        );
    }
}
