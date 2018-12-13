<?php include "functions.php"; ?>
<?php include "includes/header.php";?>



	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


			<article class="main-content col-xs-8">
			
		
	
	<?php 
                
                session_start(); 
$_SESSION["greeting"]="HelloStudent";
               $getterAssocArray = $_GET;
               $booleanSetCookie = $getterAssocArray["set_cookie"];
                if($booleanSetCookie=="true"){
                    $name="cookie";
                    $value="I am a cookie xdxdxd";
                    $expiration = time() + (60*60*24*7); //now plus a week, units in seconds

                    setcookie($name,$value,$expiration);
                    echo "cookie setted"."<br>";
                }
                if($booleanSetCookie=="false"){
                    if(isset($_COOKIE["cookie"])){ // Ask if the cookie is set
                    $cookieValue = $_COOKIE["cookie"];
                    echo $cookieValue."<br>";
                        
                    echo "cookie getted"."<br>";
                    }
                }
               
         

	/*  Create a link saying Click Here, and set 
	the link href to pass some parameters and use the GET super global to see it

		Step 2 - Set a cookie that expires in one week

		Step 3 - Start a session and set it to value, any value you want.
	*/
	
	?>
                
    <ul>
        <li><a href="9.php?set_cookie=true">Set cookie</a></li>
        
        <li><a href="9.php?set_cookie=false">show my cookie</a></li>
    </ul>
    
    





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>