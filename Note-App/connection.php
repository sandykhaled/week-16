<?php

class Connection {
    public PDO $pdo;
    public function __construct() { 
        $username="root";
        $password="";
        $this->pdo = new PDO("mysql:host=localhost;dbname=notes;port=3307",$username,$password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getNotes(){
     $stmt= $this->pdo->prepare("SELECT * FROM notes ORDER BY create_date");
     $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addNote($note){
        $stmt = $this->pdo->prepare("INSERT INTO notes (title , description,create_date) VALUES (:title,:description,:create_date)");
        $stmt->bindValue("title",$note["title"]);
        $stmt->bindValue("description",$note["description"]);
        $stmt->bindValue("create_date",date('Y-m-d H:i:s'));
        return $stmt->execute();
    }
    public function getNotebyId($id){
        $stmt= $this->pdo->prepare("SELECT * FROM notes WHERE id=:id");
        $stmt->bindValue("id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateNote($id,$note){
         $stmt = $this->pdo->prepare("UPDATE notes SET title=:title , description=:description WHERE id=:id");
         $stmt->bindValue("id",$id);
         $stmt->bindValue("title",$note["title"]);
         $stmt->bindValue("description",$note["description"]);
         return $stmt->execute();

    }
    public function removeNote($id){
        $stmt = $this->pdo->prepare("DELETE FROM notes WHERE id=:id");
        $stmt->bindValue("id",$id);
        return $stmt->execute();

    }

}
?>