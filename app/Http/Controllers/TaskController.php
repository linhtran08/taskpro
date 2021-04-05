<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function index($id)
    {
        $tasks = DB::select('        
            select task_id,
                   p.project_name as project_name,
                   task.task_state_id,
                   ts.`desc` as task_state,
                   task.task_job_type_id,
                    p.project_id,
                   tjt.`desc` as task_job_type,
                   p2.`desc` as priority,
                   tp.`desc` as phase,
                   task_title,
                   task.created_at,
                   task_detail,
                   task.assignee_id,
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
            where task_id =? ', [$id]
        );
        $comments = DB::select('
            select pi.full_name, body, created_at
            from comment t1
            inner join account_info ai on t1.created_by_id = ai.emp_id
            inner join psn_infor pi on ai.emp_id = pi.emp_id
            where task_id = ?
        ', [$id]);

        //dd($comments);

        $projects = DB::table('project')->get();
        $job_types = DB::table('task_job_type')->get();
        $priorities = DB::table('priority')->get();
        $task_state = DB::table('task_state')->get();
        $phases = DB::table('task_phase')->get();
        $assignees = DB::table('account_info')
            ->join('psn_infor', 'account_info.emp_id', '=', 'psn_infor.emp_id')
            ->where('account_info.role','!=',1)
            ->where('account_info.active',1)
            ->select('account_info.emp_id', 'psn_infor.full_name', 'account_info.role')
            ->distinct()
            ->get();

        //dd($tasks);
        return view('task_detail', [
            'task_state' => $task_state,
            'tasks' => $tasks,
            'job_types' => $job_types,
            'priorities' => $priorities,
            'assignees' => $assignees,
            'projects' => $projects,
            'comments' => $comments,
            'phases' => $phases
        ]);
    }

    public function postUpdate(Request $request, $id)
    {
        //Do not allow to update ProjectId or Job Type
        $this->validate($request, [
            'task_state_id' => 'required',
            'priority_id' => 'required',
            'task_phase_id' => 'required',
            'due_date' => 'required',
            'task_title' => 'required',
            'task_detail' => 'required',
            'effort' => 'required|integer'
        ]);

        $task_state_id = $request->input('task_state_id');
        $prev_state_id = $request->input('prev_state_id');
        $priority_id = $request->input('priority_id');
        $phase_id = $request->input('task_phase_id');
        $prev_phase_id = $request->input('prev_phase_id');
        $task_title = $request->input('task_title');
        $task_detail = $request->input('task_detail');
        $assignee_id = $request->input('assignee_id');
        $due_date = $request->input('due_date');
        $prev_due_date = $request->input('prev_due_date');
        $effort = $request->input('effort');
        $score = $request->input('score');

        if($prev_state_id != $task_state_id){
            DB::table('task')
                ->where('task_id', $id)
                ->update([
                   'task_state_id' => $task_state_id,
                ]);
        }else{
            $this->handlePhaseState($phase_id, $id);
        }

        DB::table('task')
            ->where('task_id', $id)
            ->update([
                'priority' => $priority_id,
                'task_title' => $task_title,
                'task_detail' => $task_detail,
                'assignee_id' => $assignee_id,
//                'due_date' => $due_date,
                'effort' => $effort,
                'satisfaction' => $score
            ]);


        //Only check validation for due date if due date is changed
        if($due_date != $prev_due_date){
            $this->validate($request,[
                'due_date' => 'after_or_equal:today',
            ]);
        }

        DB::table('task')
            ->where('task_id', $id)
            ->update([
                'due_date' => $due_date,
            ]);
        $created_by_id = session()->get('account.emp_id');

        DB::table('task_phase_history')->insert([
            'task_id' => $id,
            'task_phase_id' => $phase_id,
            'assignee_id' => $assignee_id,
            'changed_by_id' => $created_by_id
        ]);

        return back();
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //dd($request);
        $this->validate($request, [
            'task_job_type_id' => 'required',
            'project_id' => 'required',
            'priority_id' => 'required',
            'due_date' => 'required|after:today',
            'task_title' => 'required',
            'task_detail' => 'required',
        ]);

        $project_id = $request->input('project_id');
        $task_state_id = 1;
        $task_job_type_id = $request->input('task_job_type_id');
        $priority_id = $request->input('priority_id');
        $phase_id = 1;
        $task_title = $request->input('task_title');
        $task_detail = $request->input('task_detail');
        $created_at = date(now());
        $assignee_id = $request->input('assignee_id');
        $created_by_id = session()->get('account.emp_id');
        $due_date_src = $request->input('due_date');
        $due_date = DateTime::createFromFormat('d M Y', $due_date_src)->format("Y-m-d");
        $effort = $request->input('effort');

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
            'effort' => $effort,
            ]);

        $task_id = DB::table('task')->max('task_id');

        DB::table('task_phase_history')->insert([
            'task_id' => $task_id,
            'task_phase_id' => $phase_id,
            'assignee_id' => $assignee_id,
            'changed_by_id' => $created_by_id
        ]);
        return back();
    }

    public function handlePhaseState($phase_id, $task_id){
        if ($phase_id != 1 & $phase_id != 6){
            $start_date = DB::table('task')
                ->where('task_id', $task_id)
                ->select('start_date')
                ->get();
            if(empty($start_date[0]->start_date)){
                $start_date = date(now());
                DB::table('task')
                    ->where('task_id', $task_id)
                    ->update([
                        'start_date' => $start_date,
                        'task_state_id' => 2,
                        'phase' => $phase_id,
                    ]);
            }else{
                DB::table('task')
                    ->where('task_id', $task_id)
                    ->update([
                       'phase' => $phase_id,
                       'task_state_id' => 2
                    ]);
            }
        }
        if($phase_id == 1){
            DB::table('task')
                ->where('task_id', $task_id)
                ->update([
                    'task_state_id' => 1,
                    'phase' => 1
                ]);
        }
        if($phase_id == 6){
            $finished_date = date(now());
            DB::table('task')
                ->where('task_id', $task_id)
                ->update([
                    'finish_date' => $finished_date,
                    'task_state_id' => 5
                ]);
        }
    }
}
