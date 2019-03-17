$(document).ready(function(){
	console.log("- - - - ");
	$("#config").click(function(){
		$("#config_slide").toggle();
	});

	$("#config").mouseleave(function (){
		$("#config_slide").hide();
	});
});

// **********************************************  Teacher ********************************************

function enseignant(){
	$(".main").html("- Enseignant -");

	console.log("loading teacher");
	$(".content").load("enseignant.php");
}

function updateTeacher(id,pre_matt){

	var nom=$("#nom_"+id);
	var prenom=$("#prenom_"+id);
	var email=$("#email_"+id);
	var matt=$("#matt_"+id);
	

	if(!valideTeacher(nom,prenom,email,matt))
		return false;

	$.post("update_teacher.php",{nom:nom.val(),prenom:prenom.val(),email:email.val(),matt:matt.val(),pass:matt.val(),pre_matt:pre_matt},enseignant());
	enseignant();
	enseignant();
//	console.log(nom.val()+" "+prenom.val()+" "+email.val()+" "+matt.val()+" "+pass.val());
}

function addTeacher(){

	var nom=$("#nom_add");
	var prenom=$("#prenom_add");
	var email=$("#email_add");
	var matt=$("#matt_add");

	if(!valideTeacher(nom,prenom,email,matt))
		return false;

	$.post("add_teacher.php",{nom:nom.val(),prenom:prenom.val(),email:email.val(),matt:matt.val(),pass:matt.val()},enseignant());
	enseignant();
	enseignant();
//	console.log(nom.val()+" "+prenom.val()+" "+email.val()+" "+matt.val()+" "+pass.val());

}

function valideTeacher(nom,prenom,email,matt){

console.log(nom.val()+" "+prenom.val()+" "+email.val()+" "+matt.val());
	nom.css({backgroundColor:'white'});
	prenom.css({backgroundColor:'white'});
	email.css({backgroundColor:'white'});
	matt.css({backgroundColor:'white'});

	var err=0;

	if(nom.val()==""){
		nom.css({backgroundColor:'pink'});
		err++
	}
	if(prenom.val()==""){
		prenom.css({backgroundColor:'pink'});
		err++
	}
	if(email.val()==""){
		email.css({backgroundColor:'pink'});
		err++
	}
	if(matt.val()==""){
		matt.css({backgroundColor:'pink'});
		err++
	}
	
	if(err>0) return false;
	return true;
}
// ********************************** Student  *************************************
function etudiant(){
	$(".main").html("- Etudiant -");
	console.log("loading student");
	$(".content").load("etudiant.php");
}

function updateStudent(id,pre_matt){
	var nom=$("#nom_"+id);
	var prenom=$("#prenom_"+id);
	var a=$("#a_"+id);
	var s=$("#s_"+id);
	var g=$("#g_"+id);
	var matt=$("#matt_"+id);



	if(!valideToUpDateStudent(nom,prenom,a,s,g,matt))
		return false;

	var asg=0;

	if(a.val()=="L2"){
		if(g.val()==1) asg=1;
		if(g.val()==2) asg=2;
		if(g.val()==3) asg=3;
	} else if(a.val()=="L3"){
		if(s.val()=="ISIL") asg=4;
		if(s.val()=="SI") asg=5;
	}

	$.post("updateStudent.php",{nom:nom.val(),prenom:prenom.val(),asg:asg,matt:matt.val(),pass:matt.val(),pre_matt:pre_matt},etudiant());
	etudiant();
	etudiant();
	console.log(asg);
	console.log(nom.val()+" "+prenom.val()+" "+a.val()+" "+s.val()+" "+g.val()+" "+matt.val());
}

function addStudent(){
	var nom=$("#nom");
	var prenom=$("#prenom");
	var asg=$("#asg");
	var matt=$("#matt");



	if(!valideToAddStudent(nom,prenom,asg,matt))
		return false;

	$.post("addStudent.php",{nom:nom.val(),prenom:prenom.val(),asg:asg.val(),matt:matt.val(),pass:matt.val()},etudiant());
	etudiant();
	console.log(nom.val()+" "+prenom.val()+" "+asg.val()+" "+matt.val());

}

function valideToUpDateStudent(nom,prenom,a,s,g,matt){
	nom.css({backgroundColor:'white'});
	prenom.css({backgroundColor:'white'});
	a.css({backgroundColor:'white'});
	s.css({backgroundColor:'white'});
	g.css({backgroundColor:'white'});
	matt.css({backgroundColor:'white'});

	var err=0;

	if(nom.val()==""){
		nom.css({backgroundColor:'pink'});
		err++
	}
	if(prenom.val()==""){
		prenom.css({backgroundColor:'pink'});
		err++
	}
	if(a.val()==""){
		a.css({backgroundColor:'pink'});
		err++
	}
	if(s.val()==""){
		s.css({backgroundColor:'pink'});
		err++
	}
	if(g.val()==""){
		g.css({backgroundColor:'pink'});
		err++
	}		
	if(matt.val()==""){
		matt.css({backgroundColor:'pink'});
		err++
	}
	
	if(err>0) return false;
	return true;
}

function valideToAddStudent(nom,prenom,asg,matt){
	nom.css({backgroundColor:'white'});
	prenom.css({backgroundColor:'white'});
	matt.css({backgroundColor:'white'});
	

	var err=0;
	if(nom.val()==""){
		nom.css({backgroundColor:'pink'});
	}
	if(prenom.val()==""){
		prenom.css({backgroundColor:'pink'});
		err++;
	}

	if(matt.val()==""){
		matt.css({backgroundColor:'pink'});
		err++;
	}
	
	if(err>0)
		return false;

	return true;
}

// *************************************** Module ***************************************
function module(){
	$(".main").html("- Module -");
	console.log("loading module");
	$(".content").load("module.php");
}

function updateModule(id,id_module){
	var nom=$("#nom_"+id);
	var cof=$("#cof_"+id);
	var cre=$("#cre_"+id);
	var ann=$("#ann_"+id);
	var tea=$("#tea_"+id);
	var typ=$("#typ_"+id);
	var eva=$("#eva_"+id);

	if(!valideModule(nom,cof,cre,ann,tea,typ,eva)) return false;

	$.post("updateModule.php",{nom:nom.val(),cof:cof.val(),cre:cre.val(),ann:ann.val(),tea:tea.val(),typ:typ.val(),eva:eva.val(),id_module:id_module},module());
	module()

	console.log(nom.val()+" "+cof.val()+" "+cre.val()+" "+tea.val()+" "+typ.val()+" "+eva.val());
}

function addModule(){
	var nom=$("#nom");
	var cof=$("#cof");
	var cre=$("#cre");
	var ann=$("#ann");
	var tea=$("#tea");
	var typ=$("#typ");
	var eva=$("#eva");

	if(!valideModule(nom,cof,cre,ann,tea,typ,eva)) return false;

	$.post("addModule.php",{nom:nom.val(),cof:cof.val(),cre:cre.val(),ann:ann.val(),tea:tea.val(),typ:typ.val(),eva:eva.val()},module());
	module()

	console.log(nom.val()+" "+cof.val()+" "+cre.val()+" "+tea.val()+" "+typ.val()+" "+eva.val());

}

function valideModule(nom,cof,cre,ann,tea,typ,eva){
	nom.css({backgroundColor:'white'});
	cof.css({backgroundColor:'white'});
	cre.css({backgroundColor:'white'});
	ann.css({backgroundColor:'white'});
	tea.css({backgroundColor:'white'});
	typ.css({backgroundColor:'white'});
	eva.css({backgroundColor:'white'});

	var err=0;

	if(nom.val()==''){
		nom.css({backgroundColor:'pink'});
		err++;
	}
	if(cof.val()==''){
		cof.css({backgroundColor:'pink'});
		err++;
	}	
	if(cre.val()==''){
		cre.css({backgroundColor:'pink'});
		err++;
	}
	if(ann.val()==''){
		ann.css({backgroundColor:'pink'});
		err++;
	}
	if(tea.val()==''){
		tea.css({backgroundColor:'pink'});
		err++;
	}
	if(typ.val()==''){
		typ.css({backgroundColor:'pink'});
		err++;
	}	
	if(eva.val()==''){
		eva.css({backgroundColor:'pink'});
		err++;
	}

	if(err>0) return false;

	return true;
}


function deleteTeacher(teacher){
	console.log(teacher);
	$.post("deleteTeacher.php",{matt:teacher},enseignant);
}


function deleteStudent(student){
	console.log(student);
	$.post("deleteStudent.php",{matt:student},etudiant());
	etudiant();
}


function settings(){
	$(".content").load("settings.php");
	$(".main").html("- Setting -");
	$("#config_slide").toggle();
}

function valideChange(password){
	var err=0;
	var message="";
	var prev_pass=$('#prev_pass');
	var new_pass=$('#new_pass');
	var conf_pass=$('#conf_pass');

	prev_pass.css({backgroundColor:'white'});
	new_pass.css({backgroundColor:'white'});
	conf_pass.css({backgroundColor:'white'});

	if(password!=prev_pass.val()){
		prev_pass.css({backgroundColor:'pink'});
		message+="wrong Current Password <br/> ";
		err++;
	}

	if(prev_pass.val().length==0){
		prev_pass.css({backgroundColor:'pink'});
		prev_pass.attr("placeholder", "Type current password.").blur();
		err++;
	}

		if(new_pass.val().length<4){
		new_pass.css({backgroundColor:'pink'});
		message+="new password is weak!<br>";
		err++;
	}

	if(new_pass.val().length==0){
		new_pass.css({backgroundColor:'pink'});
		new_pass.attr("placeholder", "Type new password.").blur();
		err++;
	}

	if(conf_pass.val().length==0){
		conf_pass.css({backgroundColor:'pink'});
		conf_pass.attr("placeholder", "Confirme of it.").blur();
		err++;
	}

	if(new_pass.val()!=conf_pass.val()){
		new_pass.css({backgroundColor:'pink'});
		conf_pass.css({backgroundColor:'pink'});
		message+="new Password is not same as Confirme <br/> ";
		err++;
	}
		$("#err").html(message);

	if(err>0) return false;

	console.log(prev_pass.val()+" "+password+" "+new_pass.val()+" "+conf_pass.val());
	$.post("changePassword.php",{Password:new_pass.val()},function(){ 
			$(".settings").html("<h1 style='color:cyan;' >- Done! -</h1>");		
	 });

	console.log("Done!");

	return true;
}
