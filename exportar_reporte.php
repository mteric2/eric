<?php
require 'vendor/autoload.php';
include("conexion.php");
include("constante.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Definir las variables de paginación
$records_per_page = paginas;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; // Obtener la página actual de la URL
$start_from = ($page - 1) * $records_per_page;

// Consultar la base de datos para obtener los datos de la página actual
$query = "SELECT * FROM formulario2 LIMIT $start_from, $records_per_page";
$result = mysqli_query($conex, $query);

// Verificar si hay resultados
if (mysqli_num_rows($result) > 0) {
    // Crear una nueva hoja de cálculo
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Establecer los encabezados
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Nombre');
    $sheet->setCellValue('C1', 'HORA DE ENTRADA');
    $sheet->setCellValue('D1', 'HORA DE SALIDA');
    $sheet->setCellValue('E1', 'DIA');

    $rowIndex = 2; // Empezar en la segunda fila
    while ($row = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('A' . $rowIndex, $row['id']);
        $sheet->setCellValue('B' . $rowIndex, $row['nombre']);
        $sheet->setCellValue('C' . $rowIndex, $row['apellido']);
        $sheet->setCellValue('D' . $rowIndex, $row['email']);
        $sheet->setCellValue('E' . $rowIndex, $row['contraseña']);
        $rowIndex++;
    }

    // Crear el archivo Excel
    $writer = new Xlsx($spreadsheet);

    // Enviar el archivo al navegador para su descarga
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="reporte_SEMANA.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit;
} else {
    // Si no hay datos, redirigir a la página anterior con un mensaje de error
    header('Location: admin.php?message=No hay datos disponibles para descargar');
    exit;
}
?>
