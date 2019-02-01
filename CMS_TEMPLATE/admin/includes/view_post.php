<?php
if(isset($_GET['reset_view_count'])){
    extract(escape($_GET));
    $query= "UPDATE posts SET post_view_count = 0 WHERE post_id = {$reset_view_count}";
     $query_response = mysqli_query($connection,$query);
    confirmQuery($query_response);  
}

if(isset($_POST['checkBoxArray']))
{
    extract($_POST); // Gets $bulk_options
    foreach($_POST['checkBoxArray'] as $post_id){
        $query = "";
        switch($bulk_options){
            case 'PUBLISHED':
                $query= "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_id}";
                break;
            case 'draft':
                $query= "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_id} ";
                break;
            case 'delete':
                $query= "DELETE FROM posts WHERE post_id = {$post_id}";
                break;   
                
            case 'reset_count':
                $query= "UPDATE posts SET post_view_count = 0 WHERE post_id = {$post_id}";
                break;   
                
            case 'clone':
                $query= "SELECT * FROM posts WHERE post_id = {$post_id}";
                //TODO SElect the post from the userDatabase and extracts its data

                $query_response = mysqli_query($connection,$query);
                confirmQuery($query_response);  
                while($row = mysqli_fetch_assoc($query_response) ){
                    extract($row);
                }

                //$post_date = date("d-m-y");
                //$post_comment_count=0;
                //$post_user ="Hola123";
                 $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";

                $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_date}','{$post_image}','{$post_content}','{$post_tags}','{$post_status}' )";

                    //After this it will call the query response to insert them
                break;    
                
            case 'default':
                $query= "UPDATE posts SET post_status = 'PUBLISHED' WHERE post_id = {$post_id}";
                break;
        
        }
        $query_response = mysqli_query($connection,$query);
        confirmQuery($query_response);
        
        
    }
}

?>
                                <form action="" method="post">
                                 
                               <div id="bulkOptionsContainer" >
                                   
                                   <div class="col-xs-4">
                                       <select name="bulk_options" id="" class="form-control">
                                           <option value="PUBLISHED">Select Options</option>
                                           <option value="PUBLISHED">Publish</option>
                                           <option value="draft">Draft</option>
                                           <option value="delete">Delete</option>
                                           <option value="clone">clone</option>
                                           <option value="reset_count">Reset post count</option>
                                       </select>
                                   </div>
                                   <div class='col-xs-4'>
                                       
                                       
                                   <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                   
                                   <a href="posts.php?source=add_post">Add New</a>
                                   
                                   </div>
                                   
                                   
                               <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                       <th><input id="selectAllBoxes" type="checkbox"></th>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Tags</th>
                                        <th>Content</th>
                                        <th>Dates</th
                                        <th>Views</th>
                                        
                                    </tr>
                                </thead>
                                 <tbody>
                                 
                                 <?php 
                                    // include "function.php";
                                     deletePostByGetRequest();
                                     FillTableWithPosts(); 
                                     
                                     
                                     
                                     
                                     ?>
                               
                            </tbody>
                            
                            
                            </table>
                            
                           </form>