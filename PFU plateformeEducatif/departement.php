<hr>
<div class="interface">
		 <?php
	 	if(isset($_GET['falt']))
	 		echo "<p style='color:yellow;'>veuillez vérifier votre: Nom ou Password </p>";
	 	?>
	 <form action="departement/depa_confirm.php" method="POST">
	 	<table>   
            	<tr> <th>Nom:</th> <td><input type="text" placeholder="Nom  de département" name='name_dep' autofocus  >        </td></tr>
            	 <tr> <th>Password:</th> <td><input type="password" placeholder="Password département" name='pass_dep'>        </td></tr>

	 	</table>
		<input type="submit" name='go' value='LogIn' class='button_i'  /> 
	 </form>
</div>