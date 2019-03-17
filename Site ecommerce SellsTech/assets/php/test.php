<?php
require 'model.php';


 ?>

 <script src="../vendor/jquery/jquery.min.js"></script>
 
 <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
 <script src="../js/code.js"></script>

<input type="submit"  id="grab" value="grab">
<div class="container">

</div>



<script type="text/javascript">

$("#grab").click(function () {
  var test = 1 ;

  $.post('model.php',{test:test},
  function retrun(data,status){
  $(".container").html(data);

  });


});


</script>
