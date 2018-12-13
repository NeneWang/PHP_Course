
<?php include "db.php";


   include "functions.php";

if(isset($_POST["submit"])){
    
    deleteRowById();
}
include "includes/header.php";
?>

   
   <div class="container">
       <div class="col-xs-6">
           <form action="login_delete.php" method="post">
               <h1>Select Item´s ID to delete : </h1>
               <div class="form-group" >
                  
                   
                   <select name="id" >
                   
                        <?php
                          showOptionsBasedOnDbId();
                               ?>
                   </select>
                         
               </div>
               
               
               
               <input type="submit" class="btn btn-danger" name="submit" value="delete">
           </form>
                
    
       </div>
       
   </div>
   
<?php include "includes/footer.php" ?>