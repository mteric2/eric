<?php
include("conexion.php");
include("verificar_sesion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "SELECT * FROM usuarios WHERE id = '$id'";
    $result = mysqli_query($conex, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $nombre = $row['nombre'];
        $usuario = $row['usuario'];
        $id_cargo = $row['id_cargo'];
        $correo = $row['correo'];
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
    
    <form class="form-register" method="post" action="actualizar_procesos1.php">
    <h4>Actualizar Usuario</h4>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

       
        <input type="text" id="id" name="id" value="<?php echo $id; ?>"><br>

        
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br>

        
        <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>"><br>

        
        <input type="text" id="id_cargo" name="id_cargo" value="<?php echo $id_cargo; ?>"><br>

        <input type="text" id="correo" name="correo" value="<?php echo $correo; ?>"><br>

      
        <input type="text" id="contr" name="contr" value="<?php echo $contr; ?>"><br>

        <button type="submit">Actualizar</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
