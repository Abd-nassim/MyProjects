<?php  

	session_start();
	include("../connect.php");
	$id_dep=$_SESSION['id_dep'];

	$all_module=mysqli_query($connect,"select * from module where id_departement='$id_dep' ");	

	echo "<table>
			<th>- Nom -</th>
			<th>- Cof -</th>
			<th>- Cri -</th>
			<th>- Ann -</th>
			<th>- mat_ens -</th>
			<th>- type -</th>
			<th>- eval -</th>
			";
	$i=0;

	while($module=mysqli_fetch_array($all_module)){
		echo "
			<tr>
				<td><input type='text' value='$module[1]' class='input_small' id='nom_$i' /></td>
				<td><input type='text' value='$module[2]' class='input_short' id='cof_$i' /></td>
				<td><input type='text' value='$module[3]' class='input_short' id='cre_$i' /></td>
				<td> 
					<select  class='input_small' id='ann_$i'> ";
					$all_annee=mysqli_query($connect,"select * from annee");
					while($annee=mysqli_fetch_array($all_annee)){
						if($module[6]==$annee[0])
							echo "<option value='$annee[0]' selected > $annee[1] - $annee[2] </option>";
						else echo "<option value='$annee[0]' > $annee[1] - $annee[2] </option>";
					}
					 echo"</select> 
				</td>
				<td>
					<select class='input_medium' id='tea_$i'>"; 
					$all_teachers=mysqli_query($connect,"select matricule_ens, nom, prenom from enseignant");
					while($teacher=mysqli_fetch_array($all_teachers)){
						if($module[4]==$teacher[0])
							echo "<option value='$teacher[0]' selected > $teacher[1] $teacher[2] </option>";
						else echo "<option value='$teacher[0]' > $teacher[1] $teacher[2] </option>";
					}
					echo "</select>
				</td>
				<td>
					<select class='input_small' id='typ_$i'>";
					$all_types=mysqli_query($connect,"select * from type");
					while($type=mysqli_fetch_array($all_types)){
						if($type[0]==$module[7])
							echo "<option value='$type[0]' selected > $type[1] </option>";
						else echo "<option value='$type[0]' > $type[1] </option>";
					}
					echo "</select>
				</td>
				<td>
					<select class='input_small' id='eva_$i'>";
					$all_eval=mysqli_query($connect,"select * from evaluation");
					while($eval=mysqli_fetch_array($all_eval)){
						if($eval[0]==$module[8])
							echo "<option value='$eval[0]' selected > $eval[1] </option>";
						else echo "<option value='$eval[0]' > $eval[1] </option>";	
					}
					echo "</select>
				</td>
					<td > <div class='edit_button' title='Update' onclick='updateModule($i,\"$module[0]\")' >  </div> </td>				
			</tr>
		";
		$i++;
	}

	echo "</table> <hr>";	

	echo "<table>
		<tr>
				<td><input type='text' class='input_small' id='nom' autofocus /></td>
				<td><input type='text' class='input_short' id='cof' /></td>
				<td><input type='text' class='input_short' id='cre' /></td>
				<td> 
					<select  class='input_small' id='ann'>
						<option value='' selected> </option> ";
					$all_annee=mysqli_query($connect,"select * from annee");
					while($annee=mysqli_fetch_array($all_annee))
						echo "<option value='$annee[0]' > $annee[1] - $annee[2] </option>";				
					 echo"</select> 
				</td>
				<td>
					<select class='input_medium' id='tea'>
						<option value='' selected> </option>"; 
					$all_teachers=mysqli_query($connect,"select matricule_ens, nom, prenom from enseignant");
					while($teacher=mysqli_fetch_array($all_teachers))
						 echo "<option value='$teacher[0]' > $teacher[1] $teacher[2] </option>";					
					echo "</select>
				</td>
				<td>
					<select class='input_small' id='typ'>
						<option value='' selected> </option>";
					$all_types=mysqli_query($connect,"select * from type");
					while($type=mysqli_fetch_array($all_types))
						 echo "<option value='$type[0]' > $type[1] </option>";
					echo "</select>
				</td>
				<td>
					<select class='input_small' id='eva'>
						<option value='' selected> </option>";
					$all_eval=mysqli_query($connect,"select * from evaluation");
					while($eval=mysqli_fetch_array($all_eval))
						 echo "<option value='$eval[0]' > $eval[1] </option>";	
					echo "</select>
				</td>
				<td> <div class='add_button' title='Add' onclick='addModule()' >  </div> </td>				
		</tr>
	</table>	
	";
?>