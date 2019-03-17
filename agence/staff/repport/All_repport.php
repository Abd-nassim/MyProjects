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
$seller=$_SESSION['login_Email'];

$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');
$result = array();
$recup = $db->query("SELECT * FROM users WHERE email='$seller' ");
while($all =$recup->fetch())
{
  $result[] = $all;
}

foreach ($result as $result) {

  $GLOBALS['isadmin'] =$isadmin=$result['isadmin'];

}
if($GLOBALS['isadmin']==1){
$display="";
$hide="";

}
else{

  $display="none";

}

$fn =$result['firstname'];
$ln =$result['lastname'];

 if(isset($_POST['download'])){
   $seller=$_SESSION['login_Email'];

   $day=$_POST['day'];
   $to=$_POST['to'];
   if($to==""){
     $to=date("Y-m-d");
   }

     $user="root";
     $pass="nas4";
     $host="localhost";
     $dbname="worckstation";
    $db=  mysqli_connect($host,$user,$pass,$dbname);

     $reports=' Date ;NetFare; Quted ;TKT Number; Airways; Observations ;Seller; Client' ."\n";
     $file='Report_of';
     $name= 'a';

  $sql="SELECT * FROM clients_sells WHERE user='$seller' and  Date>='$day' And  Date  <= '$to'ORDER BY Date  DESC";
           $result = mysqli_query($db,$sql);
     if($result==TRUE){
      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
     $reports.= $row['Date'] .';' .$row['NewFare'].';'. $row['Quted'] .';'.$row['Details'].';'.  $row['Airways']
     .';'.$row['Observations'] .';' .$row['Seller'] .';'.$row['client']."\n" ;
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

 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Repoorts</title>







  <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css">
	<script src="../vendor/jquery/jquery.js" ></script>
	<script src="../vendor/bootstrap/js/bootstrap.js" ></script>
   <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

<div class="topbar form">
  <div class="recherche_day"  style="position:absolute; left:100px; top:10px;text-align:center;">
    <form action="" method="post">


    <!--img class="" src="../images/calendar.png" style="display:inline-block;position:relative;left:12px;top:-3px;"-->
    <p style="position:relative;left:20px;display:inline-block;left: -5px;  font-size: 19px;">From</p>
    <input id="date" name="day" class="form-control" type="date"  style="width:147px;display:inline-block;font-size:15px;">
    <button type="submit" name="lope" class="btn btn-default" style="border:transparent;" >
    <img    class="lope" src="../images/lope.png" style="display:inline-block;border:transparent;">
  </button>


  </div>

  <div class="recherche_day"  style="position:absolute; right:15px; top:10px;text-align:center;">


    <!--img class="" src="../images/calendar.png" style="display:inline-block;position:relative;left:12px;top:-3px;"-->
    <p style="position:relative;left:20px;display:inline-block;left: -5px;  font-size: 19px;">To</p>
    <input id="date" name="to" class="form-control" type="date"  style="width:147px;display:inline-block;font-size:15px;">
  </button>


  </div>
<div>

  <div class="leftform" style="height: 65px;">
      <button style="border:transparent;background-color:white;  position: relative;top: 16px;" type="submit" name="download">
      <img src="../images/down.png" style=" height: 24px;" >
    </button>
    </form>

  </div></div>

<a href="../../index.php">
<img class="backimg" src="../images/back.png" style="position: absolute;left: 15px;top: 10px;">
</a>
  <img src="../images/add.png" style="
    top: -8px;
    position: relative;
"><h3 style="
    top: -68px;
    position: relative;
    left: 50px;
    font-size: 20px;
">All the Repports</h3>
<style >
  th{font-size: 14px;}
</style>
</div>
<div class="form min" style="width:1000px;">
  <table class="table table-hover" id="mytable">
    <thead class="" style="background-color:black;color:white;">
      <tr>

<th style="width:60px;display:<?php echo $display;?>;">confirm</th>

        <th style="width:100px;">Date</th>
        <th style="width:70px;">Seller</th>
        <th style="width:100px">Net Fare</th>
        <th style="width:100px">Quted</th>
        <th style="width:100px">TXT Number</th>
        <th style="width:100px">Airways</th>
        <th style="width:70px">Client</th>
        <th style="width:90px">file</th>

        <th style="width:104px">Option</th>

      </tr>
    </thead>
    <?php
    $db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');
    $result = array();
              if(isset($_POST['lope'] )     )  {
                $day=$_POST['day'];
                $to=$_POST['to'];
                if( $to=="" ){
                    $to= date("Y-m-d");
                }
                echo $day ;
                echo $to ;
                if($day==""){
                  if($GLOBALS['isadmin']==1 || $GLOBALS['isadmin']==2 ){
                    $sql="SELECT * FROM clients_sells  ORDER BY  Date DESC ";
                  }else{
                    $sql="SELECT * FROM clients_sells WHERE  User='$seller' ORDER BY Date  DESC ";
                  }
                        }
                  else {
                    if($GLOBALS['isadmin']==1 || $GLOBALS['isadmin']==2){
                      $sql="SELECT * FROM clients_sells WHERE  Date>='$day' And  Date <= '$to' ORDER BY  Date DESC";
                    }else{
                      $sql="SELECT * FROM clients_sells WHERE  Date >='$day' And  Date  <='$to'      and User='$seller'ORDER BY  Date DESC ";
                    }
                  }
              }
              else {
                                if($GLOBALS['isadmin']==1 || $GLOBALS['isadmin']==2){
                                      $sql="SELECT * FROM clients_sells ORDER BY  Date DESC ";
                                    }else{
                                      $sql="SELECT * FROM clients_sells WHERE  User='$seller'ORDER BY  Date DESC";
                                    }
         }



     $recup = $db->query($sql);

    while($all =$recup->fetch())
    {
      $result[] = $all;


    }

foreach ($result as $result) {


  if($result['confirme']=='0'   && $GLOBALS['isadmin']=='1'  ) {
    $color="#ccc";
    $hide="";


}


else  if($result['confirme']=='1'   && $GLOBALS['isadmin']=='1'  )
{
  $color="";
  $hide="";

}else {
  $color="";
  $hide="none";}
echo $hide;
  echo '
    <tbody>
    <form action="" method="post" enctype="multipart/form-data">

      <tr id="mytr" style="background-color:'.$color.'; ">
  <td style="display:'.$display.';"><input type="checkbox" value="1" id="checkbox'.$result['id'].'"  onclick="confirme('.$result['id'].') "  style="width:20px;"  ></td>
    <input name="id" id="name1'.$result['id'].'"     value="'.$result['id'].'"   style="display:none;">
    <td style="    font-size: 14px;">'.$result['Date'].'</td>
        <td style="font-size:14px;">'.$result['Seller'].'</td>
        <td><input  style="font-size:14px;"  id="NetFare'.$result['id'].'"  class="form-control" type="text" value="'.$result['NewFare'].'"  size="3" ></td>
        <td><input  style="font-size:14px;"  id="Quted'.$result['id'].'"  class="form-control" type="text" value="'.$result['Quted'].'"  size="3" ></td>
        <td><input  style="font-size:14px;"  id="TKTNumber'.$result['id'].'"  class="form-control" type="text" value="'.$result['Details'].'"  size="3" ></td>
        <td><input  style="font-size:14px;"  id="Airways'.$result['id'].'"  class="form-control" type="text" value="'.$result['Airways'].'"  size="3" ></td>
        <td style="font-size: 14px;width: 72px;">'.$result['client'].'</td>
        <td>
                 <img src="../images/file.png" alt="" onclick="file('.$result['id'].') " style="display:'.$hide.';" >
                 <input style="display:none" id="file-upload'.$result['id'].'"   name="fileToUpload" type="file"/>


                 <img  src="../photo/'.$result['pic'].'"  width="40px"  height="32px" onclick="window.open(this.src)" style="">


                     </td>
                  <td style="width:89px;" >

                <button type="buttuon"name="update"  class="btn btn-default" style="background-color:transparent;border:transparent;">
        <img  onclick="modifier('.$result['id'].')" class="img1"   style="margin-right:10;    top: -7px;
    position: relative;display:'.$hide.';" src="../images/edit_2.png">
        </button>

        <img  onclick="supprimer('.$result['id'].')" class="img2"    style="margin-right:;    top: -7px;
    position: relative;display:'.$hide.'; "  src="../images/delete.png">

        </form>
              </td>
            </tr>

    </tbody>
    '; } ?>

    </table>
</div>
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

<input  id="day"  type="text" value=<?php echo date("Y-m-d");  ?> style="display:none;" >

<input  id="email"  type="text" value=<?php echo $fn;  ?> style="display:none;" >

<input  id="user"  type="text" value=<?php echo $seller;  ?> style="display:none;" >


<div class="field-wrap smolinput">
  <label class="active">client</label>

  <select id="fld8" style="position: relative;top: 0px;left: 0px;width: 150px;height: 34px;border-radius: 0px;font-size:14px;" class="form-control">
    <?php
    $db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');
    $result = array();
    $recup = $db->query("SELECT client FROM clients  group by client");
    while($all =$recup->fetch())
    {
      $result[] = $all;
    }

foreach ($result as $result) {
echo '
<option id="client"  style="font-size:14px;" >   '.$result['client'].'</option>

';
}

?>

</select>

</div>

<div class="field-wrap smolinput">
  <label class="active">File / Save</label>

  <img src="../images/file.png" alt="" onclick="document.getElementById('file-upload').click()">
  <input style="display:none" id="file-upload"   name="fileToUpload" type="file"/>

</form>

         <button type="buttuon" name="update" onclick="insert()" class="btn btn-default" style="background-color:white;border:transparent;">
         <img    class="" src="../images/upload.png" style="display:inline-block;">
         </button>
       </div>




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

function file(id) {
//  document.getElementById('file-upload').click()

  var fileID='file-upload'+id;

  var file=document.getElementById(fileID).click()
}

  function supprimer(id) {
   var txt;

     var r = confirm("You want to Delete ?");
     if (r == true) {
       var r = event.target;
       console.log(id);
       var i = r.parentNode.parentNode.rowIndex;
      document.getElementById('mytable').deleteRow(i);
      $.post('delete.php',{id:id} ,function(recu){

      });

     } else {

     }
  }

  function modifier(id){

  var NetFareId='NetFare'+id;
  var QutedId='Quted'+id;
  var TKTNumberId='TKTNumber'+id;
  var AirwaysId='Airways'+id;

  var NetFare=document.getElementById(NetFareId).value;
  var Quted=document.getElementById(QutedId).value;
  var TKTNumber=document.getElementById(TKTNumberId).value;
  var Airways=document.getElementById(AirwaysId).value;

  var Airways=document.getElementById(AirwaysId).value;
var fileid='file-upload'+id;
var file=document.getElementById(fileid).value.split('\\').pop();



  $.post('modifier.php',{id:id,NetFare:NetFare,Quted:Quted,TKTNumber:TKTNumber,Airways:Airways,file:file},function(recu){
  });



  console.log(id  + NetFare + Quted + TKTNumber + Airways+file  );


  }

  function insert(){

 ///event.preventDefault();

    var day=document.getElementById("day").value;
    var NetFare1=document.getElementById("NetFare1").value;
   var Quted1=document.getElementById("Quted1").value;
    var TKTNumber1=document.getElementById("TKTNumber1").value;
    var Airways1=document.getElementById("Airways1").value;
    var seller=document.getElementById("email").value;

var user=document.getElementById("user").value;

    var file=$("#file-upload").val().split('\\').pop();

    var client=document.getElementById("fld8").value;

  console.log(  day +NetFare1+Quted1+TKTNumber1+Airways1+client+seller+file+user);


$.post('new.php',{day:day,NetFare1:NetFare1,Quted1:Quted1,TKTNumber1:TKTNumber1,Airways1:Airways1,seller:seller,client:client,file:file,user:user},function recu() {



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
  <?php



  if(    isset($_POST['update'])  || ( isset($_POST['upload']) &&   ($_POST['NetFare1']!="") &&  ($_POST['Quted1']!="") &&  ($_POST['TKTNumber1']!="") &&  ($_POST['Airways1']!="") ) ) {



  $target_dir = "../photo/";
  $name =  basename($_FILES["fileToUpload"]["name"]);
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if($name==""){
  echo' <script>alert("Put a file ");


  </script>';

  $uploadOk = 0;

}
  // Check file size



  // Allow certain file formats
else  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "JPEG"&& $imageFileType != "PNG"
  && $imageFileType != "JPG"&& $imageFileType != "GIF"&& $imageFileType != "PDF" && $imageFileType != "pdf"
  && $imageFileType != "gif" ) {
      echo' <script>alert("Sorry, only JPG, JPEG, PNG & GIF &PDF files are allowed");</script>';

      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo' <script>alert("Sorry, your file was not uploaded.");</script>';

  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo' <script>alert("Congratulation, your file has been uploaded..");</script>';


      } else {
          echo' <script>alert("Sorry, there was an error uploading your file.");</script>';

      }
  }
  }


  ?>
