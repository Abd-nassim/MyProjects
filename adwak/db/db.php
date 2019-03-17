<?php


 $GLOBALS['db']  = new PDO('mysql:host=localhost;dbname=adwak' , 'root' , '');

  if(!$db){
    die();
    echo "error";

  }
