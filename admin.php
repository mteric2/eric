<?php
include("verificar_sesion.php");
include("conexion.php");
include("constante.php");

// Mostrar mensaje si hay datos
$message = isset($_GET['message']) ? $_GET['message'] : '';

// Configuración de paginación
$records_per_page = 10; // Define the number of records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

// Consulta para obtener los registros de la base de datos, ordenados por fecha de inserción descendente
$query = "SELECT * FROM formulario2 ORDER BY fecha_insercion DESC LIMIT $start_from, $records_per_page";
$result = mysqli_query($conex, $query);

// Verificar si hay registros para mostrar
$datos = '';
if (mysqli_num_rows($result) > 0) {
    $datos .= '<center><h1>COTIZACIONES</h1></center>';
    $datos .= '<center><h1>QUIENES SOMOS</h1> <br> En el Sistema de Cotización, nos especializamos en ofrecer soluciones confiables y eficientes para la gestión de cotizaciones de productos y servicios. Nuestro equipo se dedica a brindar una plataforma ágil, segura y fácil de usar, permitiendo a nuestros clientes optimizar sus procesos de compra, venta y seguimiento de requerimientos. Con un enfoque en la innovación y la mejora continua, buscamos aportar valor a cada uno de nuestros usuarios, convirtiéndonos en un aliado estratégico en su crecimiento y éxito.<br/></center>';
    $datos .= "<table>";
    $datos .= "<tr>
                <th>ID</th>
                <th>DEVISE</th>
                <th>DATE</th>
                <th>HOURS</th>
                <th>TIPE</th>
                <th>Fecha de Inserción</th>
                <th>ACCIONES</th>
              </tr>";

    // Mostrar los registros en una tabla
    while ($row = mysqli_fetch_assoc($result)) {
        $datos .= "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['apellido']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['contraseña']}</td>
                    <td>{$row['fecha_insercion']}</td>
                    <td>
                        <form method='post' action='eliminar.php' style='display:inline;'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='hidden' name='page' value='{$page}'>
                            <button type='submit'><i class='fa-solid fa-trash fa-lg' style='color: #ff0000;'></i></button>
                        </form>
                        <form method='post' action='actualizar.php' style='display:inline;'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='hidden' name='page' value='{$page}'>
                            <button type='submit'><i class='fa-solid fa-pen-to-square fa-lg' style='color: #0f5b95;'></i></button>
                        </form>
                    </td>
                  </tr>";
    }
    $datos .= "</table>";

    // Mostrar enlaces de paginación
    $query = "SELECT COUNT(*) AS total FROM formulario2";
    $result = mysqli_query($conex, $query);
    $row = mysqli_fetch_assoc($result);
    $total_pages = ceil($row["total"] / $records_per_page);

    $datos .= "<div class='pagination'>";
    $max_links = 6; // Máximo número de enlaces de paginación a mostrar

    // Calcular la página de inicio y fin para los enlaces de paginación
    $start = max(1, $page - floor($max_links / 2));
    $end = min($total_pages, $start + $max_links - 1);

    // Ajustar el inicio si estamos cerca del final
    $start = max(1, $end - $max_links + 1);

    for ($i = $start; $i <= $end; $i++) {
        $datos .= "<a href='admin.php?page=" . $i . "'";
        if ($i == $page) $datos .= " class='curPage'";
        $datos .= ">" . $i . "</a> ";
    }

    $datos .= "</div>";
} else {
    $datos .= "LISTA VACIA.";
}

mysqli_close($conex);
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
        <a href="cerrar_sesion.php"><i class="fa-solid fa-arrow-right-from-bracket fa-lg" style="color: #162f5a;"></i> CERRAR SESIÓN</a>
    </nav>
    <section>
        <center><h1>BIENVENIDO A LA PÁGINA DE ADMINISTRACIÓN, <?php echo $_SESSION['usuario']; ?>. ES UN SISTEMA: SÍNCRONO</h1></center>
        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <div class="main-container">
            <form action="buscar.php" method="GET">
                <input class="search" type="text" name="query" placeholder="Buscar...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #162f5a;"></i></button>
            </form>
        </div>
        <main class="main">
            <h2>DESCARGAR REPORTE</h2>
            <a href="exportar_reporte.php?page=<?php echo $page; ?>">
                <img src="excel.jpeg" alt="Exportar Reporte" width="100px" height="90px">
                <style>
                    img:hover {
                        border-radius: 10px;
                        width: 150px;
                        height: 100px;
                    }
                    h2:hover {
                        color: #162f5a;
                        cursor: pointer;
                        font-size: 20px;
                    }
                    </style>
                    
            </a>
        </main>
        <?php echo $datos; ?>
    </section>
</body>
</html>
