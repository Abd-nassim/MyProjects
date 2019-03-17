<?php
//session_start();
//$myemail=$_SESSION['login_Email'];

$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');
$result = array();





$id="NULL";
$day = $_POST['day'];
$NetFare1 = $_POST['NetFare1'];
$Quted = $_POST['Quted1'];
$TKTNumber = $_POST['TKTNumber1'];
$Airways = $_POST['Airways1'];
$seller = $_POST['seller'];
$client = $_POST['client'];
$file = $_POST['file'];
$user= $_POST['user'];

$confirme = "0";




$db->exec("INSERT INTO `clients_sells` (`id`, `client`, `Date`, `Details`, `Creditor`, `Solde`, `User`, `Others`, `Observations`, `Quted`, `pic`, `confirme`, `NewFare`, `Airways`, `Seller`)
VALUES (NULL, '$client', '$day', '$TKTNumber', '0', '0', '$user', 'zer', 'zer', '$Quted', '$file', '$confirme', '$NetFare1', '$Airways', '$seller')
");


/*
$db->exec(" INSERT INTO `sells` (`id`, `day`, `Date`, `NewFare`, `Quted`, `TKTNumber`, `Airways`, `=`, `Seller`, `client`)
 VALUES                          (NULL, '$day', '$date', '$NetFare1', '$Quted', '$TKTNumber', '$Airways', '$equal', '$seller', '$client')
");

/*





$recup = $db->query("SELECT isadmin FROM users WHERE email = '$myemail' ");

while($all =$recup->fetch())
{
  $result[] = $all;
}

foreach ($result as $result) {
}

if($result['0']==1 ){



}


else{



    $db->exec(" INSERT INTO `sells` (`id`, `day`, `Date`, `NewFare`, `Quted`, `TKTNumber`, `Airways`, `=`, `Seller`, `client`)
     VALUES                          (NULL, '$day', '$date', '$NetFare1', '$Quted', '$TKTNumber', '$Airways', '$equal', '$seller', '$client')
    ");


    $db->exec("INSERT INTO `confirmation_sells` (`id`, `client`, `Date`, `Details`, `Credit`, `Creditor`, `Solde`, `User`, `Others`, `Observations`,`Quted`,`pic`)
     VALUES (NULL, '$client', '$day', '$TKTNumber', '0', '0', '0', '$seller', 'zer', 'zer','$Quted','$file')
    ");



}

*/









 ?>
