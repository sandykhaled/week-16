<?php

if(isset($_POST["submit"])){
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
    $pwdRepeat=$_POST['pwdrepeat'];
    $email=$_POST['email'];

    include '../classes/db.class.php';
    include '../classes/signup.class.php';
    include '../classes/signup-controller.class.php';
    $sigup=new SignupController($uid,$pwd,$pwdRepeat,$email);

    $sigup->signupUser();
    header("location: ../index.php?error=none");

}
