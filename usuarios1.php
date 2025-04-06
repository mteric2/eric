<?php
include("verificar_sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASE MARITIMA CORAL </title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="registroadm.css">
    <script src="https://kit.fontawesome.com/af1d67052b.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <section>
<center><br><h1>BIENVENIDO, <?php echo $_SESSION['usuario']; ?></h1><br></center>
<center><a class="boton1" href="cerrar_sesion.php"><p>CERRAR SESIÓN</p><i class="fa-solid fa-arrow-right-from-bracket fa-lg " style="color: #ff0000;"></i></a></center>

    <?php include("mostrarusuario.php"); ?>
    
    </section>
    <!-- Contenido protegido -->
</body>
</html>
