<?php

//add an allowed names only as an array
//require_once '../assets/boot/bootup.php';
require '../assets/php/helper.php';
$DB = $GLOBALS['DB'];
$dbhelper = new DBHelper();


  if ($_POST['post'] == "commande" ) {

    $id = '';
    $Nom = $_POST['Nom'];
    $Email = $_POST['Email'];
    $Prenom = $_POST['Prenom'];
    $Numero = $_POST['Numero'];
    $Address = $_POST['Address'];
    //when injecting dont put the id att in parameteres
    $dbhelper->Inject('commande',['nom','prenom','email','telephone','produit','address'],
    [$Nom,$Email,$Prenom,$Numero,'pealdotors',$Address]);


  }
  if( $_POST['post'] =="UpdateRows"){

  $Cols='';
  $id = $_POST['id'];
  $tableName = $_POST['tableName'];
  $maxfilds = $_POST['maxfilds'];
  $row = $_POST['row'];
  $col = $_POST['col'];
  for ($i=1; $i < $maxfilds; $i++) {
    if ($i != $maxfilds - 1) {
        $Cols .="  `$col[$i]` = '$row[$i]' ,";
    }else {
        $Cols .="   `$col[$i]`  = '$row[$i] ' ";
    }
  }
   $sql = mysqli_prepare($DB,"UPDATE `$tableName` SET $Cols WHERE `id` = $id  " );
   $sql->execute();
  echo json_encode("UPDATE `$tableName` SET $Cols WHERE `id` = $id ");

}
   if( $_POST['post'] =="DeleteRow"){

    $id = $_POST['id'];
    $tableName = $_POST['tableName'];

    $dbhelper->Update($tableName,['etat_livraison'],['1'],['id'],[$id]);

  }



  else {
    die('error');
  }






 ?>
