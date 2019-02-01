<?php
global $connection;
if(isset($_POST["edit_user"])){
    extract($_POST);
    
    // Crypting generic password stuff
    $query = "SELECT user_randsalt FROM users";
    $select_query = mysqli_query($connection, $query);
    confirmQuery($select_query);
    $row = mysqli_fetch_assoc($select_query);
    $salt = $row['user_randsalt'];
    $user_password = crypt($user_password,$salt); 

    $query = "UPDATE users SET "; // Whitespace after SET is required
    $query .= "user_name = '{$user_name}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}' ";
    $query .= "WHERE user_id = $user_id";
    
    echo($query);
    
    $update_post_query = mysqli_query($connection,$query);
    confirmQuery($update_post_query);
    echo "Succesfully updated! <a href='users.php'>Return to all users view</a>";
}

if(isset($_GET["user_id"])){
    extract($_GET);
    //Extracts $post_id
    //TODO extracts Data from the DBase 
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $selected_post_data =  mysqli_query($connection, $query);
    if(!$selected_post_data){
        die("error while triying to get the selected Post data error Diagnostic : ".mysqli_error($connection)." Query : ".$query);
    }
    else{
        $row = mysqli_fetch_assoc($selected_post_data);
        extract($row);
        
        
        
    }
    
}

?>
   

   <form action="" method="post" enctype="multipart/form-data">
        
     <div class="form-group"><label for="user_name">username</label>
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
    
<!--
     <div class="form-group"><label for="user_randSalt">RandSalt</label>
    <input type="text" class="form-control" name="user_randSalt"></div>
-->
        
    
    <input type="submit" value="Confirm changes" name="edit_user">
    
</form>