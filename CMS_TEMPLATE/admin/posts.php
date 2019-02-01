
<?php include "includes/admin_header.php";

ob_start();
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
                            POST ADMIN
                            <small><?php echo $user_name;?></small>
                        </h1>                        
                        </div>
                        <div>
                            <!--Table maanager-->
                           <?php tableManager();?>
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
 