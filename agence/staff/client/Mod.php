<?php
$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

$id = $_POST['id'];
$Creditor = $_POST['Creditor'];
$Quted = $_POST['Quted'];
$Credit=$_POST['Credit'];

$Solde = $Creditor-$Quted;


$Others = $_POST['Others'];
$Observations = $_POST['Observations'];



 $db->exec("UPDATE clients_sells SET  Creditor='$Creditor',Quted='$Quted', Quted='$Quted' ,Solde='$Solde' ,Others='$Others' ,Observations='$Observations' ,confirme='0' WHERE id='$id' ");


 ?>
