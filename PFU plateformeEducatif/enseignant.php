<hr>
<div class="interface">
	 <form action="teacher/ensei_confirme.php" method="post">
	 <?php
	 	if(isset($_GET['falt']))
	 		echo "<p style='color:yellow;'>veuillez vérifier votre: Matricule ou Mot De Passe</p>";
	 ?>
	 	<table>   
            	<tr> <th>Matricule:</th> <td><input type="text" placeholder="entrez votre matricule" name="Matt" required> </td></tr>
            	 <tr> <th>Mot De Passe:</th> <td><input type="password" placeholder="entrez votre mot de passe " name=Pass required> </td></tr>
	 	</table>
		<input type="submit" name='go' value='LogIn' class='button_i'  /> 
	 </form>
</div>