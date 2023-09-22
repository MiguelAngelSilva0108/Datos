<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del usuario</title>
    <!-- Enlaces CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Archivo CSS-->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <script src="actions.js"></script>
    <nav class="navbar navbar-expand-lg" style="background-color: #0B231E;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Logo_del_Gobierno_de_M%C3%A9xico_%282018%29.png"
                    alt="Logo" width="130rem" class="d-inline-block align-text-top" style="margin-left: 45px;">
            </a>
        </div>
    </nav>

    <div class="container-fluid container-center">
        <form action="procesar_archivo.php" method="POST" onsubmit="return validarFormulario()" enctype="multipart/form-data">
            <h2 class="text-center">Ingrese sus datos</h2>
            <div class="container text-center mt-5">
                <div class="border p-4">
                    <!-- Nombre Completo -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name='Nombres' id="nombreCompleto" placeholder="Nombre Completo"
                            required>
                        <label for="nombreCompleto">Nombre Completo</label>
                    </div>

                    <!-- Apellido Paterno -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name='AP' id="apellidoPaterno" placeholder="Apellido Paterno"
                            required>
                        <label for="apellidoPaterno">Apellido Paterno</label>
                    </div>

                    <!-- Apellido Materno -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name='AM' id="apellidoMaterno" placeholder="Apellido Materno"
                            required>
                        <label for="apellidoMaterno">Apellido Materno</label>
                    </div>

                    <!-- Número de Teléfono -->
                    <p id="errorTelefono" style="color: red;"></p><!-- Elemento para mostrar el mensaje de error -->
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name='Telefono' id="numeroTelefono" placeholder="Número de Teléfono"
                            onkeypress="validarTelefono(event)" oninput="validarLongitud()" required>
                        <label for="numeroTelefono">Número de Teléfono</label>
                    </div>

                    <!-- Subir Archivos -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Subir Archivos</label>
                        <input class="form-control" type="file" name='Archivo' id="formFile" accept=".pdf" onchange="validarArchivo()"
                            required>
                        <small class="form-text text-muted" style="font-size: 0.9rem; display: block;">Archivo en
                            formato PDF no
                            mayor a 512KB</small>
                        <p id="mensaje-error" style="color: red;"></p>
                    </div>

                    <!-- Botón de Enviar con clase personalizada -->
                    <button type="submit" class="btn btn-custom">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
