<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Base de datos
    $servername = "localhost";
    $database = "vitalverde";
    $username = "vitalverde";
    $password = "12345";

    // Recuperación de datos
    
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $email = $_POST['email'] ?? null;
    $contr =($_POST['contr'] ?? '');

    // Conexión a la base de datos
    $conexion = mysqli_connect($servername, $username, $password, $database);

    // Verificar la conexión
    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insertando valores
    $sql = "INSERT INTO formulario2 ( nombre, apellido, email, contraseña) VALUES ( $nombre', '$apellido', '$email', '$contr')";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
    ?>
    <br>
</body>
</html>
