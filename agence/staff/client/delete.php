<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');



$id=$_POST['id'];
 $db->exec(" DELETE    FROM clients WHERE id='$id'");




 ?>
