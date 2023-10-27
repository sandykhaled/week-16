<?php

require_once("connection.php");
$conn=new Connection();
$conn->removeNote($_POST['id']);
header("location:index.php?error=none");

?>