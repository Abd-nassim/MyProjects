<?php 
	include('../connect.php');
	session_start();
	if(isset($_GET['id_module'])){

	$module=$_GET['id_module'];
	$matricule=$_SESSION['matt_etu'];
	$_SESSION['id_module']=$module;

	$query_module="select m.nom_module, n.td, n.tp, n.examen, n.moyenne, m.type, e.nom,e.prenom, m.coefficient, m.credit
				from note n
				join module m
				on m.id_module=n.id_module
				join enseignant e
				on e.matricule_ens=m.matricule_ens
				join etudiant s
				on s.matricule_etu=n.matricule_etu
				where m.id_module='$module' and s.matricule_etu='$matricule' ";

	$result_module=mysqli_query($connect,$query_module);
	$module_col=mysqli_fetch_array($result_module);

	echo "<div class='note'>
			<table>
				<tr> <th class='by_module_head' > $module_col[0] </th> </tr>
				";
				if($module_col[5]==1 || $module_col[5]==2)
					echo "<tr> <th/> <th> TD </th> <td> <input disabled type='text' value='$module_col[1]' class='by_module' /> </td> </tr>";
				if($module_col[5]==1 || $module_col[5]==3)
					echo "<tr> <th/> <th> TP </th> <td> <input disabled type='text' value='$module_col[2]' class='by_module' /> </td> </tr>"; 

					echo "<tr> <th/> <th> EX </th> <td> <input disabled type='text' value='$module_col[3]' class='by_module' /> </td> </tr>";

					echo "<tr> <th/> <th/> <th/> <th class='by_module_head' > MOY </th> <td> <input disabled type='text' value='$module_col[4]' class='by_module_head' /> </td> </tr>
			</table>
			

		</div>";
}
 ?>

<div class="info">
	<table>
		<tr> info: </tr>
		<tr> <th/> <th>coef:</th> <td> <?php echo $module_col[8]; ?> </td> </tr>
		<tr> <td><hr></td> </tr>
		<tr> <th/> <th>Créd:</th> <td> <?php echo $module_col[9]; ?> </td> </tr>
		<tr> <td><hr></td> </tr>
		<tr> <th/> <th>éval:</th> <td> <?php 
											$moy=$module_col[4];
											if($moy<10 && $moy>=0) echo "échoué";

											if($moy>=10 && $moy<=12) echo "travailler plus";
											if($moy>12 && $moy<=14) echo "Bien";
											if($moy>14 && $moy<=16) echo "trés bien";

											if($moy>16 && $moy<=20) echo "exellent";
										 ?> </td> </tr>
	</table>
</div>

<div class="reclame">
	<form action='reclame.php' method='post'>
	<table>
		<tr> <th class='by_module' id='resiver'> <?php echo "To: ".$module_col[7]." ".$module_col[6]; ?> </th> </tr>
		<tr> <td> <textarea style='resize:none;' name="reclame_text" id="reclame_text" cols="104" rows="5" placeholder="Type your reclame here..." ></textarea> </td> </tr>
		<tr> <td> <input style='text-align:right;' type='button' onclick='sendMessage()' name='go' value='Send' /> </td> </tr>
	</table>
	</form>
</div>