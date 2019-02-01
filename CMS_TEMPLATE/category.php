<?php
include "includes/header.php";
include "includes/db.php"
?>

    <!-- Navigation -->
    <?php
include "includes/navigation.php"
?>
          
    <!-- Page Content -->
    <div class="container">

        <div class="row">

           
           
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                 <h1 class="page-header">POSTS
                    <small>Only for cool guys as Frechero</small>
                </h1>
                
            <?php
    
        
            if(isset($_GET['category'])){
                extract(escape($_GET)); //Extracts the categoty ID
                
            }
    
            $query="SELECT * FROM posts WHERE post_category_id = $category";
            $select_all_posts_query =  mysqli_query($connection, $query);
            while($row =mysqli_fetch_assoc($select_all_posts_query)){
              extract($row); // extracts : id,category_id,title,author,date,image,content,tags,content,tags,comment_count,status,user,views_count
                
                ?>
               
                

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo " ".$post_date ?></p>
                <hr>
                <img class="img-responsive" src="<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <?php
            }
                
                ?>
                


            <!-- Blog Sidebar Widgets Column -->
           
            
<?php
    include "includes/sidebar.php"
    ?>
        <!-- /.row -->

        <hr>

       <?php 
        include "includes/footer.php"
        
        ?>