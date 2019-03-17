

 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Clients</title>

  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

<div class="topbar form">

<a href="index.php">
<img class="backimg" src="../images/back.png" style="position: absolute;left: 15px;top: 10px;">
</a>
  <img src="../images/add.png" style="
    top: -8px;
    position: relative;
"><h3><a href="/new.php" style="
    top: -40px;
    position: relative;
    left: 50px;
">All the clients</a></h3>

</div>








</div>

<div class="form min">
<div>
  <table class="table" id="table">
    <thead class="thead-inverse">
      <tr>

        <th>id</th>
        <th>Name</th>
        <th>lastname</th>
        <th>Credit</th>


      </tr>
    </thead>

    <?php

    $db = new PDO('mysql:host = localhost;dbname=worckstation','root','nas4');

    $result = array();

    $recup = $db->query("SELECT * FROM clients ");

    while($all =$recup->fetch())
    {
      $result[] = $all;
    }

foreach ($result as $result) {
  echo '
  <form method="post" action="">

    <tbody>
      <tr>

        <td>'.$result['id'].' </td>
        <td>'.$result['name'].' </td>
        <td>'.$result['lastname'].' </td>
        <td>'.$result['credit'].' </td>


      </tr>

    </tbody>
</div>


</div>


</form>
'; }  echo ' </table>';

?>




</script>
  </body>
  </html>
