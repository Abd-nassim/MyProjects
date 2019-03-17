<?php
//session_save_path("/index/users/web/b2161/ipg.alttullinescom/staff/logintmp/");
 session_start();
 $user="root";
 $pass="nas4";
 $host="localhost";
 $dbname="worckstation";
 $db= new mysqli($host,$user,$pass,$dbname);
if ($db->connect_error) {
    die("Error 1"  );
}
if(!isset($_SESSION['login_Email'])){
header("location: ../index.php");
}
$myemail=$_SESSION['login_Email'];
 $sql = "SELECT * FROM users WHERE email = '$myemail' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$chiled="";
$reports='';
$fullreports='';
if ($row["isadmin"]!=='1') {
header("location: ../index.php");
}
if(isset($_POST['vard'])){
	   $time = strtotime($_POST['date']);
     $stratdate= date('Y-m-d',strtotime($_POST['datestart']));
     $dat = date('Y-m-d',$time);
if(empty($_POST['date'])){
$dat= date('Y-m-d',strtotime('2030-01-01'));
}
if(empty($_POST['datestart'])){
   $stratdate= date('Y-m-d',strtotime('1990-01-01'));
}
$commander='';
     if($_POST['user']=='all'){
   $sql = "SELECT * FROM clients_sells WHERE day <= '$dat' And day >= '$stratdate'" ;
   $commander='all';
}else{
  $n=$_POST['user'];
  $commander='user';
   $sql = "SELECT * FROM clients_sells WHERE Seller = '$n' And day <= '$dat' And day >= '$stratdate'" ;
}
      	$reports='
     	 <script type="text/javascript">
 	function downloadrepbydate(){
document.getElementById("content").innerHTML='. "'" . '<object type="text/html" data="./downloadReports.php?command=' . $commander . '&name=' .$_POST['user']  . '&date='.  $dat  .'&stratdate='. $stratdate.'" style="height: 0;"></object>' . "'" . ';
 	}
  function edit(){
    window.location="AdminEdit.php?edit=true&date=' .  $dat . '&datestart=' .  $stratdate  . '&user='. $_POST['user'] .'"
  }
 </script>
   <div id="content" style="position: fixed;left: -90000px"></div>

<div class="leftform" style="height: 150px;"><div><img onclick="downloadrepbydate()" src="images/down.png" style=" height: 24px;"></div>
<div><img onclick="edit()"  src="images/edit_2.png" style="height: 35px;"></div>
</div>
     	<div class="form min">
      <h3 style="top: 5px;position: absolute;margin: auto;left: 40%;">' . $stratdate  . " to " .  $dat . '</h3>
	<a href="../index.php">
<img class="backimg" src="images/back.png" style="position: absolute;left: 15px;top: 5px;">
</a>
<div>
<ul class="myul">
  <li ><a >Date</a></li>
  <li><a >Net Fare</a></li>
  <li><a >Quted</a></li>
  <li><a >TKT Number</a></li>
   <li><a >Airways</a></li>
  <li><a >=</a></li>
  <li style="width:190px;"><a >Seller</a></li>
  <li><a >Cash/Credit</a></li>
</ul>
</div>
<div>';
$netres=0;
$qres=0;
$eqls=0;
 $result = mysqli_query($db,$sql);
if($result==TRUE){

   while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      		$netres+=$row['New Fare'];
      	$qres+= $row['Quted'];
      	$eqls+=$row['='];
 #$onlyInfo.=$row['Date'] .',' . $row['New Fare']. ','  . $row['Quted']. ','. $row['TKT Number']. ','. $row['Airways']. ','. $row['=']. ','. $row['Seller']. ','. $row['Cash/Credit']. ',row,';
$reports.='<ul class="myRow"><li style="width:190px;"><a>' .$row['Date'] . '</a></li><li><a >' . $row['New Fare']. '</a></li><li><a >' . $row['Quted'].  '</a></li><li><a >' . $row['TKT Number']. '</a></li><li><a >' . $row['Airways'].'</a></li><li><a >' . $row['=']. '</a></li><li><a>' . $row['Seller'].'</a></li><li><a >' . $row['Cash/Credit'].'</a></li></ul>';

      }
}
$reports .='
<ul class="myRow" style="background:#ee6161;"><li><a>/</a></li><li><a >' . $netres. '</a></li><li><a >' .	$qres.  '</a></li><li><a >/</a></li><li><a >/</a></li><li><a >' . $eqls . '</a></li><li><a>/</a></li><li><a >/</a></li></ul>
</div></div>';
$fullreports='<div class="form results" ><ul><li ><a>Seller</a></li><li ><a>Total cash</a></li><li ><a>Total credit</a></li><li ><a>Total Amount</a></li></ul>';
 $sql = "SELECT * FROM users ";
$result = mysqli_query($db,$sql);
 while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  $cash=0;
  $crdit=0;
 $n=$row['firstname'] . " ". $row['lastname'];
   $mlsql = "SELECT * FROM sells WHERE name = '$n' And day <= '$dat' And day >= '$stratdate'" ;
$myresult = mysqli_query($db,$mlsql);
 while ($row = mysqli_fetch_array($myresult,MYSQLI_ASSOC)) {
if(strtolower($row['Cash/Credit'])=='cash'){
$cash+=$row['Quted'];
 }elseif (strtolower($row['Cash/Credit'])=='credit') {
  $crdit+=$row['Quted'];
 }
 }
$fullreports .='<ul><li ><a>'. $n .'</a></li><li ><a>'. $cash .'</a></li><li ><a>'. $crdit .'</a></li><li ><a>'. ($crdit + $cash)   . '</a></li></ul>';
}
$fullreports .="</div>";



}
if(isset($_POST['all'])){
	$reports='<div class="form min">
  <h3 style="top: 5px;position: absolute;margin: auto;left: 40%;">' . $stratdate  . " to " .  $dat . '</h3>
	<a href="../admin.php">
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
$netres=0;
$qres=0;
$eqls=0;

	     $sql = "SELECT * FROM sells" ;

      $result = mysqli_query($db,$sql);
if($result==TRUE){

   while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      		$netres+=$row['NewFare'];
      	$qres+= $row['Quted'];
      	$eqls+=$row['='];
 #$onlyInfo.=$row['Date'] .',' . $row['New Fare']. ','  . $row['Quted']. ','. $row['TKT Number']. ','. $row['Airways']. ','. $row['=']. ','. $row['Seller']. ','. $row['Cash/Credit']. ',row,';
$reports.='<ul class="myRow"><li><a>' .$row['Date'] . '</a></li><li><a >' . $row['NewFare']. '</a></li><li><a >' . $row['Quted'].  '</a></li><li><a >' . $row['TKTNumber']. '</a></li><li><a >' . $row['Airways'].'</a></li><li><a >' . $row['=']. '</a></li><li><a>' . $row['Seller'].'</a></li><li><a >' . $row['client'].'</a></li></ul>';

      }
}
$reports .='
<ul class="myRow" style="background:#ee6161;"><li><a>/</a></li><li><a >' . $netres. '</a></li><li><a >' .	$qres.  '</a></li><li><a >/</a></li><li><a >/</a></li><li><a >' . $eqls . '</a></li><li><a>/</a></li><li><a >/</a></li></ul>
</div></div>
';


}

$users='';
 $sql = "SELECT * FROM users ";
      $result = mysqli_query($db,$sql);
   while ( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  $users .=' <option value="'. $row['firstname'] ." " . $row['lastname']  .'">'. $row['firstname'] ." " . $row['lastname']  .'</option>';
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
<?php
if(empty($reports)){
	echo '<div class="form"><a href="../index.php">
<img class="backimg" src="images/back.png" style="position: absolute;left: 10px;top: 7px;">
</a><h3>Select User : </h3><select id="user">'.$users . '</select><button onclick="getuser()" class="mbutton">Setting</button>
<form method="post">
	<button name="all" class="mbutton" style="margin: auto;top: 95px;left: 35%;">View All Reports</button></form></div>';
}else {
echo $reports . $fullreports;
}

 ?>



  </body>
  <script type="text/javascript">
  	function getuser() {
var e = document.getElementById("user");
var strUser = e.options[e.selectedIndex].value;
window.open("./user.php?user=" + strUser ,"_self")
  	}
  </script>
  </html>
