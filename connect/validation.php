<?php
$Errors="";
$succes="";
function required_input($str){
    $value=trim($str);

    if(strlen($value) <=0 ){
        return false;
    }
    return true;
}

function sanitize_string($str){
    $value = trim($str);
    $value =filter_var($value,FILTER_SANITIZE_STRING);
    return $value;
}

function minmum_input($str, $min){
    if(strlen($str) < $min){
        return false;
    }
    return true;
}

function max_input($str, $max){
    if(strlen($str) > $max){
        return false;
    }
    return true;
}

function redirect($dir){
    return header("refresh: 3; url=$dir");
}