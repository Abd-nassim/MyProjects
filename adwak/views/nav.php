<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/pic/logo1.png" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' >
    <title>nav</title>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
  <div class="container-fluid p-0 m-0"  >


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark " id="myNavbar">

      <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>


      <div class="navbar-collapse collapse w-50 order-0 order-md-0 dual-collapse2" id="collapsibleNavbar">
          <a class="navbar-brand mr-auto" href="#">ADWAK
            <img src="../assets/pic/logo1.png" alt="logo" style="width:40px;">
              DZSTORE
          </a>
      </div>


    <div class="mx-auto order-0 w-100" id="collapsibleNavbar" >
      <ul class="nav navbar-nav  mr-auto ">
        <li class="nav-item">
          <a class="nav-link" href="#section1"><i class='fas fa-home'></i>
            Accueille</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#section2"><i class='fas fa-edit'></i>
              A-propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#section3"><i class='fas fa-wrench'></i>
            Services</a>
        </li>
        <!--li class="nav-item">
          <a class="nav-link" href="#section4"><i class='fas fa-dolly'></i>

          Products</a>
        </li -->

        <li class="nav-item">
          <a class="nav-link" href="#section5"><i class='fas fa-envelope' ></i>
              Contacter nous</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#section6"><i class='fas fa-envelope' ></i>
              FAQ</a>
        </li>

      </ul>


    </div>

      <div class="navbar-collapse collapse w-50 order-3 dual-collapse2 " id="collapsibleNavbar">



          <ul class="nav navbar-nav  ml-auto">
        <!--li class="nav-item dropdown ml-auto ">
        <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" bg="dark">
          <i class='fas fa-language'></i>

          Langue</a>


        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Arabe</a>
          <a class="dropdown-item" href="#">Francais</a>
          <a class="dropdown-item" href="#">English</a>


        </div >
      </li>
      </ul-->



        </div>

    </nav>
  </div>




  </body>
</html>

<style >
.navbar-dark .navbar-nav .nav-link {
  color :white;
  font-size: 1rem;

}
.navbar-dark .navbar-nav .nav-link:hover{
  color :orange;
  font-size: 1.45rem;

}
.navbar-dark> .navbar-nav>.nav-link>a:active{
  color: orange;

}
.navbar-dark .navbar-brand:hover {
  color :orange;
  font-size: 1.45rem;

}
.navbar-dark .navbar-brand:visited {
  color :orange;

}
</style>

<script type="text/javascript">


$(".nav-link").on('click', function(e) {


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
