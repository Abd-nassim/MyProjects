function NewData(){
  var col = [];
  var data = [];
  var  NewData = 1;
  var maxfilds = document.getElementById('maxfilds').value;
  var tableName = document.getElementById('table').value;
  for (var i = 0; i < maxfilds; i++) {
    var colones = 'colones'+i;
     col[i] = document.getElementById(colones).value;

     if(col[i] =="image"){
       data[i] =  $("#file-upload").val().split('\\').pop();
     }else{
       data[i] = document.getElementById(col[i]).value;

}
  }
  console.log(col );
    console.log(data );
  $.post('../models/model.php',{NewData:NewData,tableName:tableName,col:col,data:data,maxfilds:maxfilds},
  function retrun(data,status){
    console.log(data);
    //location.reload();
});



}


function commande(){

    var post = "commande";
    var Nom = document.getElementById('Nom').value;
    var Email = document.getElementById('Email').value;
    var Prenom = document.getElementById('Prenom').value;
    var Numero = document.getElementById('Numero').value;
    var Address = document.getElementById('address').value;

    var _token = document.getElementById('_token').value;

    //  console.log(Nom + Email + Prenom + Numero + _token);

      if (Nom =="" || Email =="" || Prenom =="" || Numero =="" || Address =="") {
        alert('remmplisez tout les champs ');
      }else {




    $.post('../assets/boot/bootup.php',{_token:_token},
        function(data,succes){
        if(data =="good"){
          $.post('../models/model.php',{post:post,Nom:Nom,Email:Email,Prenom:Prenom,Numero:Numero,Address:Address},
              function(data,succes){
                //location.reload();
                alert("commande reussite on vous applera pour confirmer , merci !");
                location.replace("index.php");

          });

       }else {
          alert("erreur please repeat again!")
        }
      location.reload();
    });

}

}
function DeleteRow(id){
     var post = "DeleteRow";
     var tableName = document.getElementById('table').value;
     $.post('../models/model.php',{post:post,id:id,tableName:tableName},
     function(data,succes){
      // alert(data);
       location.reload();
     });
}
function UpdateRows(id){

    var post = "UpdateRows";
     var row = [];
     var col = [];
     var maxfilds = document.getElementById('maxfilds').value;
     var tableName = document.getElementById('table').value;
     for (var i = 0; i < maxfilds; i++) {
       var colones = 'colones'+i;
       var inputRow = id+'.'+i;

        col[i] = document.getElementById(colones).value;
        row[i] = document.getElementById(inputRow).value;
     }
     //alert( tableName );
     console.log(    col[i]  );


     $.post('../models/model.php',{post:post,id:id,maxfilds:maxfilds,tableName:tableName,row:row,col:col},
       function show(data,succes){
         //alert(data);
         location.reload();

     });



 console.log(row);
 console.log(col);

}
