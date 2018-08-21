<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function redirect($http = false){
    $redirect = '';
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header('Location:' . $redirect);
    exit;
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

/**
 * генерация случайного кода
 **/
function  gen_code($max)  {//генератор кода
    $chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
    $size = strlen($chars) - 1;
    $code = null;
    while ($max--)
        $code .= $chars[rand(0, $size)];
    return $code;
}