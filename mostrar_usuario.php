<?php
include("conexion_agregados.php");
$query = "SELECT * FROM usuarios";
$result = mysqli_query($conex, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<center><h1>USUARIOS REGISTRADOS</h1></center>';
    echo "<table>";
    echo "<tr>
    <th>id</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Cargo</th>
            <th>Contraseña</th>
            <th>correo</th>
            <th>Acciones</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['usuario']}</td>
                <td>{$row['id_cargo']} </td>
                <td>{$row['contraseña']}</td>
                <td>{$row['correo']}</td>
                <td>
                    <form method='post' action='eliminar1.php' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'><i class='fa-solid fa-trash fa-lg' style='color: #ff0000;'></i></button>
                    </form>
                    <form method='post' action='actualizar1.php' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'><i class='fa-solid fa-pen-to-square fa-lg' style='color: #0f5b95;'></i></button>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

mysqli_close($conex);
?>
