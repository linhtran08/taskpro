<?php

namespace App\Http\Controllers;

use App\Task;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function index()
    {

        $avgScore = DB::select('
            select avg(satisfaction) as `average_scrore`
            from task
            where finish_date is not null;
        ');

        //dd($avgScore);

        $totalEffort = DB::select('
            select sum(effort) as effort
            from task
            where finish_date is not null;
        ');

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

        $open_tasks = DB::table('task_phase_history')
            ->join('task',function ($join){
                $join->on('task_phase_history.task_id','=','task.task_id')
                    ->where('task.task_state_id','=',1);
            })
            ->groupBy('task.task_id')
            ->selectRaw('max(task_phase_history.task_phase_history_id) as his_id, task.task_id, task.task_title, task.due_date')
            ->orderBy('his_id','desc')
            ->limit(20)
            ->get();
        //dd($open_tasks);

        $processing_tasks = DB::table('task_phase_history')
            ->join('task',function ($join){
                $join->on('task_phase_history.task_id','=','task.task_id')
                    ->where('task.task_state_id','=',2);
            })
            ->groupBy('task.task_id')
            ->selectRaw('max(task_phase_history.task_phase_history_id) as his_id, task.task_id, task.task_title, task.due_date')
            ->orderBy('his_id','desc')
            ->limit(20)
            ->get();

        //dd($processing_tasks);

        $finished_tasks = DB::table('task')
            ->where('task_state_id',5)
            ->orderBy('finish_date','desc')
            ->limit(20)
            ->get();

        //($finished_tasks);

        $user = DB::table('account_info')
            ->join('psn_infor', function($join){
                $join->on('account_info.emp_id','=','psn_infor.emp_id')
                    ->where('account_info.emp_id','=',1);
            })
            ->selectRaw('psn_infor.full_name,account_info.emp_id,psn_infor.email, psn_infor.user_id, psn_infor.sex, psn_infor.address,
                psn_infor.phone, psn_infor.birthday')
            ->get();

        //dd($user);


        return view('dashboard',compact('ticketChart','effortChart'))->with([
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
            array_unshift($last_12_months,date('M', strtotime(-$i . 'month')));
        }
        return $last_12_months;
    }

    public function getTotalEffortPerMonth(): array
    {
        $eft_per_month = DB::table('task')
            ->groupBy('monthname(finish_date)')
            ->selectRaw('monthname(finish_date), sum(effort) as effort')
            ->whereNotNull('finish_date')
            ->orderBy('monthname(finish_date)')
            ->get();

        $tmpEffortPerMonth = array();

        foreach ($eft_per_month as $epm){
            array_unshift($tmpEffortPerMonth, $epm->effort);
        }

        return array_pad($tmpEffortPerMonth,-12,0);
    }

    public function getOpenTicketCountPerMonth(): array
    {
        $ticket_count = DB::table('task')
            ->groupBy('monthname(created_at)')
            ->selectRaw('monthname(created_at),count(monthname(created_at)) as tickets')
            ->orderBy('monthname(created_at)')
            ->get();

        $tmpTicketPerMonth = array();
        foreach ($ticket_count as $tc){
            array_unshift($tmpTicketPerMonth, $tc->tickets);
        }

        return array_pad($tmpTicketPerMonth, -12, 0);
    }
}
