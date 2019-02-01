<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	
	
	<?php  

	/*  Step 1 - Create a database in PHPmyadmin OK

		Step 2 - Create a table like the one from the lecture OK

		Step 3 - Insert some Data OK

		Step 4 - Connect to Database and read data  OK

*/
        
    $connection = mysqli_connect("localhost","root","","practicalapp7database");
    if(!$connection){
        
        die("Connection Failed");
    }
          $query = "SELECT * FROM fruitlist";
        
    $result= mysqli_query($connection,$query);
    if( !$result ){
        die("Querry failed");
    }
           while($row = mysqli_fetch_assoc($result)){
                   ?>
    
                       <pre>               
                    <?php
                   print_r($row);
                  ?>
                   </pre>
                    <?php
               }
               
        
	
	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>
