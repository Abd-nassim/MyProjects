<?php
session_start();


if(!isset($_SESSION["email"]) ){
   $_SESSION["id_client"] = 0;
}

//echo $_SESSION["id_client"];

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BayAll</title>
    <?php require 'nav.php';?>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="row-xl-12">
            <div class="image-add">

              <p id="big">Check Our Exlucsive Sells of the week</p>
              <h3 id="small">Check Our Exlucsive Sells of the week all prices are with only 50$</h3>
      </div>
      </div>
    </div>
  </div>
    <?php require 'body.php';?>
  </body>
  <footer>
    <?php require 'footer.html';?>
  </footer>
</html>
<style media="screen">
    .card{
      margin-top:20px;
      background-color: white;
      border: 1px solid;
    }
    .img-responsive {
      width:100%;
      height: 108px;
    }

    .card-body{
      padding-bottom: 5px;

    }


    .checked {
        color: orange;
    }

    #Panierbtn{


    }
    .image-add{
    font-size: 30px;
    font-weight: 600;
    color: white;
    padding: 80px 80px 80px 20px;
    background-image: url("../assets/pic/add1.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100%;
    height: 100%;
    }


</style>
