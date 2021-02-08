<?php

require_once 'db_config.php';

function holder_field_data($field_name){
    return $_REQUEST[$field_name] ?? '';
}

function check_email_exist($link, $email){
    $exist = false;
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    if($result && mysqli_num_rows($result) > 0){
        $exist = true;
    }

    return $exist;
}

function generateRandomString($length = 30) {
  $characters = '0123456789';
  $characters .= 'abcdefghijklmnopqrstuvwxyz';
  $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   
  $max = strlen($characters) - 1;
  $randomString = '';
 
  for ($x = 0; $x < $length; $x++) {
    $randomString .= $characters[ rand(0, $max) ];
  }
 
  return $randomString;
}