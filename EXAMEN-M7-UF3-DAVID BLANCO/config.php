<?php 

$host= 'mysql-blanco043.alwaysdata.net';
$dbname = 'blanco043_examenuf3';
$username = 'blanco043';
$password = 'EmgedD04';


$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli -> connect_error){
    die("error de conexion: " . $mysqli-> connect_error);
}else {
    //echo 'Conexion Exitosa';
}
?>