<?php

$user="root";
$pass="nas4";

$host="localhost";
$dbname="magdi90_Test";
$db= new mysqli($host,$user,$pass,$dbname);
if ($db->connect_error) {
    die("Error 1"  );
}
 ?>
