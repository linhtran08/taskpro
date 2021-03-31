<?php

namespace App\Http\Controllers;

use App\Task;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class DashBoardController extends Controller
{
    public function index()
    {
        //get employee id of the current signed in user
        $emp_id = session()->get('account.emp_id');
        $avgScore = $this->getAvgScore();
        //dd($avgScore);
        $totalEffort = $this->getTotalEffort();

        //dd($totalEffort);
        $openTicketCountPerMonth = $this->getOpenTicketCountPerMonth();
        $totalEffortPerMonth = $this->getTotalEffortPerMonth();
        $twelveRecentMonths = $this->getTwelveRecentMonths();

        //dd(implode(',',$openTicketCountPerMonth), implode(',', $twelveRecentMonths));


        //Chart of new ticket count per month for the last 12 months
        $ticketChart = (new LarapexChart)->lineChart()
            ->addData('Physical sales', $openTicketCountPerMonth)
            ->setXAxis($twelveRecentMonths)
            ->setHeight(300);

        //Chart of total effort per each month for the last 12 months
        $effortChart = (new LarapexChart)->lineChart()
            ->addData('Physical sales', $totalEffortPerMonth)
            ->setXAxis($twelveRecentMonths)
            ->setHeight(300);

        //For open tasks, project managers and staff are the same, sort by timeline
        $open_tasks = DB::table('task_phase_history')
            ->join('task', function ($join) {
                $join->on('task_phase_history.task_id', '=', 'task.task_id')
                    ->where('task.task_state_id', '=', 1);
            })
            ->groupBy('task.task_id')
            ->selectRaw('max(task_phase_history.task_phase_history_id) as his_id, task.task_id, task.task_title, task.due_date')
            ->orderBy('his_id', 'desc')
            ->limit(20)
            ->get();
        //dd($open_tasks);

        //For processing tasks, pm and staff differ.
        if (session()->get('account.role') === 2) {
            $processing_tasks = DB::table('task_phase_history')
                ->join('task', function ($join) {
                    $join->on('task_phase_history.task_id', '=', 'task.task_id')
                        ->where('task.task_state_id', '=', 2);
                })
                ->groupBy('task.task_id')
                ->selectRaw('max(task_phase_history.task_phase_history_id) as his_id, task.task_id, task.task_title, task.due_date')
                ->orderBy('his_id', 'desc')
                ->limit(20)
                ->get();
        } else {
            $processing_tasks = DB::select('
                select max(t1.task_phase_history_id), t1.task_id, t2.due_date, t2.task_title
                from task_phase_history t1
                         join task t2
                              on t1.task_id = t2.task_id
                where t2.task_state_id = 2
                  and t2.task_id in (
                    select distinct(task_phase_history.task_id)
                    from task_phase_history
                             join task on task_phase_history.task_id = task.task_id
                    where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?)
                )
                group by t1.task_id
                order by max(t1.task_phase_history_id) desc
                limit 20', [$emp_id, $emp_id]
            );
        }
        //dd($processing_tasks);

        //For finished task, pm and staff differ
        if (session()->get('account.role') === 2) {
            $finished_tasks = DB::table('task')
                ->where('task_state_id', 5)
                ->orderBy('finish_date', 'desc')
                ->limit(20)
                ->get();
        } else {
            $finished_tasks = DB::select('
                select *
                from task
                where task_state_id = 5
                  and task_id in (
                    select distinct(task_phase_history.task_id)
                    from task_phase_history
                             join task on task_phase_history.task_id = task.task_id
                    where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?)
                )
                order by finish_date desc
                limit 20', [$emp_id, $emp_id]
            );
        }
        //($finished_tasks);
        $user = DB::table('account_info')
            ->join('psn_infor', function ($join) {
                $join->on('account_info.emp_id', '=', 'psn_infor.emp_id')
                    ->where('account_info.emp_id', '=', session()->get('account.emp_id'));
            })
            ->selectRaw('psn_infor.full_name,account_info.emp_id,psn_infor.email, psn_infor.user_id, psn_infor.sex, psn_infor.address,
                psn_infor.phone, psn_infor.birthday')
            ->get();
        //dd($user);

        return view('dashboard', compact('ticketChart', 'effortChart'))->with([
            'open_tasks' => $open_tasks, // Panel 1: open tasks
            'processing_tasks' => $processing_tasks, //Panel 1: processing tasks
            'finished_tasks' => $finished_tasks, //Panel 3: finished tasks
            'user' => $user, //user information, use on the top right
            'avgScore' => $avgScore,
            'totalEffort' => $totalEffort
        ]);
    }

    public function getTwelveRecentMonths(): array
    {
        $last_12_months = array();
        for ($i = 0; $i < 12; $i++) {
            array_unshift($last_12_months, date('M', strtotime(-$i . 'month')));
        }
        return $last_12_months;
    }

    public function getTotalEffortPerMonth(): array
    {
        $emp_id = session()->get('account.emp_id');
        if (session()->get('account.role') === 2) {
            $eft_per_month = DB::table('task')
                ->groupBy('monthname(finish_date)')
                ->selectRaw('monthname(finish_date), sum(effort) as effort')
                ->whereNotNull('finish_date')
                ->orderBy('monthname(finish_date)')
                ->get();
        } else {
            $eft_per_month = DB::select('            
            with X (task_id) as (
            select distinct(task_phase_history.task_id)
            from task_phase_history
                     join task on task_phase_history.task_id = task.task_id
            where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?))
            select monthname(t2.finish_date) as month, sum(effort) as effort
            from X t1
                     inner join task t2 on t1.task_id = t2.task_id
            where finish_date is not null
            group by monthname(t2.finish_date)
            order by monthname(t2.finish_date)            
            ', [$emp_id, $emp_id]);
        }
        $tmpEffortPerMonth = array();
        if (empty($eft_per_month)) {
            $tmpEffortPerMonth = [0];
        }else{
            foreach ($eft_per_month as $epm) {
                array_unshift($tmpEffortPerMonth, $epm->effort);
            }
        }
        return array_pad($tmpEffortPerMonth, -12, 0);
    }

    public function getOpenTicketCountPerMonth(): array
    {
        if (session()->get('account.role') === 2) {
            $ticket_count = DB::table('task')
                ->groupBy('monthname(created_at)')
                ->selectRaw('monthname(created_at),count(monthname(created_at)) as tickets')
                ->orderBy('monthname(created_at)')
                ->get();
        } else {
            $emp_id = session()->get('account.emp_id');
            $ticket_count = DB::select('
            with X (task_id) as (
            select distinct(task_phase_history.task_id)
            from task_phase_history
                     join task on task_phase_history.task_id = task.task_id
            where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?))
            select monthname(t2.start_date) as month, count(*) as `tickets`
            from X t1
                     inner join task t2 on t1.task_id = t2.task_id
            group by monthname(t2.start_date)
            order by monthname(t2.start_date)
            ',
                [$emp_id, $emp_id]);
        }

        $tmpTicketPerMonth = array();
        if (empty($ticket_count)) {
            $tmpTicketPerMonth = array(0);
        }else{
            foreach ($ticket_count as $tc) {
                array_unshift($tmpTicketPerMonth, $tc->tickets);
            }
        }
        return array_pad($tmpTicketPerMonth, -12, 0);
    }

    public function getAvgScore(): array
    {
        if (session()->get('account.role') === 2) {
            $avgScore = DB::select('
                select avg(satisfaction) as `average_score`
                from task
                where finish_date is not null;
            ');
        } else {
            $emp_id = session()->get('account.emp_id');
            $avgScore = DB::select('
                select avg(satisfaction) as `average_score`
                from task
                where finish_date is not null
                and
                    task_id in (
                select distinct(task_phase_history.task_id)
                from task_phase_history
                         join task on task_phase_history.task_id = task.task_id
                where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?))
            ', [$emp_id, $emp_id]);
        }

        if (empty($avgScore[0]->average_score)) {
            $avgScore[0]->average_score = 0;
        }
        return $avgScore;
    }

    public function getTotalEffort(): array
    {
        if (session()->get('account.role') === 2) {
            $totalEffort = DB::select('
                select sum(effort) as effort
                from task
                where finish_date is not null;
            ');
        } else {
            $emp_id = session()->get('account.emp_id');
            $totalEffort = DB::select('
                select sum(effort) as effort
                from task
                where finish_date is not null
                and
                    task_id in (
                select distinct(task_phase_history.task_id)
                from task_phase_history
                         join task on task_phase_history.task_id = task.task_id
                where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?))
            ', [$emp_id, $emp_id]);;
        }
        //dd($totalEffort);
        if (empty($totalEffort[0]->effort)) {
            $totalEffort[0]->effort = 0;
        }
        return $totalEffort;
    }
}
