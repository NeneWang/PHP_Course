<?php
global $connection;
if(isset($_POST["update_post"])){
    extract($_POST);
    $post_date = date("d-m-y");
    $post_comment_count=4;
    $post_user ="Hola123";

    $query = "UPDATE posts SET "; // Whitespace after SET is required
    $query .= "post_title = '{$post_title}',";
    $query .= "post_category_id = '{$post_category_id}',";
    $query .= "post_date = '{$post_date}', ";
    $query .= "post_author = '{$post_author}',";
    $query .= "post_status = '{$post_status}',";
    $query .= "post_tags = '{$post_tags}',";
    $query .= "post_content = '{$post_content}', "; // Comma separator should go after '{$post_content}'
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$post_id} "; 
    
    $update_post_query = mysqli_query($connection,$query);
    confirmQuery($update_post_query);
    echo " <p class='bg-success'> Succesfully updated! <a href='posts.php'>Return to all posts view</a> || <a href='../post.php?p_id={$post_id}'>  View Post</a> </p> ";
    
    
}

if(isset($_GET["post_id"])){
    $post_id=($_GET["post_id"]);
    //Extracts $post_id
    //TODO extracts Data from the DBase 
    $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $selected_post_data =  mysqli_query($connection, $query);
    if(!$selected_post_data){
        die("error while triying to get the selected Post data error Diagnostic : ".mysqli_error($connection)." Query : ".$query);
    }
    else{
    $row = mysqli_fetch_assoc($selected_post_data);
    extract($row);
    //TODO Refill in value
    }
    
}
?>
   

   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group"><label for="post_category_id">Category Id </label>
   
    <select name="post_category_id" id="">
        <?php CreateCategoriesListPick();?>">
    </select>
    
    <div class="form-group"><label for="post_title">Title</label>
    <input value="<?php echo $post_title;?>" type="text" class="form-control" name="post_title"></div>
    
     <div class="form-group"><label for="post_author">author</label>
    <input value="<?php echo $post_author;?>" type="text" class="form-control" name="post_author"></div>
    
    <div class="form-group"><label for="post_image">image link</label>
    <input value="<?php echo $post_image;?>" type="text" class="form-control" name="post_image"></div>
    <div><img width='100' src='<?php echo $post_image;?>'></div>
    
    
    <div class="form-group"><label for="post_content">Content</label>
    <textarea id='body' class="form-control" cols="30" rows="10" name="post_content"><?php echo $post_content;?> </textarea></div>
    
    <div class="form-group"><label for="post_tags">tags</label>
    <input value="<?php echo $post_tags;?>" type="text" class="form-control" name="post_tags"></div>
    
     <div class="form-group">
        <select name="post_status">
            <option value="<?php echo $post_status?>"><?php echo $post_status?></option>
            <?php
    if($post_status == 'draft'){
        $alternative_status = 'PUBLISHED';
    }else{
        $alternative_status = 'draft';
    }
    ?> <option value="<?php echo $alternative_status ?>"><?php echo $alternative_status ?></option>    
        </select>
        
        </div>
    
    

    
    
    <input type="submit" value="update Post!" name="update_post">
    
</form>