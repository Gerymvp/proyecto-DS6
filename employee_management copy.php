<?php
    $host = "localhost";
    $user = "d42024";
    $pass = "1234";
    $db = "ds6";
    $conexion = mysqli_connect($host, $user, $pass, $db);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery3-4.min.js" type="text/javascript"></script>
    <title>Registro de empleados</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #434343;
        color: white;
        padding: 20px;
    }

    header {
        background-color: #0c7f7b;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 24px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .formulario {
        background-color: #333;
        color: white;
        padding: 30px;
        border-radius: 10px;
        width: 80%;
        max-width: 900px;
        margin: 0 auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .formulario h2 {
        color: #0c7f7b;
        margin-bottom: 20px;
        text-align: center;
    }

    .formulario .fila {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .formulario .fila-3 {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .formulario label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #87aaa9;
    }

    .formulario input, 
    .formulario select {
        width: 150px; /* Fijamos el mismo tamaño para input y select */
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #555;
        color: white;
        transition: 0.3s;
    }

    .formulario input:focus, 
    .formulario select:focus {
        outline: none;
        background-color: #666;
    }

    .formulario .b1 {
        background-color: cadetblue;
    }

    .formulario input:hover.b1 {
        background-color: rgb(95, 192, 160);
    }

    .formulario .b2 {
        background-color: darkgreen;
    }

    .formulario input:hover.b2 {
        background-color: rgb(0, 130, 0);
    }

    .formulario .b3 {
        background-color: brown;
    }

    .formulario input:hover.b3 {
        background-color: rgb(165, 72, 42);
    }

    .formulario input[type="submit"] {
        cursor: pointer;
    }
</style>


</head>
<body>

    <header>
        <h2>Registro de empleados</h2>
    </header>

    <div class="formulario">
        <h2>Formulario de Registro</h2>
        <form action="#" method="post">
            <!-- Cédula -->
            <div class="fila-3">
                <div>
                    <label for="prefijo">Prefijo</label>
                    <select id="prefijo" name="prefijo" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>E</option>
                        <option>N</option>
                        <option>PE</option>
                    </select>
                </div>
                <div>
                    <label for="tomo">Tomo</label>
                    <input type="text" id="tomo" placeholder="####" maxlength="4" oninput="SoloNumeros(this)" required>
                </div>
                <div>
                    <label for="asiento">Asiento</label>
                    <input type="text" id="asiento" placeholder="######" maxlength="6" oninput="SoloNumeros(this)" required>
                </div>
            </div>

            <!-- Nombres -->
            <div class="fila">
                <div>
                    <label for="nombre1">Primer nombre</label>
                    <input type="text" id="nombre1" maxlength="25" required oninput="Letras(this)">
                </div>
                <div>
                    <label for="nombre2">Segundo nombre</label>
                    <input type="text" id="nombre2" maxlength="25" oninput="Letras(this)">
                </div>
            </div>

            <!-- Apellidos -->
            <div class="fila-3">
                <div>
                    <label for="apellido1">Primer apellido</label>
                    <input type="text" id="apellido1" maxlength="25" required oninput="Letras(this)">
                </div>
                <div>
                    <label for="apellido2">Segundo apellido</label>
                    <input type="text" id="apellido2" maxlength="25" oninput="Letras(this)">
                </div>
                <div>
                    <label for="apellidoc">Apellido de casada</label>
                    <input type="text" id="apellidoc" maxlength="25" oninput="Letras(this)">
                </div>
            </div>

            <!-- Otros campos -->
            <div class="fila">
                <div>
                    <label for="genero">Género</label>
                    <select id="genero" required>
                        <option value="0">Masculino</option>
                        <option value="1">Femenino</option>
                    </select>
                </div>
                
                <div>
                    <label for="estado_civil">Estado Civil</label>
                    <select id="estado_civil" required>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Viudo</option>
                    </select>
                </div>
            </div>

            <!-- Fecha y contactos -->
            <div class="fila">
                <div>
                    <label for="f_nacimiento">Fecha de nacimiento</label>
                    <input type="text" id="f_nacimiento" maxlength="10" placeholder="AAAA-MM-DD" required>
                </div>

                <div>
                    <label for="celular">Celular</label>
                    <input type="text" id="celular" maxlength="8" placeholder="########" oninput="SoloNumeros(this)" required>
                </div>

                <div>
                    <label for="telefono">Teléfono de casa</label>
                    <input type="text" id="telefono" maxlength="7" placeholder="#######" oninput="SoloNumeros(this)">
                </div>

                <div>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" maxlength="40" placeholder="correo@gmail.com" required>
                </div>
            </div>

            <!-- Dirección -->
            <div class="fila">
                <div>
                    <label for="distrito">Distrito</label>
                    <select name="distrito" id="distrito" required>
                    </select>
                </div>

                <div>
                    <label for="provincia">Provincia</label>
                    <select name="provincia" id="provincia" required>
                        <!-- Aquí irían los valores de la provincia -->
                    </select>
                </div>

                <div>
                    <label for="corregimiento">Corregimiento</label>
                    <select name="corregimiento" id="corregimiento" required>
                    </select>
                </div>
            </div>

            <!-- Más campos -->
            <div class="fila">
                <div>
                    <label for="calle">Calle</label>
                    <input type="text" id="calle" maxlength="30" required>
                </div>

                <div>
                    <label for="casa">Casa</label>
                    <input type="text" id="casa" maxlength="10" required>
                </div>

                <div>
                    <label for="comunidad">Comunidad</label>
                    <input type="text" id="comunidad" maxlength="25" required>
                </div>
            </div>

            <!-- Nacionalidad y cargo -->
            <div class="fila">
                <div>
                    <label for="nacionalidad">Nacionalidad</label>
                    <select name="nacionalidad" id="nacionalidad" required>
                        <!-- Aquí irían los valores de la nacionalidad -->
                    </select>
                </div>

                <div>
                    <label for="f_contra">Fecha de contratación</label>
                    <input type="text" id="f_contra" maxlength="10" placeholder="AAAA-MM-DD" required>
                </div>

                <div>
                    <label for="cargo">Cargo</label>
                    <input type="text" id="cargo" maxlength="2" required>
                </div>
            </div>

            <!-- Botones -->
            <div class="fila">
                <div>
                    <input class="b1" type="submit" value="Guardar">
                </div>
                <div>
                    <input class="b2" type="submit" value="Modificar">
                </div>
                <div>
                    <input class="b3" type="submit" value="Eliminar">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<script>
function SoloNumeros(input){
    input.value = input.value.replace(/[^0-9]/g, '');
}
function Letras(input){
    input.value =input.value.replace(/[^A-Za-z]/g, '');
}
function Correo(input){
    input.value = input.value.replace(/[^A-Za-z0-9.]/g, '');
}

function Enviar() {
    var accion = document.getElementById("accion").value;
    var url = "";

    switch (accion) {
        case "Guardar":
            url = "save.php";
            break;
        case "Modificar":
            url = "update.php";
            break;
        case "Eliminar":
            url = "delete.php";
            break;
        default:
            alert("Acción no reconocida");
            return;
    }

    $.ajax({
        type: "POST",
        url: url,
        data: $("#registro").serialize(),
        success: function(resp) {
            console.log("Datos enviados:", $("#registro").serialize());
            console.log("Respuesta del servidor:", resp);
            alert("Los datos fueron enviados correctamente.");
            window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error("Error en el envío:", status, error);
            alert("Hubo un error al procesar la acción.");
        }
    });
}

$(document).ready(function() {
    $('#registro').on('submit', function(event) {
        event.preventDefault();
        Enviar();
    });

    $('#guardar').on('click', function() {
        $('#accion').val('Guardar');
        $('#registro').submit();
    });

    $('#modificar').on('click', function() {
        $('#accion').val('Modificar');
        $('#registro').submit();
    });

    $('#eliminar').on('click', function() {
        $('#accion').val('Eliminar');
        $('#registro').submit();
    });
});

$('#prefijo, #tomo, #asiento').on('change', function () {
    // Si se modifica alguno de los campos de cédula después de ser verificada, resetear todos los campos excepto los de la cédula
    if ($('#prefijo').val() && $('#tomo').val() && $('#asiento').val()) {
        // Restablecer todos los campos excepto los de la cédula
        $('input, select').not('#prefijo, #tomo, #asiento, #editar, #reset, #guardar, #modificar, #eliminar').val('').prop('disabled', false);
        $('input, select').not('#prefijo, #tomo, #asiento').prop('disabled', false);
        $('#provincia2, #distrito2, #corregimiento2, #nacionalidad2, #departamento2, #cargo2').hide();  // Ocultar campos deshabilitados
        $('#provincia, #distrito, #corregimiento, #nacionalidad, #departamento, #cargo').show();  // Mostrar selects originales
    }
});

// Función que se ejecuta al verificar la cédula
function verificarCedula() {
    const prefijo = $('#prefijo').val();
    const tomo = $('#tomo').val();
    const asiento = $('#asiento').val();

    if (prefijo && tomo && asiento) {
        const cedula = `${prefijo}-${tomo}-${asiento}`;

        $.ajax({
            url: 'buscar.php',
            method: 'POST',
            data: { cedula: cedula },
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.existe) {
                    // Rellenar los campos con los datos del empleado
                    for (const campo in respuesta.datos) {
                        if (campo !== 'prefijo' && campo !== 'tomo' && campo !== 'asiento') {
                            $(`#${campo}`).val(respuesta.datos[campo]).prop('disabled', true); // Deshabilitar solo los campos de datos del empleado
                        }
                    }

                    // Solo deshabilitar los campos no relacionados con la cédula
                    $('input, select').not('#editar, #reset, #prefijo, #tomo, #asiento').prop('disabled', true);
                    
                    // Mostrar los campos adicionales
                    $('#provincia2, #distrito2, #corregimiento2, #nacionalidad2, #departamento2, #cargo2').show();
                    $('#provincia, #distrito, #corregimiento, #nacionalidad, #departamento, #cargo').hide();

                    // Mostrar el botón editar
                    $('#editar').prop('hidden', false);
                    $('#eliminar').prop('disabled',false);

                    alert('Empleado ya registrado');
                } else {
                    // Si no existe, ocultar botón editar
                    $('#editar').prop('hidden', true);
                    // Resetear los campos excepto prefijo, tomo y asiento (sin ponerlos en blanco)
                    $('input, select').not('#prefijo, #tomo, #asiento, #editar, #reset').each(function() {
                        if (this.tagName === 'SELECT') {
                            this.selectedIndex = 0; // Volver al primer valor del select
                        }
                    });
                }
            }
        });
    }
}

// Detectar cuando se llenan los campos de cédula
$('#tomo, #asiento').on('blur', verificarCedula);

$('#editar').on('click', function () {
    const enEdicion = $(this).data('edicion') || false;

    if (!enEdicion) {
        // MODO EDICIÓN ACTIVADO

        // Habilita todos los campos excepto los deshabilitados por lógica
        $('input, select').not('#guardar').prop('disabled', false);

        // Oculta campos *_2
        $('#provincia2, #distrito2, #corregimiento2, #nacionalidad2, #departamento2, #cargo2').hide();

        // Muestra nuevamente los selects originales
        $('#provincia, #distrito, #corregimiento, #nacionalidad, #departamento, #cargo').show();

        // Deshabilita los campos de cédula
        $('#prefijo, #tomo, #asiento').prop('readonly', true);
        $('#eliminar').prop('disabled',true);

        // Lógica de apellido casada
        const genero = $('#genero').val();
        const usa_ac = $('#usa_ac').val();

        if (genero === "0") {
            $('#apellidoc').val('').prop('disabled', true);
            $('#usa_ac').val("0").prop('disabled', true);
        } else {
            $('#usa_ac').prop('disabled', false);
            if (usa_ac === "0") {
                $('#apellidoc').val('').prop('disabled', true);
            } else {
                $('#apellidoc').prop('disabled', false);
            }
        }

        // Refresca selects
        const provinciaValor = $('#provincia').val();
        cargardistritos(provinciaValor);

        const distritoValor = $('#distrito').val();
        if (distritoValor) {
            cargarcorregimientos(distritoValor, provinciaValor);
        }

        $(this).data('edicion', true); // Guardar estado de edición
        $(this).text('Cancelar edición'); // Cambia el texto del botón si quieres
    } else {
        // REVERTIR CAMBIOS

        // Deshabilita todos los campos (excepto botones)
        $('input, select').not('#editar, #prefijo, #tomo, #asiento').prop('disabled', true);
        $('#prefijo, #tomo, #asiento').prop('readonly', false);
        $('#reset').prop('disabled',false);
        $('#eliminar').prop('disabled',false);

        // Muestra los campos *_2
        $('#provincia2, #distrito2, #corregimiento2, #nacionalidad2, #departamento2, #cargo2').show();

        // Oculta nuevamente los selects originales
        $('#provincia, #distrito, #corregimiento, #nacionalidad, #departamento, #cargo').hide();

        // Vuelve a deshabilitar apellido casada y usa_ac
        $('#usa_ac, #apellidoc').prop('disabled', true);

        $(this).data('edicion', false); // Estado de edición off
        $(this).text('Editar'); // Texto original del botón
    }
});

// Función para resetear los campos
$('#reset').on('click', function () {
    $('input, select').not('#editar, #reset, #guardar, #modificar, #eliminar').prop('disabled', false).val('');  // Habilita los campos y los limpia
    $('#provincia2, #distrito2, #corregimiento2, #nacionalidad2, #departamento2, #cargo2').hide();  // Ocultar campos deshabilitados
    $('#provincia, #distrito, #corregimiento, #nacionalidad, #departamento, #cargo').show();  // Mostrar selects originales
});


function cargardistritos(codigoProvincia) {
    $.post("distritos.php", { "dis": codigoProvincia }, function(data) {
        $("#distrito").html(data);
        // Ejecutar cargarcorregimientos con el valor actual de distrito y provincia después de cargar los distritos
        var selectDistrito = document.getElementById("distrito");
        var distritoValor = selectDistrito.value;  
        // Solo ejecutar cargarcorregimientos si hay un valor de distrito
        if (distritoValor) {
            cargarcorregimientos(distritoValor, codigoProvincia);
        }
    });
}
function cargarcorregimientos(codigoDistrito, codigoProvincia) {
    $.post("corregimientos.php", { "cor": codigoDistrito, "dis": codigoProvincia }, function(data) {
        $("#corregimiento").html(data);
    });
}
window.onload = function() {
    // Cargar distritos automáticamente con el valor de provincia inicial al cargar la página
    var selectProv = document.getElementById("provincia");
    var provinciaValor = selectProv.value;
    cargardistritos(provinciaValor);
    var selectDep = document.getElementById("departamento");
    var departamentoValor = selectDep.value;
    cargarcargos(departamentoValor);
    // Si ya hay un distrito seleccionado, cargar los corregimientos automáticamente
    var selectDistrito = document.getElementById("distrito");
    var distritoValor = selectDistrito.value;
    if (distritoValor) {
        cargarcorregimientos(distritoValor, provinciaValor);
    }
}
function formatearFechaInput(input) {
    input.addEventListener('input', function (e) {
        const cursorPos = input.selectionStart;
        let valor = input.value.replace(/\D/g, ''); // Solo números
        if (valor.length > 8) valor = valor.slice(0, 8); // Limitar a 8 dígitos

        let año = valor.slice(0, 4);
        let mes = valor.slice(4, 6);
        let dia = valor.slice(6, 8);

        // Validación en vivo
        if (año.length === 4 && (año < 1900 || año > 2025)) {
            año = año.slice(0, 3); // corta si es inválido
        }

        if (mes.length === 2) {
            if (parseInt(mes) < 1 || parseInt(mes) > 12) {
                mes = mes.slice(0, 1); // corta si es inválido
            }
        }

        if (dia.length === 2) {
            if (parseInt(dia) < 1 || parseInt(dia) > 31) {
                dia = dia.slice(0, 1); // corta si es inválido
            }
        }

        let formato = '';
        if (año) formato += año;
        if (mes) formato += '-' + mes;
        if (dia) formato += '-' + dia;

        input.value = formato;

        // Mantiene el cursor
        if (e.inputType === 'deleteContentBackward') {
            input.setSelectionRange(cursorPos, cursorPos);
        }
    });
}
document.querySelectorAll('.fecha-input').forEach(formatearFechaInput);
  
document.addEventListener("DOMContentLoaded", function () {
    const genero = document.getElementById("genero");
    const apellidoc = document.getElementById("apellidoc");
    const usa_ac = document.getElementById("usa_ac");

    function actualizarCampos() {
        if (genero.value === "0") {
            // Si es masculino
            apellidoc.value = "";
            apellidoc.disabled = true;
            usa_ac.value = "0";
            usa_ac.disabled = true;
        } else {
            // Si es femenino
            usa_ac.disabled = false;

            // Activar o desactivar apellidoc según usa_ac
            if (usa_ac.value === "0") {
                apellidoc.value = "";
                apellidoc.disabled = true;
            } else {
                apellidoc.disabled = false;
            }
        }
    }

    // Ejecutar al cargar la página
    actualizarCampos();

    // Escuchar cambios
    genero.addEventListener("change", actualizarCampos);
    usa_ac.addEventListener("change", function () {
        // Solo aplicar esta lógica si el género es femenino
        if (genero.value === "1") {
            if (usa_ac.value === "0") {
                apellidoc.value = "";
                apellidoc.disabled = true;
            } else {
                apellidoc.disabled = false;
            }
        }
    });
});
function cargarcargos(codigoDepartamento) {
    $.post("cargos.php", { "car": codigoDepartamento }, function(data) {
        $("#cargo").html(data);
    });
}
</script>