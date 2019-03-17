<?php
//session_save_path("/index/users/web/b2161/ipg.alttullinescom/staff/logintmp/");
 session_start();
 $user="root";
 $pass="nas4";
 $host="localhost";
 $dbname="worckstation";

$conn=  mysqli_connect($host,$user,$pass,$dbname);
if ($conn->connect_error) {
    die("Error 1"  );
}

if(isset($_SESSION['login_Email'])){
header("location:../index.php");
}
$fild="";
$Msg="";
if(isset($_POST['login'])){
      // username and password sent from form

      $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = md5(mysqli_real_escape_string($conn,$_POST['password']));

      $sql = "SELECT id FROM users WHERE email = '$myemail' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_Email'] = $myemail;
         header("location: ../index.php");
      }else {
         $fild = "Your Email or Password is invalid";
      }
   }

if(isset($_POST['create'])){
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$pass=md5(mysqli_real_escape_string($conn,$_POST['password']));
	$fn=mysqli_real_escape_string($conn,$_POST['fn']);
	$ln=mysqli_real_escape_string($conn,$_POST['ln']);
      $sql = "SELECT id FROM users WHERE email = '$email'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count >= 1) {
$Msg="Email is in use .";
      }else{
$sql = "INSERT INTO users
VALUES (NULL, '$email','$pass','0', '$fn','$ln','NULL','NULL','NULL')";

if (mysqli_query($conn,$sql)) {
    header("location:../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
      }

}
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up or Login</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/style.css">



</head>

<body>

  <div class="form">
      <ul class="tab-group" >
        <li class="tab" id="tab1"><a href="#signup">Sign Up</a></li>
        <li class="tab active" id="tab2"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
         <?php
if(empty($Msg)){
	echo "<h1>Sign Up for Free </h1>";
}else{
	echo '"<h1 style="color:red;">'. $Msg .'</h1>';
}

          ?>

          <form action="" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label class="active">
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="fn" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label class="active">
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="ln" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label class="active">
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label class="active">
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>

          <button type="submit" name="create" class="button button-block"/>Get Started</button>

          </form>

        </div>

        <div id="login">
        <?php
        if(empty($fild)){
echo "<h1>Welcome Back!</h1>";
        }else{
        	   echo  '<h1 style="color:red;">' .  $fild. '</h1>' ;
        }
        ?>


          <form action="" method="post">

            <div class="field-wrap">
            <label class="active">
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label class="active">
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>

          <p class="forgot"><a href="./password.php">Forgot Password?</a></p>

          <button name="login" class="button button-block"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

<?php
if(!empty($Msg)){
	echo '<script type="text/javascript">
document.getElementById("signup").style="display: block;";
document.getElementById("login").style="display: none;";
document.getElementById("tab1").className ="tab active";
document.getElementById("tab2").className ="tab";
</script>';
	}
 ?>

</body>
</html>
