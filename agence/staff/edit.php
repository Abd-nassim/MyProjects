<?php
//session_save_path("/home/users/web/b2161/ipg.alttullinescom/staff/logintmp/");
 session_start();
 $user="root";
 $pass="nas4";
 $host="localhost";
 $dbname="worckstation";
$db= new mysqli($host,$user,$pass,$dbname);
if ($db->connect_error) {
    die("Error 1"  );
}

if(!isset($_SESSION['login_Email'])){
header("location: ./index.php");
}
$myemail=$_SESSION['login_Email'];
 $sql = "SELECT * FROM users WHERE email = '$myemail' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $fn=$row['firstname'];
       $ln=$row['lastname'];
      	if($row['canadd']!==date( 'Y-m-d')){
echo '<html><head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div class="form" style="width: 385px;padding: 14px 45px;"><h3 style="
    color: red;
">No Reports For today . </h3>
<form action="./new.php">
<button class="button button-block">Create</button> </form> </div>
  </body></html>';
exit();
     }

if (isset($_POST['save'])){
	if(!empty($_POST['tabel'])){
	  $name=$fn ." " . $ln;
     $dat=date('Y-m-d');
      $sql = "DELETE FROM sells WHERE name = '$name' And day = '$dat'" ;
      $result = mysqli_query($db,$sql);

		$rows =explode(",row,",$_POST['tabel']);
	foreach ($rows as $value) { {
			if(!empty($value))
    $cells =explode(",",str_replace(",row","",$value));
if(!empty($cells[0] )){
  $sql ="INSERT INTO `sells`( `name`, `day`, `Date`, `New Fare`, `Quted`, `TKT Number`, `Airways`, `=`, `Seller`, `Cash/Credit`) VALUES ('".$fn ." " . $ln ."','".date('Y-m-d')."','". $cells[0] ."','". $cells[1] ."','". $cells[2] ."','". $cells[3] ."','". $cells[4] ."','".  $cells[5] ."','". $cells[6] ."','".  $cells[7]."')";
if ($db->multi_query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}}



}}

     $contaner="";
     $onlyInfo="";
     $name=$fn ." " . $ln;
     $dat=date('Y-m-d');
      $sql = "SELECT * FROM sells WHERE name = '$name' And day = '$dat'" ;
      $result = mysqli_query($db,$sql);
if($result==TRUE){
   while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

 $onlyInfo.=$row['Date'] .',' . $row['New Fare']. ','  . $row['Quted']. ','. $row['TKT Number']. ','. $row['Airways']. ','. $row['=']. ','. $row['Seller']. ','. $row['Cash/Credit']. ',row,';
$contaner.='<ul class="myRow"><li><a>' .$row['Date'] . '</a></li><li><a >' . $row['New Fare']. '</a></li><li><a >' . $row['Quted'].  '</a></li><li><a >' . $row['TKT Number']. '</a></li><li><a >' . $row['Airways'].'</a></li><li><a >' . $row['=']. '</a></li><li><a>' . $row['Seller'].'</a></li><li><a >' . $row['Cash/Credit'].'</a></li></ul>';

      }
}



 ?>
 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Edit</title>
  <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">


  </head>
  <body>

<div class="topbar form">
<a href="./index.php">
<img class="backimg" src="images/back.png" style="position: absolute;left: 15px;top: 10px;">
</a>
  <img src="images/Edit.png" style="
    top: 10px;
    position: relative;
"><h3><a href="./new.php" style="
    top: -40px;
    position: relative;
    left: 50px;
">Edit Last Sell Report</a></h3></div>
<form id="myform" method="post"><input type="hidden" name="tabel" id="sender" value=""><input type="hidden" name="save"></form>
<div class="leftform">
<div>
	<img  onmouseenter="playone('one','one2')" onmouseleave="playoff('one','one2')" src="images/delete.png" onclick="killrow()">
	<a id="one" class="pup">
	<div></div>
  </a>
  <h4  id="one2" class="txt">Delete Last row In  Tabel</h4>
</div>


<div>
	 <img onmouseenter="playone('th','th2')" onmouseleave="playoff('th','th2')" onclick="send()" src="images/save.png">
    <a id="th" class="pup">
	<div></div>
  </a>
  <h4  id="th2" class="txt">Save Tabel Data to Server</h4>
    </div>




  <div>
    <img onmouseenter="playone('f','f2')" onmouseleave="playoff('f','f2')" onclick="Clear()" src="images/rest.png">
  <a id="f" class="pup">
	<div></div>
  </a>
  <h4  id="f2" class="txt">Clear All Data in This Tabel  </h4>
</div>

</div>
<div class="form min">
<div>
<ul class="myul">
  <li><a >Date</a></li>
  <li><a >Net Fare</a></li>
  <li><a >Quted</a></li>
  <li><a >TKT Number</a></li>
   <li><a >Airways</a></li>
  <li><a >=</a></li>
  <li><a >Seller</a></li>
  <li><a >Cash/Credit</a></li>
</ul>
</div>
<div id="contaner">


</div>
</div>
<div class="form min" style="height: 120px;">
<input id="fld1" onkeypress="add(event)" value=<?php echo date("Y-m-d");  ?> type="hidden" />
   <div class="field-wrap smolinput"><label class="active">	&nbsp;	&nbsp;	&nbsp;Net Fare</label><input id="fld2" onchange="counter()" onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput"><label class="active">	&nbsp;	&nbsp;	&nbsp;Quted</label><input id="fld3" onchange="counter()" onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput"><label class="active">	&nbsp;	&nbsp;	&nbsp;TKT Number</label><input id="fld4"  onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput"><label class="active">	&nbsp;	&nbsp;	&nbsp;Airways</label><input id="fld5" onkeypress="add(event)" type="text" /></div>
<input id="fld6" onkeypress="add(event)" type="hidden" />
 <input id="fld7" onkeypress="add(event)" value=<?php echo '"' . $name .'"';  ?> type="hidden" />
   <div class="field-wrap smolinput"><label class="active">	&nbsp;	&nbsp;	&nbsp;Cash/Credit</label><select id="fld8" style="width: 49%;position: relative;top: 0px;left: 0px;width: 100%;height: 40px;border-radius: 0px;">
    <option value="Cash">Cash</option> <option value="Credit">Credit</option>
     <option value="By thabet">By thabet</option> <option value="Other">Other</option>
</select>
</div>

</div>

  <script type="text/javascript">
  var lastrow ='';
  var contaner ='';
  var onlyInfo=[] ;
function add(e){
if (e.keyCode == 13) {
var f1 = document.getElementById("fld1").value;
var f2 = document.getElementById("fld2").value;
var f3 = document.getElementById("fld3").value;
var f4 = document.getElementById("fld4").value;
var f5 = document.getElementById("fld5").value;
var f6 = f3-f2;
var f7 = document.getElementById("fld7").value;
var f8 = document.getElementById("fld8").value;
onlyInfo.push([f1 ,f2,f3,f4,f5,f6,f7,f8,"row"]);
lastrow='<ul class="myRow"><li><a>' + f1 + '</a></li><li><a >' + f2 + '</a></li><li><a >' + f3 + '</a></li><li><a >' + f4 + '</a></li><li><a >' + f5 + '</a></li><li><a >' + f6 + '</a></li><li><a>' + f7 + '</a></li><li><a >' + f8 + '</a></li></ul>';
contaner = contaner + lastrow;
document.getElementById("contaner").innerHTML= contaner;
document.getElementById("sender").value= onlyInfo;
 }
}

function killrow(){
	contaner =contaner.replace(lastrow,"");
	onlyInfo.splice(onlyInfo.length-1,1);
document.getElementById("contaner").innerHTML= contaner;
var prts=onlyInfo[onlyInfo.length-1];
lastrow='<ul class="myRow"><li><a>' + prts[0] + '</a></li><li><a >' + prts[1]  + '</a></li><li><a >' + prts[2]  + '</a></li><li><a >' + prts[3]  + '</a></li><li><a >' + prts[4]  + '</a></li><li><a >' + prts[5]  + '</a></li><li><a>' + prts[6]  + '</a></li><li><a >' + prts[7]  + '</a></li></ul>';
document.getElementById("sender").value= onlyInfo;
}
function Clear(){
	onlyInfo=[] ;
	contaner='';
	document.getElementById("contaner").innerHTML= contaner;
	document.getElementById("sender").value= onlyInfo;

}
function send(){
	if(onlyInfo.length>0){
			document.getElementById("myform").submit();
		}
}

  var isOut =false;
  function playone(str,str2) {
		  	isOut =true;
		 document.getElementById(str).className="pup ply";
		 document.getElementById(str2).className="txt textAnim";
       }
  	  	function playoff(str,str2) {
  	  		if(isOut==true){
 document.getElementById(str).className="pup retuern";
 document.getElementById(str2).className="txt textretuern";
  isOut =false;
  	}}

  	function setup(cont,only){
contaner=cont;
onlyInfo=[];
var arr =only.split(",row,");

for (var i = 0, len = arr.length; i < len; i++) {
	var arrx=arr[i].split(",");
	if(arrx){
onlyInfo.push([arrx[0] ,arrx[1] ,arrx[2] ,arrx[3] ,arrx[4] ,arrx[5] ,arrx[6] ,arrx[7] ,"row"]);
}
}
	document.getElementById("contaner").innerHTML= contaner;
}
  </script>
    <?php
   echo "<script type='text/javascript'>setup('".  $contaner ."','".  $onlyInfo."')</script>";
    ?>
  </body>
  </html>
