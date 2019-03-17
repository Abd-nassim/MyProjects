<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');
$result = array();


$id =$_GET['id'];
$name = $_GET['name'];
$lastname =$_GET['lastname'];
$credit =$_GET['credit'];



$recup = $db->query("SELECT * FROM confirmation WHERE id='$id' ");

while($all =$recup->fetch())
{
  $result[] = $all;

}
 if($result){
   $db->exec("UPDATE confirmation SET name='$name',lastname='$lastname',credit='$credit' WHERE id='$id'");
}else {
  $db->exec("INSERT into  confirmation VALUES ('$id' ,'$name','$lastname','$credit') ");
}




 ?>
