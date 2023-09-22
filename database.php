<?php
// Datos de conexión a la base de datos
$servername = "localhost"; 
$username = "root";        
$password = "";           
$database = "datos";       

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


?>
