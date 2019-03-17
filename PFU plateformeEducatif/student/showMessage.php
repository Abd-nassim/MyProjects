<?php 
	
	include('../connect.php');
	session_start();

	$matt_etu=$_SESSION['matt_etu'];

	$id_message=$_GET['id_message'];

		$sql="select * from reclam 
		  where id_reclam='$id_message' ";

	$result=mysqli_query($connect,$sql);
	$message=mysqli_fetch_array($result);

	echo " <div id='iner_message' > $message[4] </div> ";

	  if($message[5]=="T")
		mysqli_query($connect,"update reclam set view='t' where id_reclam='$id_message'");
	
	
	
 ?>
