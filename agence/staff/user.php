<?php
//session_save_path("/index/users/web/b2161/ipg.alttullinescom/staff/logintmp/");
 session_start();
 $user="root";
 $pass="nas4";
 $host="localhost";
 $dbname="worckstation";
 $myemail=$_SESSION['login_Email'];

$db= new mysqli($host,$user,$pass,$dbname);
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
$chiled="";
$reports='';
if ($row["isadmin"]=='0'  ) {
header("location: ../index.php");
}

if(!isset($_GET['user'])){
header("location:admin.php");
}

$user=explode(" ",$_GET['user']);
  $sql = "SELECT *  FROM `users` WHERE `firstname`='". $user[0] ."' and `lastname` ='" .  $user[1]  . "'";
      $result = mysqli_query($db,$sql);
$info=mysqli_fetch_array($result,MYSQLI_ASSOC);
$isadmin=$info['isadmin'];

if(isset($_POST['msgsend'])){
	$user=explode(" ",$_GET['user']);
$sqlsend="UPDATE `users` SET `msg`='". base64_encode($_POST['message']) ."' WHERE `firstname`='". $user[0] ."' and `lastname` ='" .  $user[1]  . "'";
 $result = mysqli_query($db,$sqlsend);
}

#delete
if(isset($_POST['delete'])){
	$user=explode(" ",$_GET['user']);
$sqlsend="DELETE FROM `users`  WHERE `firstname`='". $user[0] ."' and `lastname` ='" .  $user[1]  . "'";
 $result = mysqli_query($db,$sqlsend);
 header("location: admin.php");
}
#admin
if(isset($_POST['admin'])){
	$user=explode(" ",$_GET['user']);
	if($isadmin=='1' ){
$sqlsend="UPDATE `users` SET isadmin=0 WHERE `firstname`='". $user[0] ."' and `lastname` ='" .  $user[1]  . "'";
$isadmin='0';
	}else{
	$sqlsend="UPDATE `users` SET isadmin=1 WHERE `firstname`='". $user[0] ."' and `lastname` ='" .  $user[1]  . "'";
	$isadmin='1';
	}
 $result = mysqli_query($db,$sqlsend);

}
if(isset($_POST['Subadmin'])){
	$user=explode(" ",$_GET['user']);
	if($isadmin=='2' ){
$sqlsend="UPDATE `users` SET isadmin=0 WHERE `firstname`='". $user[0] ."' and `lastname` ='" .  $user[1]  . "'";
$isadmin='0';
	}else{
	$sqlsend="UPDATE `users` SET isadmin=2 WHERE `firstname`='". $user[0] ."' and `lastname` ='" .  $user[1]  . "'";
	$isadmin='2';
	}
 $result = mysqli_query($db,$sqlsend);

}
#report
if(isset($_POST['report'])){
	$user=explode(" ",$_GET['user']);
 $name= $user[0];
     $time = strtotime($_POST['date']);
      $stratdate=date('Y-m-d',strtotime($_POST['datestart']));
     $dat = date('Y-m-d',$time);
	$reports='  <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>
    <script type="text/javascript">
   	function downloadrep(){
  		document.getElementById("content").innerHTML=' . "'" . '<object type="text/html" data="./downloadReports.php?command=user&name='. $name .'&date='.  $dat  .'&end='.  $stratdate  . '" style="height: 0;"></object>' . "'" . ';}
  		  </script>
  	<div id="content" style="position: fixed;left: -90000px"></div>
<div class="leftform" style="height: 65px;"><div><img onclick="downloadrep()" src="images/down.png" style=" height: 24px;"></div></div>
  <div class="form min">
	<a href="user.php?user=' .$_GET['user'] . '">
<img class="backimg" src="images/back.png" style="position: absolute;left: 15px;top: 5px;">
</a>
<div>
<ul class="myul">
  <li><a >Date</a></li>
  <li><a >Net Fare</a></li>
  <li><a >Quted</a></li>
  <li><a >TKT Number</a></li>
   <li><a >Airways</a></li>
  <li><a >=</a></li>
  <li><a >Seller</a></li>
  <li><a >Cash/Credit</a></li>
</ul>
</div>
<div>';
$user=explode(" ",$_GET['user']);
 $name= $user[0];
     $time = strtotime($_POST['date']);
     $stratdate=date('Y-m-d',strtotime($_POST['datestart']));
$dat = date('Y-m-d',$time);
$netres=0;
$qres=0;
$eqls=0;
echo $name ;
echo $dat ;
echo $stratdate ;


      $sql = "SELECT * FROM clients_sells WHERE Seller = '$name' And Date <= '$dat' And Date >= ' $stratdate' ORDER by Date DESC"  ;
      $result = mysqli_query($db,$sql);
if($result==TRUE){
  echo "true";
   while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      	$netres+=$row['NewFare'];
      	$qres+= $row['Quted'];
      	$eqls+=$row['Solde'];
 #$onlyInfo.=$row['Date'] .',' . $row['New Fare']. ','  . $row['Quted']. ','. $row['TKT Number']. ','. $row['Airways']. ','. $row['=']. ','. $row['Seller']. ','. $row['Cash/Credit']. ',row,';
$reports.='<ul class="myRow"><li><a>' .$row['Date'] . '</a></li><li><a >' . $row['NewFare']. '</a></li><li><a >' . $row['Quted'].  '</a></li><li><a >' . $row['Details']. '</a></li><li><a >' . $row['Airways'].'</a></li><li><a >' . $row['Others']. '</a></li><li><a>' . $row['Seller'].'</a></li><li><a >' . $row['client'].'</a></li></ul>';

      }
}else {
  echo "no true";
}
$reports .='
<ul class="myRow" style="background:#ee6161;"><li><a>/</a></li><li><a >' . $netres. '</a></li><li><a >' .	$qres.  '</a></li><li><a >/</a></li><li><a >/</a></li><li><a >' . $eqls . '</a></li><li><a>/</a></li><li><a >/</a></li></ul>
</div></div> </body></html>';
echo $reports;
exit();
}
 ?>
  <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div class="form" style="width: 615px;max-width: inherit;">
<a href="admin.php">
<img class="backimg" src="images/back.png" style="position: absolute;left: 10px;top: 7px;">
</a>
<button onclick="show2()" class="sbutton">
	 <img src= "images/kill.png">
	 <h3>Delete</h3>
</button>
 <button onclick="show3()" class="sbutton">
	 <img src="images/isadmin.png">
	 <h3>Admin</h3

</button>
<button onclick="show4()" class="sbutton">
  <img src="images/isadmin.png">
  <h3>Sub Admin</h3

</button>
	 <button onclick="rep()"  class="sbutton">
	 <img src="images/vrep.png">
	 <h3>Reports</h3>
</button>
 <button onclick="show()" class="sbutton">
	 <img src="images/contect.png">
<h3 style="left: 15px;">Message</h3>
</button>
  </div>

  <div class="form" id="message" style="display: none;">
<form method="post">
	<textarea name="message"></textarea>
	<p></p>
	<button class="sbutton" name="msgsend" style="
    position: absolute;
    bottom: 40px;
    left: 66%;
">Send</button>
</form>
<button class="sbutton" onclick="reph()" name="msgsend">Cencel</button>
  </div>

 <div class="form" id="vr" style="display: none;">
<form id="rep" method="post">
  <h3>From :</h3>
<input type="date" name="datestart">
    <h3>To :</h3>
<input type="date" name="date">
<p></p>
<button class="button button-block" name="report">View</button>
</form>
</div>

  <div class="form" id="Admin" style="display: none;width: 350px;">
<form method="post">
<?php
if($isadmin=='1'){
echo '<h3 style="color: red;"> This User Is an Admin Do You Want To Remove it from Admins ?</h3>'	;
}else {
echo '<h3 style="color: green;"> This User Is Not Admin Do You Want To Make it from An Admin ?</h3>'	;
}
 ?>

	<p></p>
	<button class="sbutton" name="admin">Yes</button>
</form>
<button class="sbutton" onclick="hid2()" style="
    left: 174px;
    top: 140px;
    position: absolute;
">No</button>
  </div>





  <div class="form" id="SubAdmin" style="display: none;width: 350px;">
<form method="post">
<?php
if($isadmin=='2'){
echo '<h3 style="color: red;"> This User Is an Sub Admin Do You Want To Remove it from SubAdmins ?</h3>'	;
}else {
echo '<h3 style="color: green;"> This User Is Not SubAdmin Do You Want To Make it from An SubAdmin ?</h3>'	;
}
 ?>

	<p></p>
	<button class="sbutton" name="Subadmin">Yes</button>
</form>
<button class="sbutton" onclick="hid2()" style="
    left: 174px;
    top: 140px;
    position: absolute;
">No</button>
  </div>





<div class="form" id="delete" style="display: none;width: 350px;">
<form method="post">
	<h3 style="color: red;"> Are you sure you want to delete this account ?</h3>
	<p></p>
	<button class="sbutton" name="delete">Delete</button>
</form>
<button class="sbutton" onclick="hid()" style="
    left: 174px;
    top: 119px;
    position: absolute;
">No</button>
  </div>
  <script type="text/javascript">
  	function show() {
  document.getElementById("message").style="display: block;"
  	}
  	  	function show2() {
  document.getElementById("delete").style="display: block;width: 350px;"
  	}
  	 	  	function hid() {
  document.getElementById("delete").style="display: none;width: 350px;"
  	}
 	  	function show3() {
  document.getElementById("Admin").style="display: block;width: 350px;"
  	}
    function show4() {
document.getElementById("SubAdmin").style="display: block;width: 350px;"
  }
  	  	 	  	function hid2() {
  document.getElementById("Admin").style="display: none;width: 350px;"
  	}

  	function rep(){
  		//vr
  	  document.getElementById("vr").style="display: block;"
  	}
  	 	function reph(){
  		//vr
  	  document.getElementById("vr").style="display: none;"
  	}

  </script>

</body>
</html>
