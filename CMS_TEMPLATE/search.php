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

           
           
           
                
            <?php
    if(isset($_POST["search"])){
        
                $search =  $_POST["search"];
                  ?>
                  
                    <!-- Blog Entries Column -->
            <div class="col-md-8">
                 <h1 class="page-header"><?php echo $search." posts" ?>
                    <small>Only for cool guys as Frechero</small>
                </h1>
                      <?php  
                
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $search_query = mysqli_query($connection,$query);
                if(!$search_query){
                    die("query failed".mysqli_error($connection));
                }
                    $count = mysqli_num_rows($search_query);
                if($count==0)
                    echo "<h1>No results</h1>";
                }
          
            while($row =mysqli_fetch_assoc($search_query)){
              extract($row); // extracts : id,category_id,title,author,date,image,content,tags,content,tags,comment_count,status,user,views_count
                
                ?>
                
                

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
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


        </div>
        <!-- /.row -->
<?php
    include "includes/sidebar.php"
    ?>
        <hr>

       <?php 
        include "includes/footer.php"
        
        ?>