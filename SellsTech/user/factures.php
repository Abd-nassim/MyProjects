<?php
session_start();
if(!isset($_SESSION['username']) ){  header("location:index.php");}
// echo $_SESSION["id_client"];

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../assets/js/code.js"></script>

    <meta charset="utf-8">
    <title>Mes Factures</title>
    <?php require 'nav.php';

   $cart = $GLOBALS['dbhelper']->joinTables(['cart','article'],['*'],['cart.id_article','cart.id_client','cart.etat'],
   ['article.id',$_SESSION['id_client'],'1']);



   $rowPrix = $GLOBALS['dbhelper']  -> statistic('SUM','cart','prix',['id_client','etat'],[$_SESSION["id_client"]
,'1']);
   $SUMprix = mysqli_fetch_row($rowPrix);


     ?>
  </head>
  <body>

      <div class="add">
          <h3> <i class="glyphicon glyphicon-shopping-cart"></i> Mes Factures /<?php echo $CountFactures['0']; ?></h3>
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
                        <th>date achat</th>
                        <th>quantité</th>

                        <th>prix</th>
  <input style="display:none" id="id_client" type="text" value=" <?php echo $_SESSION['id_client'];?>">

                      </tr>
                    </thead>
                    <tbody>
<?php

while ($rowcart = mysqli_fetch_assoc($cart)) {

  echo '  <tr>
        <td id="td-article"> <img id="img-article" src="../assets/pic/2.jpg" alt=""> </td>

        <td>'.$rowcart['nom_article'].'</td>
        <td>'.$rowcart['marque'].'</td>
        <td>'.$rowcart['date_update'].'</td>
        <td>'.$rowcart['nombre_article'].'</td>

        <td> '.$rowcart['prix'].'</td>
        </tr>
        '
        ;
      }


 ?>




              </tbody>
            </table>

                </div>
            </div>

            <div class="col-md-3 col-md-offset-8 ">
              <div class="total-price">

                      <h2 style="color:red">  TOTAL:<?php echo $SUMprix['0']; ?></h2>


                  </div>

            </div>

          </div>

        </div>




  </body>
  <footer>

    <?php include 'footer.html';?>


  </footer>
</html>
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
.modal-form{

   padding: 0px 30px 20px 20px;

}
label{

  padding: 10px 0px 10px 0px;
}
  #Paybtn{
    margin: 0px 30px 20px 30px;
  padding: 8px;
  width: 90%;
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

</style>
