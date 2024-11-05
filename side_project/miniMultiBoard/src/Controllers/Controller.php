<?php
namespace Controllers;

class Controller {

    public function __construct( string $action) {
        // 세션 시작


        // 유저 로그인 및 권한 체크


        // 해당 Action 호출 ( 필요한 행동을 실질적으로 하는것을 action이라고 함 method가된다)
        $resultAction = $this->$action ();

        // View 호출
        $this->callView($resultAction);
        
        
        exit; // php 종료


    }

    private function callView($path) {
        if(strpos($path, 'Location:') === 0) {
            header($path);
        }else {
            require_once(_PATH_VIEW.'/'.$path);
        }
    }
 }