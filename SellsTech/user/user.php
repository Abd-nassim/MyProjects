<?php
session_start();
if(!isset($_SESSION['email']) ){  header("location:index.php");
}


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>User</title>
    <?php require_once 'nav.php';?>

  </head>
  <body>




      <div class="container-fluid">
        <div class="row">



          <div class="info">


          <div class="col-md-10 col-md-offset-1 ">

            <h2 style="">My Informations </h2>
    <form class="" action="" method="post">



            <?php



        $data =   $GLOBALS['dbhelper'] -> GetData('client',['*'],['id'],[$_SESSION['id_client']],'');

          $GLOBALS['dbhelper'] -> table($data); ?>



        </form>




          </div>
          </div>
        </div>
        </div>

      </div>


  </body>


</html>

<style media="screen">
  .pills{
    border-right: solid 1px;
    border-color: #ccc;
    background-color: white;
    text-align: left;
    height: 100%;
    background-color: #151425;
    padding-bottom: 200px;

  }

  .nav-stacked>li.active>a{
    color:#777777;
    background-color:#a8a8a82b;
   }

  .nav-stacked>li>a:focus, .nav>li>a:hover{
    background-color:  white;
    color:black;
     }

     a{

       color : #777777;
      }

.nav-stacked>li>a{

  background-image: url("pic/right.svg");
  background-repeat: no-repeat;
  background-position: right ;
  background-size: 14px;
}




  body{
    background-color: white  ;
  }
  .col-md-2{
    padding-left: 2px;
  }
  .navbar-default{
   background-color: #151425;
  }   #search_bar{
       display: none;
     }
</style>
