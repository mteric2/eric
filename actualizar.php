<?php
include("conexion.php");
include("verificar_sesion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $page = isset($_POST['page']) && is_numeric($_POST['page']) ? $_POST['page'] : 1;

    $query = "SELECT * FROM formulario2 WHERE id = '$id'";
    $result = mysqli_query($conex, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $email = $row['email'];
        $contr = $row['contraseña'];
    } else {
        echo "Registro no encontrado";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="background-carousel">
    <img src="nose5.png" class="active" alt="Fondo 1">
    <img src="valle.jpg" alt="Fondo 2">
    <img src="paraiso.jpg" alt="Fondo 3">
    <img src="nose6.png" alt="Fondo 4">
  </div>
    <form class="form-register" method="post" action="actualizar_procesos.php">
        <h4>Actualizar Registro</h4>
        <input type="text" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="page" value="<?php echo $page; ?>">
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br>
        <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>"><br>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br>
        <input type="text" id="contr" name="contr" value="<?php echo $contr; ?>"><br>
        <button type="submit">Actualizar</button>
        <button type="button" onclick="location.href='admin.php?page=<?php echo $page; ?>'">Cancelar</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
