<?php
global $connection;
if(isset($_POST["create_user"])){
    extract($_POST);
    //$post_date = date("d-m-y");
    $user_image='';
     // Crypting generic password stuff
//    $query = "SELECT user_randsalt FROM users";
//    $select_query = mysqli_query($connection, $query);
//    confirmQuery($select_query);
//    $row = mysqli_fetch_assoc($select_query);
   // $salt = $row['user_randsalt'];
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        
 $query = "INSERT INTO users(user_name, user_password, user_firstname, user_lastname, user_email, user_image, user_role) ";
 
$query .= "VALUES( '{$user_name}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}')";
    
    
    $create_post_query = mysqli_query($connection,$query);
    if(!$create_post_query){
        die("error while sending the creation request ".mysqli_error($connection).$query);
    }
    
    echo "User succesfully created! <a href='users.php'> View User </a> " ;
    
}
?>
   

   <form action="" method="post" enctype="multipart/form-data">
        
     <div class="form-group"><label for="user_name">username</label>
    <input type="text" class="form-control" name="user_name"></div>
    
    <div class="form-group"><label for="user_password">Password</label>
    <input type="password" class="form-control" name="user_password"></div>
    
    
    <div class="form-group"><label for="user_firstname">First Name</label>
    <input type="text" class="form-control" name="user_firstname"></div>
    
    <div class="form-group"><label for="user_lastname">Last Name</label>
    <input type="text" class="form-control" name="user_lastname"></div>
    
    <div class="form-group"><label for="user_email">Email</label>
    <input type="email" class="form-control" name="user_email"></div>
    
<!--
    <div class="form-group"><label for="user_image">Image</label>
    <input type="text" class="form-control" name="user_image"></div>
-->
    <div class="form-group" >
        <label for="user_role">Role : </label>
       <select name="user_role" id="">
          <option value="subscriber">Select Option</option>
           <option value="admin">admin</option>
           <option value="subscriber">subscriber</option>
       </select>
    </div>
    
<!--
     <div class="form-group"><label for="user_randSalt">RandSalt</label>
    <input type="text" class="form-control" name="user_randSalt"></div>
-->
        
    
    <input type="submit" value="Add User!" name="create_user">
    
</form>