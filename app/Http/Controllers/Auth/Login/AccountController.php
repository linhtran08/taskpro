<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    //
    public function index(Request $request){
        if($request->session()->exists('login')){
            return redirect()->route('dashboard');
        }
        return view('login.login');
    }

    public function login(Request $request){
        $emp_id = $request->input('emp_id');
        $password= $request->input('password');
        $account = DB::table('account_info')->where('emp_id',$emp_id)->where('password',$password)->first();
        if(!empty($account)){
            $request->session()->put('login',true);
            $request->session()->put('role',$account->role);
            $request->session()->put('emp_id',$account->emp_id);
            return redirect()->route('dashboard');
        }else{
            return $this->index($request);
        }
    }

    public function logout(Request $request){
        $request->session()->forget(['login', 'role','emp_id']);
        return $this->index($request);
    }
}
