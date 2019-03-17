<?php
//session_save_path("/index/users/web/b2161/ipg.alttullinescom/staff/logintmp/");
 session_start();
 $user="root";
 $pass="nas4";
 $host="localhost";
 $dbname="worckstation";
$db=  mysqli_connect($host,$user,$pass,$dbname);
if ($db->connect_error) {
    die("Error 1"  );
}
$myemail=$_SESSION['login_Email'];

if(!isset($_SESSION['login_Email'])){
header("location: index.php");
}
if( isset($_POST['go']) ){
		session_start();
$_SESSION['id']=$_POST['id'];
$_SESSION['client']=$_POST['client'];

		header("location:page_client.php");
}





$db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

$result = array();

$recup = $db->query("SELECT isadmin FROM users WHERE email = '$myemail' ");

while($all =$recup->fetch())
{
  $result[] = $all;
}

foreach ($result as $result) {
}
if($result['0']==2){
$super="none";
$viewer="";

}

else if($result['0']==1 ){
  $super="";

$viewer="";

}
else {
  $super="none";

$viewer="none";
}


?>

 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Clients</title>

  <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css">
	<script src="../vendor/jquery/jquery.js" ></script>
	<script src="../vendor/bootstrap/js/bootstrap.js" ></script>
   <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

<div class="topbar form">


     <div class="recherche_day"  style="position:absolute; right:15px; top:10px;text-align:center;">
       <form action="" method="post">


       <p style="display:inline-block;position:relative;    left: -4px;font-size: 19px;top: 0px">Search</p>
       <input id="date" name="name" class="form-control" type="text"  style="width:147px;display:inline-block;font-size:15px;">
       <button type="submit" name="lope" class="btn btn-default" style="background-color:white;border:transparent;">
       <img    class="lope" src="../images/lope.png" style="display:inline-block;">
  </button>

       </form>

     </div>


<a href="../../index.php">
<img class="backimg" src="../images/back.png" style="position: absolute;left: 15px;top: 10px;">
</a>
  <img src="../images/clients.png" style="
    top: -8px;
    position: relative;
"><h3  style="
    top: -81px;
    position: relative;
    left: 50px;
">All the clients</h3>

</div>
<div class="form min" style="width:688px">
  <table class="table table-hover" id="table">
    <thead class="">
      <tr style="background-color:black;color:white;">
          <th style="width:122px;font-size:15px">Name</th>
          <th style="width:122px;font-size:15px">Added</th>
        <th style="width:80px;right:px; font-size:15px;" >Option</th>
      </tr>
    </thead>
    <?php

    $db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

    $result = array();
    if(isset($_POST['lope'] ))  {
      $name=$_POST['name'];

      if($name==""){            $recup = $db->query("SELECT * FROM clients  ");
}
        else {
          $recup = $db->query("SELECT * FROM clients where client='$name' ");

        }
    }
    else {
      $recup = $db->query("SELECT * FROM clients ");

}


    while($all =$recup->fetch())
    {
      $result[] = $all;
    }

foreach ($result as $result) {
  echo '
  <form method="post" action="">

    <tbody>
      <tr>


  <input name="id" id="id1'.$result['id'].'"   class="form-control" type="text" value="'.$result['id'].'"  size="3" style="display:none;">


        <td><input  id="name1'.$result['id'].'" name="client"  class="form-control" type="text" value="'.$result['client'].'"  size="3"size="3" style="font-size:14px;"></td>
        <td><input  id="name1'.$result['id'].'" name="added"  class="form-control" type="text" value="'.$result['Added'].'"  size="3"size="3" style="font-size:14px;"></td>

        <td><img onclick="modifier('.$result['id'].')" class="img1"   style="margin-right:10px;" src="../images/edit_2.png">

<img  onclick="supprimer('.$result['id'].') " class="img2"    style="margin-right:10px;display:'.$super.';"  src="../images/delete.png">

        <button style="display:'.$viewer.';"    name="go" type="submit"  class="btn btn-sm btn-default">
       DETAILS  <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
        </td>
      </tr>

    </tbody>
    </form>
    '; }
    ?>

    </table>
</div>     <form >

<div class="form min" style="height: 99px;width:441px;">


   <div class="field-wrap smolinput">

 <label class="active">Name</label>
     <input class="form-control"  name="name "id="name"  type="text"   style="width:200px;font-size:15px;"required />
   </div>


   <input  id="day"  type="text" value=<?php echo date("Y-m-d");  ?> style="display:none;" >


     <img onclick="insert()" class="img1"   style="margin-right:;" src="../images/add_client.png">
 </div>
  </div></form>

<script>



  function supprimer(id) {
   var txt;

     var r = confirm("You want to Delete ?");
     if (r == true) {
       var r = event.target;
       console.log(id);
       var i = r.parentNode.parentNode.rowIndex;
      document.getElementById('table').deleteRow(i);
      $.post('delete.php',{id:id} ,function(recu){

      });

     } else {

     }
  }

  function modifier(id){

  var nameId='name1'+id;
  var name=document.getElementById(nameId).value;
//  var lastname=document.getElementById(lastnameId).value;
  //  var localisation=document.getElementById(localisationId).value;
  //var numero=document.getElementById(numeroId).value;
  console.log(id  + name   );
  $.post('modifier.php',{id:id,name:name},function(recu){
    $('afficher').html(recu);
  });

  }

  function insert(){


  var name=document.getElementById("name").value;
  var day=document.getElementById("day").value;
  if(name==""){
    alert("Insert a name");

    event.preventDefault();
  }else{
  console.log( name+day   );

  $.post('new_client.php',{name:name,day:day},function recu() {

   window.location.href = 'clients.php';

  });
}


  }


  $(".img1").hover(function(){
     $(this).css("background-color", "#ccc");
     $(this).attr('title', 'Click here to modify');

     }, function(){
     $(this).css("background-color", "");
  });
  $(".img2").hover(function(){
     $(this).css("background-color", "#ccc");
     $(this).attr('title', 'Click here to delete');

     }, function(){
     $(this).css("background-color", "");
  });    $(".img3").hover(function(){
         $(this).css("background-color", "#ccc");
         $(this).attr('title','Go to personal page');

         }, function(){
         $(this).css("background-color", "");
     });



</script>


  </body>
  </html>
