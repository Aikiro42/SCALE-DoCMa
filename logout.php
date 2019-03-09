<?php
	session_save_path('\tmp');
   session_start();
   
   if(session_destroy()) {
      header("Location: index.php");
   }
?>