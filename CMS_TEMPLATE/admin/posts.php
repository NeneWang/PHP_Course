
<?php include "includes/admin_header.php";
include "includes/function.php";

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
                            Welcome to admin
                            <small>Author</small>
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
 