<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SISTEMA DE COTIZACIÓN</title>
  <link href="style.css" rel="stylesheet" />
</head>
<body>

  <!-- Carrusel de fondo -->
  <div class="background-carousel">
    <img src="nose6.png" class="active" alt="Fondo 1">
    <img src="valle.jpg" alt="Fondo 2">
    <img src="ll.jpeg" alt="Fondo 3">
  </div>

  <!-- Formulario -->
  <form class="form-register" action="validar.php" method="post">
    <h4>SISTEMA DE COTIZACIÓN</h4>
    <input type="text" name="usuario" placeholder="Ingrese su nombre">
    <input type="password" id="contr" name="contraseña" required placeholder="Ingrese su contraseña"><br><br>
    <button type="submit" name="submit">INICIAR SESIÓN</button>
    <div class="captcha-container">
      <input type="checkbox" id="fake-captcha">
      <label for="fake-captcha">
        <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA">
        No soy un robot
      </label>
    </div>
    <div class="forgot-password">
      <a href="recuperar.html">¿Olvidaste tu contraseña?</a>
    </div>
  </form>

  <script src="script.js"></script>
</body>
</html>
