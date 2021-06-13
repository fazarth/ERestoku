<?php 
session_destroy();
echo "<script>alert('Anda telah logout')</script>";
echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
?>