
<?php
    print_r($_GET);
if(isset($_POST["submit"])){
    
echo $_POST["info"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>PhpAndTheWeb</title>
</head>
<body>
   
   <form action="get.php" method="post">
       <input type="text" name="info">
       <input type="submit" class="btn btn-primary" name="submit" value="submit" >
   </form>
    
</body>
</html>