<?php 

	session_start();
	$password=$_SESSION['pass_etu'];


 ?>
<center>
 <div class="settings" >
 	<section id='err' style='color:white;' >  </section>
 	<table>
	 	<tr><th> Current </th> <td> <input type="password"  id='prev_pass' /> </td> </tr>
	 	<tr><th> New </th> <td> <input type="password"  id='new_pass' /> </td> </tr>
	 	<tr><th> Confirme </th> <td> <input type="password"  id='conf_pass' /> </td> </tr>
	 	<tr><th/><td><input type="button" value='Change' class='module_button' onclick="valideChange('<?php echo $password;?>')" /></td> </tr>
 	</table>
 </div>
 </center>