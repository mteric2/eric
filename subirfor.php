<?php
include "VERIFICAR_sesion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subir datos </title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="registroadm.css">
    <script src="https://kit.fontawesome.com/af1d67052b.js" crossorigin="anonymous"></script>

</head>
<body>

<nav class="sidebar_nav">
        <a href="admin.php"><i class="fa-solid fa-house fa-lg" style="color: #162f5a;"></i> INICIO</a>
        <a href="usuario.php"><i class="fa-solid fa-users fa-lg" style="color: #162f5a;"></i> USUARIOS</a>
        <a href="subir.php"><i class="fa-solid fa-upload fa-lg" style="color: #162f5a;"></i> CREAR COTIZACIÓN</a>
        <a href="buzon.php"><i class="fa-solid fa-inbox fa-lg" style="color:  #162f5a;"></i> BUZON DE QUEJAS</a>
        <a href="ayuda.php"><i class="fa-solid fa-headset fa-lg" style="color: #162f5a;"></i> AYUDA</a>
        <a href="contactanos.php"><i class="fa-solid fa-phone-volume fa-lg" style="color: #162f5a;"></i> CONTACTANOS</a>
        <a href="mapa.php"><i class="fa-solid fa-map fa-lg" style="color: #162f5a;"></i> MAPA</a>
        <a href="cerrar_sesion.php"><i class="fa-solid fa-arrow-right-from-bracket fa-lg" style="color: #162f5a;"></i> CERRAR SESIÓN</a>
      
    </nav>
    <section>
        <center> <h1>BIENVENIDO, <?php echo$_SESSION ['usuario'] ?>, A SUBIR ARCHIVOS</h1></center>
    <form class="fron-registerr" action="conexionbase.php" method="POST" >
        <h1>subir datos    </h1>
        <input type="text" name="id"  placeholder="Ingrese la id">
        <input  type="text" name="nombre"  placeholder="Ingrese su DEVISE">
        <input type="text" name="apellido"  placeholder="Ingrese su hora DATE">
        <input type="text" name="email"  placeholder="Ingrese su hora de HOURS">
        <select id="id_cargo" name="id_cargo" required>
                <option value="" disabled selected>INGRESE EL TIPO</option>
                <option value="1">1 - overtime in</option>
                <option value="2">2 - overtime in</option>
            </select><br><br>
        <button class="sumit" type="submit" name="submit"><i class="fa-solid fa-address-card fa-2xl" style="color: #162f5a;"></i></button>
        
        </section>
</body>
</html>   