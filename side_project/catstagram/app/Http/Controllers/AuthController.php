<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MyToken;

// class AuthController extends Controller
// {
//     public function login(UserRequest $request) {
//         // 유저 정보 획득
//         $userInfo = User::where('account', $request->account)
//                     ->withCount('boards')
//                     ->first();
        
//         // 비밀번호 체크
//         if(!(Hash::check($request->password, $userInfo->password))) {
//             throw new AuthenticationException('비밀번호 체크 오류');
//         }

//         $responseData = [
//             'success' => true
//             ,'msg' => '로그인 성공'
//             ,'data' => $userInfo->toArray()
//         ];

//         return response()->json($responseData, 200);
//     }

    /**
     * 로그아웃
     * 
     * @param   Illuminate\Http\Request $request
     * 
     * @return  response JSON
     */
    public function logout(Request $request) {
        // 페이로드에서 유저 id 획득
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');

        DB::beginTransaction();

        // 유저 정보 획득
        $userInfo = User::find($id);

    }


