<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $this->validate($request,[
            'body' => 'required',
        ]);

        $created_by_id = session()->get('account.emp_id');
        $body = $request->input('body');
        $created_at = date(now());
        $task_id = $request->input('comment_task_id');
        DB::table('comment')
            ->insert([
                'task_id' => $task_id,
                'created_by_id' => $created_by_id,
                'body' => $body,
                'created_at' => $created_at,
            ]);
        return back();
    }
}
