<?php
require_once("config.php");


 function Islogin($db )
{
     $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT id FROM users WHERE email = '$myemail' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $id = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1  ) {
         return $id;
      }else {
        return FALSE;
      }
      return FALSE;

}function Rate($db )
{
     $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $stars= mysqli_real_escape_string($db,$_POST['stars']);
      $orderid= mysqli_real_escape_string($db,$_POST['orderid']);
      $Comment= mysqli_real_escape_string($db,$_POST['comment']);

           mysqli_query($db,"UPDATE    `orders` SET  `Stars`='$stars' ,`Comment`='$Comment',`IsRate`='1'    WHERE  `orderid`='$orderid'  ");


}function Tentative ($db)
 {
      $resett= mysqli_real_escape_string($db,$_POST['resett']);

     $email = mysqli_real_escape_string($db,$_POST['email']);


   $sql = "SELECT  Try,LastTry FROM `users` WHERE  `email`= '$email'   ";
      $resul = mysqli_query($db,$sql);
      $ro = mysqli_fetch_array($resul,MYSQLI_ASSOC);
     $Try=$ro['Try']  ;
          $LastTry=$ro['LastTry']  ;



       $sql = "SELECT  LimitTry,ResetTime FROM `prams`   ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $LimitTry=$row['LimitTry']  ;
               $ResetTime=$row['ResetTime']  ;


    $tab[]=$Try ;
    $tab[]=$LastTry;
     $tab[]=$LimitTry;
       $tab[]=$ResetTime;



         $response["tag"] = "Try";
          $response["success"] =0;
          $response["message"] = $tab;

if($resett==1){
      mysqli_query($db,"UPDATE    `users` SET  `Try`='0'   WHERE  `email`='$email' ");

}


return json_encode($response);

}

function payement($db )
{
       $code= mysqli_real_escape_string($db,$_POST['code']);
          $email= mysqli_real_escape_string($db,$_POST['email']);
          $nbrTry= mysqli_real_escape_string($db,$_POST['nbrTry']);



   $sql = "SELECT  `balance` FROM `users` WHERE  `email`= '$email'   ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $balance=$row['balance']  ;

          $sql12 = "SELECT * from `codes` where  `Code`='$code'   ";
          $resul6t=mysqli_query($db,$sql12);
          $row3 = mysqli_fetch_array($resul6t,MYSQLI_ASSOC) ;
            $Amount=$row3['Amount']  ;
            $IsUsed=$row3['IsUsed']  ;
        $rows=mysqli_num_rows($resul6t);
      if($rows==0  ){
          $response["tag"] = "payement";
          $response["success"] =0;
          $response["message"] ="The Code is wrong $erreur";
      mysqli_query($db,"UPDATE    `users` SET  `Try`='$nbrTry'   WHERE  `email`='$email' ");


      }else if ($rows>0 && $IsUsed=="0" ) {

      $NewBalance=$balance+$Amount;
          $response["tag"] = "payement";
          $response["success"] =1;
          $response["message"] ="Congratulation your new balance is :$NewBalance";


      mysqli_query($db,"UPDATE    `users` SET  `balance`='$NewBalance'    WHERE  `email`='$email' ");



    mysqli_query($db,"UPDATE    `codes` SET  `IsUsed`='1' , `User`='$email'    WHERE  `Code`='$code' ");
        mysqli_query($db,"UPDATE    `users` SET  `Try`='0'    WHERE  `email`='$email' ");


      }else if($IsUsed=="1"  ){
          $response["tag"] = "payement";
          $response["success"] =0;
          $response["message"] ="The Code Is Used $nbrTry !";

      mysqli_query($db,"UPDATE    `users` SET  `Try`='$nbrTry'   WHERE  `email`='$email' ");


      }else{


         $response["tag"] = "payement";
          $response["success"] =0;
          $response["message"] ="Theire is a mistake  check plz $erreur";
      mysqli_query($db,"UPDATE    `users` SET  `Try`='$nbrTry'   WHERE  `email`='$email' ");

}




  /*


/*
$sql1 = "UPDATE    `codes` SET  `IsUsed`='1'    WHERE  `id`=$tab"  ;
      mysqli_query($db,$sql1 );
*/







return json_encode($response);

}
 function work($db )
{
    $sql = "SELECT * FROM worck";
      $result = mysqli_query($db,$sql);
      if($result !=FALSE){
          while ($xRow=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $table[]=$xRow;

    //   $str.=   $xRow['Day'] ."/" .  $xRow['StartMorning'] ."/" .  $xRow['EndMorning'] ."/" . $xRow['StartEvning'] ."/" .  $xRow['EndEvning'] . ";" ;
           }
      }
      $response["tag"] = "work";
      $response["success"] =1;
      $response["message"] =$table;
return json_encode($response);
}
 function ID($db )
{
     $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT * FROM users WHERE email = '$myemail' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $id = mysqli_fetch_array($result,MYSQLI_ASSOC);
     return $id['id'];
}

 function login($db ){
     $myemail = mysqli_real_escape_string($db,$_POST['email']);
     $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql1 = "SELECT * FROM users WHERE email = '$myemail' and pass = '$mypassword'";
      //return "1DataSPLITER" . $row1['email'] ."/". $row1['fn'] ."/" .  $row1['ln'] . "/"  . $row1['fnbr'] ."/" . $row1['adrs'] . "/" . $row1['id'] ;

      if ($result=mysqli_query($db, $sql1)) {
           if(mysqli_num_rows($result) == 1 ){
              while($row = mysqli_fetch_assoc($result)) {
                   $response["tag"] = "1";
                   $response["success"] = 1;
                   $response["message"] =$row;
              }
          }else {
              $response["tag"] = "1";
              $response["success"] = 0;
              $response["message"] = "failde.";
          }
         return json_encode($response);
     } else {
        $response["tag"] = "1";
        $response["success"] = 0;
        $response["message"] = "ERROR : ". mysqli_error($conn);

        return json_encode($response);
     }

}  function AddOrder($db){
                       
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $name = mysqli_real_escape_string($db,$_POST['name']);
  $count = mysqli_real_escape_string($db,$_POST['count']);
  $price = mysqli_real_escape_string($db,$_POST['price']);
  $method = mysqli_real_escape_string($db,$_POST['method']);
  $cobon = mysqli_real_escape_string($db,$_POST['code']);
  $GPS = mysqli_real_escape_string($db,$_POST['GPS']);

  $NewPrice=checkCobonNow($db,$cobon,$price);

  if($NewPrice==$price){
    $cobon ="nothing";
  }
 if($method=='2'){

   $sql = "SELECT  `balance` FROM `users` WHERE  `email`= '$email'   ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $balance_old=$row['balance']  ;
          $balance_new=$balance_old-($price*$count);

  if( $balance_new <0 ){
  $response["tag"] = "3";
        $response["success"] =0;
   $response["message"] ="1";  //u caant bay the balance is not enough


 }else if( $balance_new >=0 ){
$response["tag"] = "3";
        $response["success"] =0;
        $response["message"] ="2";  //the balance is good lets check codes now


       $sql = "SELECT * from `codes` where `IsUsed`='0' and `Amount`='$price'  LIMIT $count     ";
          $result=mysqli_query($db,$sql);
                     if(mysqli_num_rows($result) >=$count ){
                     
                     

                        while($row = mysqli_fetch_assoc($result)) {
                $tab[]=$row['id'];
                       $code[]=$row['Code'];

                
              }   
foreach ($tab as $tab) {
            mysqli_query($db, "UPDATE    `codes` SET  `IsUsed`='1' ,  `User`='$email'    WHERE  `id`='$tab' ");
        
    }  $sql12 = "UPDATE    `users` SET  `balance`='$balance_new'    WHERE  `email`='$email' "  ;
      mysqli_query($db,$sql12 );

  $qsl="INSERT INTO `orders`(`email`,  `name`,  `count`, `price`, `state`, `method`,`GPS`,`code`,`Date`)                                                                                                               
   VALUES ('$email','$name','$count','$NewPrice','0','$method','$GPS','$cobon','".date("Y-m-d"). "')";
   

  
  if ($db->multi_query($qsl) === TRUE) {
    $last_id = $db->insert_id;
    foreach ($code as $code) {
    
        mysqli_query($db,"INSERT INTO `cartsGift` (`id`, `Name`, `Amount`, `Price`, `Code`, `User`, `OrderId`) 
                        VALUES (NULL, '$name', '$count', '$price', '$code', '$email', '$last_id '); ");
                        
}
    $sql="UPDATE  orders SET orderid ='" . $last_id. "' WHERE id='" . $last_id ."'";
    

    if ($db->multi_query($sql) === TRUE) {
        $sql="SELECT * FROM delay";
        $result = mysqli_query($db,$sql);
        $Myraw = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $message["last_id"]=$last_id;
        $message["PramsReturn"]=PramsReturn($db) ;
        $message["PramsReturntow"]=PramsReturntow($db);
        $message["date"]=date("l");
        $message["myraw"]=$Myraw;

    
}
}
  }
}
}else{

if($method=='0'){
    $NewPrice=$NewPrice+GetFee($db);
  }
  $qsl="INSERT INTO `orders`(`email`,  `name`,  `count`, `price`, `state`, `method`,`GPS`,`code`,`Date`) VALUES ('$email','$name','$count','$NewPrice','0','$method','$GPS','$cobon','".date("Y-m-d"). "')";
  if ($db->multi_query($qsl) === TRUE) {
    $last_id = $db->insert_id;
    $sql="UPDATE  orders SET orderid ='" . $last_id. "' WHERE id='" . $last_id ."'";
    if ($db->multi_query($sql) === TRUE) {
        $sql="SELECT * FROM delay";
        $result = mysqli_query($db,$sql);
        $Myraw = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $message["last_id"]=$last_id;
        $message["PramsReturn"]=PramsReturn($db) ;
        $message["PramsReturntow"]=PramsReturntow($db);
        $message["date"]=date("l");
        $message["myraw"]=$Myraw;

        $response["tag"] = "3";
        $response["success"] =1;
        $response["message"] =$message;
     }

 /*return "3DataSPLITER" . $last_id . "DataSPLITER" . PramsReturn($db) . "DataSPLITER" . PramsReturntow($db).
   "DataSPLITER" . date("l"). "DataSPLITER". $Myraw['Bnk'] . "DataSPLITER". $Myraw['Cash']     ;*/
   return json_encode($response);
}


  }   

}function GetFee($db){
     $sql = "SELECT * FROM prams";
      $result = mysqli_query($db,$sql);
       $Row=mysqli_fetch_array($result,MYSQLI_ASSOC);
       return $Row['Fee'] ;
}function GetBalance($db){
        $email=mysqli_real_escape_string($db,$_POST['email']);
   $sql = "SELECT  `balance` FROM `users` WHERE  `email`= '$email'   ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $balance=$row['balance']  ;
      $response["tag"] = "Balance";
        $response["success"] =1;
        $response["message"] =$balance;

  return json_encode($response);

  }
 function UpadeOrder($db){
    $last_id =mysqli_real_escape_string($db,$_POST['last_id']);
  if($_POST['Date']=="/"){
    $datetime = new DateTime('tomorrow');
    $NextDay = $datetime->format('l');
    $sql="SELECT * FROM worck WHERE Day ='$NextDay'";
     $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $date_string = $row['StartMorning'];
         $Mdate = date_create_from_format('H:i', $date_string);
        $print = date('H:i', $Mdate->getTimestamp());
       $new_times = date("H:i", strtotime($print . '+ 30 minutes'));
       $new_time = date("H:i", strtotime($print . '+'. getDelay($db,$last_id) .' hours'));
     $Date  = date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days')). " " .$new_times . "-" . $new_time;
  }else{
    $Date = date('Y-m-d') ." " . mysqli_real_escape_string($db,$_POST['Date']);
  }
 $sql="UPDATE  orders SET  Date ='" . $Date. "' WHERE id='" . $last_id ."'";
                              if ($db->multi_query($sql) === TRUE) {
                              }

 }

function getDelay($db,$last_id){
$sql="SELECT * FROM delay";
$result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $msql="SELECT * FROM orders  WHERE id='" . $last_id ."'" ;
      $resultd = mysqli_query($db,$msql);
      $rowd = mysqli_fetch_array($resultd,MYSQLI_ASSOC);
      $mithod=$rowd['method'];
if($mithod==0){
 return  $row['Cash'];
}else{
return  $row['Bnk'];
}
}
function newUser($db){
  $WelcomMessag =file_get_contents('WelcomMessag');
        $email=mysqli_real_escape_string($db,$_POST['email']);
  $pass=mysqli_real_escape_string($db,$_POST['password']);
  $fn=mysqli_real_escape_string($db,$_POST['fn']);
  $ln=mysqli_real_escape_string($db,$_POST['ln']);
  $fnbr=mysqli_real_escape_string($db,$_POST['phone']);
  $adrs=mysqli_real_escape_string($db,$_POST['address']);

      $sql = "SELECT id FROM users WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

       $sql = "SELECT id FROM users WHERE fnbr = '$fnbr'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count2 = mysqli_num_rows($result);
      if($count >= 1) {
        $response["tag"] = "Msg";
        $response["success"] =0;
        $response["message"] ="mail is in use. ";
        return json_encode($response);
//return "MsgDataSPLITEREmail is in use .";
 }elseif ($count2 >= 1) {
   $response["tag"] = "Msg";
   $response["success"] =0;
   $response["message"] ="Phone Number is in use. ";
   return json_encode($response);
 //return "MsgDataSPLITERPhone Number is in use .";
}else{
$sql = "INSERT INTO `users`(`fn`, `ln`, `email`, `pass`,`fnbr`, `adrs`,`balance`)

VALUES ('" . $fn ."', '". $ln ."','" . $email ."', '" . $pass ."','" . $fnbr ."','" . $adrs ."','0');";
if ($db->multi_query($sql) === TRUE) {
$sql = "INSERT INTO `messages` ( `email`, `titel`, `date`, `contans`) VALUES ('". $email ."', 'Welecom', '". date("Y-m-d") ."', '" . $WelcomMessag ."');";
$db->multi_query($sql);
$last_id = $db->insert_id;
  // return "2DataSPLITER" . $email ."/"  . $fn ."/" .  $ln . "/"  . $fnbr ."/" . $adrs . "/" . $last_id ;
      $tab["email"]=$email;
      $tab["fn"]=$fn;
      $tab["ln"]=$ln;
      $tab["fnbr"]=$fnbr;
      $tab["adrs"]=$adrs;
      $tab["last_id"]=$last_id;
        $tab["balance"]='0';


   $response["tag"] = "2";
   $response["success"] =1;
   $response["message"] =$tab;
   return json_encode($response);
} else {
  // return   "MsgDataSPLITEROperation Failed Please Try again later";
   $response["tag"] = "Msg";
   $response["success"] =0;
   $response["message"] ="Operation Failed Please Try again later";
   return json_encode($response);
}
      }
}
function checkCobonNow($db,$cobon,$price){
  $now =date("Y-m-d");
  $CobonCode=$cobon;
   $sql = "SELECT * FROM cobons WHERE CobonCode = '$CobonCode' and ExperDate >= '$now'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
if($count >= 1) {
        $Type= $row['Type'];
        $cut=$row['Cut'];
        if($Type=='p'){
        $NewPrice=$price -($price * $cut/100);
           return $NewPrice;
        }else{
        $NewPrice=$price -$cut;
           return $NewPrice  ;
        }
      }else {
        return $price  ;

      }
      return $price ;
}
function checkCobon($db){
  $now =date("Y-m-d");
  $CobonCode=mysqli_real_escape_string($db,$_POST['CobonCode']);
   $sql = "SELECT * FROM cobons WHERE CobonCode = '$CobonCode' and ExperDate >= '$now'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
       if($count == 1) {
         //return "CDataSPLITER" . $row['Cut'] . "DataSPLITER" . $row['Type']  ;
                   $response["tag"] = "C";
                   $response["success"] =1;
                   $response["message"] =$row;
                   return json_encode($response);
      }else {
      //  return "CN";
        $response["tag"] = "CN";
        return json_encode($response);

      }
      $response["tag"] = "CN";
      return json_encode($response);

    //  return "CN";
}
function info($db){
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT id FROM users WHERE email = '$myemail' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
      $id =$row['id'];
      $sql = "SELECT * FROM users WHERE id =$id";
      $result = mysqli_query($db,$sql);
      $xRow   = mysqli_fetch_array($result,MYSQLI_ASSOC);

       $response["tag"] = "info:";
       $response["success"] = 1;
       $response["message"] =$xRow;

   //return  "info:DataSPLITER" . $xRow['id'] . '/' . $xRow['fn'] . "/" . $xRow['ln'] ."/"  . $xRow['not']  ;
      return json_encode($response);

}
function notic($db){
  //notic
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT id FROM users WHERE email = '$myemail' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
      $id =$row['id'];

      $sql = "SELECT * FROM messages WHERE email ='$myemail'";
      $result = mysqli_query($db,$sql);
      $notics=   mysqli_num_rows($result);

      $sql = "UPDATE `users` SET `not`=$notics WHERE `id`=$id";
      $result = mysqli_query($db,$sql);
      $xRow   = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $sql = "SELECT * FROM users WHERE id =$id";
      $result = mysqli_query($db,$sql);
      $xRow   = mysqli_fetch_array($result,MYSQLI_ASSOC);

      //return  "noticDataSPLITER" .  $xRow['not']  ;

       $response["tag"] = "notic";
       $response["success"] = 1;
       $response["message"] =$xRow['not'];

      return json_encode($response);

}
function Messages($db){
      $email=mysqli_real_escape_string($db,$_POST['email']);
      $sql = "SELECT * FROM messages WHERE email ='$email'";
      $result = mysqli_query($db,$sql);
      //$str="msgDataSPLITER";
      if($result !=FALSE){
          while ($xRow=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    //   $str.=   $xRow['titel'] ."XSPLITER" .  $xRow['date'] ."XSPLITER" .  $xRow['contans'] ."FSPLITER" ;
          $tab[]=$xRow;
         }
      }
      $email=mysqli_real_escape_string($db,$_POST['email']);
      $sql = "DELETE FROM messages WHERE email ='$email'";
      $result = mysqli_query($db,$sql);
   //return $str ;


          $response["tag"] = "msg";
          $response["success"] = 1;
          $response["message"] =$tab;

         return json_encode($response);


}
function Prams($db){
      $sql = "SELECT * FROM prams";
      $result = mysqli_query($db,$sql);
      $str="PramsDataSPLITER";
      if($result !=FALSE){
          while ($xRow=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      /* $str.=   str_replace("\n", "NewLine", $xRow['About']) ."XSPLITER" .
         str_replace("\n", "NewLine",$xRow['Conect']) ."XSPLITER" .
          str_replace("\n", "NewLine", $xRow['Info']) ."XSPLITER" .  $xRow['Fee']  ;*/
           $response["tag"] = "Prams";
        $response["success"] = 1;
        $response["message"] =$xRow;

    }

      }else{
     $response["tag"] = "Prams";
     $response["success"] = 0;
     $response["message"] ="erreur ";
    }
   //return $str ;



  return json_encode($response);

}

function PramsReturntow($db){
      $sql = "SELECT * FROM prams";
      $result = mysqli_query($db,$sql);
      $str="";
      if($result !=FALSE){
          while ($xRow=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
       $str.=   $xRow['Msg2'];
    }
      }
   return $str ;
}
function PramsReturn($db){
      $sql = "SELECT * FROM prams";
      $result = mysqli_query($db,$sql);
      $str="";
      if($result !=FALSE){
          while ($xRow=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
       $str.=   $xRow['Msg'];
    }
      }
   return $str ;
}
function Contact($db){
      $sql = "SELECT * FROM contact";
      $result = mysqli_query($db,$sql);
      $str="ContactDataSPLITER";
      if($result !=FALSE){
          while ($xRow=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      // $str.=   $xRow['Titel'] ."XSPLITER" .  $xRow['Url'] ."FSPLITER"  ;
        $tab[]=$xRow;
    }
  }
      $response["tag"] = "Contact";
      $response["success"] = 1;
      $response["message"] =$tab;

  // return $str ;
  return json_encode($response);
}
function Orders($db){
      $email=mysqli_real_escape_string($db,$_POST['email']);
      $sql = "SELECT * FROM orders WHERE email ='$email'";
      $result = mysqli_query($db,$sql);
     $str="ordersDataSPLITER";
      if($result !=FALSE){
          while ($xRow=mysqli_fetch_array($result,MYSQLI_ASSOC)) {

  /* $str.=   $xRow['orderid'] ."XSPLITER" .  $xRow['name'] ."XSPLITER" .  $xRow['count'] ."XSPLITER" .
      ['price'] ."XSPLITER" .  $xRow['state'] ."XSPLITER" .  $xRow['method'] ."XSPLITER" .  $xRow['Date'] ."FSPLITER" ;*/
            $tab[]=$xRow;
          }
     }

             $response["tag"] = "orders";
             $response["success"] = 1;
             $response["message"] =$tab;

            return json_encode($response);
   //return $str ;

}
function clearNotic($db)
{
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT id FROM users WHERE email = '$myemail' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
     $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
 $id =$row['id'];
      $sql = "UPDATE `users` SET `not`=0 WHERE `id`=$id";
      $result = mysqli_query($db,$sql);
    $xRow   = mysqli_fetch_array($result,MYSQLI_ASSOC);
//return "noticCleard";
$response["message"] ="noticCleard";

return json_encode($response);

}
function Update($db){

  if(isset($_POST['UpdateEmail'])){

      $email=mysqli_real_escape_string($db,$_POST['email']);
      $Newemail=mysqli_real_escape_string($db,$_POST['UpdateEmail']);
      $sqlf="SELECT * FROM users WHERE email='" .$Newemail ."'";
      $rslt=mysqli_query($db,$sqlf);
      $counter=mysqli_num_rows($rslt);
      if($counter>=1){
      //  return "MsgDataSPLITEREmail Already Exists";
        $response["tag"] = "Msg";
        $response["success"] = 0;
        $response["message"] ="Email Already Exists";

       return json_encode($response);

      }
      $id =ID($db);
       $sq="UPDATE `users` SET  `email`='" . $Newemail ."' WHERE `id`=$id";
       $result = mysqli_query($db,$sq);

       $sq="UPDATE orders SET email='" . $Newemail ."' WHERE email ='" . $email ."' ";
       $result = mysqli_query($db,$sq);

        $sq="UPDATE messages SET email='" . $Newemail ."' WHERE email ='" . $email ."'";
        $result = mysqli_query($db,$sq);
       //return "InfoUpdated";
       $response["tag"] ="InfoUpdated";
       return json_encode($response);


  }elseif (isset($_POST['UpdatePassword'])) {
       $NewPassword=mysqli_real_escape_string($db,$_POST['UpdatePassword']);
       $id =ID($db);
       $sq="UPDATE `users` SET  `pass`='" . $NewPassword ."' WHERE `id`=$id";
       $result = mysqli_query($db,$sq);
//return "InfoUpdated";
$response["tag"] ="InfoUpdated";
return json_encode($response);


   }elseif (isset($_POST['UpdatePhone'])) {
       $NewPassword=mysqli_real_escape_string($db,$_POST['UpdatePhone']);
       $id =ID($db);
       $sq="UPDATE `users` SET  `fnbr`='" . $NewPassword ."' WHERE `id`=$id";
       $result = mysqli_query($db,$sq);
      // return "InfoUpdated";
      $response["tag"] ="InfoUpdated";
      return json_encode($response);


     }elseif (isset($_POST['UpdateAddress'])) {
       $NewAddress=mysqli_real_escape_string($db,$_POST['UpdateAddress']);
       $id =ID($db);
       $sq="UPDATE `users` SET  `adrs`='" . $NewAddress ."' WHERE `id`=$id";
       $result = mysqli_query($db,$sq);
    //   return "InfoUpdated";
    $response["tag"] ="InfoUpdated";
    return json_encode($response);



  }
  $response["message"] ="Info Not Updated";
  return json_encode($response);

}
function rest($db){
  $email = mysqli_real_escape_string($db,$_POST['email']);
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $id = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count<=0){
        //return "4";
        $response["tag"] ="4";
        return json_encode($response);

      }else{
 // TL!SWZ,O@@v-
 //restpassword@majdicard.com
          $subject = 'Password Reqest';
          $headers = 'From: restpassword@majdicard.com'  . "\r\n";
          $headers .= "Reply-To: restpassword@majdicard.com" . "\r\n";
          $headers .= "CC: restpassword@majdicard.com\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
          $message .= '<p> Your Password is : <strong>' . $id['pass'] . '</strong> Use It to Login to your Account .</p>';
        mail( $email, $subject, $message, $headers);
        //return "5";
        $response["tag"] ="5";
        return json_encode($response);
      }
}
if(isset($_POST['login'])){
  echo  login($db) ;
}elseif(isset($_POST['pay'])){
  if(Islogin($db)==FALSE){    echo "Please Login first";
}else{

  echo  payement($db) ;
  }
}elseif(isset($_POST['balance'])){
  if(Islogin($db)==FALSE){    echo "Please Login first";
}else{

  echo  GetBalance($db) ;}
  }elseif(isset($_POST['Tentative'])){
  if(Islogin($db)==FALSE) {     echo "Please Login first";
}else{

  echo  Tentative($db) ;
  }
}elseif (isset($_POST['newuser'])) {
  echo newUser($db);
}elseif(isset($_POST['info'])){
  if(Islogin($db)==FALSE){
    echo "Please Login first";
  }else{
    echo info($db);
  }
}elseif(isset($_POST['notic'])){
  if(Islogin($db)==FALSE){}else{
    echo notic($db);
  }
}elseif(isset($_POST['msg'])){
  if(Islogin($db)==FALSE){}else{
      echo Messages($db);
 }
}elseif(isset($_POST['clearNotic'])){
  if(Islogin($db)==FALSE){}else{
    echo  clearNotic($db);
  }
}elseif(isset($_POST['GetOrders'])){
  if(Islogin($db)==FALSE){}else{
    echo  Orders($db);
  }
}elseif(isset($_POST['Params'])){
  echo  Prams($db);


}elseif(isset($_POST['Contact'])){
  echo  Contact($db);
}elseif(isset($_POST['update'])){
  if(Islogin($db)==FALSE){}else{
    echo  Update($db);
  }
}elseif(isset($_POST['rest'])){
      echo rest($db);
}elseif(isset($_POST['work'])){
  echo work($db);
}elseif(isset($_POST['order'])){
  if(Islogin($db)==FALSE){
    echo "if";

  }else{
      echo AddOrder($db);

  }
}elseif(isset($_POST['checkCobon'])){
  if(Islogin($db)==FALSE){}else{
    echo checkCobon($db);
  }
}elseif(isset($_POST['UpadeOrder'])){
  if(Islogin($db)==FALSE){}else{
    echo UpadeOrder($db);
  }
     //UpadeOrder
}elseif(isset($_POST['Rat'])){
  if(Islogin($db)==FALSE){}else{
    echo Rate($db);
  }
     //UpadeOrder
}

 ?>
