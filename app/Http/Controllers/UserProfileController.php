<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function update(Request $request,$id): \Illuminate\Http\RedirectResponse
    {
        $password = $request->input('password');
//        $role = $request->input('role');
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
            DB::table('account_info')->where('emp_id',$id)->update([
                'password'=>$password,
            ]);
            DB::table('psn_infor')->where('emp_id',$id)->update([
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'full_name'=>$full_name,
                'sex'=>$sex,
                'address'=>$address,
                'email'=>$email,
                'phone'=>$phone,
                'birthday'=>$birthday
            ]);
            DB::commit();
            return back();
        }catch (\Exception $e ){
            DB::rollBack();
            return redirect()->route('profile',$id)->with('updateErr','Update User was wrong');
        }
    }
}
