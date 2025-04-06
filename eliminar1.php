<?php
include("conexion_agregados.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM usuarios WHERE id = '$id'";
    if (mysqli_query($conex, $query)) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error eliminando el registro: " . mysqli_error($conex);
    }

    mysqli_close($conex);

    // Redirigir de vuelta a la página principal
    header("Location: usuario.php");
    exit;
}
?>
