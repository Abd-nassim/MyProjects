<?php

      require '../assets/php/DBHelper.php';
      $GLOBALS['dbhelper']  = new DBHelper();
      if(isset($_POST['loginbtn'])) {
      $username =  $_POST['username'];
      $password = $_POST['password'];

     $data = $GLOBALS['dbhelper']->GetData('admin',['*'],['username','password'],[$username,$password]);
      if ( mysqli_num_rows($data) > 0 ) {
      $row = mysqli_fetch_assoc($data);
      session_start();
      $_SESSION["id"] = $row['id'];
      $_SESSION["username"] = $row['username'];
      header("location:home.php");
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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">

    <h3>Veillez remplire le formulaire </h3>
  <form class="" action="index.php" method="post">

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
    background-color: #151425;
  }
  .alert{
    text-align: center;

  }
</style>
