
<?php
$servername = "localhost";
$database = "vitalverde";
$username = "vitalverde";
$password = "12345";

// Crear conexión
$conex = mysqli_connect($servername, $username, $password, $database);

// Verificar conexión
if (!$conex) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
