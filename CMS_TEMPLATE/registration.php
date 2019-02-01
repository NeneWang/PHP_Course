<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
<?php
if(isset($_POST['submit'])){
    
    extract($_POST); // Gets $username $email $password
    
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);
    $email  = mysqli_real_escape_string($connection,$email);
        
    $query = "SELECT user_randsalt FROM users";
    $select_randSalt_query = mysqli_query($connection, $query);
    //print_r ($select_randSalt_query);
   // confirmQuery($select_randSalt_query);
    
    $row = mysqli_fetch_assoc($select_randSalt_query);
    extract($row);
    echo($user_randsalt);
    $password = crypt($password,$user_randsalt);
    $query = "INSERT INTO users (user_name, user_email, user_password, user_role) VALUES('{$username}','{$email}','{$password}','subscriber')";
    
    $query_response=mysqli_query($connection,$query);
    if($query_response){
        echo "<p class = 'bg-success'> You have succesfuly registered !! <p>";
    }
    
   
}
  
  
  ?>
   
   
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" required placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" required placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
