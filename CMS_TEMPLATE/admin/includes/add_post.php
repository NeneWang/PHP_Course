<?php
global $connection;
if(isset($_POST["create_post"])){
    extract($_POST);
    $post_date = date("d-m-y");
    $post_comment_count=4;
    $post_user ="Hola123";
 $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
 
$query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_date}','{$post_image}','{$post_content}','{$post_tags}','{$post_status}' )";
    
    
    $create_post_query = mysqli_query($connection,$query);
    if(!$create_post_query){
        die("error while sending the creation request ".mysqli_error($connection).$query);
    }
    
    echo "<p class='bg-success'> Post Succed! || <a href='posts.php'>View all posts</a>  </p>";
    
}
?>
   

   <form action="" method="post" enctype="multipart/form-data">
   
   <div class="form-group">
       
    <label for="category_id">Category : </label>
    <select name="post_category_id" id="">
        <?php CreateCategoriesListPick(); ?>
    </select>
   </div>
    <div class="form-group"><label for="post_title">Title</label>
    <input type="text" class="form-control" name="post_title"></div>
    
     <div class="form-group">
         <label for="post_author">author : </label>
        <select name="post_author" id="">
            <?php CreateUsersListPick(); ?>
        </select>
    </div>
    
    <div class="form-group"><label for="post_image">image link</label>
    <input type="text" class="form-control" name="post_image"></div>
    
    <div class="form-group"><label for="post_content">Content</label>
    <textarea class="form-control" cols="30" id="body" rows="10" name="post_content"> </textarea></div>
      
  
    
    <div class="form-group"><label for="post_tags">tags</label>
    <input type="text" class="form-control" name="post_tags"></div>
    
     <div class="form-group">
         <select name="post_status" >
             <option value="draft">draft</option>
             <option value="PUBLISHED">publish</option>
             
         </select>
         
     </div>
    
     

    
    
    <input type="submit" value="Add Post!" name="create_post">
    
</form>