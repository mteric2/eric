<?php
include("conexion_agregados.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $id_cargo = $_POST['id_cargo'];
    $correo = $_POST['correo'];
    $contr = $_POST['contr'];

    $query = "UPDATE usuarios SET nombre='$nombre', usuario='$usuario', id_cargo='$id_cargo', correo='$correo', contraseña='$contr' WHERE id='$id'";
    if (mysqli_query($conex, $query)) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error actualizando el registro: " . mysqli_error($conex);
    }

    mysqli_close($conex);

    // Redirigir de vuelta a la página principal
    header("Location: usuario.php");
    exit;
}
?>
