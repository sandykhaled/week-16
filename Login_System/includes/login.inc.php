<?php

if(isset($_POST["submit"])){
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
 

    include '../classes/db.class.php';
    include '../classes/login.class.php';
    include '../classes/login-controller.class.php';
    $login=new LoginController($uid,$pwd);

    $login->loginUser();
    header("location: ../index.php?error=none");

}
