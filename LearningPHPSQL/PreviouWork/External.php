   <?php

        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            if(strlen($password)<5){
                echo "Your PassWord is not enought large as your dick!!";
            }else{
                
            
            echo $username." has a big dick "."<br>";
            }
        }
    ?>
    
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>Document</title>
   </head>
   <body>
       
       
        <form action = "../arrays.php" method="post
        ">
        <input type = "submit" name="submit" title="Going back">
    </form>
       
       
   </body>
   </html>