<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$("#button").click(function(){
     
    $.ajax({
       url : 'index.php', // La ressource ciblée
       type : 'GET', // Le type de la requête HTTP

       /**
        * Le paramètre data n'est plus renseigné, nous ne faisons plus passer de variable
        */

       dataType : 'html' // Le type de données à recevoir, ici, du HTML.
    });
   
});

</script>
</head>
<body>

<button>Send an HTTP POST request to a page and get the result back</button>

</body>
</html>
