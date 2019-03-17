<?php
require_once '../assets/php/DBHelper.php';
$helper = new DBHelper;

$argentTotalRow = $helper  -> statistic('SUM','cart','prix',['etat'],['1']);
$argentTotal = mysqli_fetch_row($argentTotalRow);

$ArticlesVendusRow = $helper  -> statistic('COUNT','cart','id',['etat'],['1']);
$ArticlesVendus = mysqli_fetch_row($ArticlesVendusRow);

$StockRow = $helper  -> statistic('COUNT','article','id',['vendus'],['0']);
$Stock = mysqli_fetch_row($StockRow);

$LivraisonRow = $helper  -> statistic('COUNT','cart','id',['etat'],['1']);
$Livraison = mysqli_fetch_row($LivraisonRow);




 ?>
<div class="info">
<div class="col-md-12  ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="info-box">
          <div class="img-box">
              <img  src="../assets/pic/stock.svg" >
          </div>
          <div class="text-box">
            Stock : <?php echo $Stock[0];?>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="info-box">
          <div class="img-box">
              <img  src="../assets/pic/messages.svg" >
          </div>

          <div class="text-box">
             Laivrison : <?php echo $Livraison[0]; ?>
          </div>



        </div>
      </div>

      <div class="col-md-3">
        <div class="info-box">
          <div class="img-box">
              <img  src="../assets/pic/sale.svg" >
          </div>
          <div class="text-box">
            Argent : <?php echo $argentTotal[0]; ?>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="info-box">
          <div class="img-box">
              <img  src="../assets/pic/sales.svg" >
          </div>

          <div class="text-box">
             Vendus :<?php echo $ArticlesVendus[0] ;?>
          </div>



        </div>
      </div>
    </div>

  </div>
</div>
</div>
