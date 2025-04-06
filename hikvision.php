<?php
// Configuración del dispositivo Hikvision
$hikvision_ip = '192.168.1.100'; // IP del dispositivo
$hikvision_port = '8000'; // Puerto del dispositivo
$username = 'admin'; // Usuario del dispositivo
$password = 'password'; // Contraseña del dispositivo

// Función para obtener los datos de asistencia
function getAttendanceData($hikvision_ip, $hikvision_port, $username, $password) {
    // Conexión al dispositivo Hikvision (esto es un ejemplo, ajusta según la API/SDK de Hikvision)
    $url = "http://$hikvision_ip:$hikvision_port/api/attendance";
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Obtener datos de asistencia
$attendanceData = getAttendanceData($hikvision_ip, $hikvision_port, $username, $password);

// Conectar a la base de datos MySQL
$servername = "localhost";
$dbname = "attendance";
$dbusername = "root";
$dbpassword = "password";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar datos de asistencia en la base de datos
foreach ($attendanceData as $record) {
    $id = $record['id'];
    $name = $record['name'];
    $time = $record['time'];
    $type = $record['type']; // Entrada o salida

    $sql = "INSERT INTO attendance_records (id, name, time, type) VALUES ('$id', '$name', '$time', '$type')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
