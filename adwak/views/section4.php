<!-- Products !-->

<div id="section4" class="container1 pt-5 pb-2" >
  <h3>Products</h3>
  <h4>les produit les plus vendus </h4>
  <div class="container pr-5 pl-5">


  <div class="row p-3">


          <div  class="col-lg-4 mt-2 mb-3 pr-2 pl-2">
            <div class="card " >

              <div class=" d-flex justify-content-center">
                <div class="middle pt-5 mt-4">


                <button class="btn btn-info " type="button" name="button">
                    Plus dinformation
                    </button>
                </div>
              </div>
                <img class="card-img-top "src="../assets/pic/miek.jpeg" alt=""
                data-toggle="tooltip" data-placement="top" title="more info!">

              <div class="card-body p-3 text-center">
                  <strong> <p>real doctore</p></strong>
                  <p>20$ </p>

                  <?php
                    $a=0;
                  while ($a <= 5) { ?>
                  <i class="fas fa-star"></i>
                  <?php  $a = $a+1; }  ?>

        <button class="btn btn-danger data-toggle="tooltip" data-placement="top" title="buy here!"
              data-toggle="modal" data-target="#myModal" " type="button" name="button">
                  <i id="cart-icon" class="fas fa-shopping-cart fa-sm"></i>
                  </button>
              </div>
            </div>
        </div>

        <div  class="col-lg-4 mt-2 mb-3 pr-2 pl-2">
          <div class="card " >
            <div class=" d-flex justify-content-center">
              <div class="middle pt-5 mt-4">


              <button class="btn btn-info " type="button" name="button">
                  Plus dinformation
                  </button>
              </div>
            </div>
              <img class="card-img-top "src="../assets/pic/logo_ardouino.jpg" alt=""
              data-toggle="tooltip" data-placement="top" title="more info!">

            <div class="card-body p-3 text-center">
                <strong> <p>real doctore</p></strong>
                <p>20$ </p>

                <?php
                  $a=0;
                while ($a <= 5) { ?>
                <i class="fas fa-star"></i>
                <?php  $a = $a+1; }  ?>

      <button class="btn btn-danger data-toggle="tooltip" data-placement="top" title="buy here!"
            data-toggle="modal" data-target="#myModal" " type="button" name="button">
                <i id="cart-icon" class="fas fa-shopping-cart fa-sm"></i>
                </button>
            </div>
          </div>
      </div>


      <div  class="col-lg-4 mt-2 mb-3 pr-2 pl-2">
        <div class="card " >
            <div class=" d-flex justify-content-center">
              <div class="middle pt-5 mt-4">


              <button class="btn btn-info " type="button" name="button">
                  Plus dinformation
                  </button>
              </div>
            </div>
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

    <button class="btn btn-danger data-toggle="tooltip" data-placement="top" title="buy here!"
          data-toggle="modal" data-target="#myModal" " type="button" name="button">
              <i id="cart-icon" class="fas fa-shopping-cart fa-sm"></i>
              </button>
          </div>
        </div>
    </div>





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

  <div class="col-sm-4 my-auto mx-auto order-0  ">

  <a class="btn btn-info btn-xl mb-4 mt-3 w-100" href="all_products.php">Find More Products</a>
</div>

  </div>

</div>

<style media="screen">

.middle{
  position: absolute;
  opacity: 0;
  transition: .2s ease;
  text-align: center;
}
.card:hover .card-img-top {
  opacity: 0.1;
  transition: .5s ease;
  backface-visibility: hidden;
}
.card:hover .middle {
  opacity: 1;

}

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

    background-color: white;
    color: black;
}
.card-body{
  background-color: #8080801c;
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
