<?php
require 'config.php';
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   </head>
   <body>
     <?php
     $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
     $pdostatement->execute();
     $result = $pdostatement->fetchAll();
      ?>
     <div class="container">
     <div class="card">
       <div class="card-body">
         <h1>Todo Home Page</h1>
         <p><a type="button" class="btn btn-success" href="add.php">Create New</a></p>
         <table class="table">
           <tr>
             <th>ID</th>
             <th>Title</th>
             <th>Description</th>
             <th>Created</th>
             <th>Actions</th>
           </tr>
           <?php
           if($result){
             $i = 1;
           foreach ($result as $value) {
           ?>
           <tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $value['title']; ?></td>
             <td><?php echo $value['description']; ?></td>
             <td><?php echo date('Y-m-d',strtotime($value['created_at'])); ?></td>
             <td>
               <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id']; ?>">Edit</a>
               <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['id']; ?>">Delete</a>
             </td>
           </tr>
           <?php
           $i++;
          }
         }
         ?>
         </table>
       </div>
     </div>
   </div>
   </body>
 </html>
