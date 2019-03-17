<hr>
<div class="interface">
		 <?php
	 	if(isset($_GET['falt']))
	 		echo "<p style='color:yellow;'>veuillez vérifier votre: MATRICULE ou MOT De PASSE</p>";
	 	?>
	 <form action="student/etu_confirme.php" method="post">
	 	<table>   
            	<tr> <th>Matricule:</th> <td><input type="text" placeholder="entrez votre matricule"  name="matt_etu"/> </td></tr>
            	 <tr> <th>Mot De Passe:</th> <td><input type="password" placeholder="entrez votre mot de passe " name="pass_etu"/></td></tr>
      
	 	</table>  
		<input type="submit" name='go' value='LogIn' class='button_i' /> 
	 </form>
</div>