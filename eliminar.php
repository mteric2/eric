<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $page = isset($_POST['page']) && is_numeric($_POST['page']) ? $_POST['page'] : 1;

    $query = "DELETE FROM formulario2 WHERE id = '$id'";
    if (mysqli_query($conex, $query)) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error eliminando el registro: " . mysqli_error($conex);
    }

    mysqli_close($conex);

    // Redirigir de vuelta a la página principal
    header("Location: admin.php?page=$page");
    exit;
}
?>
