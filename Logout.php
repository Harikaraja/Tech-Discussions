<?php 
session_start();
echo 'Loggig You out please wait!!!!';

 session_destroy();
 
 header("Location:./index.php");
?>