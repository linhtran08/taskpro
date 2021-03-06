<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function index(){
        $projects = DB::table('project')->get();
    }

    public function store(Request $request){
        $this->validate($request,[
            'project_title' => 'required',
            'prj_start_date' => 'required',
            'prj_due_date' => 'required|after:prj_start_date',
            'project_detail' => 'required',
        ],
        [
            'prj_start_date.required' => 'Please enter start date for project',
            'prj_due_date.after' => 'Due should be later than start date',
            'prj_due_date.required' => 'Please enter due date for project ',
            'project_detail.required' => 'Please enter project description',
            'project_title.required' => 'Please enter project name',
        ]);

        $created_by_id = session()->get('account.emp_id');
        $created_at = date(now());
        $start_date = $request->input('prj_start_date');
        $end_date = $request->input('prj_due_date');
        $project_name = $request->input('project_title');
        $project_detail = $request->input('project_detail');
        $project_state_id = 1; //default state for project is open

        //dd($start_date, $end_date);
        DB::table('project')
            ->insert([
                'project_name' => $project_name,
                'project_pic_id' => $created_by_id,
                'project_state_id' => $project_state_id,
                'created_at' => $created_at,
                'prj_start_date' => $start_date,
                'prj_due_date' => $end_date,
                'prj_detail' => $project_detail,
            ]);
        return back();
    }

    public function updateProject(Request $request){
        
    }
}
