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
        $openTicketCountPerMonth = $this->getOpenTicketCountPerMonth();
        $twelveRecentMonths = $this->getTwelveRecentMonths();

        //dd(implode(',',$openTicketCountPerMonth), implode(',', $twelveRecentMonths));

        $chart = (new LarapexChart)->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Physical sales', $openTicketCountPerMonth)
            ->setXAxis($twelveRecentMonths);

        //dd($chart);
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


        return view('welcome3')->with([
            compact('chart'),
            'open_tasks' => $open_tasks,
            'processing_tasks' => $processing_tasks,
            'finished_tasks' => $finished_tasks,
            'user' => $user,
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

    public function getOpenTicketCountPerMonth(): array
    {
        $ticket_count = DB::table('task')
            ->groupBy('monthname(created_at)')
            ->selectRaw('monthname(created_at),count(monthname(created_at)) as tickets')
            ->orderBy('monthname(created_at)')
            ->get();

        $tmpTicketPerMonth = array();
        foreach ($ticket_count as $tc){
            array_push($tmpTicketPerMonth,$tc->tickets);
        }

        return array_pad($tmpTicketPerMonth, -12, 0);
    }
}
