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

if(isset($_SESSION['login_Email'])){
header("location: ./index.php");
}
$Msg="";
if(isset($_GET['rest']) && !empty($_GET['rest']) && !isset($_POST['restmypass'])){

	$code=mysqli_real_escape_string($db,$_GET['rest']);
      $sql = "SELECT * FROM users WHERE restpassword = '$code'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
$Msg='<form action="/password.php" method="post">
 <div class="field-wrap">
            <label class="active">Enter your
              New Password<span class="req">*</span>
            </label>
            <input type="password" name="newpass" required autocomplete="off"/>
            <input type="hidden" name="email" value="'. $row['email'] .'" />
            <input type="hidden" name="code" value="'. $code .'" />
          </div>
           <button name="restmypass" class="button button-block"/>Rest</button></form>';

      }else{
      	$Msg='<h1 style="color:red;">Invalid Code .<h1>';
      }
}elseif(isset($_POST['rest'])){
	$email=mysqli_real_escape_string($db,$_POST['email']);
      $sql = "SELECT id FROM users WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
$code=md5($_POST['email'] . rand());
$sql="UPDATE `users` SET `restpassword`='". $code ."' WHERE `id`='". $row['id'] ."'";
$result = mysqli_query($db,$sql);
$snd="To rest Your Password please click this link : \n " . "http://fo-ots.com/Website/password.php?rest=" . $code ;
     mail($email,"Rest Your Password",$snd);
$Msg='<h1 style="color:green;">We Sent an Email so you can rest your Password .<h1> '  ;
      }else{
      	$Msg='<h1 style="color:red;">Email Does Not Exist .</h1>
      <form action="" method="post">
           <button  class="button button-block"/>ReTry</button></form>';
      }

      }elseif (isset($_POST['restmypass'])) {
      $email=mysqli_real_escape_string($db,$_POST['email']);
      $code=mysqli_real_escape_string($db,$_POST['code']);
      $newpass=md5(mysqli_real_escape_string($db,$_POST['newpass']));

      $sql = "SELECT * FROM users WHERE email = '$email' And restpassword='$code'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
$sql="UPDATE `users` SET `restpassword`='',`password`='". $newpass ."' WHERE `id`='". $row['id'] ."'";
$result = mysqli_query($db,$sql);
	echo ' <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Rest Password</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="form">

	 <form action="/index.php" method="post">
	 <h1 style="color:greed;">You have Successfully Rest Your Password .<h1>
           <button  class="button button-block"/>Login</button></form>
  </div>
</body>
</html>
	';
	exit();
      }
	$Msg='<h1 style="color:red;">Invalid Rest Code .<h1>';
      }

 ?>
 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Rest Password</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/style.css">



</head>
<body>
  <div class="form">
<?php
if(empty($Msg)){
echo '<form action="" method="post">
 <div class="field-wrap">
            <label class="active">Enter your
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
           <button name="rest" class="button button-block"/>Rest</button></form>';
}else{
echo $Msg;
}
 ?>


  </div>
</body>
</html>
