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
$myemail=$_SESSION['login_Email'];
 $sql = "SELECT * FROM users WHERE email = '$myemail' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      	if($row['canadd']==date( 'Y-m-d')){
echo '<html><head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div class="form" style="width: 385px;padding: 14px 45px;"><h3 style="
    color: red;
">You can not Add more tabels for tody </h3>
<form action="index.php">
<button name="login" class="button button-block">Go Home</button> </form> </div>
  </body></html>';
exit();
     }

$fn=$row['firstname'];
$ln=$row['lastname'];
$name=$fn .' '. $ln;

if(isset($_POST['save'])){
	if($row['canadd']==date( 'Y-m-d')){
echo '<html><head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div class="form" style="width: 385px;padding: 14px 45px;"><h3 style="
    color: red;
">You can not Add more tabels for tody </h3>
<form action="index.php">
<button name="login" class="button button-block">Go Home</button> </form> </div>
  </body></html>';
exit();
	}else{
		$rows =explode(",row,",$_POST['tabel']);
		foreach ($rows as $value) {
			if(!empty($value))
    $cells =explode(",",str_replace(",row","",$value));
  $sql ="INSERT INTO sells( 'name', 'day', 'Date', 'New Fare', 'Quted', 'TKT Number', 'Airways', '=', 'Seller', 'client') VALUES ('".$fn ." " . $ln ."','".date('Y-m-d')."','". $cells[0] ."','". $cells[1] ."','". $cells[2]."','". $cells[3] ."','". $cells[4] ."','".  $cells[5] ."','". $cells[6] ."','".  $cells[7]."')";
if ($db->multi_query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$sql="UPDATE `users` SET `canadd`='". date( 'Y-m-d') ."' WHERE `id`='". $row['id'] ."'";
$result = mysqli_query($db,$sql);
echo '<html><head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div class="form" style="width: 385px;padding: 14px 45px;"><h3 style="
    color: green;
">Your Report Sent Successfully You Can Edit this Report to 12:00PM UTC </h3>
<form action="index.php">
<button name="login" class="button button-block">Go Home</button> </form> </div>
  </body></html>';
   $sql = "SELECT * FROM users WHERE isadmin =0";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $count = mysqli_num_rows($result);
     $td=date( 'Y-m-d');
     $sql = "SELECT * FROM users WHERE isadmin =0 and canadd= '$td' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $count1 = mysqli_num_rows($result);
      	if($count==$count1){
          $fuul=0;
$dat=date('Y-m-d');
 $sql = "SELECT * FROM sells WHERE day ='$dat'";
      $result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
$fuul +=$row['='];
}

 $sql = "SELECT * FROM users WHERE isadmin =1";
      $result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

  $to = $row['email'];
$subject = 'Report For Sells';
$headers = "From: ReportForSells@fo-ots.com \r\n";
$headers .= "Reply-To: ReportForSells@fo-ots.com\r\n";
$headers .= "CC: ReportForSells@fo-ots.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message .= '  <div style="background: #474444;
    width: 320px;
    padding: 10px;
    border-radius: 10px;
    margin: auto;
    border: 6px solid #d77e7e;
">
    <h3 style="
    margin: auto;
    padding-top: 10px;
    color: #fff;
    font-family: sans-serif;
">Full Total Count for ' . date('Y-m-d')  .' is :
    </h3>
    <h1 style="
    font-family: sans-serif;
    color: #ffffff;
    left: 38%;
    position: relative;
">' . $fuul .
      '</h1>
  </div>';
 mail($to, $subject, $message, $headers);
}
      	}
exit();
}
}
 ?>
 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>New</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

<div class="topbar form">
<a href="index.php">
<img class="backimg" src="images/back.png" style="position: absolute;left: 15px;top: 10px;">
</a>
  <img src="/images/add.png" style="
    top: 10px;
    position: relative;
"><h3><a href="/new.php" style="
    top: -40px;
    position: relative;
    left: 50px;
">Create New Sell Report</a></h3></div>








<form id="myform" method="post"><input type="hidden" name="tabel" id="sender" value=""><input type="hidden" name="save"></form>
<div class="leftform">
<div>
	<img  onmouseenter="playone('one','one2')" onmouseleave="playoff('one','one2')" src="images/delete.png" onclick="killrow()">
	<a id="one" class="pup">
	<div></div>
  </a>
  <h4  id="one2" class="txt">Delete Last row In  Tabel</h4>
</div>


<div>
	 <img onmouseenter="playone('th','th2')" onmouseleave="playoff('th','th2')" onclick="send()" src="images/save.png">
    <a id="th" class="pup">
	<div></div>
  </a>
  <h4  id="th2" class="txt">Save Tabel Data to Server</h4>
    </div>




  <div>
    <img onmouseenter="playone('f','f2')" onmouseleave="playoff('f','f2')" onclick="Clear()" src="images/rest.png">
  <a id="f" class="pup">
	<div></div>
  </a>
  <h4  id="f2" class="txt">Clear All Data in This Tabel  </h4>
</div>

</div>
<div class="form min">
<div>
<ul class="myul">
  <li><a >Date</a></li>
  <li><a >Net Fare</a></li>
  <li><a >Quted</a></li>
  <li><a >TKT Number</a></li>
   <li><a >Airways</a></li>
  <li><a >=</a></li>
  <li><a >Seller</a></li>
  <li><a >Client</a></li>
</ul>
</div>
<div id="contaner">


</div>
</div>
<div class="form min" style="height: 120px;">
<input id="fld1" onkeypress="add(event)" value=<?php echo date("Y-m-d");  ?> type="hidden" />
   <div class="field-wrap smolinput">
     <label class="active">	&nbsp;	&nbsp;	&nbsp;Net Fare</label>
     <input id="fld2" onchange="counter()" onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput">
     <label class="active">	&nbsp;	&nbsp;	&nbsp;Quted</label>
     <input id="fld3" onchange="counter()" onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput">
     <label class="active">	&nbsp;	&nbsp;	&nbsp;TKT Number</label>
     <input id="fld4"  onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput">
     <label class="active">	&nbsp;	&nbsp;	&nbsp;Airways</label>
     <input id="fld5" onkeypress="add(event)" type="text" /></div>

<input id="fld6" onkeypress="add(event)" type="hidden" />
 <input id="fld7" onkeypress="add(event)" value=<?php echo '"' . $name .'"';  ?> type="hidden" />

   <div class="field-wrap smolinput">

     <label class="active">	&nbsp;	&nbsp;	&nbsp;client</label>

     <select id="fld8" style="width: 49%;position: relative;top: 0px;left: 0px;width: 100%;height: 40px;border-radius: 0px;">
       <?php

       $db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

       $result = array();

       $recup = $db->query("SELECT * FROM clients ");

       while($all =$recup->fetch())
       {
         $result[] = $all;
       }

   foreach ($result as $result) {
echo '
<option value="Cash">'.$result['name'].'</option>

';
   }

   ?>

</select></div>

</div>

  <script type="text/javascript">
  var lastrow ='';
  var contaner ='';
  var onlyInfo=[] ;
function add(e){
if (e.keyCode == 13) {
var f1 = document.getElementById("fld1").value;
var f2 = document.getElementById("fld2").value;
var f3 = document.getElementById("fld3").value;
var f4 = document.getElementById("fld4").value;
var f5 = document.getElementById("fld5").value;
var f6 = f3-f2;
var f7 = document.getElementById("fld7").value;
var f8 = document.getElementById("fld8").value;
onlyInfo.push([f1 ,f2,f3,f4,f5,f6,f7,f8,"row"]);
lastrow='<ul class="myRow"><li><a>' + f1 + '</a></li><li><a >' + f2 + '</a></li><li><a >' + f3 + '</a></li><li><a >' + f4 + '</a></li><li><a >' + f5 + '</a></li><li><a >' + f6 + '</a></li><li><a>' + f7 + '</a></li><li><a >' + f8 + '</a></li></ul>';
contaner = contaner + lastrow;
document.getElementById("contaner").innerHTML= contaner;
document.getElementById("sender").value= onlyInfo;
 }
}
function counter(){
	var f2 = document.getElementById("fld2").value;
var f3 = document.getElementById("fld3").value;
 document.getElementById("fld6").value=f3-f2;

}
function killrow(){
	contaner =contaner.replace(lastrow,"");
	onlyInfo.splice(onlyInfo.length-1,1);
document.getElementById("contaner").innerHTML= contaner;
var prts=onlyInfo[onlyInfo.length-1];
lastrow='<ul class="myRow"><li><a>' + prts[0] + '</a></li><li><a >' + prts[1]  + '</a></li><li><a >' + prts[2]  + '</a></li><li><a >' + prts[3]  + '</a></li><li><a >' + prts[4]  + '</a></li><li><a >' + prts[5]  + '</a></li><li><a>' + prts[6]  + '</a></li><li><a >' + prts[7]  + '</a></li></ul>';
document.getElementById("sender").value= onlyInfo;
}
function Clear(){
	onlyInfo=[] ;
	contaner='';
	document.getElementById("contaner").innerHTML= contaner;
	document.getElementById("sender").value= onlyInfo;

}
function send(){
	if(onlyInfo.length>0){
			document.getElementById("myform").submit();
		}
}

  var isOut =false;
  function playone(str,str2) {
		  	isOut =true;
		 document.getElementById(str).className="pup ply";
		 document.getElementById(str2).className="txt textAnim";
       }
  	  	function playoff(str,str2) {
  	  		if(isOut==true){
 document.getElementById(str).className="pup retuern";
 document.getElementById(str2).className="txt textretuern";
  isOut =false;
  	}}
  </script>
  </body>
  </html>
