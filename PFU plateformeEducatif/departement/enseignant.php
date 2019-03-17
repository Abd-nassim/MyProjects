<?php 

	session_start();
	include("../connect.php");
	$id_dep=$_SESSION['id_dep'];
	$result_teacher=mysqli_query($connect,"select * from enseignant where id_departement='$id_dep' ");
		echo "
			<table>
				<tr>
					<th>- Nom -</th>
					<th>- Prenom -</th>
					<th>- Email -</th>
					<th>- Matricule -</th>
					
				</tr>"; 
				$i=0;
					while($teacher=mysqli_fetch_array($result_teacher)){
					echo "
					<tr>	
					<td> <input  type='text' value='$teacher[2]' class='input_small' id=nom_$i    /> </td>
					<td> <input  type='text' value='$teacher[3]' class='input_small' id=prenom_$i /> </td>
					<td> <input  type='text' value='$teacher[4]' class='input_big'   id=email_$i  /> </td>
					<td> <input  type='text' value='$teacher[0]' class='input_small' id=matt_$i   /> </td>
					
					<td > <div class='edit_button' title='Update' onclick='updateTeacher($i,\"$teacher[0]\")' >  </div> </td>
					<td > <div class='delete_button' title='Delete' onclick='deleteTeacher(\"$teacher[0]\")' >  </div> </td>

					</tr>
				"; 
					$i++;
				}
				echo "	
			</table>
		";

		echo " <hr>
			<table>
				<tr>	
					<td> <input  type='text' value='$teacher[2]' class='input_small' id=nom_add  autofocus  /> </td>
					<td> <input  type='text' value='$teacher[3]' class='input_small' id=prenom_add /> </td>
					<td> <input  type='text' value='$teacher[4]' class='input_big'   id=email_add  /> </td>
					<td> <input  type='text' value='$teacher[0]' class='input_small' id=matt_add   /> </td>
			
					<td > <div class='add_button' title='Add' onclick='addTeacher()' >  </div> </td>
					</tr>
			</table>
		";
 ?>