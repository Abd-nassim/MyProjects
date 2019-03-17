<?php 


	session_start();
	include("../connect.php");
	$matricule=$_SESSION['matricule'];
	$Module=$_GET["module"];
	$type=$_GET['type'];
	
	// *****************************************************  Groups **********************************************************
					$query_module_groupe="select e.matricule_etu, e.nom, e.prenom, g.num_groupe, m.id_evaluation, m.type 
							from annee a 
							join groupe g
							on g.id_annee=a.id_annee
							join module m
							on m.id_annee=g.id_annee
							join etudiant e
							on e.id_groupe=g.id_groupe
							where m.id_module=$Module ";
			
					if(isset($_GET['groupe'])){
								$groupe=$_GET['groupe'];
							
							$query_module_groupe.=" and g.id_groupe='$groupe' ";
							} 
					$query_module_groupe.=" order by e.id_groupe,e.nom ";

					$result_module_groupe=mysqli_query($connect,$query_module_groupe);
					$i=1;
// **************************************      Option     ********************************
					echo "
						<div class='option_groupe' >
								<input type=button value='All' class='groupe_button' onclick='allOption($type)' />";
								if($type==1 || $type==2)								
									echo "<input type=button value='TD' class='groupe_button' onclick='tdOption($type)' />";
								if($type==1 || $type==3)
									echo "<input type=button value='TP' class='groupe_button' onclick='tpOption($type)' />";
						echo    "<input type=button value='EX' class='groupe_button' onclick='exOption($type)' />
								<input type=button value='MOY' class='groupe_button' onclick='moyOption($type)' />
						</div>
						
							";
							$corr_groupe=0;
					while($etudent_module_groupe=mysqli_fetch_array($result_module_groupe)){
						if($etudent_module_groupe[3]!=$corr_groupe){
							$corr_groupe=$etudent_module_groupe[3];
							echo  "<center> <input disabled class='cont'  value='G$corr_groupe' > </center>";

						}
						
						$query_exist="select e.nom, n.td, n.tp, n.examen, n.moyenne, m.type
								from etudiant e
								join note n 
								on e.matricule_etu=n.matricule_etu
								join module m
								on m.id_module=n.id_module
								where e.matricule_etu='$etudent_module_groupe[0]' and m.id_module='$Module'";
						$result_exist=mysqli_query($connect,$query_exist);		
						$exist=mysqli_fetch_array($result_exist);			
						
						if($exist[0]!=''){
// --------------------------------------------     UPDATE Note  ----------------------------------------
							
							echo "<div class='student_U' id='div_$i' >
																
									<table>
										<tr> 
											<td> <input disabled class='cont'  value='$i' > </td>
	<td id='update_$i' ><div  class='edit_button' onclick='valide(\"$etudent_module_groupe[0]\",$i,$exist[5],$Module,$etudent_module_groupe[4],\"update\")'> </div></td>";
											if($exist[5]==1 || $exist[5]==2)
	echo "<td class='td_data' > TD:<input type='number' style='width:50px;' onkeypress='test(\"$etudent_module_groupe[0]\",$i,$exist[5],$Module,$etudent_module_groupe[4],\"update\",event,\"td\")' id=td_$i value='$exist[1]'/> </td>";
											if($exist[5]==1 || $exist[5]==3)
	echo "<td class='tp_data' > TP:<input type='number' style='width:50px;' onkeypress='test(\"$etudent_module_groupe[0]\",$i,$exist[5],$Module,$etudent_module_groupe[4],\"update\",event,\"tp\")' id=tp_$i value='$exist[2]'/> </td>";			 
	echo"<td class='ex_data' >EX:<input type='number' style='width:50px;' onkeypress='test(\"$etudent_module_groupe[0]\",$i,$exist[5],$Module,$etudent_module_groupe[4],\"update\",event,\"ex\")' id=ex_$i value='$exist[3]'/></td> 
											<td class='moy_data' >MOY:<input type='number' style='width:50px;' disabled id='moy_$i'  value='$exist[4]'/> </td>
											 
											<th>$etudent_module_groupe[1]</th>
											<th>$etudent_module_groupe[2]</th>																				 
											<th>$etudent_module_groupe[0]</th>										
										</tr>
									</table>
													
							
						</div><hr>";

						} else {
//            -----------------------------------     ADD  Note  ------------------------------
						echo "<div class='student' id='div_$i' >
									<table>
										<tr>
											<td> <input disabled class='cont'  value='$i' > </td>											 
	<td id='add_$i' ><div  value='ADD' class='add_button' onclick='valide(\"$etudent_module_groupe[0]\",$i,$etudent_module_groupe[5],$Module,$etudent_module_groupe[4],\"add\")'> </div></td>";
											if($type==1 || $type==2)
	 echo "<td class='td_data'  > TD:<input type='number' style='width:50px;' onkeypress='test(\"$etudent_module_groupe[0]\",$i,$etudent_module_groupe[5],$Module,$etudent_module_groupe[4],\"add\",event,\"td\")' value=0 id=td_$i value='$exist[1]'/> </td>";
											if($type==1 || $type==3)
	echo "<td class='tp_data' > TP:<input type='number' style='width:50px;' onkeypress='test(\"$etudent_module_groupe[0]\",$i,$etudent_module_groupe[5],$Module,$etudent_module_groupe[4],\"add\",event,\"tp\")' value=0 id=tp_$i /> </td>";			 
	echo"<td class='ex_data' >EX:<input type='number' style='width:50px;' onkeypress='test(\"$etudent_module_groupe[0]\",$i,$etudent_module_groupe[5],$Module,$etudent_module_groupe[4],\"add\",event,\"ex\")' value=0 id=ex_$i /></td> 
											<td class='moy_data' >MOY:<input type='number' style='width:50px;' disabled   id='moy_$i' /> </td>
											 
											<th>$etudent_module_groupe[1]</th>
											<th>$etudent_module_groupe[2]</th>																				 
											<th>$etudent_module_groupe[0]</th>										
										</tr>
									</table>							
						</div><hr>";

						}
						$i++;
					}	

 ?>