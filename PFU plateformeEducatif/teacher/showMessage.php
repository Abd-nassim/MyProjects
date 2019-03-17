<?php 
	
	include('../connect.php');
	session_start();

	$matricule=$_SESSION['matricule'];

	$id_message=$_GET['id_message'];

		$sql="select * from reclam 
		  where id_reclam='$id_message' ";

	$result=mysqli_query($connect,$sql);
	$message=mysqli_fetch_array($result);

	$_SESSION['matt_etu']=$message[1];
	$_SESSION['id_module']=$message[2];

	echo " <div id='iner_message' style='color:#333;' > $message[4] </div> 
			<textarea style='resize:none;' name='reclame_text' id='reclame_text' cols='21' rows='3' placeholder='type your reply here...' ></textarea>
			<input class='messages_top'  type='button' value='reply' onclick='sendMessage()' /> ";


	if($message[5]=="S")
		mysqli_query($connect,"update reclam set view='s' where id_reclam='$id_message' ");
	
	
	
 ?>
