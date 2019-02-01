

   <?php
    include "includes/admin_header.php";
        

   global $connection;


 
    if(isset($_POST["edit_user"])){
        extract($_POST);


        $query = "UPDATE users SET "; // Whitespace after SET is required
        $query .= "user_name = '{$user_name}', ";
        $query .= "user_password = '{$user_password}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "WHERE user_id = $user_id";

       // echo($query);

        $update_post_query = mysqli_query($connection,$query);
        //confirmQuery($update_post_query);
        echo "Succesfully updated! <a href='users.php'>Return to all users view</a>";
    
    
}

        if(isset($_SESSION['user_name'])) 
        {
            extract($_SESSION);
            $query = "SELECT * FROM users WHERE user_id = '{$user_id}'";
            $query_response = mysqli_query($connection,$query);
            //confirmQuery($query_response); //-CAUSE 
            while($row = mysqli_fetch_assoc($query_response))
            {
                extract($row);
            }
        }



?>
    <div id="wrapper">

       <?php  
        //if($connection) echo "conn";
        ?>
        <!-- Navigation -->
           <?php include "includes/admin_navigation.php" ?>
            <!-- /.navbar-collapse -->
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $user_name;?></small>
                        </h1>
                    </div>

   <form action="" method="post" enctype="multipart/form-data">
        
     <div class="form-group"><label for="user_name">Username</label>
    <input type="text" value="<?php echo $user_name;?>"class="form-control" name="user_name"></div>
    
    <div class="form-group"><label for="user_password">Password</label>
    <input value="<?php echo $user_password;?>" type="password" class="form-control" name="user_password"></div>
    
    
    <div class="form-group"><label for="user_firstname">First Name</label>
    <input value="<?php echo $user_firstname;?>" type="text" class="form-control" name="user_firstname"></div>
    
    <div class="form-group"><label for="user_lastname">Last Name</label>
    <input type="text" value="<?php echo $user_lastname;?>" class="form-control" name="user_lastname"></div>
    
    <div class="form-group"><label for="user_email">Email</label>
    <input type="email" value="<?php echo $user_email;?>" class="form-control" name="user_email"></div>
    
<!--
    <div class="form-group"><label for="user_image">Image</label>
    <input type="text" class="form-control" name="user_image"></div>
-->
<!--
    <div class="form-group" >
        <label for="user_role">Role : </label>
       <select  name="user_role" id="">
          <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
           <?php
           if($user_role == "admin"){
               echo "<option value='subscriber'>subscriber</option>";
           }else
           {
               echo "<option value='admin'>admin</option>";
           }
           ?>

       </select>
    </div>
-->
    
<!--
     <div class="form-group"><label for="user_randSalt">RandSalt</label>
    <input type="text" class="form-control" name="user_randSalt"></div>
-->
        
    
    <input class="btn btn-primary" type="submit" value="Update profile" name="edit_user">
    
</form>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include "includes/admin_footer.php"?>
 