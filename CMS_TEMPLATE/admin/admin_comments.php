
<?php include "includes/admin_header.php";
include "includes/function.php";

ob_start();

if(isset($_GET["delete"])){
    extract($_GET);
    $query = "DELETE FROM comments WHERE comment_id = {$delete}";
    $query_response = mysqli_query($connection,$query);
    confirmQuery($query_response);
    header("Location: admin_comments.php");
    }

if(isset($_GET["approve_decision"])){
    extract($_GET);
    $query = "UPDATE comments SET comment_status = '{$approve_decision}' WHERE comment_id = $comment_id ";
    $query_response = mysqli_query($connection,$query);
    confirmQuery($query_response);
    header("Location: admin_comments.php");
}


?>
    <div id="wrapper">

        <!-- Navigation -->
           <?php include "includes/admin_navigation.php" ?>
            <!-- /.navbar-collapse -->
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>                        
                        </div>
                        <div>
                            <!--Table maanager-->
                           <?php commentsTableManager();?>
                           
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include "includes/admin_footer.php"?>
 