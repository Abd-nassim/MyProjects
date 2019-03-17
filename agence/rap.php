<?php
session_start();
$user="root";
$pass="nas4";
$host="localhost";
$dbname="worckstation";
$db= new mysqli($host,$user,$pass,$dbname);
if ($db->connect_error) {
   die("Error 1"  );
}
$reports='Date,Net Fare,Quted,TKT Number,Airways,Observations,Seller,Credit' ."\n";
$file='Report_of';
$name= 'a';
$sql = "SELECT * FROM clients_sells "  ;
    $result = mysqli_query($db,$sql);
if($result==TRUE){
 while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
$reports.= $row['Date'] . ',' . $row['NewFare']. ',' . $row['Quted'].  ',' . $row['Details']. ','
. $row['Airways'].',' . $row['client']. ',' . $row['Seller'].',' . $row['Others']."\n";
    }
}
$file ='Report_of.CSV' ;
header('Content-Disposition: attachment; filename="'. $file .'');
header('Content-Type: text/plain');
header('Content-Length: ' . strlen($reports));
header('Connection: close');
echo $reports;

?>
