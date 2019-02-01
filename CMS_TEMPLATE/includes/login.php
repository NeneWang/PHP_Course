
<?php include "db.php"; ?>
<?php  ob_start();?>
<?php session_start(); ?>

<?php 


if(isset($_POST['login'])){
    
    $username =    $_POST['username'];
    
    $password =    $_POST['password'];
    
    $username =    mysqli_real_escape_string($connection, $username);
    
    $password =    mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM users WHERE user_name = '{$username}' ";
    
    $select_user_query = mysqli_query($connection, $query);
    
    
    
    if(!$select_user_query ){
        
        die("Query failed".mysqli_error($connection));
        
    }
    
    while($row = mysqli_fetch_array($select_user_query)){
        
        extract($row);
        
        $salt = $row['user_randsalt']; // --> I added this
        
    }
    
    $password = crypt($password, $salt); // --> Now it uses salt!
    
    if($username === $user_name && $password === $user_password){
        
        $_SESSION['user_name'] = $user_name;
        
        $_SESSION['user_firstname'] = $user_firstname;
        
        $_SESSION['user_lastname'] = $user_lastname;
        
        $_SESSION['user_role'] = $user_role;
        $_SESSION['user_id']=$user_id;
        
        header("Location: ../admin/index.php");
        
    }else{
        
        header("Location: ../index.php");
        
    }
    
}





?>