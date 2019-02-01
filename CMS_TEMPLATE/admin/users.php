
<?php include "includes/admin_header.php";

ob_start();

if(isset($_GET["delete"])){
    extract(escape($_GET));
    $query = "DELETE FROM comments WHERE comment_id = {$delete}";
    $query_response = mysqli_query($connection,$query);
    confirmQuery($query_response);
    header("Location: admin_comments.php");
    }

if(isset($_GET["approve_decision"])){
    extract(escape($_GET));
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
                            CREATE USER
                            <small><?php echo $user_name;?></small>
                        </h1>                        
                        </div>
                        <div>
                            <!--Table maanager-->
                           <?php usersTableManager();?>
                           
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
 