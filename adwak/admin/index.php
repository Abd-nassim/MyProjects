<?php
//echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 16]);


require_once '../assets/php/helper.php';
$DB = $GLOBALS['DB'];
$helper = new DBHelper();






if(isset($_POST['loginbtn'])) {

    $username =  $_POST['username'];
    $password = $_POST['password'];
    echo $username;


    $data = $helper->GetData('admin',['*'],['nom'],[$username]);
    $row = mysqli_fetch_assoc($data);
    $result = password_verify($password , $row['password']);
    echo '
  <script>
    alert("'.$result.'");
      </script>
    ';

    echo $result;

    if ( $result == 1 ) {
    session_start();
    $_SESSION["id"] = $row['id'];
    $_SESSION["username"] = $row['username'];
    header("Location:home.php");

      }else{
            echo '
          <script>
            alert("connexion echoué , Veillez ressayer");
              </script>
            ';
      }


}
if(isset($_POST['Retour'])){
  echo "string";
  header("location:../index.php");




}


 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/pic/logo1.png" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' >
    <script src="../assets/js/code.js"></script>

    <title>admin panel</title>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 mx-auto">

        <h3>Veillez remplire le formulaire </h3>
      <form class="" action="" method="post">

          <div class="form-group">
            <label for="usr">Username:</label>
            <input type="text" name="username"  class="form-control" id="usr">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd">
          </div>
          <p>Vous avez oublier votre mot de passe ? <a href="#">cliquez ici! </a></p>
          <div class="form-group">
            <button class="btn btn-lg btn-info" type="submit" name="loginbtn">Login</button>
            <button class="btn btn-lg btn-danger" type="submit" name="Retour">Retour</button>

          </div>


        </form>



        </div>

      </div>

    </div>

      </body>
    </html>
    <style media="screen">
    .container-fluid{
      margin: auto;
      padding-top: 10%;
    }
    .btn{
      width: 210px;
    }
      body{
        color : white;
        background-color:#151425 ;
      }
      .alert{
        text-align: center;

      }



  </body>
</html>
