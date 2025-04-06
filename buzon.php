<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzón de Quejas</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="registroadm.css">
    <script src="https://kit.fontawesome.com/af1d67052b.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="sidebar_nav">
        <a href="admin.php"><i class="fa-solid fa-house fa-lg "  style="color: #162f5a;"></i> INICIO</a>
        <a href="usuario.php"><i class="fa-solid fa-users fa-lg" style="color: #162f5a;"></i> USUARIOS</a>
        <a href="subir.php"><i class="fa-solid fa-upload fa-lg"  style="color: #162f5a;"></i> CREAR COTIZACIÓN</a>
        <a href="buzon.php"><i class="fa-solid fa-inbox fa-lg"  style="color: #162f5a;"></i> BUZON DE QUEJAS</a>
        <a href="ayuda.php"><i class="fa-solid fa-headset fa-lg"  style="color: #162f5a;"></i> AYUDA</a>
        <a href="contactanos.php"><i class="fa-solid fa-phone-volume fa-lg" style="color: #162f5a;"></i> CONTACTANOS</a>
        <a href="mapa.php"><i class="fa-solid fa-map fa-lg" style="color: #162f5a;"></i> MAPA</a>
        <a href="cerrar_sesion.php"><i class="fa-solid fa-arrow-right-from-bracket fa-lg" style="color: #162f5a;"></i> CERRAR SESIÓN</a>
    </nav>

    <section>
        <main>
            <h1>Buzón de Quejas</h1>
            <p>Bienvenido al Buzón de Quejas. Si tienes alguna inquietud o queja, no dudes en comunicarte con nosotros.</p>
            <p>Nos esforzamos por mejorar constantemente nuestros servicios y tu opinión es muy importante para nosotros.</p>
        </main>
    </section>
    <section>
    <form class="fron-registerr" action="conexionbase.php" method="POST" >
        <h1>DEJA TU QUEJAS    </h1>
        <input type="text" name="nombre "  placeholder="QUEJAS O SUGERENCIAS">
        <button class="sumit" type="submit" name="submit"><i> ENVIAR </i></button>
        </section>
</body>
</html>

