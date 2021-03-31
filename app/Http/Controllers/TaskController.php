<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function index($id){
        $task = DB::select('        
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
            
            where
                task_id = ?
            order by task_id desc',[$id]
        );
    }

    public function postUpdate(){

    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //dd($request);
        $this->validate($request,[
            'task_job_type_id'=>'required',
            'project_id' => 'required',
            'priority_id' => 'required',
            //'assignee_id' => 'required', no need to assign right away
            'due_date' => 'required|after:today',
            'task_title' => 'required',
            'task_detail' => 'required'
        ]);
        //dd(auth()->$account->role);
        $project_id = $request->input('project_id');
        $task_state_id = 1;
        $task_job_type_id = $request->input('task_job_type_id');
        $priority_id = $request->input('priority_id');
        $phase_id = 1;
        $task_title = $request->input('task_title');
        $task_detail = $request->input('task_detail');
        $created_at = date(now());
        $assignee_id = $request->input('assignee_id');
        $created_by_id = 2; //temp value for testing
        $due_date_src = $request->input('due_date');
        $due_date = DateTime::createFromFormat('d M Y',$due_date_src)->format("Y-m-d");
        $effort = 200;

        DB::table('task')->insert([
            'project_id' => $project_id,
            'task_state_id' => $task_state_id,
            'task_job_type_id' => $task_job_type_id,
            'priority' => $priority_id,
            'phase' => $phase_id,
            'task_title' => $task_title,
            'task_detail' => $task_detail,
            'created_at' => $created_at,
            'assignee_id' => $assignee_id,
            'created_by_id' => $created_by_id,
            'due_date' => $due_date,
            'effort' => $effort
        ]);

        $task_id = DB::table('task')->max('task_id');

        DB::table('task_phase_history')->insert([
            'task_id' => $task_id,
            'task_phase_id'=> $phase_id,
            'assignee_id' => $assignee_id,
            'changed_by_id' => $created_by_id
        ]);
        $taskType = DB::table('task_job_type')->get();
        $taskState = DB::table('task_state')->get();
        $project = DB::table('project')->get();
        $assignee = DB::table('task')
            ->join('account_info', 'task.assignee_id', '=', 'account_info.emp_id')
            ->join('psn_infor', 'task.assignee_id', '=', 'psn_infor.emp_id')
            ->select('full_name')
            ->distinct()
            ->get();

        return back();
    }
}
