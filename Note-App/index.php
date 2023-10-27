<?php
require_once 'connection.php';
$conn=new Connection();
$notes=$conn->getNotes();
$currentNote=[
  'id'=>'', 
  'title'=>'',
  'description'=>''
];
if(isset($_GET['id'])){
  $currentNote=$conn->getNotebyId($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <style>


   </style>
    <title>Document</title>
</head>
<body>
    
    <h1 style="text-align:center">Note App</h1>
    <div class="w3-container"  style="margin-top: 80px;">
    <form class="new-note" action="create.php" method="post">
      <input type="hidden" name="id" value="<?= $currentNote['id']?>">
        <input type="text" class="w3-input w3-border"  style="margin-top: 10px;margin-bottom:20px" name="title" value="<?= $currentNote['title'] ?>">
        <textarea class="w3-input w3-border" style="margin-bottom: 20px;" name="description"><?= $currentNote['description']?></textarea>
    <button class="w3-button w3-block w3-red" style="width:100%">
  <?php if($currentNote['id']):?>
  Update Note
  <?php else :?>
    New Note
    <?php endif;?>
  </button>

    </form>
    <?php foreach($notes as $note): ?>
  <div class="w3-panel w3-yellow">
    <form action="delete.php" method="post">
    <input type="hidden" name="id" value=" <?= $note['id']?>">
    <button class="close" style="text-decoration:none;position:relative;left:98%;top:20px;background:yellow;border:none">X</button>
    </form>
    <p style="margin-top: -10px; font-weight:bolder"><a href="?id=<?= $note['id']?>"> <?= $note['title']?></a></p>
    <p> <?= $note['description']?></p>
    <p> <?= $note['create_date']?></p>
  </div>
  <?php endforeach;?>


</div> 
    
</body>
</html>