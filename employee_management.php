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
<body>
    <form id="registro">
        <header class="header">
            <h2>Registro de empleados</h2>
        </header>
        <div class="cedula">
            <h3>Cédula</h3>
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
            <input type="text" name="tomo" id="tomo" placeholder="####" maxlength="4" oninput="SoloNumeros(this)" required >
            <input type="text" name="asiento" id="asiento" placeholder="######" maxlength="5" oninput="SoloNumeros(this)" required>
            <input type="reset" name="reset" id="reset" value="Restablecer">
            <input class="b4" type="button" name="editar" id="editar" value="editar" hidden>
        </div>
        <div class="nombres">
            <h3>Primer nombre</h3>
            <input type="text" name="nombre1" id="nombre1" maxlength="25" required oninput="Letras(this)">
            <h3>Segundo nombre</h3>
            <input type="text" name="nombre2" id="nombre2" maxlength="25" oninput="Letras(this)">
            <h3>Primer apellido</h3>
            <input type="text" name="apellido1" id="apellido1" maxlength="25" required oninput="Letras(this)">
            <h3>Segundo apellido</h3>
            <input type="text" name="apellido2" id="apellido2" maxlength="25" oninput="Letras(this)">
            <h3>Apellido de casada</h3>
            <input type="text" name="apellidoc" id="apellidoc" maxlength="25" oninput="Letras(this)">
        </div>
        <div class="otros_datos">
            <h3>Genero</h3>
            <select name="genero" id="genero" required>
                <option value="1">Femenino</option>
                <option value="0">Masculino</option>
            </select>
            <h3>Estado Civil</h3>
            <select name="estado_civil" id="estado_civil" required>
                <option value="1">Soltero</option>
                <option value="2">Casado</option>
                <option value="3">Viudo</option>
            </select>
            <h3>Tipo de sangre</h3>
            <select name="tipo_sangre" id="tipo_sangre">
                <option value=""></option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="A+">B+</option>
                <option value="A-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
            <h3>Usa apellido de casada</h3>
            <select name="usa_ac" id="usa_ac">
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
            <h3>Fecha de nacimiento</h3>
            <input type="text" name="f_nacimiento" id="f_nacimiento" class="fecha-input" maxlength="10" placeholder="AAAA-MM-DD" required >
        </div>
        <div class="campos_contactos">
            <h3>Celular</h3>
            <input type="text" name="celular" id="celular" minlength="8"maxlength="8" placeholder="########" oninput="SoloNumeros(this)" required>
            <h3>Teléfono de casa</h3>
            <input type="text" name="telefono" id="telefono" minlength="7" maxlength="7" placeholder="#######" oninput="SoloNumeros(this)" required>
            <h3>Correo electronico</h3>
            <input type="text" name="correo" id="correo" maxlength="40" placeholder="nombre.apellido" oninput="Correo(this)" required>
        </div>
        <div class="dirrecion1">
            <h3>Provincia</h3>
            <select name="provincia" id="provincia" onchange="cargardistritos(this.value)" required>
                    <?php
                        $busca_provincia = mysqli_query($conexion, "SELECT * FROM provincia");
                        while ($provincia_encontrada = mysqli_fetch_assoc($busca_provincia)) {
                            echo "<option value='".$provincia_encontrada['codigo_provincia']."'>".$provincia_encontrada['nombre_provincia']."</option>";
                        }
                    ?>
            </select>
            <input type="text" name="provincia2" id="provincia2" disabled hidden>
            <h3>Distrito</h3>
            <select name="distrito" id="distrito" onchange="cargarcorregimientos(this.value, $('#provincia').val())" required>
            </select>
            <input type="text" name="distrito2" id="distrito2" disabled hidden>
            <h3>Corregimiento</h3>
            <select name="corregimiento" id="corregimiento" required>
            </select>
            <input type="text" name="corregimiento2" id="corregimiento2" disabled hidden>
        </div>
        <div class="direccion2">
            <h3>Calle</h3>
            <input type="text" name="calle" id="calle" maxlength="30" required>
            <h3>Casa</h3>
            <input type="text" name="casa" id="casa" maxlength="10" required>
            <h3>Comunidad</h3>
            <input type="text" name="comunidad" id="comunidad" maxlength="25" required>
        </div>
        <div class="adicional">
            <h3>Nacionalidad</h3>
            <select  name="nacionalidad" id="nacionalidad" required>
                    <?php
                        $busca_nacionalidad = mysqli_query($conexion, "SELECT * FROM nacionalidad");
                        while ($nacionalidad_encontrada = mysqli_fetch_assoc($busca_nacionalidad)) {
                            echo "<option value='".$nacionalidad_encontrada['codigo']."'>".$nacionalidad_encontrada['pais']."</option>";
                        }
                    ?>
            </select>
            <input type="text" name="nacionalidad2" id="nacionalidad2" disabled hidden>
            <h3>Fecha de contratación</h3>
            <input type="text" name="f_contra" id="f_contra" class="fecha-input" maxlength="10" placeholder="AAAA-MM-DD" required>
            <h3>Departamento</h3>
            <select name="departamento" id="departamento" onchange="cargarcargos(this.value)" required>
                    <?php
                        $busca_departamento = mysqli_query($conexion, "SELECT * FROM departamento");
                        while ($departamento_encontrado = mysqli_fetch_assoc($busca_departamento)) {
                            echo "<option value='".$departamento_encontrado['codigo']."'>".$departamento_encontrado['nombre']."</option>";
                        }
                    ?>
            </select>
            <input type="text" name="departamento2" id="departamento2" disabled hidden>
            <h3>Cargo</h3>
            <select name="cargo" id="cargo" required>
            </select>
            <input type="text" name="cargo2" id="cargo2" disabled hidden>
            <h3>Estado</h3>
            <select name="estado" id="estado" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select><br><br>
        </div>
        <div class="botones">
            <input class="boton_guardar" id="guardar" type="button" name="accion" value="Guardar" >
            <input class="boton_modificar" id="modificar" type="button" name="accion" value="Modiicar" >
            <input class="boton_eliminar" id="eliminar" type="button" name="accion" value="ELiminar">
        </div>
        <input type="hidden" name="accion" id="accion">
    </form>
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