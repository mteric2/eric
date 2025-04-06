<?php
include("verificar_sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASE MARITIMA CORAL</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://kit.fontawesome.com/af1d67052b.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="sidebar_nav">
        <a href="admin.php"><i class="fa-solid fa-house fa-lg" style="color: #162f5a;"></i> INICIO</a>
        <a href="usuario.php"><i class="fa-solid fa-users fa-lg" style="color: #162f5a;"></i> USUARIOS</a>
        <a href="subir.php"><i class="fa-solid fa-upload fa-lg" style="color: #162f5a;"></i> CREAR COTIZACIÓN</a>
        <a href="buzon.php"><i class="fa-solid fa-inbox fa-lg" style="color:  #162f5a;"></i> BUZON DE QUEJAS</a>
        <a href="subir.php"><i class="fa-solid fa-headset fa-lg" style="color: #162f5a;"></i> AYUDA</a>
        <a href="subir.php"><i class="fa-solid fa-phone-volume fa-lg" style="color: #162f5a;"></i> CONTACTANOS</a>
        <a href="mapa.php"><i class="fa-solid fa-map fa-lg" style="color: #162f5a;"></i> MAPA</a>
        <a href="cerrar_sesion.php"><i class="fa-solid fa-arrow-right-from-bracket fa-lg" style="color: #162f5a;"></i> CERRAR SESIÓN</a>
       
    </nav>
    <section>
<center><h1>BIENVENIDO, <?php echo $_SESSION['usuario']; ?> A ADMINISTRACIÓN DE USUARIOS</h1></center>

<div class="main-container">
            <form  action="buscar2.php" method="GET">
                <input class="search" type="text" name="query" placeholder="Buscar...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #162f5a;"></i></button>
            </form>
            </div>

<?php include("registrodeusuarios.php"); ?>

    <?php include("mostrar_usuario.php"); ?>
    
   
    <!-- Contenido protegido -->
    </section>
</body>
</html>
