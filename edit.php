<?php
require 'config.php';
if($_POST){

  $id = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$description' WHERE id='$id'");
  $result = $pdostatement->execute();
  if($result){
    echo "<script>alert('New todo is edited!');window.location.href='index.php';</script>";
  }

}else{
  $param_id = $_GET['id'];
  $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$param_id);
  $pdostatement->execute();
  $result = $pdostatement->fetchAll();
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Edit todo</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   </head>
   <body>
     <div class="container">
     <div class="card">
       <div class="card-body">
         <h2>Edit todo</h2>
         <form class="" action="" method="post">
           <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
           <div class="form-group">
             <label for="">Title</label>
             <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>">
           </div>
           <div class="form-group">
             <label for="">Description</label>
             <textarea class="form-control" name="description" rows="5" cols="30"><?php echo $result[0]['description'] ?></textarea>
           </div>
           <div class="form-group">
             <a href="index.php" class="btn btn-default">Back</a>
             <input type="submit" class="btn btn-primary" name="" value="Edit">
           </div>

         </form>

       </div>
     </div>


     </div>
   </body>
 </html>
