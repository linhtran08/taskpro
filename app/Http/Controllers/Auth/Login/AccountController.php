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
        $this->validate($request,[
            'emp_id' => 'required',
            'password' => 'required',
        ]);

        $emp_id = $request->input('emp_id');
        $password= $request->input('password');
        $account = DB::table('account_info')
            ->join('psn_infor','account_info.emp_id','=','psn_infor.emp_id')
            ->where('psn_infor.email',$emp_id)
            ->where('account_info.password',$password)
            ->where('account_info.active',1)
            ->first();
        if(!empty($account)){
            $request->session()->put('login',true);
            $request->session()->put(
                'account',
                [
                    'id'=>$account->user_id,
                    'emp_id'=>$account->emp_id,
                    'role'=>$account->role,
                    'name'=>$account->full_name,
                ]
            );
            if($account->role == 1){
                return redirect()->route('admin');
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            return back()->with('status','Invalid login details or deactivated id');
        }
    }

    public function logout(Request $request){
        $request->session()->forget(['login','account']);
        return redirect()->route('login');
    }
}
