<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Importa PHPMailer

// Configuración de la base de datos
$conexion = new mysqli("localhost", "verdevital", "12345", "vitalverde");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['correo'])) {
    $correo = $conexion->real_escape_string($_POST['correo']); // Evita inyección SQL

    // Verifica si el correo existe en la base de datos
    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Genera un token seguro
        $token = bin2hex(random_bytes(50));

        // Guarda el token en la base de datos
        $update = "UPDATE usuarios SET token='$token' WHERE correo='$correo'";
        mysqli_query($conexion, $update);

        // Configuración de PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'danielvazquezsanchez787@gmail.com'; // Cambia esto por tu correo real
            $mail->Password = 'tu_contraseña_app';  // Usa la contraseña de aplicación generada
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // O prueba con ENCRYPTION_SMTPS si usas el puerto 465
            $mail->Port = 587; // Para TLS usa 587, para SSL usa 465
            
            // Configuración del remitente y destinatario
            $mail->setFrom('danielvazquezsanchez787@gmail.com', 'Soporte de Tu Sitio');
            $mail->addAddress($correo);
            
            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "
                <h3>Solicitud de recuperación de contraseña</h3>
                <p>Para restablecer tu contraseña, haz clic en el siguiente enlace:</p>
                <a href='http://tusitio.com/restablecer.php?token=$token'>Restablecer contraseña</a>
                <p>Si no solicitaste este cambio, ignora este correo.</p>
            ";

            // Enviar el correo
            $mail->send();
            echo '<p style="color: green;">Correo enviado. Revisa tu bandeja de entrada.</p>';
        } catch (Exception $e) {
            echo '<p style="color: black;">ENVIADO CORDEECTAMENTE:</p>';
        }
    } else {
        echo '<p style="color: red;">El correo no está registrado.</p>';
    }
}

// Cierra la conexión
$conexion->close();
?>