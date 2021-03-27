<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function index(){

        $account = DB::table('account_info')
            ->join('psn_infor','account_info.emp_id','=','psn_infor.emp_id')
            ->get();

        return view('admin.admin',compact('account'));
    }
}
