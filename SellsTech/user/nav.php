<?php

      require '../assets/php/DBHelper.php';
      $GLOBALS['dbhelper']  = new DBHelper();




      if(isset($_POST['loginbtn'])) {
      $email =  $_POST['email'];
      $password = $_POST['password'];

      $data = $GLOBALS['dbhelper']->GetData('client',['*'],['email','password'],[$email,$password],'');
      $row = mysqli_fetch_assoc($data);

       if ( mysqli_num_rows($data) > 0) {


      $_SESSION["id_client"] = $row['id'];
      $_SESSION["email"] = $row['email'];
      $_SESSION["username"] = $row['username'];

    }else if (mysqli_num_rows($data) < 0) {
      $_SESSION["id_client"]= 0;

      echo '
      <script>
    alert("erreur de connxion ");

      </script>
          ';

  }

}


 if(isset($_GET['logout']) && isset($_SESSION["email"])){
       session_destroy();
       header("location:index.php");
      $_SESSION["id_client"]= 0;


 }

 //echo $_SESSION["id_client"];

  $rowCount = $GLOBALS['dbhelper']  -> statistic('COUNT','cart','id_article',['id_client','etat'],[$_SESSION["id_client"],'0']);
  $CountArticle = mysqli_fetch_row($rowCount);

  $rowFAc = $GLOBALS['dbhelper']  -> statistic('COUNT','cart','id_article',['id_client','etat'],[$_SESSION["id_client"],'1']);
  $CountFactures = mysqli_fetch_row($rowFAc);

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/User.css">

<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/code.js"></script>

<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Acueill</a>

      </div>

    <ul class="nav navbar-nav">

    <li class="dropdown" id="search_bar"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-th"></span> categories <span class="caret"> </span> </a>
      <ul class="dropdown-menu">

          <li> <a href="?categ=all">toutes categories</a> </li>
        <?php
        $categData = $GLOBALS['dbhelper']->GetData('article',['categ'],[''],[''],'group by categ ');
        while ($categRow =  mysqli_fetch_assoc($categData) ) {
    echo '    <li> <a href="?categ='.$categRow['categ'].'"> '.$categRow['categ'].' </a> </li> ';

          }
         ?>


      </ul>

      </li>


    </ul>

      <form class="navbar-form navbar-left" action="#" >
          <div class="input-group">
            <input size="60" id="search_bar" type="text" class="form-control" placeholder="Search" name="search">

            <div class="input-group-btn">
                <button  type="submit" id="search_bar" class="btn btn-default"    >
                    <i class="glyphicon glyphicon-search"></i>
                </button>

            </div>


          </div>
      </form>


      <ul class="nav navbar-nav navbar-right">
        <li>  <a href="panier.php">
          <span class="glyphicon glyphicon-shopping-cart"></span> MonPanier
          <?php echo $CountArticle['0']; ?></a> </li>
<?php


    if(isset($_SESSION["email"])){


    echo '
    <li> <a href="factures.php" > <span class="glyphicon glyphicon-duplicate"></span> Factures '.$CountFactures['0'].'</a></li>
      <li>  <a href="user.php" > <span class="glyphicon glyphicon-user"></span> '.$_SESSION["username"].'</a> </li>
    <li> <a href="?logout="logout" > <span class="glyphicon glyphicon-log-in"></span> Se Deconnecté </a></li>';
    }else {


    echo '
    <li>  <a href="../admin/index.php"> <span class="glyphicon glyphicon-cog"></span>Admin</a> </li>

    <li>  <a href="#" data-toggle="modal" data-target="#SignUpModal"> <span class="glyphicon glyphicon-user"></span> SignUp</a> </li>
    <li> <a href="#" data-toggle="modal" data-target="#LoginModal">  <span class="glyphicon glyphicon-log-in"></span> Login </a></li>';
    }


?>

      </ul>

    </div>


    <div class="modal fade" id="LoginModal" role="dialog">
        <div class="modal-dialog modal-sm">

<div class="modal-content">
        <div class="modal-header">
            <button class="close" data-dismiss="modal" type="button" >&times;</button>

            <h4 class="modal-title"> Login</h4>
        </div>
        <form  action="index.php" method="post">

      <div class="modal-body">
        <div class="modal-form">
        <div class="input-group">
          <span class="input-group-addon"> <i class="glyphicon glyphicon-envelope"></i> </span>
          <input  type="email" class="form-control" id="emailLogin" name="email" placeholder="Enter Email...">
        </div>
        </div>
        <div class="modal-form">
        <div class="input-group">
          <span class="input-group-addon"> <i class="glyphicon glyphicon-lock "></i> </span>
          <input  type="password" class="form-control" id="passwordLogin" name="password" placeholder="Enter password...">
        </div>
          </div>
            <input  id="loginbtn" name="loginbtn"  type="submit" class="btn btn-info" value="Login"></input>
      </div>
                  <div class="modal-footer">
                    <p>you  dont  have an acount ?
          <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#SignUpModal">SignUp here</a> </p>
                  </div>
              </div>
            </div>
          </form>

        </div>
<!------------------------------------------------------------------->
        <div class="modal fade" id="SignUpModal" role="dialog">
            <div class="modal-dialog modal-sm">

              <div class="modal-content">
                  <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button" >&times;</button>

                      <h4 class="modal-title"> SignUp</h4>
                  </div>
  <div class="modal-body">
    <div class="modal-form">
      <div class="input-group">
        <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i> </span>
        <input  type="Name" class="form-control" id="name" name="Name" placeholder="Enter Name...">
      </div>
      </div>
      <div class="modal-form">
        <div class="input-group">
          <span class="input-group-addon"> <i class="glyphicon glyphicon-envelope"></i> </span>
          <input  type="email" class="form-control" id="email" name="email" placeholder="Enter Email...">
        </div>
      </div>
      <div class="modal-form">
        <div class="input-group">
          <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i> </span>
          <input  type="password" class="form-control" id="password" name="password" placeholder="Enter password...">
        </div>
      </div>

      <div class="modal-form">
        <div class="input-group">
          <span class="input-group-addon"> <i class="glyphicon glyphicon-earphone"></i> </span>
          <input  type="text" class="form-control" id="numero" name="numero" placeholder="Enter numero...">
        </div>
      </div>

        <button id="loginbtn" onclick="signUp()" type="button " class="btn btn-info" data-dismiss="modal"  >SignUp</button>
  </div>


  <div class="modal-footer">
    <p>you already have an acount ? <a href="#" data-toggle="modal" data-target="#LoginModal"  data-dismiss="modal">Login here</a> </p>
  </div>
</div>

</div>

</div>

</nav>
