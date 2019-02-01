                                
                                    
                                    
                                
                               <table class="table table-bordered table-hover">
                            
                               
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
<!--                                        <th>Image</th>-->
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                 
                                 <?php 
                                    // include "function.php";
                                     //deletePostByGetRequest();
                                     
                                    deleteUserByGetRequest();
                                     FillTableWithUsers(); 
                                     
                                     
                                     
                                     
                                     ?>
                               
                            </tbody>
                            
                            
                            </table>
                            