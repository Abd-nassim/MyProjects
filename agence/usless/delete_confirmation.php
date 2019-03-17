<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');



$id=$_GET['id'];
 $db->exec(" DELETE    FROM confirmation WHERE id='$id'");




 ?>
