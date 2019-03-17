<?php
//session_save_path("/index/users/web/b2161/ipg.alttullinescom/staff/logintmp/");
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
if ($row["isadmin"]!=='1') {
header("location: ./index.php");
}

if(isset($_POST['update'])){
   $time = strtotime($_GET['date']);
     $stratdate= date('Y-m-d',strtotime($_GET['datestart']));
     $dat = date('Y-m-d',$time);
if(empty($_GET['date'])){
$dat= date('Y-m-d',strtotime('2030-01-01'));
}
if(empty($_GET['datestart'])){
   $stratdate= date('Y-m-d',strtotime('1990-01-01'));
}
     if($_GET['user']=='all'){
   $sql = "DELETE FROM sells WHERE day <= '$dat' And day >= '$stratdate'" ;
}else{
  $n=$_GET['user'];
   $sql = "DELETE FROM sells WHERE name = '$n' And day <= '$dat' And day >= '$stratdate'" ;
}
 $result = mysqli_query($db,$sql);
 $content=$_POST["new"];
 	$rows =explode("raw", $content);
		foreach ($rows as $value) {
			if(!empty($value)){
				 $cells = explode(",",$value);
				  $dayf= date('Y-m-d',strtotime($cells[0]));
  $sql ="INSERT INTO `sells`( `name`, `day`, `Date`, `New Fare`, `Quted`, `TKT Number`, `Airways`, `=`, `Seller`, `Cash/Credit`) VALUES ('". $cells[6] ."','".$dayf."','". $cells[0] ."','". $cells[1] ."','". $cells[2] ."','". $cells[3] ."','". $cells[4] ."','".  $cells[5] ."','". $cells[6] ."','".  $cells[7]."')";
if ($db->multi_query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}



}

}

$n='';
if(isset($_GET['edit'])){
	   $time = strtotime($_GET['date']);
     $stratdate= date('Y-m-d',strtotime($_GET['datestart']));
     $dat = date('Y-m-d',$time);
if(empty($_GET['date'])){
$dat= date('Y-m-d',strtotime('2030-01-01'));
}
if(empty($_GET['datestart'])){
   $stratdate= date('Y-m-d',strtotime('1990-01-01'));
}
     if($_GET['user']=='all'){
   $sql = "SELECT * FROM sells WHERE day <= '$dat' And day >= '$stratdate'" ;
}else{
  $n=$_GET['user'];
   $sql = "SELECT * FROM sells WHERE name = '$n' And day <= '$dat' And day >= '$stratdate'" ;
}
      	$reports='
     	<div class="form min">
	<a href="./index.php">
<img class="backimg" src="images/back.png" style="position: absolute;left: 15px;top: 5px;">
</a>
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
<div id="content">';

$id=0;
 $result = mysqli_query($db,$sql);
if($result==TRUE){
   while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

 #$onlyInfo.=$row['Date'] .',' . $row['New Fare']. ','  . $row['Quted']. ','. $row['TKT Number']. ','. $row['Airways']. ','. $row['=']. ','. $row['Seller']. ','. $row['Cash/Credit']. ',row,';
      	$id+=1;
$reports.='<ul id="'. $id . '" class="myRow"><img onclick=" remove('. $id . ')" src="images/delete.png" style="height: 24px;position: absolute;left: 10px;margin-top: 10px;cursor: pointer;"><input value="' .$row['Date'] . '"/><input value="' . $row['New Fare']. '"/><input value="' . $row['Quted'].  '"/><input value="' . $row['TKT Number']. '"/><input value="' . $row['Airways'].'"/><input value="' . $row['=']. '"/><input value="' . $row['Seller'].'"/><input value="' . $row['Cash/Credit'].'"/></ul>';
/*
$reports.='<ul class="myRow"><li><a>' .$row['Date'] . '</a></li><li><a >' . $row['New Fare']. '</a></li><li><a >' . $row['Quted'].  '</a></li><li><a >' . $row['TKT Number']. '</a></li><li><a >' . $row['Airways'].'</a></li><li><a >' . $row['=']. '</a></li><li><a>' . $row['Seller'].'</a></li><li><a >' . $row['Cash/Credit'].'</a></li></ul>';*/
      }
}
$reports .='
</div></div>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin</title>
	 <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php echo $reports; ?>
<div class="form min" style="height: 120px;">
<input id="fld1" onkeypress="add(event)" value=<?php echo date("Y-m-d");  ?> type="hidden" />
   <div class="field-wrap smolinput" style="width: 16.6%;"><label class="active">	&nbsp;	&nbsp;	&nbsp;Net Fare</label><input id="fld2"  onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput"  style="width: 16.6%;"><label class="active">	&nbsp;	&nbsp;	&nbsp;Quted</label><input id="fld3"   onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput"  style="width: 16.6%;"><label class="active">	&nbsp;	&nbsp;	&nbsp;TKT Number</label><input id="fld4"  onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput"  style="width: 16.6%;"><label class="active">	&nbsp;	&nbsp;	&nbsp;Airways</label><input id="fld5" onkeypress="add(event)" type="text" /></div>
<input id="fld6" onkeypress="add(event)" type="hidden" />
 <div class="field-wrap smolinput" style="width: 16.6%;"><label class="active">	&nbsp;	&nbsp;	&nbsp;Seller</label><input id="fld7" value=<?php echo '"' . $n . '"'; ?> onkeypress="add(event)" type="text" /></div>
   <div class="field-wrap smolinput" style="width: 16.6%;"><label class="active">	&nbsp;	&nbsp;	&nbsp;Cash/Credit</label>
   <select id="fld8" style="width: 49%;position: relative;top: 0px;left: 0px;width: 100%;height: 40px;border-radius: 0px;">
    <option value="Cash">Cash</option> <option value="Credit">Credit</option>
     <option value="By thabet">By thabet</option> <option value="Other">Other</option>
</select>
   </div>

</div>
<div class="leftform" style="height: 140px;top: 0;">
<div>
<img onclick="Save()" src="images/save.png" style="height: 30px;">
</div>
<div>
<img onclick="dr()" src="images/delete.png" style="height: 30px;">
</div>
</div>
  <form id="sv" method="post">
  	<input type="hidden" name="new" id="new" value="">
  	<input type="hidden" name="update">
  </form>
   <script type="text/javascript">
var ids;
function Save(){
	var nw='';
var nodes = document.getElementById('content').childNodes;
for(i=0; i<nodes.length; i+=1) {
    var element = nodes[i];
      	var mynodes =	element.childNodes;
try{
     		nw+=mynodes[1].value +',' + mynodes[2].value +',' + mynodes[3].value +',' + mynodes[4].value +',' + mynodes[5].value +',' + mynodes[6].value +',' + mynodes[7].value +',' +mynodes[8].value +'raw'
    } catch(err) {
    }
}
document.getElementById('new').value=nw;
	document.getElementById("sv").submit();
}

function cell(id){
	ids=id;
}
      	function remove(argument) {
      		var element = document.getElementById(argument) ;
      		element.className="myRow hid"
      		setTimeout(function(){
      			element.style="height 0px;"
element.parentNode.removeChild(element);
      		},550);

   	}

   	function dr() {
var nodes = document.getElementById('content').childNodes;
for(i=0; i<nodes.length-1; i+=1) {
    var element = nodes[i];
      		element.className="myRow hid"

}

setTimeout(function(){
document.getElementById('content').innerHTML="";
      		},550);

   	}

   	function add(e){
   		ids+=1;
   		if (e.keyCode == 13) {
var f1 = document.getElementById("fld1").value;
var f2 = document.getElementById("fld2").value;
var f3 = document.getElementById("fld3").value;
var f4 = document.getElementById("fld4").value;
var f5 = document.getElementById("fld5").value;
var f6 = f3-f2;
var f7 = document.getElementById("fld7").value;
var f8 = document.getElementById("fld8").value;
document.getElementById("content").innerHTML =document.getElementById("content").innerHTML +'<ul id="'+ ids + '" class="myRow"><img onclick="remove('+ ids + ')" src="images/delete.png" style="height: 24px;position: absolute;left: 10px;margin-top: 10px;cursor: pointer;"><input value="' + f1 + '"/><input value="'  + f2 +'"/><input value="'+ f3 +  '"/><input value="' + f4 + '"/><input value="' + f5 +'"/><input value="' + f6 + '"/><input value="' + f7 +'"/><input value="'+ f8 +'"/></ul>';

   	}}
   </script>
    <?php echo '<script type="text/javascript">
    cell(' . $id .');
    </script>'; ?>
</body>
</html>
