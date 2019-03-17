<?php
session_start();


if(!isset($_SESSION["id_client"]) ){
   $_SESSION["id_client"] = 0;
}
//echo $_SESSION["id_client"];


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../assets/js/code.js"></script>

    <meta charset="utf-8">
    <title>Mon Panier</title>
    <?php require 'nav.php';





   $cart = $GLOBALS['dbhelper']->joinTables(['cart','article'],['*'],['cart.id_article','cart.id_client','cart.etat'],
   ['article.id',$_SESSION["id_client"] ,'0']);

   $rowCount = $GLOBALS['dbhelper']  -> statistic('COUNT','cart','id_article',['id_client','etat'],[$_SESSION["id_client"],'0']);
   $CountArticle = mysqli_fetch_row($rowCount);
   $rowPrix = $GLOBALS['dbhelper']  -> statistic('SUM','cart','prix',['id_client','etat'],[$_SESSION["id_client"],'0']);
   $SUMprix = mysqli_fetch_row($rowPrix);


     ?>
  </head>
  <body>

      <div class="add">
          <h3> <i class="glyphicon glyphicon-shopping-cart"></i> Panier /<?php echo $CountArticle['0']; ?></h3>
      </div>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10 col-md-offset-1  ">
                <div class="article">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>article</th>
                        <th>nom article</th>
                        <th>marque</th>
                        <th>data ajout</th>
                        <th>prix</th>
                        <th>quantité</th>
                        <th>supprimé</th>
                        <th>classement</th>

  <input style="display:none" id="id_client" type="text" value=" <?php echo $_SESSION["id_client"];?>">

                      </tr>
                    </thead>
                    <tbody>
<?php

while ($rowcart = mysqli_fetch_assoc($cart)) {

  echo '  <tr>
        <td id="td-article"> <img id="img-article" src="../assets/pic/'.$rowcart['image'].'" alt=""> </td>

        <td>'.$rowcart['nom_article'].'</td>
        <td>'.$rowcart['marque'].'</td>
        <td>'.$rowcart['date_ajout'].'</td>
        <td>'.$rowcart['prix_article'].'</td>

        <td>
            <div class="inline-block">
           <input id="number'.$rowcart['id'].'" style="width:59px;"  class="form-control" type="number" name="number" value="'.$rowcart['nombre_article'].'" >
            <button class="btn btn-default" onclick="NbrPanier('.$rowcart['id'].')" >

          <i class="glyphicon glyphicon-plus"></i>
        </button>
        </div>
        </td>

        <td>
          <button class="btn btn-default" onclick="deleteCart('.$rowcart['id'].')">
          <i class="glyphicon glyphicon-remove"></i>
        </button>
        </td>

        <td>
            ';

    for ($i=0; $i < $rowcart['ratecart'] ; $i++) {
    echo ' <span id="rate'.$i.'" onclick="rate('.$i.','.$rowcart['id_article'].')" class="fa fa-star checked " ></span>';

  }for ($j=$rowcart['ratecart']+1; $j <=5 ; $j++) {
    echo ' <span id="rate'.$j.'" onclick="rate('.$j.','.$rowcart['id_article'].')" class="fa fa-star  " ></span>';
  }
            echo '


        </td>


        <input style="display:none" id="prixUnitaire'.$rowcart['id'].'" type="text" value="'.$rowcart['prix_article'].'">
        </tr>
        '
        ;
      }


 ?>




              </tbody>
            </table>

                </div>
            </div>

            <div class="col-md-2 col-md-offset-9 ">
              <div class="total-price">

                      <h3> TOTAL:<?php echo $SUMprix['0']; ?></h3>

    <button id="payementbtn" onclick="checkPay( <?php echo $_SESSION["id_client"]; ?> )"
                       class="btn btn-danger btn-lg" >
                        PAYER
                    </button>
                  </div>

            </div>

          </div>

        </div>


        <div class="modal fade" id="PayModal" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Payement Types:

                <img id="img-card" src="../assets/pic/mastercard.png" alt="">
                <img id="img-card" src="../assets/pic/paypal.png" alt="">
                <img id="img-card" src="../assets/pic/visa.png" alt="">
                <img id="img-card" src="../assets/pic/western.png" alt="">



              </h4>

              </div>

              <div class="modal-body">
                <div class="modal-form-panier">

<form class="" action="" method="post">

  <input  style="display:none" id="today" value=" <?php echo date("Y-m-d"); ?> " >
  <input  style="display:none" id="id_client" value=" <?php echo $_SESSION["id_client"]; ?> " >
  <input  style="display:none" id="sum" value=" <?php echo $SUMprix['0']; ?> " >

              <label for=""> Nom de la carte </label>
              <input type="text" class="form-control" id="nom_carte" placeholder="Nom de la carte..." nom="nom_carte" required  >
              <label for=""> Numero de la carte </label>
              <input type ="number"class="form-control" id="numero_carte" value="" placeholder="Numero de la carte..." required>
              <div class="row">
              <div class="col-md-6">
              <label for=""> CVC </label>
              <input type="text"class="form-control" id="cvc" value="" placeholder="ex.311" required>
              </div>
              <div class="col-md-6">
              <label for=""> Date dexpiration </label>
              <input type="date" class="form-control" id="date_expiration" value="" placeholder="text..." required>
              </div>
              </div>
              </div>
            </div>


            <input  id="Paybtn" onclick="payement()" name="Paybtn" value="Confirm" class="btn btn-info" >
</form>
            </div>
  </div>

        </div>




  </body>
  <footer>

    <?php include 'footer.html';?>


  </footer>
</html>


 ?>
 <style media="screen">
   table{
     background-color: white;
     color: #29303b;
   }
   .add{
       background-color:white ;
       color: black;
       font-size: 20px;
       padding-left: 15px;

       text-align: left;
       margin-bottom: 20px;
     }

   #img-article{
     max-width: 130px;
     height: 60px;
   }
   .inline-block{

     display:flex;
   }
   .total-price{
       position: static;
       background-color: white;
       padding: 2px;


   }

   body{
     color: ;
     background-color: white;
   }
   #td-article{
     width:100px;
   }
   #number{
     width: 59px;
   }
   tbody{



   }

   .list{
     padding-top: 0px;

   }
   .article{

         padding-top: 20spx;
   }
   #confirm-btn{
     width: 100%;
   }
 .modal-form-panier{

    padding: 0px 30px 20px 20px;

 }
 label{

   padding: 10px 0px 10px 0px;
 }
   #payementbtn{
     padding: 8px;
     width: 190px;
   }
   #img-card{

     max-width:60px;
     max-height: 38px;
   }
   thead{
     color: white;
     background-color :black ;


   }
   #search_bar{
     display: none;
   }
   .checked{
     color: orange;

   }


 </style>
