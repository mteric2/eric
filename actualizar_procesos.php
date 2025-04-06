<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contr = $_POST['contr'];
    $page = isset($_POST['page']) && is_numeric($_POST['page']) ? $_POST['page'] : 1;

    $query = "UPDATE formulario2 SET nombre='$nombre', apellido='$apellido', email='$email', contraseña='$contr' WHERE id='$id'";
    if (mysqli_query($conex, $query)) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error actualizando el registro: " . mysqli_error($conex);
    }

    mysqli_close($conex);

    // Redirigir de vuelta a la página principal
    header("Location: admin.php?page=$page");
    exit;
}
?>
