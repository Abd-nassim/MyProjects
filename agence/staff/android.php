<?php
$user="root";
$pass="nas4";
$host="localhost";
$dbname="worckstation";
$db= new mysqli($host,$user,$pass,$dbname);
if ($db->connect_error) {
    die("Error 1"  );
}

 if($_POST['type']=='1'){
  $sql="UPDATE `users` SET `canadd`='". date( 'Y-m-d') ."'";
$db->multi_query($sql);
 }
$dat= date('Y-m-d' );
$stratdate= date('Y-m-d');
$fullreports=array();
$sql = "SELECT * FROM users ";
$result = mysqli_query($db,$sql);

while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
 $cash=0;
 $crdit=0;
 $other=0;
 $byhand=0;
$n=$row['firstname'] . " ". $row['lastname'];
  $mlsql = "SELECT * FROM sells WHERE name = '$n' And day <= '$dat' And day >= '$stratdate'" ;
$myresult = mysqli_query($db,$mlsql);
while ($row = mysqli_fetch_array($myresult,MYSQLI_ASSOC)) {
if(strtolower($row['Cash/Credit'])=='cash'){
$cash+=$row['Quted'];
}else if (strtolower($row['Cash/Credit'])=='credit') {
 $crdit+=$row['Quted'];
 }else if (strtolower($row['Cash/Credit'])=='other') {
     $other+=$row['Quted'];
}else if (strtolower($row['Cash/Credit'])=='by thabet') {
   $byhand+=$row['Quted'];
}
}
array_push($fullreports,  array('name' => $n,'cash' => $cash ,'crdit' =>$crdit,'Other' => $other ,'By thabet' => $byhand ,'All' =>($crdit + $cash + $other+$byhand) ));
}
 echo json_encode(array('Admin' =>  $fullreports));
 ?>
