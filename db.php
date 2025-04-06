<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_FILES) {
    $archivo = $_FILES['archivo'];
    $nombre = $archivo['name'];
    $tipo = $archivo['type'];
    $temp = $archivo['tmp_name'];
    $error = $archivo['error'];

    if ($error == 0) {
        // Solo permitimos archivos Excel
        $allowedTypes = [
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
            'application/vnd.ms-excel' // .xls
        ];
        if (in_array($tipo, $allowedTypes)) {
            $spreadsheet = IOFactory::load($temp);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();

            // Base de datos
            $servername = "localhost";
            $database = "vitalverde";
            $username = "vitalverde";
            $password = "12345";

            // Conexión a la base de datos
            $conexion = new mysqli($servername, $username, $password, $database);

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Connection failed: " . $conexion->connect_error);
            }

            // Insertar datos
            $insertedRows = 0;
            foreach ($data as $index => $row) {
                if ($index == 0) continue; // Saltar la fila de encabezados
                
                // Validar datos
                $id = !empty($row[0]) ? $row[0] : null;
                $nombre = !empty($row[1]) ? $row[1] : null;
                $apellido = !empty($row[2]) ? $row[2] : null;
                $email = !empty($row[3]) ? $row[3] : null;
                $contr = !empty($row[4]) ? $row[4] : null;

                // Verificar si todos los campos requeridos están presentes
                if ($id && $nombre && $apellido && $email && $contr) {
                    $sql = "INSERT INTO formulario2 (id, nombre, apellido, email, contraseña, fecha_insercion) VALUES (?, ?, ?, ?, ?, NOW())";
                    $stmt = $conexion->prepare($sql);
                    $stmt->bind_param('sssss', $id, $nombre, $apellido, $email, $contr);
                    if ($stmt->execute()) {
                        $insertedRows++;
                    } else {
                        echo "Error en la consulta: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Fila $index tiene datos faltantes.";
                }
            }

            $conexion->close();
            echo '<script>alert("Archivo subido correctamente. Filas insertadas: ' . $insertedRows . '"); window.location.href = "subir.php";</script>';
        } else {
            echo '<script>alert("El archivo no es un Excel válido."); window.location.href = "subir.php";</script>';
        }
    } else {
        echo '<script>alert("Error al subir el archivo."); window.location.href = "subir.php";</script>';
    }
}
?>
