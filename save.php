<?php
$host ="localhost";
$user ="d42024"; 
$pass ="1234";
$db   ="ds6";
$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion){
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

print_r($_POST); // Esto imprime los datos recibidos

// Recibir datos
$prefijo = $_POST['prefijo'];
$tomo = $_POST['tomo'];
$asiento = $_POST['asiento'];
$cedula = $prefijo ."-". $tomo ."-". $asiento;
$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$apellidoc = isset($_POST['apellidoc']) ? $_POST['apellidoc'] : ''; 
$genero = $_POST['genero'];
$estado_civil = $_POST['estado_civil'];
$tipo_sangre = $_POST['tipo_sangre'];
$usa_ac = isset($_POST['usa_ac']) ? $_POST['usa_ac'] : 'NULL';
$f_nacimiento = $_POST['f_nacimiento'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$correo_completo = $correo . '@gmail.com';

$provincia = $_POST['provincia'];
$distrito = $_POST['distrito'];
$corregimiento = $_POST['corregimiento'];

$calle = $_POST['calle'];
$casa = $_POST['casa'];
$comunidad = $_POST['comunidad'];
$nacionalidad = $_POST['nacionalidad'];
$f_contra = $_POST['f_contra'];
$departamento = $_POST['departamento'];
$cargo = $_POST['cargo'];
$estado = $_POST['estado'];

// Función para generar palabra aleatoria
function generarContraseña($longitud = 8) {
    $caracteres = '0123456789';
    $palabra = '';
    for ($i = 0; $i < $longitud; $i++) {
        $palabra .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $palabra;
}

// Buscar una palabra que no esté en las contraseñas
do {
    $palabra = generarContraseña();

    // Consultar si ya existe en la tabla
    $stmt = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE contraseña = ?");
    $stmt->bind_param("s", $palabra);
    $stmt->execute();
    $stmt->bind_result($coincidencias);
    $stmt->fetch();
    $stmt->close();

} while ($coincidencias > 0);

// Insertar en la tabla usuarios
$guardar_u = mysqli_query($conexion, "INSERT INTO usuarios (id, cedula, contraseña, correo_institucional)
    VALUES (NULL, '$cedula', '$palabra', '$correo_completo')");

// Insertar en la tabla empleados
$guardar_e = mysqli_query($conexion, "INSERT INTO empleados (
    cedula, prefijo, tomo, asiento, nombre1, nombre2, apellido1, apellido2, apellidoc,
    genero, estado_civil, tipo_sangre, usa_ac, f_nacimiento, celular, telefono, correo,
    provincia, distrito, corregimiento, calle, casa, comunidad, nacionalidad,
    f_contra, departamento, cargo, estado
) VALUES (
    '$cedula', '$prefijo', '$tomo', '$asiento', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$apellidoc',
    '$genero', '$estado_civil', '$tipo_sangre', $usa_ac, '$f_nacimiento', '$celular', '$telefono', '$correo_completo',
    '$provincia', '$distrito', '$corregimiento', '$calle', '$casa', '$comunidad', '$nacionalidad',
    '$f_contra', '$departamento', '$cargo', '$estado'
)");

mysqli_close($conexion);
?>
