<?php 

	session_start();
	include("../connect.php");	


	$all_student=mysqli_query($connect,"select e.nom, e.prenom, a.nom_annee,a.specialite, g.num_groupe, e.matricule_etu, e.password_etu
								from etudiant e, annee a, groupe g
								where g.id_groupe=e.id_groupe
								and g.id_annee=a.id_annee
								order by  e.id_groupe, e.nom
								;");

	

	echo " <table>
			<tr>
				<th>- Nom -</th> 
				<th>- Prenom -</th> 
				<th>- A -</th> 
				<th>- S -</th> 
				<th>- G -</th> 
				<th>- Matricule -</th> 
				
			</tr>";
			$i=0;
			while($student=mysqli_fetch_array($all_student)){
				if($student[4]==0)
					$student[4]='-';
				if($student[3]=='')
					$student[3]='-';
				echo "<tr>
					<td><input type='text' value='$student[0]' class='input_small' id='nom_$i' /></td>
					<td><input type='text' value='$student[1]' class='input_name'  id='prenom_$i' /></td>
					<td><input type='text' value='$student[2]' class='input_asg'  id='a_$i' /></td>
					<td><input type='text' value='$student[3]' class='input_asg'  id='s_$i' /></td>
					<td><input type='text' value='$student[4]' class='input_asg'  id='g_$i' /></td>
					<td><input type='text' value='$student[5]' class='input_small'  id='matt_$i' /></td>
					

					<td > <div class='edit_button' title='Update' onclick='updateStudent($i,\"$student[5]\")' >  </div> </td>
					<td > <div class='delete_button' title='Delete' onclick='deleteStudent(\"$student[5]\")' >  </div> </td>
	
				</tr>";
				$i++;
			}
	echo "		
		</table>
		<hr>
	";

	echo "
		<table>
			<tr> 
				<td><input type='text' class='input_small' id='nom' autofocus /></td>
				<td><input type='text' class='input_name'  id='prenom' /></td>
				<td>
					<select  id='asg' class='input_medium'>
						<optgroup label='Annee: 2 ' />
						<option value=1 >G1</option>
						<option value=2 >G2</option>
						<option value=3 >G3</option>
						<optgroup label='Annee: 3' />
						<option value=4 >ISIL</option>
						<option value=5>SI</option>
					</select>
				</td>
				<td><input type='text' class='input_small'  id='matt' /></td>
			
				<td > <div class='add_button' title='Add' onclick='addStudent()' >  </div> </td>
			</tr>
		</table>
	";

 ?>