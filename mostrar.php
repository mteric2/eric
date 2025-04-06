<?php
include("conexion.php");

// Configuración de paginación
$records_per_page = 20;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

// Consulta para obtener los registros de la base de datos
$query = "SELECT * FROM formulario2 LIMIT $start_from, $records_per_page";
$result = mysqli_query($conex, $query);

// Verificar si hay registros para mostrar
if (mysqli_num_rows($result) > 0) {
    echo '<center><h1>LISTA DE ASISTENCIA</h1></center>';
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>HORA DE ENTRADA</th>
            <th>HORA DE SALIDA</th>
            <th>DIA</th>
            <th>Acciones</th>
          </tr>";

    // Mostrar los registros en una tabla
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['email']}</td>
                <td>{$row['contraseña']}</td>
                <td>
                    <form method='post' action='eliminar.php' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'><i class='fa-solid fa-trash fa-2xl' style='color: #ff0000;'></i></button>
                    </form>
                    <form method='post' action='actualizar.php' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'><i class='fa-solid fa-pen-to-square fa-2xl' style='color: #0f5b95;'></i></button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";

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
        echo "<a href='admin.php?page=" . $i . "'";
        if ($i == $page) echo " class='curPage'";
        echo ">" . $i . "</a> ";
    }

    echo "</div>";
} else {
    echo "LISTA VACIA.";
}

mysqli_close($conex);
?>
