
<?php
if(isset($_GET['logout']) && isset($_SESSION["username"])){
      session_destroy();
      header("location:index.php");
}
 ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/Admin.css">

<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/jshelper.js"></script>
<script src="../assets/js/code.js"></script>


<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Admin Panel</a>

      </div>

    <ul class="nav navbar-nav">



    </ul>



      <form  action="" method="post">

      <ul class="nav navbar-nav navbar-right">



          <li>  <a href="#" > <span class="glyphicon glyphicon-user"></span>
             <?php echo $_SESSION['username']; ?></a> </li>

          <li> <a href="?logout=logout" >  <span  class="glyphicon glyphicon-log-in"></span> Se Decconecté </a></li>
      </ul>
        </form>
    </div>



        </div>

</nav>
