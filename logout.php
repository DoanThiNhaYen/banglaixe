<?php
   session_start();
   unset($_SESSION["ten"]);
   
   
   echo 'Bạn đã xóa session';
   header("location:index.php");
?>