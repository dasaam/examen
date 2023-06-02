<?php 

$host = 'localhost';
$dbname = 'examen';
$user = 'root';
$password = 'Kadazami007!';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    echo "Error en la conexión a la base de datos: " . $e->getMessage();
}