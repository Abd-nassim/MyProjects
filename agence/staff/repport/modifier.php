<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

$id = $_POST['id'];
$NetFare = $_POST['NetFare'];
$Quted = $_POST['Quted'];
$TKTNumber = $_POST['TKTNumber'];
$Airways = $_POST['Airways'];
$file = $_POST['file'];

if($file==""){
  $db->exec("UPDATE clients_sells SET NewFare='$NetFare',Quted='$Quted',Details='$TKTNumber', Airways='$Airways', confirme='0' WHERE id='$id' ");

}else {
  $db->exec("UPDATE clients_sells SET NewFare='$NetFare',Quted='$Quted',Details='$TKTNumber', Airways='$Airways',pic='$file', confirme='0' WHERE id='$id' ");
}








 ?>
