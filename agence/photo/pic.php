<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  </body>
</html>

<?php

$connect=mysqli_connect("localhost","root","nas4","worckstation");
$requet = " SELECT * FROM pic ";
   $a=mysqli_query($connect,$requet);


while($result=mysqli_fetch_array($a) ){


  echo '<img src="uploads/'.$result['0'].'" alt="1">
';

}




 ?>
