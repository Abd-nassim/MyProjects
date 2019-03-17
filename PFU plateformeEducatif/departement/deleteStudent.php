<?php
session_start();
include("../connect.php");
$matt=$_POST["matt"];
mysqli_query($connect,"delete from etudiant where matricule_etu='$matt'");

?>