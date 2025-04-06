<?php
error_reporting(0); // Desactiva la visualización de advertencias

echo"<link rel='stylesheet' href='admin.css'>";
session_start();

// Verifica si se enviaron los datos del formulario
if(isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];

    $_SESSION['usuario']=$usuario;

    $conexion=mysqli_connect("localhost","verdevital","12345","vitalverde");

    // Verifica si la conexión a la base de datos fue exitosa
    if($conexion) {
        $consulta="SELECT * FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
        $resultado=mysqli_query($conexion,$consulta);

        // Verifica si la consulta fue exitosa
        if($resultado) {
            $filas=mysqli_fetch_array($resultado);

            if($filas && $filas['id_cargo']==1){ //administrador
                header("location:admin.php");
                exit(); // Finaliza el script después de la redirección
            } elseif($filas && $filas['id_cargo']==2){ //cliente
                header("location:usuarios1.php");
                exit(); // Finaliza el script después de la redirección
            } else {
                header("location: contraseña.php"); // Redirecciona a la página de contraseña incorrecta
                exit(); // Finaliza el script después de la redirección
            }
        } else {
            // Si la consulta falla, muestra un mensaje de error
            echo "<h1 class='bad'>ERROR EN LA CONSULTA</h1>";
        }

        // Libera el resultado y cierra la conexión
        mysqli_close($conexion);
    } else {
        // Si la conexión falla, muestra un mensaje de error
        echo "<h1 class='bad'>ERROR EN LA CONEXIÓN</h1>";
    }
}
?>
