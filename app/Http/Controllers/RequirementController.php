<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequirementController extends Controller
{
    public function index()
    {
        //default values

        $where_querry = '';

        $project_id = 1;
        $tasks = DB::select('        
            select task_id,
                   p.project_name as project_name,
                   ts.`desc` as task_state,
                   tjt.`desc` as task_job_type,
                   p2.`desc` as priority,
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
                     left outer join account_info ai on ai.emp_id = task.assignee_id
                     left outer join psn_infor pi on ai.emp_id = pi.emp_id
                     join account_info a on a.emp_id = task.created_by_id
                     join psn_infor pi2 on a.emp_id = pi2.emp_id
            where
                task.project_id = ?
            
            order by task_id desc',[$project_id]
        );

        return view('test',[
            'tasks' => $tasks
        ]);
    }
}
