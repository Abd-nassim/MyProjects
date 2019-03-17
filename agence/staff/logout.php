<?php

   //session_save_path("/home/users/web/b2161/ipg.alttullinescom/staff/logintmp/"); 
 session_start();

   if(session_destroy()) {
      header("Location: ./index.php");
   }
?>
