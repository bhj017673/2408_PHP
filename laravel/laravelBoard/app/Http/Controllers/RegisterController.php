<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function goRegister(){
        return view ('regist');
    }
    
    public function register(Request $request) {
        $request ->validate([
            'u_email' => ['required','email', 'unique:users,u_email']
            ,'u_password' => ['required', 'between:6,20', 'regex:/^[a-zA-Z0-9!@]+$/']
            ,'u_name' => ['required','between:2,50', 'regex:/^[가-힣]+$/u']
            ,'u_password_chk' => ['required', 'between:6,20', 'same:u_password']
        ]);

        DB::beginTransaction();
        try{
            User::create([
                'u_email' =>$request->u_email
                ,'u_password' => Hash::make($request->u_password) 
                ,'u_name' =>$request->u_name
            ]);
        
            DB::commit();
            return redirect()->route('login')->with('success','회원가입이 완료되었습니다');
        } catch(Exception $error) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => '회원가입 중 문제가 발생했습니다.']);
        }

    }
}

