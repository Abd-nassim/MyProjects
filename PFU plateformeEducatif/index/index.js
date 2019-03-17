$(document).ready(function(){
	console.log("we are fine!");

});

var interface="";

function etudiant(){
	//console.log("Etudiant");
	reset();
	interface='#etudiant';
	$(interface).animate({marginTop:'15px'},50);
	$(".content").load("etudiant.php");

}
function enseignant(){
	//console.log("Enseignant");
	reset();
	interface='#enseignant';
	$(interface).animate({marginTop:'15px'},50);
	$(".content").load("enseignant.php");

}
function departement(){
	//console.log("Departement");
	reset();
	interface='#departement';
	$(interface).animate({marginTop:'15px'},50);
	$(".content").load("departement.php");

}
function about(){
	//console.log("About");
	reset();
	interface='#about';
	$(interface).animate({marginTop:'15px'},50);
	$(".content").load("about.php");
	
}

function reset(){
	$(interface).animate({
		marginTop:'0px',	
		backgroundColor:'#3CBC8D',
		color:'white'},100);
}