<?php 
	
	include("../connect.php");

	$all_students=mysqli_query($connect,"select * from etudiant_2");

	while($student=mysqli_fetch_array($all_students)){
		echo "<br>".$student[0]." ".$student[6]." ".$student[1]." ".$student[2]." ".$student[3]." ".$student[4]." ".$student[5];

		if($student[3]==0){
			if($student[5]=="ISIL"){
				mysqli_query($connect,"insert into etudiant values ('$student[0]','$student[6]','$student[1]','$student[2]',4,'')");
			} else {
				mysqli_query($connect,"insert into etudiant values ('$student[0]','$student[6]','$student[1]','$student[2]',5,'')");
			}

		} else if ($student[3]==1){
			mysqli_query($connect,"insert into etudiant values ('$student[0]','$student[6]','$student[1]','$student[2]',1,'')");
		} else if ($student[3]==2){
			mysqli_query($connect,"insert into etudiant values ('$student[0]','$student[6]','$student[1]','$student[2]',2,'')");
		} else if ($student[3]==3){
			mysqli_query($connect,"insert into etudiant values ('$student[0]','$student[6]','$student[1]','$student[2]',3,'')");
		}

	}
 ?>