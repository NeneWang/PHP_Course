
<?php
/*
$name="SomeName";
$value=100;
$expiration = time() + (60*60*24*7); //now plus a week, units in seconds

setcookie($name,$value,$expiration);*/

session_start();
$_SESSION["greeting"]="HelloStudent";
//echo $_SESSION["greeting"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cookies_demo</title>
</head>
<body>
   <?php
    if(isset($_COOKIE["SomeName"])){
        $cookieOfSomeName = $_COOKIE["SomeName"];
        echo $cookieOfSomeName;
    }
    ?>
    
</body>
</html>