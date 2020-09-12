<?php
require 'config.php';
if($_POST){
  $title = $_POST['title'];
  $description = $_POST['description'];

  $sql= "INSERT INTO todo(title,description) VALUES (:title, :description)";
  $pdostatement = $pdo->prepare($sql);
  $result = $pdostatement->execute(
    array(
      ':title' => $title,
      ':description' => $description
    )
  );
  if($result){
    echo "<script>alert('New todo is added');window.location.href='index.php';</script>";
  }
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Create New</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   </head>
   <body>
     <div class="container">
     <div class="card">
       <div class="card-body">
         <h2>Create New todo</h2>
         <form class="" action="add.php" method="post">
           <div class="form-group">
             <label for="">Title</label>
             <input type="text" class="form-control" name="title" value="">
           </div>
           <div class="form-group">
             <label for="">Description</label>
             <textarea class="form-control" name="description" rows="5" cols="30"></textarea>
           </div>
           <div class="form-group">
             <a href="index.php" class="btn btn-default">Back</a>
             <input type="submit" class="btn btn-primary" name="" value="ADD">
           </div>

         </form>

       </div>
     </div>


     </div>
   </body>
 </html>
