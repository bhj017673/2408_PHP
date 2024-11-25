<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MyEncrypt;
use PDOException;

class MyToken {
    /**
     * 엑세스 토큰과 리프레시 토큰 생성
     * 
     * @param App\Models\User
     * @return Array [$accessToken, $refreshToken]
     */

    public function createTokens(User $user) {
        $accessToken = $this->createToken($user, env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($user, env('TOKEN_EXP_REFRESH'), false);

        return [$accessToken, $refreshToken];
    }

    /**
     * 리프레쉬 토큰 업데이트
     * 
     * @param App\Model\user $userInfo 유저정보
     * @param string $refreshToken 
     * 
     * @return bool true
     */
    public function updateRefreshToken(User $userInfo, string $refreshToken) {
        // 유저모델에 리프레쉬 토큰 변경
        $userInfo->refresh_token = $refreshToken;

        DB::beginTransaction();

        if(!($userInfo->save())) {
            DB::rollBack();
            throw new PDOException('Error updateRefreshToken()');
        }
        
        DB::commit();

        return true;
    }

    // ---------
    // private
    // ---------



    
    /**
     * JWT 생성
     * 
     * @param   App\Models\User $user
     * @param   int $ttl
     * @param   bool $accessFlg = true
     * 
     * @return string JWT
     */
    private function createToken(User $user, int $ttl, bool $accessFlg = true) {
        $header = $this->createHeader();
        $payload = $this->createPayload($user, $ttl, $accessFlg);
        $signature = $this->createSignature($header, $payload);

        return $header.'.'.$payload.'.'.$signature;
    }


    /**
     * JWT Header 생성
     * 
     * @return string base64UrlEncode
     */

     private function createHeader() {
        $header = [
            'alg' => env('TOKEN_ALG')
            ,'type' => env('TOKEN_TYPE')
        ];
        
        return MyEncrypt::base64UrlEncode(json_encode($header));
    }


    /**
     * JWT페이로드 작성
     *   
     * @param   App\Models\User $user
     * @param   int $ttl
     * @param   bool $accessFlg = true
     * 
     * @return string base64Payload
     */
    private function createPayload(User $user, int $ttl, bool $accessFlg = true){
        $now = time();      //현재시간 습득
    
        //페이로드 기본 데이터 생성
        $payload = [
            'idt' => $user->user_id
            ,'iat' => $now
            ,'exp' => $now + $ttl
            ,'ttl' => $ttl    
        ];

        // 엑세스 토큰일 경우 아래 데이터 추가
        if($accessFlg) {
            $payload['acc'] = $user->account;
        }
    
        return MyEncrypt::base64UrlEncode(json_encode($payload));
    }

    /**
     * JWT 시그니쳐 작성
     * 
     * @param string $header base64URL Encode
     * @param string $payload base64URL Encode
     * 
     * return string base64Signature
     */

    private function createSignature(string $header, string $payload){
        return MyEncrypt::hashWithSalt(env('TOKEN_ALG')
        , $header.env('TOKEN_SECRET_KEY').$payload
        , MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH'))
        );
    }
}