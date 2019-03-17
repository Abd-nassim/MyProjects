<?php
session_start();
if(!isset($_SESSION['matricule_etu'])){
	header('etudiant.php');
}else{
	
	echo '$_SESSION['nom']';
}