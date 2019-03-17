<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require "nav.php"; ?>
    <title>home</title>
  </head>
  <body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
      <!-- dans le cas ou je voulais mettre une photo de converture -->
    <div class="container-fluid p-0 m-0 d-flex flex-row  ">

    </div>

    <!-- container de tt le body du site -->

    <div class="container-fluid m-0 p-0">


    <?php require_once 'section1.php'; ?>

    <?php require_once 'section2.php';  ?>

    <?php require_once 'section3.php'; ?>

    <?php //require_once 'section4.php'; ?>

    <?php require_once 'section5.php'; ?>

    <?php require_once 'section6.php'; ?>


    <?php require_once 'footer.php'; ?>

    </div>


  </body>
</html>
<style media="screen">


.container1{

  width: -webkit-fill-available;
  height: auto;
  min-height: 100vh;

  min-width: -webkit-fill-available;
  background: white;
  text-align: center;
  padding-top: 100px;
  padding-left: 50px;
  padding-right: 50px;
}

.body-bg{
  background-image: url(../assets/pic/pic2.jpg);
  background-repeat: no-repeat;
  height: -webkit-fill-available;
  max-height: 257px;
  width: -webkit-fill-available;
}
body{
  position: relative;
  transition: .5s ease;

  background: white;
}
h1{
  font-size: 4rem;
}
#icon{
  height: 135px;

  margin: 20px;
  width: 150px;

}
h4 {
  color: black;
  font-weight: bold;

}

center{
  padding-top: 5px;
}
.col-lg-4 > h5{
  margin: 30px;
  font-size: 1.9rem;
  font-weight: 600;
}
.col-lg-4 > a{

  color: black;

}
.col-lg-4 > a:hover{
  font-size: 1.2rem;
  color: orange;
}



</style>

<script>

$("#btn-scroll").on('click', function(e) {

   // prevent default anchor click behavior
   e.preventDefault();

   // store hash
   var hash = this.hash;

   // animate
   $('html, body').animate({
       scrollTop: $(hash).offset().top
     }, 1000, function(){

       // when done, add hash to url
       // (default click behaviour)
       window.location.hash = hash;
     });

});

</script>
