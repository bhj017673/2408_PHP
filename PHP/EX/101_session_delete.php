<?php

// 세션시작: 세션시작 전에 출력처리가 있으면 안된다.
// 이전에 출력처리가 있으면 안됨
session_start();

session_destroy(); //세션파기