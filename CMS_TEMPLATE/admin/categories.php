
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
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        
                        
                       <div class="col-xs-6">
                           
                         <?php
                          insert_categories();

                        ?>
                           
                            <form action="" method="post">
                           <div>
                           <label for="cat-title">Add Category</label>
                            <input type="text" class="form-control" name="cat_title" >
                           </div>
                           <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                           </div>
                            <?php // UPDATE AND INCLUDE
                                 if(isset($_GET["edit"]))
                                {
                                     
                           include "includes/update_categories.php";
                               
                                    $cat_id = $_GET["edit"];
                                }
                               
                                
                           ?>
                          
                        </form>
                       </div>
                       <div class="col-xs.6">
                   
                    ?>
                           <table class="table table-bordered table-hover">
                               <thead  >
                                   <tr>
                                       <th>Id</th>
                                       <th>Category Title</th>
                                   </tr>
                               </thead>
                               <tbody>
                                 
                                <?php
                                  FillTableWithCategories();
                               ?>
                               
                               <?php //DELETE QUERY
                                    CreateDeleteTable();
                               ?>
                               
                               </tbody>
                               
                               
                           </table>
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
 