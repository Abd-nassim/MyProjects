<?php
session_start();
    if(!isset($_SESSION['username']) ){  header("location:index.php");}

require_once '../assets/php/helper.php';
$DB = $GLOBALS['DB'];
$helper = new DBHelper();



 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/pic/logo1.png" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' >
    <script src="../assets/js/code.js"></script>

    <title>admin panel</title>
  </head>
  <body>

    <?php
    $data = $helper -> GetData('commande',['*'],['etat_livraison'],['0'],'');
    $helper -> table($data);
     ?>

  </body>
</html>
