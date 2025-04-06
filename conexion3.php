<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("verificar_sesion.php");
    // Base de datos
    $servername = "localhost";
    $database = "vitalverde";
    $username = "vitalverde";
    $password = "12345";

    // Recuperación de datos
    $nombre = $_POST['nombre'] ?? null;
    $usuario = $_POST['usuario'] ?? null;
    $id_cargo = $_POST['id_cargo'] ?? null;
    $correo = $_POST['correo'] ?? null;
    $contraseña =($_POST['contraseña'] ?? '');

    // Conexión a la base de datos
    $conexion = mysqli_connect($servername, $username, $password, $database);

    // Verificar la conexión
    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insertando valores
    $sql = "INSERT INTO usuarios (nombre, usuario, id_cargo, correo, contraseña) VALUES ('$nombre', '$usuario', '$id_cargo', '$correo', '$contraseña')";

    if (mysqli_query($conexion, $sql)) {
        header("Location: usuario.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
    ?>
    <br>
    <button><a href="admin.php">Regresar al inicio</a></button>
</body>
</html>
