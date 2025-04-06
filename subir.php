

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Datos</title>
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
    <a href="subir.php"><i class="fa-solid fa-upload fa-lg" style="color: #162f5a;"></i> SUBIR DATOS</a>
    <a href="cerrar_sesion.php"><i class="fa-solid fa-arrow-right-from-bracket fa-lg" style="color: #162f5a;"></i> CERRAR SESIÓN</a>
</nav>
<section>
    <form class="fron-registerr" action="db.php" method="post" enctype="multipart/form-data">
        <h1>Subir datos</h1>
        <label for="archivo">Archivo:</label>
        <input type="file" name="archivo" id="archivo" required>
        <button class="submit" type="submit" name="submit"><i class="fa-solid fa-upload fa-2xl" style="color: #162f5a;"></i> Subir</button>
    </form>
</section>
</body>
</html>
<?php  include ('subirfor.php') ?>
