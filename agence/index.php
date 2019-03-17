
<?php
//session_save_path("/home/users/web/b2161/ipg.alttullinescom/staff/logintmp/");

 session_start();
$user="hakim";
$pass="AQZhgtr@GDF513265VCF";
$host="alttullinescom.ipagemysql.com";
$dbname="worckstation";

$db= new mysqli($host,$user,$pass,$dbname);
if ($db->connect_error) {
    die("Error 1"  );
}

if(!isset($_SESSION['login_Email'])){
header("location: home.php");
}
     $result = mysqli_query($db,"SELECT SUM(Solde) AS value_sum FROM clients_sells where client='cash' ");
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$cash=$row['value_sum'];



$result1 = mysqli_query($db,"SELECT SUM(Solde) AS value_sum FROM clients_sells where client='credit' ");
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

$credit=$row1['value_sum'];







$result2 = mysqli_query($db,"SELECT SUM(Solde) AS value_sum FROM clients_sells where client!='cash' and client!='credit'");
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

$Others=$row2['value_sum'];

$a=$cash;
$b=$credit;
$motah=$a+$b;

$c=$Others;
$d=" 20";
$motah=$a+$b;
$koli=$motah+$c;

$mo3alaq=$c;

$myemail=$_SESSION['login_Email'];


$result3 = mysqli_query($db,"SELECT * FROM users WHERE email = '$myemail' ");
$row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);


$fn=$row3['firstname'];
$ln=$row3['lastname'];
$mymsg=$row3['msg'];
$chiled="";
$Viwer="";
$musers='<option value="all">All</option>';
       $sql = "SELECT * FROM users" ;
      $result = mysqli_query($db,$sql);
if($result==TRUE){
   while ($xrow = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
$musers .=' <option value="'. $xrow['firstname'] ." " . $xrow['lastname']  .'">'. $xrow['firstname'] ." " . $xrow['lastname']  .'</option>';
   }}

if ($row3["isadmin"]=='1') {
$payement='';


$chiled='<a href="admin.php"><img src="images/admin.png" style="right: 10px;"></a>';
$Viwer='
<div class="form" id="vr" style="display: none;position: absolute;z-index: 5000;left: 40%;width: 20%;">
<h3 onclick="reph()" style="cursor: pointer;position: absolute;top: 0px;right: 27px;">X</h3>
<form id="rep" action="admin.php" method="post">
  <h3>From :</h3>
<input type="date" name="datestart">
    <h3>To :</h3>
<input type="date" name="date">
  <h3>User :</h3>
<select name="user" style="width: 49%;position: relative;top: 0px;left: 0px;width: 100%;height: 40px;border-radius: 0px;">
'. $musers . '
</select>
<p></p>
<button class="button button-block" name="vard">View</button>
</form>
</div>
 <script type="text/javascript">
    function rep(){
      //vr
      document.getElementById("vr").style="display: block;position: absolute;z-index: 5000;left: 40%;width: 20%;"
    }
      function reph(){
      //vro
      document.getElementById("vr").style="display: none;position: absolute;z-index: 5000;left: 40%;width: 20%;"
    }
 </script>

<div class="form smal"><img src="images/clients.png"><h3><a href="client/clients.php">Clients</a></h3></div>


<div class="form smal" style="position: absolute;  right: 44px;  top: 144px;  width: 372px;  height: 218px;">
    <img src="images/payement.png">

    <p style="font-size:20px;right:0px;position:relative;left:0;text-align:right;">$'. $koli . ': رصيد كامل</p>
    <p style="font-size:20px;right:0px;position:relative;left:0;text-align:right;">$'. $motah . ':رصيد متاح</p>
    <p style="font-size:20px;right:0px;position:relative;left:0;text-align:right;">$'. $c . ':رصيد معلق </p>
    <p style="font-size:20px;right:0px;position:relative;left:0;text-align:right;">$'. $d . ': رصيد قابل لسحب</p>

    </div>

';

}

else {
  $Viwer='<div class="form smal"><img src="images/clients.png"><h3><a href="client/clients.php">Clients</a></h3></div>
';
}

if ($row3["isadmin"]=='2') {


  $Viwer='<div class="form smal"><img src="images/clients.png"><h3><a href=client/clients.php">Clients</a></h3></div>
';


}

 ?>
 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Home</title>
<link rel="icon" href="images/logo_png_T.png">
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>


  <body>


<img src="images/logo_png_T.png" style="
    position: fixed;
    height: 400px;
    bottom: 20px;
    left: 100px;
">
<div class="formProfile smal left"><img src="images/profile.svg"><?php echo $chiled; ?><h3><a class="black" href="profile.php"><?php echo $fn ." " . $ln ;  ?></a></h3></div>
<?php
if(!empty($mymsg)){
  echo '<div id="content" style="position: fixed;left: -90000px"></div>
<div id="msg" class="message formProfile smal "><img src="images/msg.png"><h4><a>New Message</a></h4><p></p><h5>' . base64_decode($mymsg) . '</h5><button onclick="hide()" class="button button-block" style="height: 35px;font-size: 12px;">Ok</button>
';
}

 ?>
 <script type="text/javascript">
  function hide() {
    document.getElementById("msg").style=" display: none;";
        document.getElementById("content").innerHTML='<object type="text/html" data="msg.php" style="height: 0;"></object>';
  }
  function downloadReports(){
   document.getElementById("content").innerHTML='<object type="text/html" data="downloadReports.php?command=all" style="height: 0;"></object>';
  }

</script>
</div>
<?php echo $Viwer; ?>
<div class="form smal"><img src="images/edit.png"><h3><a href="repport/All_repport.php">Create/Edit Sell Report</a></h3></div>

<div class="form smal"><img src="images/profile.png"><h3><a href="profile.php">Edit My Profile Info</a></h3></div>
<div class="form smal"><img src="images/logout.png"><h3><a href="logout.php">Logout</a></h3></div>

  </body>
  </html>
