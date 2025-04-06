<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "attendance";

// Crear conexión
$conex = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}
?>
