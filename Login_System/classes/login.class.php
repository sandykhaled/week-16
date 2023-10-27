<?php

class Login extends Db{
    protected function getUser($uid,$pwd){
        $sql = "SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?";
        $stmt = $this->connect()->prepare($sql);
    
        if(!$stmt->execute(array($uid, $pwd))){
            $stmt=null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt=null;
            header("location: ../index.php?usernotfound");
            exit();
        }
        $hashedPwd=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword=password_verify($pwd,$hashedPwd[0]["users_pwd"]);

        if($checkPassword == false){
            $stmt=null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        else{
            $stmt= $this->connect()->prepare("SELECT * FROM  users  WHERE users_uid = ? OR users_uid = ? OR users_email = ?");
            if(!$stmt->execute(array($uid,$uid,$hashedPwd[0]['users_pwd']))){
                $stmt=null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt=null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['user_id']= $user[0]['users_id'];
            $_SESSION['user_uid']= $user[0]['users_uid'];
            $stmt=null;

        }
        $stmt=null;
    
    }

}