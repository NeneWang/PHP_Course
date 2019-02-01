<?php
 function insert_categories(){
     global $connection;
       if(isset($_POST["submit"]))
        {

            $cat_title = $_POST["cat_title"];
            if($cat_title =="" || empty($cat_title)){
                echo "this field should not be empty"; 
            }else{
                $query="INSERT INTO categories (cat_title) ";
                $query .= "VALUES ('{$cat_title}')";
                $create_category_query = mysqli_query($connection,$query);
                if(!$create_category_query){
                    die("error while sending the creation request ");
                }
        }
        }
 }


function FillTableWithCategories(){
    global $connection;
    
     //FIND ALL CATEGORIES QUERY and echoing them to fill the table
                    

    $query = "SELECT * FROM categories";
    $select_categories =  mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_categories)){
                extract($row);
                echo "<tr>";                  
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";       
                echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
                echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
                echo "</tr>"; 
        }
}

function CreateDeleteTable(){

    global $connection;
   if(isset($_GET['delete'])){
    $the_cat_id=$_GET["delete"];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query=mysqli_query($connection,$query);
       header("Location: categories.php");
   }
}

function FillTableWithPosts(){
    //Get the posts from the databases and display their information in a ta
    global $connection;
    
     //FIND ALL CATEGORIES QUERY and echoing them to fill the table
    
    $query = "SELECT * FROM posts ORDER BY post_id DESC";
    $select_posts =  mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_posts)){
            extract($row);
            echo "<tr>"; 
            
            ?>
               <th><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value = "<?php echo $post_id ?>"></th>
                
                
                <?php 
            echo ' ';
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";   
            echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
            echo "<td>".getCategoryNameByIntId($post_category_id)."</td>";  
            echo "<td>{$post_status}</td>";
            echo "<td><img width='100' src='{$post_image}'></td>";  
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_content}</td>";  
            echo "<td>{$post_date}</td>"; 
            
            echo "<td>{$post_view_count} <a href = 'posts.php?reset_view_count={$post_id}'>RESET</a></td>"; 
            echo "<td><a onCLick= \" javascript: return confirm('are you sure?'); \"  href='posts.php?delete={$post_id}'>DELETE</a></td>";
            echo "<td><a href='posts.php?source=edit_post&post_id={$post_id}'>EDIT</a></td>";
             echo "<td><a href='posts.php?source=publish_post&post_id={$post_id}'>PUBLISH</a></td>";
      
            echo "</tr>";   
            
        }
    
                
}

function online_users()
{
    
    
    if (isset($_GET['onlineusers'])) {
        
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        
        global $connection;
        
        if (!$connection) {
            include "db.php";
        }
        
        $session = session_id();
        
        $time = time();
        
        $time_out_in_seconds = 15;
        
        $time_out = $time - $time_out_in_seconds;
        
        
        $query = "SELECT * FROM users_online WHERE session = '$session'";
        $send_query = mysqli_query($connection, $query);
        echo $count = mysqli_num_rows($send_query);
        
        
        if ($count == NULL) {
            
            
            mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");
            
        } else {
            
            mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
            
        }
        
        
        $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
        
        $count_user = mysqli_num_rows($users_online_query);
//        if($count_user == 12){$count_user=2;}
//        if($count_user == 2){$count_user=200;} test results : it seems that it prints an 1 from nowhere
        //$count_user-=10;
        echo $count_user;
        
    }
    
}
online_users();
//
//
//function getIntUsersOnline(){
//    
//    if(isset($_GET['onlineusers'])) {
//    
//    global $connection;
//        
//    if(!$connection){
//        session_start();
//        include("../includes/db.php");
//        
//        
//        $session = session_id();
//        $time = time();
//        $time_out_in_seconds = 60;
//        $time_out = $time - $time_out_in_seconds;
//
//        $query = "SELECT * FROM users_online WHERE session = '$session'";
//        $send_query = mysqli_query($connection, $query);
//        $count = mysqli_num_rows($send_query);
//
//        if($count == NULL){
//            mysqli_query($connection,"INSERT INTO users_online (session,time) VALUES('$session','$time') ");
//
//        }else{
//            mysqli_query($connection,"UPDATE users_online SET time = '$time' WHERE session = '$session' ");
//        }
//
//        $users_online_query = mysqli_query($connection,"SELECT * FROM users_online WHERE time > '$time_out'");
//
//        echo $count = mysqli_num_rows($users_online_query);
//    }
//    } //Get request isset
//}
//
//getIntUsersOnline();

function FillTableWithUsers(){
    //Get the posts from the databases and display their information in a ta
    global $connection;
    
     //FIND ALL CATEGORIES QUERY and echoing them to fill the table
    
    $query = "SELECT * FROM users";
    $select_posts =  mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_posts)){
            extract($row);
            echo "<tr>";                  
            echo "<td>{$user_id}</td>";
            echo "<td>{$user_name}</td>";   
           // echo "<td>{$user_password}</td>"; 
            echo "<td>{$user_firstname}</td>"; 
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";  
         //   echo "<td><img width='100' src='{$user_image}'></td>"; 
            echo "<td>{$user_role}</td>"; 
           
            echo "<td><a href='users.php?delete={$user_id}'>DELETE</a></td>";
            echo "<td><a href='users.php?source=change_permission&user_id={$user_id}'>Change Admin Permitions</a></td>";
             echo "<td><a href='users.php?source=edit_user&user_id={$user_id}'>EDIT</a></td>";
      
            echo "</tr>";   
            
        }
    
                
}


function FillTableWithComments(){
    //Get the posts from the databases and display their information in a ta
    global $connection;
    
     //FIND ALL CATEGORIES QUERY and echoing them to fill the table
    
    $query = "SELECT * FROM comments";
    $select_posts =  mysqli_query($connection, $query);
    confirmQuery($select_posts);
        while($row = mysqli_fetch_assoc($select_posts)){
            extract($row);
            echo "<tr>";                  
            echo "<td>{$comment_id}</td>";
            echo "<td><a href = '../post.php?p_id={$comment_post_id}'>{$comment_post_id}</a> </td>";   
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_author}</td>";  
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_status}</td>";  
            echo "<td>{$comment_date}</td>";
           
            echo "<td><a href='admin_comments.php?approve_decision=approved&comment_id={$comment_id}'>Approve</a></td>";
            echo "<td><a href='admin_comments.php?approve_decision=unapproved&comment_id={$comment_id}'>Unapprove</a></td>";
            echo "<td><a href='admin_comments.php?delete={$comment_id}'>DELETE</a></td>";
           
            
            echo "</tr>";   
            
        }
    
}

function getCategoryNameByIntId($int_id){
    global $connection;
    $query = "SELECT * FROM categories WHERE cat_id = {$int_id}";
    $select_categories =  mysqli_query($connection, $query);
    confirmQuery($select_categories);
    
    //Extracts all the data
    while($row = mysqli_fetch_assoc($select_categories)){
        extract($row);
     }
    //Return asked value
    return $cat_title;
    
}

function deletePostByGetRequest(){
    global $connection;
    if(isset($_GET["delete"])){
        $delete = ($_GET["delete"]);
        
        $query = $query = "DELETE FROM posts WHERE post_id = {$delete}";
         $delete_query=mysqli_query($connection,$query);
        header("Location: posts.php");
        
    }
}

function deleteUserByGetRequest(){
    global $connection;
    if(isset($_GET["delete"])){
        $delete = ($_GET["delete"]);
        
        $query = $query = "DELETE FROM users WHERE user_id = {$delete}";
         $delete_query=mysqli_query($connection,$query);
        header("Location: users.php");
        
    }
}

function usersTableManager(){
    ///Depending on the Source getted its display a table or other stuff
     $source="";
    global $connection;
    if(isset($_GET["source"])){
        extract($_GET); //Extracts $source
        
    }
    switch($source){
            
            
            case "add_user":
                include "add_user.php";
                break; 
            case "edit_user":
                //user_id is extracted
               include "edit_user.php";
                break; 
            
             case "change_permission":
                
                $query = "SELECT * FROM users WHERE user_id = $user_id ";
                echo($query);
                $query_response = mysqli_query($connection,$query);
                confirmQuery($query_response);
                while($row = mysqli_fetch_assoc($query_response) ){
                    extract($row);
                }
                //echo ($user_role);
                if(strcasecmp($user_role, "admin") == 0 ){
                    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";
                }else{
                    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
                }
                $query_response = mysqli_query($connection,$query);
                confirmQuery($query_response);
                header("Location: users.php");
                    
                break;
            
            case "publish_post":
                   
                $query = "UPDATE  posts SET post_status = 'PUBLISHED' WHERE post_id = $post_id";
                $query_response = mysqli_query($connection,$query);
                confirmQuery($query_response);
            
                header("Location: posts.php");

            
            break;    
                
            default:
                //Including the table view
            
                include "view_users.php";
            
                break;
            
            

        }
}

function tableManager(){
    global $connection;
    ///Depending on the Source getted its display a table or other stuff
     $source="";
    if(isset($_GET["source"])){
        extract($_GET);
        
    }
    switch($source){
            case "add_post":
                include "add_post.php";
                break; 
            case "edit_post":
                include "edit_post.php";
                break; 
            case "publish_post":
                   global $connection;
                $query = "UPDATE posts SET post_status = 'PUBLISHED' WHERE post_id = $post_id";
                $query_response = mysqli_query($connection,$query);
                confirmQuery($query_response);
            
                header("Location: posts.php");

            
            break;    
                
            default:
                //Including the table view
            
                include "view_post.php";
            
                break;
            
            

        }
}

function commentsTableManager(){
    ///Depending on the Source getted its display a table or other stuff
//     $source="";
//    if(isset($_GET["source"])){
//        extract($_GET);
//        
//    }
//    switch($source){
//            case "add_post":
//                include "add_post.php";
//                break; 
//            case "edit_post":
//                include "edit_post.php";
//                break; 
//            
//            default:
//                //Including the table view
//            
//                include "view_all_comments.php";
//            
//                break;
//        }
    
    include "view_all_comments.php";
}

function CreateCategoriesListPick(){
    global $connection;
     $query = "SELECT * FROM categories";
    $select_categories =  mysqli_query($connection, $query);
   confirmQuery($select_categories);
    
    while($row = mysqli_fetch_assoc($select_categories)){
                extract($row);
                echo "<option value='{$cat_id}'>{$cat_title}</option>";   
        }
}

function confirmQuery($query){
    global $connection ;
    if(!$query){
       die("Error with the query : ".$query." returned ".mysqli_error($connection));
   }
}

?>
    
