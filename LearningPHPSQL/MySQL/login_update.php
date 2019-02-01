
<?php include "db.php";


   include "functions.php";

if(isset($_POST["submit"])){
    
    updateDbTableWithoutInput();
}

?>


<?php include "includes/header.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
   <div class="container">
       <div class="col-xs-6">
           <form action="login_update.php" method="post">
               <div class="form-group">
                  <label for="username">Username</label>
                   <input type="text" class="form-control" name="username" required>
                   
               </div>
               
                  <label for="password" >Password</label>
               <div class="form-group">
                   <input type="password" name="password" class="form-control" required>
                   
                   <select name="id" >
                   
                        <?php
                          showOptionsBasedOnDbId();
                               ?>
                   </select>
                         
               </div>
               
               
               
               <input type="submit" class="btn btn-primary" name="submit" value="update">
           </form>
                
    
       </div>
       
   </div>
   
    
</body>
</html>



<?php include "includes/footer.php" ?>