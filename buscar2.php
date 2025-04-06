<?php
include("conexion.php");
echo" <link rel='stylesheet' href='admin.css'>";
echo"<script src='https://kit.fontawesome.com/af1d67052b.js' crossorigin='anonymous'></script>";

// Verificar si se ha enviado una consulta
if(isset($_GET['query'])) {
    $query = $_GET['query'];
    
    // Consulta SQL para buscar en la base de datos
    $sql = "SELECT * FROM usuarios WHERE nombre LIKE '%$query%' OR usuario LIKE '%$query%' OR id LIKE '%$query%'";
    $result = mysqli_query($conex, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        // Mostrar resultados
        echo "<section>";
        echo '<center> <br><h1>Resultados de la búsqueda de usuarios:</h1><br></center>';
     echo '<center><p>REGRESAR</p><a href="usuario.php"><i class="fa-solid fa-angles-left fa-lg" style="color: #005eff;"></i></button></a></center>';
        echo "<table>";
        echo "<tr><th> ID</th><th>NOMBRE</th><th>usuario</th><th>id_cargo</th><th>contraseña</th><th>ACCIONES</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['nombre']."</td>";
            echo "<td>".$row['usuario']."</td>";
            echo "<td>".$row['id_cargo']."</td>";
            echo "<td>".$row['contraseña']."</td>"; 
            
            echo"<td>
                    <form method='post' action='eliminar.php' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                      <button type='submit'><i class='fa-solid fa-trash fa-2xl' style='color: #ff0000;'></i></button>
                    </form>
                    <form method='post' action='actualizar.php' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                       <button type='submit'><i class='fa-solid fa-pen-to-square fa-2xl' style='color: #0f5b95;'></i></button>
                    </form>
                </td>";
      
            echo "</tr>";
        }
        echo "</table>";
        echo "</section>";
    } else {
       
        echo "No se encontraron resultados para '".$query."'";
        echo"<a href='usuario.php'><br><i class='fa-solid fa-angles-left fa-lg' style='color: #005eff;'></i></button><br></a>";
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASE MARITIMA CORAL</title>
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
    </nav>
</body>
</html>

