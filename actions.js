
function validarArchivo() {
    const inputArchivo = document.getElementById('formFile');
    const mensajeError = document.getElementById('mensaje-error');
    const mensajeHTML = document.querySelector('.text-black');

    if (inputArchivo.files.length > 0) {
        const archivo = inputArchivo.files[0];
        const tamañoMaximo = 512 * 1024; // 512 KB en bytes

        if (archivo.type === 'application/pdf' && archivo.size <= tamañoMaximo) {
            // El archivo es un PDF y tiene un tamaño válido
            mensajeError.textContent = '';
            mensajeHTML.style.display = 'block'; // Mostrar el mensaje HTML
          
        } else {
            mensajeError.textContent = 'El archivo debe ser un PDF y no debe superar los 512 KB.';
            inputArchivo.value = ''; // Limpiar el campo de archivo
            mensajeHTML.style.display = 'none'; // Ocultar el mensaje HTML
        }
    } else {
        mensajeHTML.style.display = 'block'; // Mostrar el mensaje HTML
        mensajeError.textContent = ''; // Limpiar el mensaje de error
    }
}


function limitarLongitud() {
    const inputTelefono = document.getElementById('numeroTelefono');
    const telefono = inputTelefono.value;

    // Limitamos la longitud del número de teléfono a 10 caracteres
    if (telefono.length > 10) {
        inputTelefono.value = telefono.slice(0, 10); // Truncamos a 10 caracteres
    }
}

function validarFormulario() {
    // Verificamos si todos los campos requeridos están completos
    const nombreCompleto = document.getElementById("nombreCompleto").value;
    const apellidoPaterno = document.getElementById("apellidoPaterno").value;
    const apellidoMaterno = document.getElementById("apellidoMaterno").value;
    const formFile = document.getElementById("formFile").value;
    const numeroTelefono = document.getElementById("numeroTelefono").value;
    const errorTelefono = document.getElementById("errorTelefono"); // Elemento para mostrar el mensaje de error

    if (nombreCompleto === "" || apellidoPaterno === "" || apellidoMaterno === "" || formFile === "") {
        alert("Todos los campos son obligatorios");
        return false; // Evitamos que el formulario se envíe
    }

   
    // Llamamos a la función validarTelefono para validar el número de teléfono
    if (!validarTelefono()) {
        return false; // Evitamos que el formulario se envíe si el número de teléfono no es válido
    }

    // Si todos los campos están completos y el número de teléfono es válido, el formulario se enviará
    return true;
}

function validarTelefono(event) {
    const inputTelefono = document.getElementById('numeroTelefono');
    const telefono = inputTelefono.value;
    const errorTelefono = document.getElementById("errorTelefono"); // Elemento para mostrar el mensaje de error

    // Verificamos si la tecla presionada es un número
    if (!/^[0-9]*$/.test(event.key)) {
        event.preventDefault(); // Evitamos que la tecla ingresada sea aceptada
    }

    // Borramos el mensaje de error si hay al menos 10 caracteres numéricos
    if (telefono.replace(/[^0-9]/g, '').length >= 10) {
        errorTelefono.textContent = ""; // Limpiamos el mensaje de error si es válido
    }
}

function validarLongitud() {
    const inputTelefono = document.getElementById('numeroTelefono');
    const telefono = inputTelefono.value;
    const errorTelefono = document.getElementById("errorTelefono"); // Elemento para mostrar el mensaje de error

    // Validamos que el número de teléfono tenga al menos 10 caracteres numéricos
    const numerosTelefono = telefono.replace(/[^0-9]/g, '');

    if (numerosTelefono.length < 10) {
        errorTelefono.textContent = "El número de teléfono debe tener al menos 10 números.";
    } else {
        errorTelefono.textContent = ""; // Limpiamos el mensaje de error si es válido
    }
}







