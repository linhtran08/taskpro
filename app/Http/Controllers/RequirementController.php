<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequirementController extends Controller
{
    public function index()
    {
        $emp_id = session()->get('account.emp_id');

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

        $my_tasks = DB::select('
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
                    task_id in (select distinct(task_phase_history.task_id)
                    from task_phase_history
                             join task on task_phase_history.task_id = task.task_id
                    where (task_phase_history.assignee_id = ? or task_phase_history.changed_by_id = ?))
            order by task_id desc',
                   [$emp_id, $emp_id]
        );

        $projects = DB::table('project')->get();
        $job_types = DB::table('task_job_type')->get();
        $priorities = DB::table('priority')->get();
        $task_state = DB::table('task_state')->get();
        $assignees = DB::table('account_info')
            ->join('psn_infor','account_info.emp_id','=','psn_infor.emp_id')
            ->where('account_info.role','!=',1)
            ->where('account_info.active',1)
            ->select('account_info.emp_id','psn_infor.full_name','account_info.role')
            ->distinct()
            ->get();

        return view('requirement',[
            'task_state'=> $task_state,
            'tasks' => $tasks,
            'job_types'=> $job_types,
            'priorities' => $priorities,
            'assignees' => $assignees,
            'projects' => $projects,
            'my_tasks' => $my_tasks,
        ]);
    }
}
