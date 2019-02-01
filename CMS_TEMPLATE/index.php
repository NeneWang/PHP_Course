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
    
            if(isset($_GET['page'])){
                        $page = $_GET['page'];

                    }else{
                        $page = 1;
                    }
                        if($page ==1)
                        {
                           $page_1 = 0; 
                        }else
                        {
                            $page_1 = ($page * 5)-5;
                        }
    
    
            if(isset($_GET['author'])){
                extract($_GET);
                $query="SELECT * FROM posts WHERE post_status = 'PUBLISHED' AND post_author = '{$author}' ";
            }   
    
            
            elseif(isset($_GET['category'])){
                extract($_GET);
                $query="SELECT * FROM posts WHERE post_status = 'PUBLISHED' AND post_tags = '{$category}'";
                //echo $query;
            }
            else{
                $query="SELECT * FROM posts WHERE post_status = 'PUBLISHED'";
            }

             $select_all_posts_query =  mysqli_query($connection, $query);
            
            $posts_count = mysqli_num_rows($select_all_posts_query);
            

            $query = $query." LIMIT $page_1, 5";
            
            //echo $query;
            
            //$query="SELECT * FROM posts WHERE post_status = 'PUBLISHED'";
            $select_all_posts_query =  mysqli_query($connection, $query);
            //confirmQuery($select_all_posts_query);

           
            if($posts_count==0)
            {
                echo "<h3><br>NO POST AVAILABLE<br></h3>";
                ?><?php
            }
            else{    
            
                while($row =mysqli_fetch_assoc($select_all_posts_query)){
                extract($row); // extracts : id,category_id,title,author,date,image,content,tags,content,tags,comment_count,status,user,views_count
                $post_content = substr($post_content,0,100); // Reduce the amount shown
                
                ?>
               
                

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php?author=<?php echo $post_author?> "><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo " ".$post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>">
                    <img class="img-responsive" src="<?php echo $post_image ?>" alt="">
                </a>
                
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <?php
            }
                
                ?>
                
                
                <?php
            }

            


                

?>
            <!-- Blog Sidebar Widgets Column -->
           
            </div>
<?php
    include "includes/sidebar.php";
    ?>
       
        <!-- /.row -->
  </div>
        <hr>
        
        <ul class="pager">
    
        <?php
        
            $pages_count = ceil($posts_count/5);
            for($i=1;$i<=$pages_count;$i++)
            {
                $class = "deactivated_link";
                if($page == $i){
                    $class = "active_link";
                }
                
                if(isset($author)){
                    echo "<li><a class={$class} href='index.php?author={$author}&page={$i}'>{$i}</a></li>";
                }else{
                    
                    echo "<li><a class={$class} href='index.php?page={$i}'>{$i}</a></li>";
                }
                
            }

        ?>
           
        </ul>
        

       <?php 

        include "includes/footer.php";
        
        ?>