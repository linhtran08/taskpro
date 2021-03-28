<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;

class AdminController extends Controller
{
    //

    public function index(){

        $account = DB::table('account_info')
            ->join('psn_infor','account_info.emp_id','=','psn_infor.emp_id')
            ->get();

        return view('admin.admin',compact('account'));
    }

    public function view(Request $request){
        return view('admin.view');
    }

    public function create(Request $request){
        $password = $request->input('password');
        $role = $request->input('role');
        $user_id = $request->input('user_id');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $full_name = $first_name.' '.$last_name;
        $sex = $request->input('sex');
        $address = $request->input('address');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $birthday = $request->input('birthday');
        DB::beginTransaction();
        try {
            $lastId = DB::table('account_info')->insertGetId([
                'password'=>$password,
                'role'=>$role
            ]);
            DB::insert('insert into psn_infor(user_id,emp_id,first_name,last_name,full_name,sex,address,email,phone,birthday )
       value(?,?,?,?,?,?,?,?,?,?)',[$user_id,$lastId,$first_name,$last_name,$full_name,$sex,$address,$email,$phone,$birthday]);
            DB::commit();
            return redirect('admin/create')->with('insertSuccess','Create User Success');
        }catch (\Exception $e ){
            DB::rollBack();
            return redirect('admin/create')->with('insertErr','Create User was wrong');
        }
    }
}
