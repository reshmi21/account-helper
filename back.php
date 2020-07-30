<?php
session_start();
session_destroy();
unset($_SESSION['IS_LOGIN']);
header('location:index.php');
?>