



<?php include "functions.php"; 
if(isset($_POST["submit"])){
    echo "the value Sended was : ".$_POST["value"];
}

?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">
	    
	    	
	    		
	    				
		<?php Navigation();?>
			
		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">
 
<form action="6.php" method="post">
    
    <input type ="text" placeholder="Value" name="value" >
    <input type="submit" name="submit">
</form> 

	<?php  

/*  Step1: Make a form that submits one value to POST super global


 */

	
?>


</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>