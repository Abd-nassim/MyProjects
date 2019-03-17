<?php require_once 'nav.php'; ?>
<body>


  <div class="container text-center" id="add-container">
      <h1>all our products</h1>
      <p>come and check our last reduction on the new prodcuts from real doctors</p>
  <div class="row m-1 ">




<?php
$b = 0;
while ($b <= 7){
 ?>
      <div  class="col-lg-2 mt-2 mb-3 pr-1 pl-1">
        <div class="card " >

            <img class="card-img-top "src="../assets/pic/1.jpg" alt=""
            data-toggle="tooltip" data-placement="top" title="more info!">

          <div class="card-body p-3 text-center">
              <strong> <p>real doctore</p></strong>
              <p>20$ </p>

              <?php
                $a=0;
              while ($a <= 5) { ?>
              <i class="fas fa-star"></i>
              <?php  $a = $a+1; }  ?>

    <button class="btn btn-danger btn-sm btn-block data-toggle="tooltip" data-placement="top" title="buy here!"
          data-toggle="modal" data-target="#myModal" " type="button" name="button">
              <i id="cart-icon" class="fas fa-shopping-cart fa-sm"></i>
              </button>
          </div>
        </div>
    </div>

<?php
$b = $b + 1;
}
 ?>
</div>

<div class="modal fade" id="myModal">
   <div class="modal-dialog modal-md">
     <div class="modal-content">

       <div class="modal-header">
         <h4 class="modal-title">Modal Heading</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

       <div class="modal-body pr-5 pl-5 mt-3 pb-1">

          <div class="form-group">
            <label class="ml-auto" for="nom ">Nom:</label>
            <input type="nom" class="form-control" id="nom">
          </div>

          <div class="form-group">
           <label for="prenom">Prenom:</label>
           <input type="prenom" class="form-control" id="prenom">
         </div>

         <div class="form-group">
          <label class="ml-auto" for="nom ">email:</label>
          <input type="email" class="form-control" id="email">
        </div>

          <div class="form-group">
           <label for="numero">numero:</label>
           <input type="numero" class="form-control" id="numero">
         </div>

         <div class="form-group">
         <label for="address">address:</label>
         <input type="address" class="form-control" id="address">
       </div>


          </div>
          <button type="button" class="btn btn-danger m-3 mt-0" data-dismiss="modal">Commander</button>


</div>
</div>
</div>
</div>




</body>
<style media="screen">

#add-container{
  margin-top: 4rem;
}
.text-center{
  display: block;
}
.card-img-top{
  width: 100%;
  height: 150px;
  border-top-left-radius: calc(.25rem - 1px);
  border-top-right-radius: calc(.25rem - 1px);
  box-shadow: 0 1px 0 0 hsla(220,7%,92%,.5)
}
.card{
  margin: 0 auto;
  cursor: pointer;

}.card:hover{

    background-color: #343a40;
    color: white;
    transform: scale(1.05);
}
p{
  padding: 0px;
  margin: 1px;
}
body{
  background-color: #a8a8a82b;
}
.fas.fa-star{
  color :orange;
}
#cart-icon{
  padding: 5px;
  width: 38px;
  color :white;
}
.modal{
  text-align: left;
}
</style>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
