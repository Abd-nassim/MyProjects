<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

$id = $_POST['id'];



 $db->exec("UPDATE clients_sells SET confirme='1' WHERE id='$id' ");




 ?>
