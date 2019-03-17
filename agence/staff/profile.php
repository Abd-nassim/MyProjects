<?php
//session_save_path("/home/users/web/b2161/ipg.alttullinescom/staff/logintmp/");
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
$fn=$row['firstname'];
$ln=$row['lastname'];
$msg='';
$ok=' <form method="Post">
<button type="submit"  class="button button-block smolfont"/>ok</button>
</form>';
if (isset($_POST["UpdatePassword"])){
	$pass=mysqli_real_escape_string($db,$_POST['newp']);
	if(!empty($pass)){
$sql="UPDATE `users` SET `password`='". md5($pass) ."' WHERE `id`='". $row['id'] ."'";
$result = mysqli_query($db,$sql);
if (!$db->query($sql) === TRUE) {
	$msg='<h3 style="color:red;">Error while Updating your Password . </h3>';
	}else{
		$msg='<h3 style="color: green;">Your Have Successfully Updated your Password .</h3>';
	}

}else{
	$msg='<h3 style="color:red;">Please Enter Your New Password</h3>';
}
}
if(isset($_POST["UpdateEmail"])){
		$email=mysqli_real_escape_string($db,$_POST['newm']);
	if(!empty($email)){
      $sql = "SELECT id FROM users WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      if($count >= 1) {
$msg='<h3 style="color:red;">This Email Is Alrady in Use . </h3>';
      }else{
$sql="UPDATE `users` SET `email`='". $email ."' WHERE `id`='". $row['id'] ."'";
$result = mysqli_query($db,$sql);
if (!$db->query($sql) === TRUE) {
	$msg='<h3 style="color:red;">Error while Updating your Email . </h3>';
	}else{
		   $_SESSION['login_Email'] = $email;
$msg='<h3 style="color:green;">Your Have Successfully Updated your Email .</h3>';
}
}

}else{
	$msg='<h3 style="color:red;">Please Enter Your New Email</h3>';
}
}
 ?>
  <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>MyProfile</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body><div class="form">
         <?php
 if(empty($msg)) {
 	echo '<a href="index.php"><img   class="backimg" src="images/back.png" ></a><div class="pf">
									<img src="images/profile.svg">
								<h3 class="black">' . $fn ." " . $ln .'</h3>
								</div>
                                 <h3 style="color: gray;" > Edit Your New Email : </h3 >
						            <form method="Post">
						             <div class="field-wrap">
						              <label class="active">
						                Email<span class="req">*</span>
						              </label>
						              <input type="text" name="newm" required autocomplete="off" />
						            </div>
						               <button type="submit" name="UpdateEmail" class="button button-block smolfont"/>Update Email</button>
						               </form>
						               <p></p>
						                 <p></p>
						                   <h3 style="color: gray;" > Edit Your New Password : </h3 >
						                   <form method="Post">
							              <div class="field-wrap">
							              <label class="active">
							               Password<span class="req">*</span>
							              </label>
							              <input type="text" name="newp" required autocomplete="off"/>
							            </div>
                                       <button type="submit" name="UpdatePassword" class="button button-block smolfont"/>Update Password</button>
                                         </form>';
 }else {
 	echo $msg .$ok;
 }
 ?>

  </body></div>
  </html>
