<?php
require('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $ap = $_POST['AP'];
    $am = $_POST['AM'];
    $nombres = $_POST['Nombres'];
    $telefono = $_POST['Telefono'];

    // Manejar el archivo cargado
    if (isset($_FILES['Archivo']) && $_FILES['Archivo']['error'] === UPLOAD_ERR_OK) {
        // Ruta de destino para guardar el archivo
        $target_dir = 'uploads/'; // Cambia esto a la ubicación deseada

        // Asegúrate de que el directorio de destino exista, o créalo
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Genera un nombre de archivo único basado en la marca de tiempo y el nombre original
        $timestamp = time();
        $file_extension = pathinfo($_FILES['Archivo']['name'], PATHINFO_EXTENSION);
        $file_name = $timestamp . ' ' . $_FILES['Archivo']['name'];
        $target_file = $target_dir . $file_name;

        // Mueve el archivo subido al directorio de destino
        if (move_uploaded_file($_FILES['Archivo']['tmp_name'], $target_file)) {
            // Obtiene información adicional sobre el archivo
            $file_size = $_FILES['Archivo']['size']; // Tamaño del archivo en bytes
            $file_type = $_FILES['Archivo']['type']; // Tipo MIME del archivo

            // Preparar la consulta SQL
            $sql = "INSERT INTO users (AP, AM, Nombres, Telefono, Archivo, Archivo_nombre, Archivo_tipo, Archivo_peso) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = $conn->prepare($sql)) {
                // Vincular los parámetros y ejecutar la consulta
                $stmt->bind_param("sssssssi", $ap, $am, $nombres, $telefono, $file_name, $file_name, $file_type, $file_size);

                // Leer el contenido del archivo y almacenarlo en la base de datos
                $file_content = file_get_contents($target_file);
                $stmt->send_long_data(4, $file_content); // Bind del contenido del archivo

                if ($stmt->execute()) {
                    echo "Datos guardados correctamente.";
                } else {
                    echo "Error al guardar los datos: " . $stmt->error;
                }

                // Cerrar la consulta
                $stmt->close();
            } else {
                echo "Error en la preparación de la consulta: " . $conn->error;
            }
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        // Manejar el caso en que no se cargó ningún archivo
        $file_name = null; // Puedes ajustar esto según tus necesidades
    }
}
?>
