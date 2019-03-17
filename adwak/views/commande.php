
<?php
    require_once '../assets/boot/bootup.php';
    require_once '../assets/php/helper.php';


    $GLOBALS['dbhelper']  = new DBHelper();
    $user_id = $_SESSION['user_id'];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adwak DZStore </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="../assets/js/code.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">



</head>
<body >


	<div class="container">
		<div class="row">
			<div class="col-md-7 m-auto">


			<center><h1>Entrez votre commande</h1>

        <img src="../assets/pic/1.jpg" class="rounded" alt="Cinque Terre" width="180px">


        <?php
        $data = $GLOBALS['dbhelper'] -> GetData('commande',['*'],[''],[''],'');

         ?>



			</center>

					<div class="form-group">
		 				<label for="Nom">Nom:</label>
		 				<input type="text" class="form-control" id="Nom" placeholder="Enter Nom" name="Nom" >
	 				</div>

					<div class="form-group">
						<label for="Prenom">Prenom:</label>
						<input type="text" class="form-control" id="Prenom" placeholder="Enter Prenom" name="Prenom">
					</div>

					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" class="form-control" id="Email" placeholder="Enter email" name="email">
					</div>

					<div class="form-group">
		 				<label for="Numero">Numero:</label>
		 				<input type="number" class="form-control" id="Numero" placeholder="Enter Numero" name="Numero">
	 				</div>

          <div class="form-group">
            <label for="Numero">address:</label>
            <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
          </div>




			<button type="" onclick="commande()" class="btn btn-dark btn-lg btn-block">Confirm</button>
      <input type="hidden" id="_token" name="_token" value="<?php echo $_SESSION['_token']; ?>">
		</div>

		</div>
  </div>







</body>
</html>

<style media="screen">
  bdoy {
    background-color: #ccc;
  }
</style>
