<script type="text/javascript">
  

function updateWakala(nom,adresse,ville,email,localisation,numerotelephone){

  var nom=$("#nom_"+id);
  var adresse=$("#adresse"+id);
  var ville=$("#ville"+id);
  var email=$("#email_"+id);
  var localisation=$("#localisation"+id);
  var numerotelephone=$("#numerotelephone"+id);
  

  

  $.post("update_wakala.php",{nom:nom.val(),adresse:adresse.val(),ville:ville.val(),
    email:email.val(),localisation:localisation.val(),numerotelephone:numerotelephone.val()},
  
  console.log(nom.val()+" "+adresse.val()+"  "+ville.val()+"  "+email.val()+" "+localisation.val()+" "+numerotelephone.val()+ );
}

</script>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>






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

<button onclick="updateWakala()">Click me</button>
</body>
</html>









