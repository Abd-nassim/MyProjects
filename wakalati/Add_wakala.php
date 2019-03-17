<?php
session_start();
if(!isset($_SESSION['nom']) ){  header("location:index.php");}
   


 include("nav.html"); 
?>
	


<!DOCTYPE html>
	<html>
	<head>
		<title>Wakalati</title>
	</head>
<h2>Creation dune nouvelle wakala</h2>

	<body  >
	
		


<style type="text/css">
	
	.form{ 
		

float: left;
 width: 30%;
 margin-left: 2%;}

.button{ margin: 2%;
padding-top: 2px;

}
</style>

<form method="post">
<div class="form">
<div class="form-group">
  <label for="nom">Nom:</label>
  <input type="text" class="form-control" name="nom" placeholder="nom ">
</div>
<div class="form-group">
  <label for="Adresse">Adresse:</label>
  <input type="text" class="form-control" name="adresse" placeholder="Adresse">
</div>
<div class="form-group">
  <label for="ville">Ville:</label>
  <input type="text" class="form-control" name="ville"  placeholder="ville">
</div>
<div class="form-group">
  <label for="Email">Email:</label>
  <input type="email" class="form-control" name="email"  placeholder="Email">
</div>
<div class="form-group">
  <label for="Localisation">Localisation:</label>
  <input type="text" class="form-control" name="localisation" placeholder="(121554656,-54496594456)">
</div>
<div class="form-group">
  <label for="Numerotelephone">Numero de telephone:</label>
  <input type="number" class="form-control" name="numerotelephone" placeholder="Numero telephone">

<div class="button">
	
 

  <button type="submit" class="btn btn-default" id="submit" name="submit">Envoyer</button>

  <button type="reset" class="btn btn-default">Annuller</button>
</div>
 
</div>

</div>
</form>


	</body>



 
<div id="map" style="width:60%;height:60%;  float: right; margin-right: 2% " >

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter=new google.maps.LatLng(31.809261,-6.284260);
  var mapOptions = {center: myCenter, zoom: 6};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(map, event.latLng);
  });
}

function placeMarker(map, location) {

  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfcDv3mHLhcCAM6cGYOWqI3F7BFVi3_v0&callback=myMap"></script>

 
</div>


<style type="text/css">
	.alert{

		float: right;
		margin: 2%;

		
	}


</style>
<div class="alter"><div class="alert alert-info">
    <strong>Info!</strong> Veillez cliquer sur la carte pour avoir les coordooner exacte, mettez les dans le formulaire de localisation.
  </div></div>


	</html>

<?php

if( !empty($_POST['nom']) && !empty($_POST['adresse'])&& !empty($_POST['ville'])&& !empty($_POST['email'])&& !empty($_POST['localisation'])&&!empty($_POST['numerotelephone'])  && isset($_POST['submit'] ) ) {

$conn=new mysqli('http://cool-network.net','coolnetwork','6611 avxd','coolnetw_wakala');

if(!$conn){echo"erreur";}





$nom=$_POST['nom'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$email=$_POST['email'];
$localisation=$_POST['localisation'];
$numero=$_POST['numerotelephone'];


$insert="INSERT INTO wakala
VALUES('','$nom','$adresse','$ville','$email','$localisation','$numero')";

if($conn->query($insert)){
 include("alert1.html"); 
} 

}

if( ( empty($_POST['nom']) || empty($_POST['adresse']) ||empty($_POST['ville']) || empty($_POST['email']) || empty($_POST['localisation']) || empty($_POST['numerotelephone']) )   && isset($_POST['submit'] ) ){ 

include("alert2.html");
}
?>




<script type="text/javascript">
  

