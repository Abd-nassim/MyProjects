<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');



$id=$_POST['id'];
$Details=$_POST['Details'];
 $db->exec(" DELETE    FROM clients_sells WHERE id='$id'");





 ?>
