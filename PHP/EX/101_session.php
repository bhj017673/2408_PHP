<?php

// 세션시작: 세션시작 전에 출력처리가 있으면 안된다.
// 이전에 출력처리가 있으면 안됨
session_start();

$_SESSION['test_session']= '세션1';

echo $_SESSION['test_session'];