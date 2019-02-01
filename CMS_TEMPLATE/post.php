 <?php
include "includes/db.php";
include "admin/includes/function.php";
           if(isset($_GET["p_id"]))
           {
                   extract($_GET); // Gets $p_id
                   $query = "SELECT * FROM posts WHERE post_id = $p_id";
                   $select_all_posts_query =  mysqli_query($connection, $query);
                    confirmQuery($select_all_posts_query);
                
               while($row =mysqli_fetch_assoc($select_all_posts_query))
                {
                    extract($row); // extracts : id,category_id,title,author,date,image,content,tags,content,tags,comment_count,status,user,views_count
                    
               }
               
                $query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = $p_id";
                   $select_all_posts_query =  mysqli_query($connection, $query);
                    confirmQuery($select_all_posts_query);
           }

        if(isset($_POST['create_comment'])){
            extract($_POST);
            $query = "INSERT INTO comments (comment_post_id,comment_email,comment_author,comment_content,comment_status,comment_date) VALUES ($p_id,'{$comment_email}','{$comment_author}','{$comment_content}','unapproved',now())";
            $query_response = mysqli_query($connection,$query);
            confirmQuery($query_response);
            
            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $p_id";
            $query_response = mysqli_query($connection,$query);
            confirmQuery($query_response);
            
        }


                
                ?>


<!DOCTYPE html>
<html lang="en">


            

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
      <?php include "includes/header.php"?>
  <?php include "includes/navigation.php"?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 ><?php echo $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?>.  Post viewed <?php echo $post_view_count ?> times </p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo $post_image ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p><?php echo $post_content ?></p>

                <hr>

 
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form  role="form" action=""  method="post" >
                       <div class="form-group">
                          <label for="comment_author">Autor : </label>
                           <input required type="text" class="form-control" name="comment_author" placeholder="Nelson">
                        </div>
                        <div class="form-group">
                          <label for="comment_email">Email : </label>
                           <input  class="form-control" type="email" required name="comment_email" placeholder="john@gmail.com">
                        </div>
                        
                        
                       <label for="comment_content">Content : </label>
                        <div class="form-group" >
                            <textarea  class="form-control" rows="3" name="comment_content" required></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                           <!-- Blog Comments -->
<?php
               $query = "SELECT * FROM comments WHERE comment_post_id = {$p_id} AND comment_status = 'approved' ORDER BY comment_id DESC";
                $query_response = mysqli_query($connection,$query);
                confirmQuery($query_response);
//    
//    echo $query;
                while($row = mysqli_fetch_assoc($query_response)){
                    extract($row);
                    
        ?>
        
         
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author?>
                            <small><?php echo $comment_date?></small>
                        </h4>
                       <?php echo $comment_content?>
                    </div>
                </div>
        <?php
    }
            ?>       
                
                
               

                <!-- Comment -->
<!--
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                         Nested Comment 
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                         End Nested Comment 
                    </div>
                </div>
-->

            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php
      include "includes/sidebar.php";     
    ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
