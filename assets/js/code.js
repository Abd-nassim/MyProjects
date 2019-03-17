function login(){
        var login = 1;
        var emailLogin = document.getElementById('emailLogin').value;
        var passwordLogin = document.getElementById('passwordLogin').value;
       console.log(emailLogin + passwordLogin );
       $.post('../assets/php/model.php',{login:login,emailLogin:emailLogin,passwordLogin:passwordLogin},function(show){
        alert('done');
       });
} function signUp(){
       var signUp = 1;
       var name = document.getElementById('name').value;
       var email = document.getElementById('email').value;
       var password = document.getElementById('password').value;
       var numero = document.getElementById('numero').value;

      console.log(name + email + password);
      $.post('../assets/php/model.php',{signUp:signUp,name:name,email:email,password:password,numero:numero},
      function(data,succes){
        $("#LoginModal").modal('show');
      });
} function addCart(id_article){
       var addCart = 1;
       var id_client = document.getElementById('id_client').value;
       var prixId = 'prix'+id_article;
       var prix = document.getElementById(prixId).value;

      console.log(prix );
      $.post('../assets/php/model.php',{addCart:addCart,id_article:id_article,id_client:id_client,prix:prix},function(){
        location.replace("index.php");

      });
} function checkPay(id){
      if(id==0){
        $("#LoginModal").modal('show');
      }else {
        $("#PayModal").modal('show');
  }
} function NbrPanier(id) {
        var NbrPanier = 1;
        var id_client = document.getElementById('id_client').value;
        var prix = 'prixUnitaire'+id;
        var prixUnitaire = document.getElementById(prix).value;
        var nombreid = 'number'+id;
        var nombre = document.getElementById(nombreid).value;
        var prixFinal = prixUnitaire * nombre;
      if(nombre > 0){
        $.post('../assets/php/model.php',{NbrPanier:NbrPanier,nombre:nombre,id:id,id_client:id_client,prixFinal:prixFinal},
        function(){
          location.reload();
        });
        }else {
          alert("nombre invalide");
        }

} function deleteCart(id){
  var deleteCart = 1;
  var id_client = document.getElementById('id_client').value;
  $.post('../assets/php/model.php',{deleteCart:deleteCart,id:id,id_client:id_client},
  function(){
    location.reload();
  });

}   function AdminPanel(value) {

    document.getElementById('input').value = value;
    document.getElementById('submit').click();
    document.getElementById(value).className ="active";




}
function AdminPanelAjax(value) {

  var getdata = 1 ;

      if(value == "home"){

         $(".col-md-10").load("boxes.php",function(){
   });

    }else{

      $.post('../assets/php/model.php' ,{getdata:getdata,value:value},function(data){
          $(".col-md-10").html(data);
      });

    }
    $('#loading').show(0).delay(500).hide(0);


} function DeleteRow(id){
      var DeleteRow = 1;
      var tableName = document.getElementById('table').value;
      $.post('../assets/php/model.php',{DeleteRow:DeleteRow,id:id,tableName:tableName},
      function(){
        location.reload();
      });
}
function UpdateRows(id){
event.preventDefault();

     var UpdateRows = 1;
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

      $.post('../assets/php/model.php',{UpdateRows:UpdateRows,id:id,maxfilds:maxfilds,tableName:tableName,row:row,col:col},
        function show(data,status){
          location.reload();

      });



  console.log(row);
  console.log(col);

}
function Livraison(id){
  var Livraison = 1 ;

  $.post('../assets/php/model.php',{Livraison:Livraison,id:id},
  function show(data,status){
    location.reload();

});


}
function AddAdmin(){

  $("#AddModal").modal('show');


} function NewData(){
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
  $.post('../assets/php/model.php',{NewData:NewData,tableName:tableName,col:col,data:data,maxfilds:maxfilds},
  function retrun(data,status){

    location.reload();
});



} function file() {
  document.getElementById('file').click();


} function payement(){
  var payement = 1;
  var id_client  = $('#id_client').val();
  var sum  = $('#sum').val();

  var nom_carte  = $('#nom_carte').val();
  var numero_carte = $('#numero_carte').val();
  var cvc = $('#cvc').val();
  var date_expiration = $('#date_expiration').val();
  var today = $('#today').val();

  a = new Date(today);
  b = new Date(date_expiration)
  if(b <  a ){
    $("#date_expiration").css("background-color", "pink");
  }else{

    $.post('../assets/php/model.php',{payement:payement,nom_carte:nom_carte,numero_carte:numero_carte,cvc:cvc,date_expiration:date_expiration,id_client:id_client,sum:sum},
    function retrun(data,status){
      alert(data);
  });

}

} function rate(number,id_article){
  Rate = 1;
  rateID = "rate"+number;
  id_client = $('#id_client').val()

  var element = document.getElementById(rateID).className ="fa fa-star checked";

  $.post('../assets/php/model.php',{Rate:Rate,number:number,id_article:id_article,id_client:id_client},
  function retrun(data,status){

    location.reload();

  });
  console.log(id_article);

}
