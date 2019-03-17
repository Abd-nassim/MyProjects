<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

$id="NULL";
$name = $_POST['name'];
$day= $_POST['day'];




  $db->exec("INSERT INTO `clients` (`id`, `client`,`Added`) VALUES (NULL, '$name','$day'); ");





 ?>
