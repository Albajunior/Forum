<?php
session_start();
$_SESSION=[];
session_destroy();
//sortir d 2 dossiers
header('location:../../login.php');
?>