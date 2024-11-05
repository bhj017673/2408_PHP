<?php

namespace Controllers;

use Controllers\Controller;
// autoload를 사용하므로써 require_once 안해도 사용가능

class UserController extends Controller {
    protected function  goLogin(){
        return 'login.php';
    }
}