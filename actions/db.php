<?php
try {
 // Create connection
$bdd = new PDO('mysql:host=localhost;dbname=phpproject-forum;charset=utf8','root','');
} catch (\Throwable $th) {
    die("Connection failed: " . mysqli_connect_error());
}


