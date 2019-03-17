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
header("location: ./index.php");
}
$myemail=$_SESSION['login_Email'];
 $sql = "SELECT * FROM users WHERE email = '$myemail' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if ($row["isadmin"]!=='1') {
header("location: ./index.php");
}

if(isset($_GET['command'])){
if ($_GET['command']=='all') {
$reports='Date,    New Fare   ,Quted   ,Tkt Number,   Airways,   Observations,  Seller  ,Cash/Credit'."\n";
$file='FullReports.CSV';
	 $sql = "SELECT * FROM clients_sells" ;
if(isset($_GET['date'])){
    $time = strtotime($_GET['date']);
     $stratdate= date('Y-m-d',strtotime($_GET['stratdate']));
     $dat = date('Y-m-d',$time);
     $sql = "SELECT * FROM clients_sells WHERE Date <= '$dat' And Date >= '$stratdate' ORDER by Date DESC" ;
     $file='FullReports_from_' . $stratdate. '_to_'. $dat  . '.CSV';
}
      $result = mysqli_query($db,$sql);
if($result==TRUE){
   while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
 #$onlyInfo.=$row['Date'] .',' . $row['New Fare']. ','  . $row['Quted']. ','. $row['TKT Number']. ','. $row['Airways']. ','. $row['=']. ','. $row['Seller']. ','. $row['Cash/Credit']. ',row,';
$reports.= $row['Date'] . ',' . $row['NewFare']. ',' . $row['Quted'].  ',' . $row['Details']. ',' . $row['Airways'].',' . $row['client']. ',' . $row['Seller'].',' . $row['Others']."\n";
      }
}else{
  echo "Error 19 : Plese Conect the Devloper .";
}

header('Content-Disposition: attachment; filename="'. $file .'');
header('Content-Type: text/plain'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
header('Content-Length: ' . strlen($reports));
header('Connection: close');
echo $reports;
}elseif ($_GET['command']=='user') {
	# code...
$reports='Date,Net Fare,Quted,TKT Number,Airways,Observations,Seller,Credit' ."\n";
$file='Report_of_'.$_GET['name'] .'_' . $_GET['date'];
 $name= $_GET['name'];
     $time = strtotime($_GET['date']);
     $stratdate= date('Y-m-d',strtotime($_GET['end']));
$dat = date('Y-m-d',$time);
  $sql = "SELECT * FROM clients_sells WHERE Seller='$name' And Date <= '$dat' And Date >= '$stratdate' ORDER by Date DESC"  ;
      $result = mysqli_query($db,$sql);
if($result==TRUE){
   while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
$reports.= $row['Date'] . ',' . $row['NewFare']. ',' . $row['Quted'].  ',' . $row['Details']. ',' . $row['Airways'].',' . $row['client']. ',' . $row['Seller'].',' . $row['Others']."\n";
      }
}
$file ='Report_of_'.$_GET['name'] .'_' . $_GET['date'] . '.CSV' ;
	header('Content-Disposition: attachment; filename="'. $file .'');
header('Content-Type: text/plain');
header('Content-Length: ' . strlen($reports));
header('Connection: close');
echo $reports;
}


}



 ?>
