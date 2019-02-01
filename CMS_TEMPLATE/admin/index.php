<?php include "includes/admin_header.php"?>

<!--Load the AJAX API-->


<div id="wrapper">

    <?php  
    

    //TODO romper conlia
    
    
    
        if($connection) echo "conn";

        
        ?>
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>
    <!-- /.navbar-collapse -->


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin - 
                        <small>
                            <?php echo ($_SESSION['user_name']);?></small>
                    </h1>


                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                        $query = "SELECT * FROM posts";
                        $query_response = mysqli_query($connection,$query);
                        $posts_count = mysqli_num_rows($query_response); 
                        
                        $query = "SELECT * FROM posts WHERE post_status = 'PUBLISHED'";
                        $query_response = mysqli_query($connection,$query);
                        $posts_published_count = mysqli_num_rows($query_response);
                        ?>


                                            <div class='huge'>
                                                <?php echo $posts_count ?>
                                            </div>
                                            <div>Posts</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="posts.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <?php
                        $query = "SELECT * FROM comments";
                        $query_response = mysqli_query($connection,$query);
                        $comments_count = mysqli_num_rows($query_response); 
                      
                       $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
                        $query_response = mysqli_query($connection,$query);
                        $comments_approved_count = mysqli_num_rows($query_response);
                        ?>
                                        <div class="col-xs-9 text-right">
                                            <div class='huge'>
                                                <?php echo $comments_count ?>
                                            </div>
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="admin_comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <?php
                        $query = "SELECT * FROM users";
                        $query_response = mysqli_query($connection,$query);
                        $users_count = mysqli_num_rows($query_response);
                         
                          $query = "SELECT * FROM users WHERE user_role = 'admin'";
                        $query_response = mysqli_query($connection,$query);
                        $users_admin_count = mysqli_num_rows($query_response);
                         
                        ?>
                                        <div class="col-xs-9 text-right">
                                            <div class='huge'>
                                                <?php echo $users_count ?>
                                            </div>
                                            <div> Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <?php
                        $query = "SELECT * FROM categories";
                        $query_response = mysqli_query($connection,$query);
                        $categories_count = mysqli_num_rows($query_response); 
                        ?>
                                        <div class="col-xs-9 text-right">
                                            <div class='huge'>
                                                <?php echo $categories_count ?>
                                            </div>
                                            <div>Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="categories.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.row -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Time', 'Posts', 'Published_Posts', 'Categories', 'Users', 'Admin_Users', 'Comments', 'Approved Comments'],
                        ['Now', <?php echo $posts_count ?>, <?php echo $posts_published_count ?>, <?php echo $categories_count ?>, <?php echo $users_count ?>, <?php echo $users_admin_count ?>, <?php echo $comments_count ?>, <?php echo $comments_approved_count ?>]
                        //          ['2015', 1170, 460, 250],
                        //          ['2016', 660, 1120, 300],
                        //          ['2017', 1030, 540, 350]
                    ]);

                    var options = {
                        chart: {
                            title: 'Company Performance',
                            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }

            </script>





        </div>
        <!-- /.container-fluid -->
        <div id="columnchart_material" style="width: auto; height: 500px;"></div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<?php include "includes/admin_footer.php"?>
