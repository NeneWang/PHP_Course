<?php
include "db.php";

connectToDb();
 
//      MINIFUNCTIONS

       
function showOptionsBasedOnDbId(){
       connectToDb();
      global $result;
       
        while($row = mysqli_fetch_assoc($result)){
        $id = $row["ID"];

           echo "<option value='$id'>$id</option>";

        }  
   }                 
       
function connectToDb(){
    
        global $connection;
        global $query;
        global $result;
        $query = "SELECT * FROM users";
        $result= mysqli_query($connection,$query);
        if( !$result ){
                    die("Querry failed");
                }
    }


function updateGlobalPostVariables(){
    
    global $username;
    global $password;
    global $id;
    global $connection;
    
    
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_POST["id"];
    
    
    
     //Security Check
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    
    //Encryption
    $hashFormat = "$2y$3$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password,$hashF_and_salt);
   
}

 //             DATABASE UPDATE FUNCTIONS
function updateDbTableWithoutInput(){
    
    global $connection;
    updateGlobalPostVariables();
    global $username;
    global $password;
    global $id;
    $query="UPDATE users SET ";
    $query .="username = '$username', ";
    $query .="password = '$password' ";
    $query .="WHERE id = $id ";
    
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED Miancrea" . mysqli_error($connection).$query);
    }
}

function insetTableDB(){
    
    global $connection;
    updateGlobalPostVariables();
     global $username;
    global $password;
    $query = "INSERT INTO users(username,password)";
    $query .=" VALUES ('$username','$password') ";
    //$query .= "WHERE id = 1 ";
     $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED Miancrea" . mysqli_error($connection).$query);
    }
}

function deleteRowById(){
    
    global $connection;
    $id = $_POST["id"];
    
    $query = "DELETE FROM users ";
    $query .="WHERE id = $id ";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED Miancrea" . mysqli_error($connection).$query);
    }
}

function updateDbTableWithUserPassId($username,$password,$id){
    global $connection;
    $query="UPDATE users SET ";
    $query .="username = '$username', ";
    $query .="password = '$password' ";
    $query .="WHERE id = $id ";
    
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED Miancrea" . mysqli_error($connection).$query);
    }
}



