<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequirementController extends Controller
{
    public function index()
    {
        $tasks = DB::select('        
            select task_id,
                   p.project_name as project_name,
                   ts.`desc` as task_state,
                   tjt.`desc` as task_job_type,
                   p2.`desc` as priority,
                   tp.`desc` as phase,
                   task_title,
                   task.created_at,
                   task_detail,
                   coalesce(pi.full_name, "") as assignee_fname,
                   pi2.full_name as created_by_fname,
                   start_date,
                   due_date,
                   finish_date,
                   effort,
                   satisfaction
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
            
            order by task_id desc'
        );

        $projects = DB::table('project')->get();
        $job_types = DB::table('task_job_type')->get();
        $priorities = DB::table('priority')->get();
        $task_state = DB::table('task_state')->get();
        $assignees = DB::table('account_info')
            ->join('psn_infor','account_info.emp_id','=','psn_infor.emp_id')
            ->select('account_info.emp_id','psn_infor.full_name','account_info.role')
            ->distinct()
            ->get();

        return view('requirement',[
            'task_state'=> $task_state,
            'tasks' => $tasks,
            'job_types'=> $job_types,
            'priorities' => $priorities,
            'assignees' => $assignees,
            'projects' => $projects
        ]);
    }

    public function task_detail(Request $request , $id){

        $tasks = DB::select('        
            select task_id,
                   p.project_name as project_name,
                   ts.`desc` as task_state,
                   task.task_job_type_id,
                    p.project_id,
                   tjt.`desc` as task_job_type,
                   p2.`desc` as priority,
                   tp.`desc` as phase,
                   task_title,
                   task.created_at,
                   task_detail,
                   coalesce(pi.full_name, "") as assignee_fname,
                   pi2.full_name as created_by_fname,
                   start_date,
                   due_date,
                   finish_date,
                   effort,
                   satisfaction
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
            where task_id =? ',[$id]
        );

        $projects = DB::table('project')->get();
        $job_types = DB::table('task_job_type')->get();
        $priorities = DB::table('priority')->get();
        $task_state = DB::table('task_state')->get();
        $assignees = DB::table('account_info')
            ->join('psn_infor','account_info.emp_id','=','psn_infor.emp_id')
            ->select('account_info.emp_id','psn_infor.full_name','account_info.role')
            ->distinct()
            ->get();


//        dd($tasks);
        return view('task_detail',[
            'task_state'=> $task_state,
            'tasks' => $tasks,
            'job_types'=> $job_types,
            'priorities' => $priorities,
            'assignees' => $assignees,
            'projects' => $projects
        ]);
    }
}
