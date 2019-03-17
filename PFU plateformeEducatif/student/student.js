$(document).ready(function(){
	console.log("- - - - ");
	$("#config").click(function(){
		$("#config_slide").toggle();
	});

	$("#config").mouseleave(function (){
		$("#config_slide").hide();
	});
});

function sendMessage(){
	var message=$("#reclame_text").val();
	if(message!=""){
		$.post("sendMessage.php",{Mess:message},function(){$("#reclame_text").val("");});
	}
}


function send(){
	$("#content_message").load("send.php");
}

function reciv(){
	$("#content_message").load("reciv.php");
}

function showMessage(id_message){
	$("#content_message").load("showMessage.php?id_message="+id_message);
}

function Module(id_module){
	$(".content").load("Module.php?id_module="+id_module);
}


function settings(){
	$(".content").load("settings.php");
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
			$(".settings").html("<h1 style='color:#90C695;' >- Done! -</h1>");		
	 });

	console.log("Done!");

	return true;
}

/*
setInterval(function(){
	$("#content_message").load("getMessage.php");
},500);
*/


