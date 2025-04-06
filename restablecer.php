<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $nueva_contra = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $conexion = mysqli_connect("localhost", "verdevital", "12345", "vitalverde");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $consulta = "SELECT * FROM usuarios WHERE token='$token' AND expira_token > NOW()";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $update = "UPDATE usuarios SET contraseña='$nueva_contra', token=NULL, expira_token=NULL WHERE token='$token'";
        mysqli_query($conexion, $update);
        echo "Contraseña actualizada.";
    } else {
        echo "El enlace ha expirado o es inválido.";
    }

    mysqli_close($conexion);
}
?>

<form action="restablecer.php" method="post">
    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
    <input type="password" name="contraseña" required placeholder="Nueva contraseña">
    <button type="submit">Actualizar contraseña</button>
</form>
