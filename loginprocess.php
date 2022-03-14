<?php

if(isset($_POST['g-recaptcha-response'])) {

   $captcha = $_POST['g-recaptcha-response'];
   $ip = $_SERVER['REMOTE_ADDR'];
   $key = '6LeTZroeAAAAAO_wlytY2YBgsF8KEef9pxY7H2YH';
   $url = 'https://www.google.com/recaptcha/api/siteverify';

   $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
   $data = json_decode($recaptcha_response);

   if(isset($data->success) &&  $data->success === true) {
   }
   else {
      die('Your account has been logged as a spammer, you cannot continue!');
   }
 }


 session_start();  
 
 if(isset($_REQUEST["sub"]))  
 {  
    $username = $_REQUEST['name'];
    $password = $_REQUEST['pass']; 
    require_once("connection.php");
    $res = mysqli_query($conn,"select * from electeur where ElecteurID='$username'and CIN='$password' limit 1");
    $result=mysqli_fetch_array($res);
    if($result)
    {
      $_SESSION["login"]="1" ;
      $_SESSION['last_login_timestamp'] = time();  
      header("location:urne.php");
    }
    else
    {
       header("location:login.php");
    }
 }  

?>