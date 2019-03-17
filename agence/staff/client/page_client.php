<?php


 //session_save_path("/home/users/web/b2161/ipg.alttullinescom/staff/logintmp/");
  session_start();
  $user="root";
  $pass="nas4";
  $host="localhost";
  $dbname="worckstation";
 $db=  mysqli_connect($host,$user,$pass,$dbname);
 if ($db->connect_error) {
     die("Error 1"  );
 }
 if(!isset($_SESSION['login_Email'])){
 header("location: index.php");
 }
 if( isset($_POST['update']) ){echo "updte"; }


 $id= $_SESSION['id'];
$client=$_SESSION['client'];
$seller=$_SESSION['login_Email'];


 if(isset($_POST['download'])){
   $client=$_SESSION['client'];



     $user="root";
     $pass="nas4";
     $host="localhost";
     $dbname="worckstation";
    $db=  mysqli_connect($host,$user,$pass,$dbname);
    $day=$_POST['day'];
    if($day==""){

      $sql="SELECT * FROM clients_sells WHERE client='$client' ORDER BY Date  DESC";
    }else{
      $sql="SELECT * FROM clients_sells WHERE client='$client'and Date='$day' ORDER BY Date  DESC";

    }

     $reports=' Date ;Creditor; Credit ;TKT Number; Solde; Observations ;Others;Seller; client' ."\n";
     $file='Report_of';
     $name= 'a';

           $result = mysqli_query($db,$sql);
     if($result==TRUE){
      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
     $reports.= $row['Date'] .';' .$row['Creditor'].';'. $row['Quted'] .';'.$row['Details'].';'. $row['Solde']
     .';'. $row['Observations'].';'.$row['Others'] .';' .$row['Seller'] .';'.$row['client']."\n" ;
         }
     }else{echo "false";}

     $file ='Report_of.CSV' ;
     header('Content-Disposition: attachment; filename="'. $file .'');
     header('Content-Type: text/plain');
     header('Content-Length: ' . strlen($reports));
     header('Connection: close');
     echo $reports;


 }
 ?>
 <?php

 $db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');
 $result = array();
 $recup = $db->query("SELECT * FROM users WHERE email='$seller' ");
 while($all =$recup->fetch())
 {
   $result[] = $all;
 }

 foreach ($result as $result) {


 }
 $isadmin=$result['isadmin'];



 if($result['isadmin']==1){
 $display="";


 }
 else{

   $display="none";

 }
 ?>

 <!DOCTYPE html>
 <html >
 <head>
   <meta charset="UTF-8">
   <title>Clients</title>  <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css">
   	<script src="../vendor/jquery/jquery.js" ></script>
   	<script src="../vendor/bootstrap/js/bootstrap.js" ></script>
    <link rel="stylesheet" href="../css/style.css">
   </head>
   <body>



 <div class="topbar form">

   <div class="recherche_day"  style="position:absolute; right:15px; top:10px;text-align:center;">
     <form action="" method="post">


     <img class="" src="../images/calendar.png" style="display:inline-block;position:relative;left:12px;top:-3px;">
     <input id="date" name="day" class="form-control" type="date"  style="width:147px;display:inline-block;font-size:15px;">
     <button type="submit" name="lope" class="btn btn-default" style="background-color:white;">
     <img    class="lope" src="../images/lope.png" style="display:inline-block;">
</button>


   </div>
<a href="clients.php">
 <img class="backimg" src="../images/back.png" style="position: absolute;left: 15px;top: 10px;">
 </a>
   <img src="../images/person.png" style="
     top: -28px;
     position: relative;
 "><h3  style="
     top: -88px;
     position: relative;
     left: 50px;
     font-size:31px;
 "><?php echo $client; ?> </h3>

<style media="screen">
.table td, .table th {
  vertical-align: top;
  border-top: 1px solid #e9ecef;
  padding: 8px;
}
</style>
<div class="leftform" style="height: 65px;">
      <button style="border:transparent;background-color:white;  position: relative;top: 16px;" type="submit" name="download">
      <img src="../images/down.png" style=" height: 24px;" >
    </button>
    </form>

  </div>
 </div>
 <div class="form min">
   <table class="table table-hover" id="mytable" style="width:950px;">
     <thead class=" " >
       <tr style="background-color:black;color:white;">
         <th style="width:60px;display:<?php echo $display;?>;">confirm</th>
         <th style="width:100px;font-size:">Date</th>
         <th style="width:00px;font-size:">Details</th>
         <th style="width:00px;font-size:">Credit-</th>
         <th style="width:00px;font-size:">Creditor+</th>
         <th style="width:;font-size:">Solde</th>
         <th style="width:57px;font-size:">User</th>
         <th style="width:;font-size:">Others</th>
         <th style="width:00px;font-size:">Observation</th>
         <th style="width:56px;font-size:">File</th>


         <th style="width:90px;right:; font-size:;" >Option</th>
       </tr>
     </thead>

     <?php


  # code...


     $id= $_SESSION['id'];
     $client= $_SESSION['client'];

     $db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

     $result = array();

          if(isset($_POST['lope'] ))  {
            $day=$_POST['day'];

            if($day==""){            $recup = $db->query("SELECT * FROM clients_sells where client='$client' ORDER BY  Date DESC ");
}
              else {
                $recup = $db->query("SELECT * FROM clients_sells where client='$client' and Date='$day'ORDER BY  Date DESC  ");

              }
          }
          else {
            $recup = $db->query("SELECT * FROM clients_sells where client='$client'ORDER BY  Date DESC  ");

     }

     while($all =$recup->fetch())
     {
       $result[] = $all;
     }

 foreach ($result as $result) {

   if($result['confirme']=="0" ){
$color="#ccc";
$hide=";";
   }else {
     $color="white";
     $hide="none";

   }
   echo '

     <tbody>
         <tr id="mytr" style="background-color:'.$color.';"  >
         <td style="display:'.$display.';"><input type="checkbox" value="1" id="checkbox'.$result['id'].'"  onclick="confirme('.$result['id'].') "  style="width:20px;"  ></td>

         <inputid="confirme'.$result['id'].'"    type="text" value="'.$result['confirme'].'"
         <input  id="id'.$result['id'].'"    type="text" value="'.$result['id'].'">
         <td>'.$result['Date'].'</td>
         <td><input  id="Details'.$result['id'].'"   class="form-control" type="text" value="'.$result['Details'].'"  style="font-size:14px;"></td>

         <td><input  id="Quted'.$result['id'].'"   class="form-control" type="Number" value="'.$result['Quted'].'"   style="font-size:14px;"></td>
         <td><input  id="Creditor'.$result['id'].'"   class="form-control" type="Number" value="'.$result['Creditor'].'"  style="font-size:14px;"></td>
         <td style="width:80px;font-size:14px;"> '.$result['Solde'].' </td>
         <td style="font-size:14px;">'.$result['Seller'].'</td>
         <td><input  id="Others'.$result['id'].'"   class="form-control" type="text" value="'.$result['Others'].'"  style="font-size:14px;"></td>
         <td><input  id="Observations'.$result['id'].'"   class="form-control" type="text" value="'.$result['Observations'].'"  style="font-size:14px;"></td>
         <td>
         <img  src="../photo/'.$result['pic'].'"  width="40px"  height="32px" onclick="window.open(this.src)" style="">


             </td>

<form method="post" action="" enctype="multipart/form-data">
         <td><img onclick="modifier('.$result['id'].')" class="img1"   style="margin-right:2px;display:'.$hide.';" src="../images/isadmin.png">
         <img  onclick="supprimer('.$result['id'].' )" class="img2"    style="margin-right:;display:'.$hide.';"  src="../images/delete.png">


         </td>
       </tr>

     </tbody>


     </form>

     ';


   }


   ?>

   <style >

   </style>

     </table>
 </div>



         <script >




         function zoom(id) {

           var picid='file'+id;

         var pic=document.getElementById(picid);

          document.getElementById('pic').click()
         }
         </script>





         <?php
         $conn=new mysqli('localhost','root','nas4','worckstation');

         $req1="SELECT SUM(Quted) AS value_sum FROM clients_sells where client='$client'";
         $compte1 = mysqli_query($conn,$req1);
         $TotQuted=mysqli_fetch_array($compte1);

         $req2="SELECT SUM(Creditor) AS value_sum FROM clients_sells where client='$client'";
         $compte2 = mysqli_query($conn,$req2);
         $TotCreditor=mysqli_fetch_array($compte2);

         $totalSolde=$TotCreditor['0']-$TotQuted['0'];
         ?>

         <form action="" method="post" enctype="multipart/form-data">

         <div class="form min" style="height: 100px;width:926px;">
           <div class="field-wrap smolinput">
              <label class="active">Net Fare</label>
              <input   id="NetFare1" type="number"  style="width:130px;font-size:15px;" class="form-control"required>
            </div>
            <div class="field-wrap smolinput">
              <label class="active">Quted</label>
              <input  id="Quted1"  type="number" style="width:130px;font-size:15px;"  class="form-control"required>
            </div>

            <div class="field-wrap smolinput">
          <label class="active">TKT Number</label>
          <input   id="TKTNumber1"  type="number" style="width:130px;font-size:15px;"  class="form-control"required>
          </div>

          <div class="field-wrap smolinput">
         <label class="active">Airways</label>
         <input  id="Airways1"  type="text" style="width:130px;font-size:15px;" class="form-control"required >
         </div>

         <input  style="display:none;" id="day"  type="text" value=<?php echo date("Y-m-d");  ?>  >

         <input style="display:none;" id="email"  type="text" value=<?php echo "";  ?>  >

         <input  style="display:none;" id="user"  type="text" value=<?php echo "";  ?> " >



         <div class="field-wrap smolinput">
           <label class="active">File / Save</label>

           <img src="../images/file.png" alt="" onclick="document.getElementById('file-upload').click()">
           <input style="display:none" id="file-upload"   name="fileToUpload" type="file"/>

         </form>

                  <button type="buttuon" name="update" onclick="insert()" class="btn btn-default" style="background-color:white;border:transparent;">
                  <img    class="" src="../images/upload.png" style="display:inline-block;">
                  </button>
                </div>



 <script>


 function confirme(id){
   console.log(id);


   var r = event.target;
   var i = r.parentNode.parentNode.rowIndex;
   var tr=document.getElementById("mytable").rows[i];
 tr.style.backgroundColor = "white";

 var a=document.getElementById('mytr');
 console.log(a);


   console.log(id );
   $.post('color.php',{id:id},function(recu){
   });
 }

var solde=document.getElementById('SoldeTotal').value;


if(solde>0){
  $('#SoldeTotal').css("background-color", "#00FF7F");

}
if(solde<0){
  $('#SoldeTotal').css("background-color", "#ff6666");

}

   function supprimer(id) {
    var txt;
console.log(id);


      var r = confirm("You want to Delete ?");
      if (r == true) {
        var r = event.target;
        var i = r.parentNode.parentNode.rowIndex;
       document.getElementById('table').deleteRow(i);
       $.post('del.php',{id:id} ,function(recu){

       });

      } else {

      }
   }

   function modifier(id){
event.preventDefault();
     var QutedId='Quted'+id;
   var CreditorId='Creditor'+id;
   var CreditId='Credit'+id;


   var OthersID='Others'+id;
   var ObservationsID='Observations'+id;
   var Others=document.getElementById(OthersID).value;
   var Observations=document.getElementById(ObservationsID).value;
   var Creditor=document.getElementById(CreditorId).value;

   var Quted=document.getElementById(QutedId).value;


console.log(Others+Observations+Creditor+Quted);

   $.post('Mod.php',{id:id,Creditor:Creditor,Others:Others,Observations:Observations,Quted:Quted},function(recu){
     $('afficher').html(recu);
     window.location.href = 'page_client.php';

   });

   }




   $(".img1").hover(function(){
      $(this).css("background-color", "#ccc");
      $(this).attr('title', 'Click here to modify');

      }, function(){
      $(this).css("background-color", "");
   });
   $(".img2").hover(function(){
      $(this).css("background-color", "#ccc");
      $(this).attr('title', 'Click here to delete');

      }, function(){
      $(this).css("background-color", "");
   });    $(".img3").hover(function(){
          $(this).css("background-color", "#ccc");
          $(this).attr('title','Go to personal page');

          }, function(){
          $(this).css("background-color", "");
      });



 </script>
   </body>
 </html>
