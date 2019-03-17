<?php

      session_start();
      if(!isset($_SESSION['username']) ){  header("location:index.php");}
      require_once '../assets/php/DBHelper.php';
      $helper = new DBHelper;


if (isset($_POST['addphoto'])) {

    $helper -> UploadImage("file-upload" ) ;
}



 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin panel</title>
    <?php include 'nav.php';?>


  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-2">
          <div class="pills">
            <div class="mynav">
              <ul class="nav  nav-stacked">



<li><a class="" id="home" onclick="AdminPanelAjax('home')" > <span class="glyphicon glyphicon-home"></span> Home</a></li>
<li><a class="" id="card" onclick="AdminPanelAjax('card')"  ><span class="glyphicon glyphicon-credit-card"></span> Credit card  </span></a></li>
<li><a class="" id="article" onclick="AdminPanelAjax('article')" ><span class="glyphicon glyphicon-eye-close"></span> Article  </span></a></li>
<li><a class="" id="client" onclick="AdminPanelAjax('client')"><span class="glyphicon glyphicon-bell"></span> Clients </span></a></li>
<li><a class="" id="facture" onclick="AdminPanelAjax('facture')"><span class="glyphicon glyphicon-list-alt"></span> Factures  </span></a></li>
<li><a class="" id="admin" onclick="AdminPanelAjax('admin')" ><span class="glyphicon glyphicon-user"></span> Profil </span></a></li>
<li><a  id="Livraison" onclick="AdminPanelAjax('article')">  <span class="glyphicon glyphicon-cog"> </span> Livraison  </a></li>


            </div>

        </ul>
  </div>

  </div>



        <div class="col-md-10">

          <div class="col-md-8 col-md-offset-4">
            <img id="loading" src="../assets/pic/loadingGif01.gif" style="display:none;" >

          </div>



              <?php
/*

          if(isset($_POST['submit'])){
            $table = $_POST['value'];
            if ($table == "home") {
                require_once 'boxes.php';
                echo '<script>    document.getElementById("home").className ="active"; </script>';
            }else if ($table == "Livraison") {
        echo '<script>    document.getElementById("Livraison").className ="active"; </script>';
  $data = $helper->joinTables(['facture','client'],['facture.id,prix_total,date_ajout,username'],
                        ['facture.id_client','facture.Livraison'],
                        ['client.id','0']);
                       $helper -> SimpleTable($data);

            } else if ($table == "article") {
            echo '<script>    document.getElementById("article").className ="active"; </script>';
            echo'  <div id ="add" class="alert alert-success">
                <strong>Ajouter un element!</strong>
                    <button class="btn btn-sm btn-success" onclick="AddAdmin()">
                    <i class="glyphicon glyphicon-plus"></i>
                  </button>
                    </div>';
  $data = $helper -> GetData($table,['id','nom_article','prix_article','marque','categ','image'],[''],[''],'');
  $helper -> table($data);

                }else {
        echo '<script>    document.getElementById("'.$table.'").className ="active"; </script>';

          echo'  <div id ="add" class="alert alert-success">
              <strong>Ajouter un element!</strong>
                  <button class="btn btn-sm btn-success" onclick="AddAdmin()">
                  <i class="glyphicon glyphicon-plus"></i>
                </button>
                  </div>';
                        $data = $helper -> GetData($table,['*'],[''],[''],'');
                        $helper -> table($data);
                      }
              }else{
                      echo '<script>    document.getElementById("home").className ="active"; </script>';

                      require_once 'boxes.php';


                    }

      */      ?>














            </div>
            </div>
            </div>
          </div>

<script>



</script>
          <div class="modal fade" id="AddModal" role="dialog">
              <div class="modal-dialog modal-md">

                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button" >&times;</button>

                        <h4 class="modal-title">Modal Login</h4>
                    </div>
                    <div class="modal-body">



                    <?php

                    if($table == "article"){

            $data = $helper -> GetData($table,['id','nom_article','prix_article','image','marque','categ'],[''],[''],'');

                    }else {
                        $data = $helper -> GetData($table,['*'],[''],[''],'');
                    }

                    $helper -> modalsInputs($data); ?>

                    <div class="modal-footer">
                          <button style="width:100%" onclick="NewData()" type="button" class="btn btn-info"   >Ajouter</button>
                    </div>
                  </div>

                </div>

              </div>

          </div>

      </body>



</html>
