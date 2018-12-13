<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>
			
			
	</aside><!--SIDEBAR-->

<article class="main-content col-xs-8">

	
	<?php  
    
    class Dog{
        var $color = "blue";
        var $race = "Fighter";
        
        function Presume(){
            echo "<br> Hello!, I am a cute dog with ". $this->color." eyes, I came from a ". $this->race ." race.";
        }
        
        
    }

    $rusty=new Dog();
    $rusty->Presume();
    
    
	/*  Step 1: Use the Make a class called Dog

		Step 2: Set some properties for Dog, Example, eye colors, nose, or fur color

		Step 4: Make a method named ShowAll that echos all the properties

		Step 5: Instantiate the class / create object and call it pitbull

Step 6: Call the method ShowAll

	

		
	*/
	
	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>