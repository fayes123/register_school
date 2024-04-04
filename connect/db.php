<?php
$name_server="localhost";
$user_name="root";
$pass_word="";
$Db_name="students";

$conn=mysqli_connect($name_server,$user_name,$pass_word,$Db_name);

if(!$conn){
    die(print_r(mysqli_connect_error(), true));
}
