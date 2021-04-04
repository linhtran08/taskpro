<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'project_title' => 'required',
            'prj_start_date' => 'required',
            'prj_due_date' => 'required'
        ]);

        $created_by_id = session()->get('account.emp_id');
        $created_at = date(now());
        $start_date = $request->input('prj_start_date');
        $end_date = $request->input('prj_due_date');
        $project_name = $request->input('project_title');

        DB::table('project')
            ->insert([
                'project_name' => $project_name,
                'project_pic_id' => $created_by_id,
                'created_at' => $created_at,
                'prj_start_date' => $start_date,
                'prj_due_date' => $end_date
            ]);
        return back();
    }
}