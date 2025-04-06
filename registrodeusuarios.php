<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registroadm.css">
    <script src="https://kit.fontawesome.com/af1d67052b.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<form class="fron-registerr" action="conexion3.php" method="post">
            <h2>REGISTRAR NUEVOS USUARIOS</h2>
            <input type="text" name="nombre" placeholder="ingrese el nombre">
            <input type="text" name="usuario" placeholder="ingrese el usuario">
            <input type="text" name="correo" placeholder="ingrese el correo">
            <select id="id_cargo" name="id_cargo" required>
                <option value="" disabled selected>Seleccione el cargo</option>
                <option value="1">1 - Administrador</option>
                <option value="2">2 - Usuario</option>
            </select>
            <input type="text" id="contraseña" name="contraseña" required placeholder="Ingrese su contraseña">
            <button class="sumit" type="submit" name="submit"><i class="fa-solid fa-address-card fa-2xl" style="color: #162f5a;"></i></button>
        </form>
</body>
</html>