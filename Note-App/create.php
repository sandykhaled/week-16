<?php
require_once("connection.php");
$conn=new Connection();
$id=$_POST['id'] ?? "";
if($id){
  $conn->updateNote($id,$_POST);
}
else{
   $conn->addNote($_POST);
}
header("location:index.php?error=none");
?>