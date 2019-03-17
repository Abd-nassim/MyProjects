$(document).ready(function(){
	console.log("- - - - ");
	$("#config").click(function(){
		$("#config_slide").toggle();
	});

	$("input").keyup(function(event){
    if(event.keyCode == 10){
        console.log("and I hope its working! with i: ");
    }
	});
});

var tp_tab=true;

function test(matt_etu,i,type,module,Evalu,method,event,m){
	 if(event.keyCode == 13){
	 	if(!valide(matt_etu,i,type,module,Evalu,method))
	 		return false;
		var n=i;
		n++;
		if($("#td"+"_"+n).is(":visible") && type==1 || type==2){
			m='td';
			$("#td"+"_"+n).select();
		}
		 else if($("#tp"+"_"+n).is(":visible") && type==1 || type==3){
			m='tp';
			$("#tp"+"_"+n).select();
		}
		else if($("#ex"+"_"+n).is(":visible") ){
			m='ex';
			$("#ex"+"_"+n).select();
		}

		$("#"+m+"_"+n).focus();
	}
}

function valide(matt_etu,i,type,module,Evalu,method){
	console.log(matt_etu+" "+i+" "+type+" "+module+" "+Evalu+" "+method);

	var err=0;
	var moyenne=0;
	if(type==2 || type==1){
		var td=document.getElementById('td_'+i);
		td.style.backgroundColor='white';	
		if(td.value<0 || td.value >20 || td.value==''){
		td.style.backgroundColor='pink';
		err++;
		}

	}

	if (type==3 || type==1){
		var tp=document.getElementById('tp_'+i);
		tp.style.backgroundColor='white';
		if(tp.value<0 || tp.value >20 || tp.value==''){
		tp.style.backgroundColor='pink';
		err++;
		}
	}

	
	var ex=document.getElementById('ex_'+i);
	ex.style.backgroundColor='white';
	
	if(ex.value<0 || ex.value >20 || ex.value==''){
		ex.style.backgroundColor='pink';
		err++;
	}

	if(type==2){
		var tp=td;
	}
	if(type==3){
		var td=tp;
	}

	if(Evalu==1){
		moyenne=(((parseInt(tp.value)+parseInt(td.value))/2+parseInt(ex.value)*2)/3);
	} else if (Evalu==2){
		moyenne=((parseInt(tp.value)+parseInt(td.value))/2+parseInt(ex.value))/2;
	}

	if(err>0) return false;


	console.log(matt_etu+" "+module+" "+td.value+" "+tp.value+" "+ex.value+" "+ moyenne);

		if(method=="update"){
			$.post("updateNote.php",{matt_etu:matt_etu,Module:module,Td:td.value,Tp:tp.value,Ex:ex.value,moyenne:moyenne});
			$("#moy_"+i).val(moyenne);
		} else if(method=="add"){ 
			$.post("addNote.php",{matt_etu:matt_etu,Module:module,Td:td.value,Tp:tp.value,Ex:ex.value,moyenne:moyenne});
			$("#div_"+i).css({backgroundColor:'#6C7A89'});
			$("#moy_"+i).val(moyenne);
			console.log("<div id='update_"+i+"' class='edit_button' onclick='valide('"+matt_etu+"',"+i+","+type+","+module+","+Evalu+",'"+method+"')'></div>");
			$("#add_"+i).html("<div id='update_"+i+"' class='edit_button' onclick='valide(\""+matt_etu+"\","+i+","+type+","+module+","+Evalu+",\""+method+"\")'></div>");
		}
	

		
	return true;

}	


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

function getModule(module,type){
 console.log(module,type);
$(".content").load("allGroupe.php?module="+module+"&type="+type);
}

function getGroupe(module,type,groupe){
 console.log(module+" "+type+" "+groupe);
$(".content").load("allGroupe.php?module="+module+"&type="+type+"&groupe="+groupe);
}

function hideAll(type){
		if(type==1 || type==2)
		$(".td_data").hide();
	$(".tp_data").hide();
		if(type==1 || type==3)
	$(".ex_data").hide();
	$(".moy_data").hide();
}
function allOption(type){
	console.log("all working");
	if(type==1 || type==2)
		$(".td_data").show();
	$(".tp_data").show();
		if(type==1 || type==3)
	$(".ex_data").show();
	$(".moy_data").show();
}

function tdOption(type){
	hideAll(type);
	console.log("td working");
	$(".td_data").show();
}

function tpOption(type){
	hideAll(type);
	console.log("tp working");
	$(".tp_data").show();
}

function exOption(type){
	hideAll(type);
	console.log("ex working");
	$(".ex_data").show();
}

function moyOption(type){
	hideAll(type);
	console.log("moy working");
	$(".moy_data").show();
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


