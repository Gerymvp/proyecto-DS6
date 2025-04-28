<?php
    $host ="localhost";
    $user ="d42024"; 
    $pass ="1234";
    $db   ="ds6";
    $conexion = mysqli_connect($host, $user, $pass, $db);

    if (!$conexion){
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

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

    $actualizar_e = mysqli_query($conexion, "UPDATE empleados SET nombre1='$nombre1', nombre2='$nombre2', apellido1='$apellido1', apellido2='$apellido2', 
    apellidoc='$apellidoc', genero='$genero', estado_civil='$estado_civil', tipo_sangre='$tipo_sangre', usa_ac=$usa_ac, f_nacimiento='$f_nacimiento', 
    celular='$celular', telefono='$telefono', correo='$correo', provincia='$provincia', distrito='$distrito', corregimiento='$corregimiento', calle='$calle', 
    casa='$casa', comunidad='$comunidad', nacionalidad='$nacionalidad', f_contra='$f_contra', departamento='$departamento', cargo='$cargo', estado='$estado' 
    WHERE cedula='$cedula'");

    mysqli_close($conexion);
?>