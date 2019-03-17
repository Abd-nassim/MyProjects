<?php


require 'DBHelper.php';
$DB = $GLOBALS['DB'];

$dbhelper = new DBHelper();

if(isset( $_POST['test'])){
    $data = $dbhelper -> GetData('card',['*'],[''],[''],'');
   $dbhelper -> table($data);

} if(isset($_POST['getdata'])){

    $table = $_POST['value'];
    if($table == "facture"){
      $data = $helper->joinTables(['facture','client'],['facture.id,prix_total,date_ajout,username'],
                            ['facture.id_client','facture.Livraison'],
                            ['client.id','0']);
       $helper -> SimpleTable($data);
    }
    $data = $dbhelper -> GetData($table,['*'],[''],[''],'');
    $dbhelper -> table($data);

}  if(isset( $_POST['addCart'])){

    $id_client=  $_POST['id_client'];
    $id_article =  $_POST['id_article'];
    $prix =  $_POST['prix'];

  $dbhelper->Inject('cart',['id_client','id_article','etat','nombre_article','prix'],
  [$id_client,$id_article,'0','1',$prix]);
//  $dbhelper->Update('article',['cart',],['danger'],['id'],[$id_article]);

  }

  if(isset( $_POST['signUp'])){
    $id = null;
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $numero =  $_POST['numero'];

  $dbhelper->Inject('client',['username','password','email','telephone'],[$name,$password,$email,$numero]);
  }
  if(isset( $_POST['NbrPanier'])){
    $nombre =  $_POST['nombre'];
    $id = $_POST['id'];
    $id_client = $_POST['id_client'];
    $prixFinal = $_POST['prixFinal'];

    $dbhelper->Update('cart',['nombre_article','prix'],[$nombre,$prixFinal],['id_article','id_client'],[$id,$id_client]);
  }
  if(isset( $_POST['deleteCart'])){
    $id = $_POST['id'];
    $id_client = $_POST['id_client'];

    $dbhelper->Delete('cart',['id_article','id_client'],[$id,$id_client]);
  }
  if(isset( $_POST['DeleteRow'])){
    $id = $_POST['id'];
    $tableName = $_POST['tableName'];
    $dbhelper->Delete($tableName,['id'],[$id]);
  }

  if(isset( $_POST['UpdateRows'])){

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
    //echo json_encode("UPDATE `$tableName` SET $Cols WHERE `id` = $id ");

} if(isset( $_POST['Livraison'])){
  $id = $_POST['id'];

  $dbhelper->Update('facture',['Livraison'],['1'],['id'],[$id]);



}
  if(isset( $_POST['NewData'])){

    $Cols='(';
    $Vals='(';

    $tableName = $_POST['tableName'];
    $maxfilds = $_POST['maxfilds'];
    $data = $_POST['data'];
    $col = $_POST['col'];
    $imageindex = $_POST['imageindex'];

    for ($i=1; $i < $maxfilds; $i++) {
      if ($i != $maxfilds - 1) {
          $Cols .="`$col[$i]`,";
          $Vals .="'$data[$i]',";

      }else {
          $Cols .="`$col[$i]`";
          $Vals .="'$data[$i]'";

      }

    }
      $Cols.=')';
      $Vals.=')';
      $sql = mysqli_prepare($DB,"INSERT INTO `$tableName` $Cols Values $Vals ");
      $sql->execute();


    echo json_encode( $sql);


  } if(isset($_POST['payement'])){
    echo   json_encode("he");


    $id_client = $_POST['id_client'];
    $sum = $_POST['sum'];
    $nom_carte = $_POST['nom_carte'];
    $numero_carte = $_POST['numero_carte'];
    $cvc = $_POST['cvc'];
    $date_expiration = $_POST['date_expiration'];

    $cardRow = $dbhelper  -> GetData('card','*',['nom_carte','numero_carte','cvc','date_expiration','id_client'],
    [$nom_carte,$numero_carte,$cvc,$date_expiration,$id_client],'');


    $card =  mysqli_fetch_assoc($cardRow) ;
    $nums = mysqli_num_rows($cardRow);

    if($nums > 0){
      if ($card['solde'] < $sum) {
          echo json_encode("solde insuffisant");
      }else{
      $newSolde = $card['solde'] - $sum;
      $dbhelper->Inject('facture',['prix_total','id_client'],[$sum,$id_client]);
      $dbhelper->Update('card',['solde'],[$newSolde],['id','id_client'],[$card['id'],$id_client]);
      $dbhelper->Update('cart',['etat'],['1'],['id_client'],[$id_client]);
      }
    }else {
      echo json_encode("non existe");
    }

} if(isset($_POST['Rate'])){

    $id_article = $_POST['id_article'];
    $number = $_POST['number'];
    $id_client = $_POST['id_client'];
    $dbhelper->Update('cart',['ratecart'],[$number],['id_article','id_client'],[$id_article,$id_client]);
    $rowAvgRate = $dbhelper -> statistic('AVG','cart','ratecart',['id_article'],[$id_article]);
    $AvgRate = mysqli_fetch_row($rowAvgRate);
    $rate = round($AvgRate['0']);
    $dbhelper->Update('article',['rate'],[$rate],['id'],[$id_article]);


  //  echo json_encode($rate);
}

 ?>
