
<?php include "db.php";


   include "functions.php";

if(isset($_POST["submit"])){
    
    insetTableDB();
}
include "includes/header.php";

?>
   
   <div class="container">
       <div class="col-xs-6">
          
          <h1 class="text-center">Insert</h1>
           <form action="login_insert.php" method="post">
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
               
               
               
               <input type="submit" class="btn btn-info" name="submit" value="Insert">
           </form>
                
    
       </div>
       
   </div>
   
<?php 
include "includes/footer.php";
?>