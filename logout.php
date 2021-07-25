<?php
    require("connection.inc.php");
       unset ($_SESSION['LOGIN']);      
      unset ( $_SESSION['USER_ID']);
      unset( $_SESSION['USERNAME']);
      header('location:index.php');
      die();
   
?>