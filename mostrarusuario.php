<?php
include("conexion.php");
include("constante.php");
// Configuración de paginación

$records_per_page = paginas;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

// Consulta para obtener los registros de la base de datos
$query = "SELECT * FROM formulario2 LIMIT $start_from, $records_per_page";
$result = mysqli_query($conex, $query);


if (mysqli_num_rows($result) > 0) {
    echo '<center><h1>LISTA DE ASISTENCIA</h1></center>';
    echo "<table>";
    echo "<tr>
    <th>ID</th>

            <th>NOMBRE</th>
            <th>HORA DE ENTRADA</th>
            <th>HORA DE SALIDA</th>
            <th>DÍA</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['email']}</td>
                <td>{$row['contraseña']}</td>
              </tr>";
    }    echo "</table>";
// Mostrar enlaces de paginación
$query = "SELECT COUNT(*) AS total FROM formulario2";
$result = mysqli_query($conex, $query);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $records_per_page);

echo "<div class='pagination'>";
$max_links = 6; // Máximo número de enlaces de paginación a mostrar

// Calcular la página de inicio y fin para los enlaces de paginación
$start = max(1, $page - floor($max_links / 2));
$end = min($total_pages, $start + $max_links - 1);

// Ajustar el inicio si estamos cerca del final
$start = max(1, $end - $max_links + 1);

for ($i = $start; $i <= $end; $i++) {
    echo "<a href='usuarios1.php?page=" . $i . "'";
    if ($i == $page) echo " class='curPage'";
    echo ">" . $i . "</a> ";
}

echo "</div>";
} else {
    echo "No records found.";
}

mysqli_close($conex);
?>
