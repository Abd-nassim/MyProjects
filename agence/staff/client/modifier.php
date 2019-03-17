<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

$id = $_POST['id'];
$name = $_POST['name'];



 $db->exec("UPDATE clients SET client='$name' WHERE id='$id' ");


 ?>
