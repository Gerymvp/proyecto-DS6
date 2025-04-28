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

    $guardar_u = mysqli_query($conexion, "
        INSERT INTO u_eliminados (
            id, cedula, contraseña, correo_institucional, f_eliminacion
        )
        SELECT 
            id, cedula, contraseña, correo_institucional, CURDATE()
        FROM usuarios
        WHERE cedula = '$cedula'
    ");

    $guardar_e = mysqli_query($conexion, "
        INSERT INTO e_eliminados (
            cedula, prefijo, tomo, asiento, nombre1, nombre2, apellido1, apellido2, apellidoc,
            genero, estado_civil, tipo_sangre, usa_ac, f_nacimiento, celular, telefono, correo,
            provincia, distrito, corregimiento, calle, casa, comunidad, nacionalidad,
            f_contra, departamento, cargo, estado, f_eliminacion
        )
        SELECT 
            cedula, prefijo, tomo, asiento, nombre1, nombre2, apellido1, apellido2, apellidoc,
            genero, estado_civil, tipo_sangre, usa_ac, f_nacimiento, celular, telefono, correo,
            provincia, distrito, corregimiento, calle, casa, comunidad, nacionalidad,
            f_contra, departamento, cargo, estado, CURDATE()
        FROM empleados
        WHERE cedula = '$cedula'
    ");

    $e_eliminar = mysqli_query($conexion, "DELETE FROM empleados WHERE cedula = '$cedula'");
    $u_eliminar = mysqli_query($conexion, "DELETE FROM usuarios WHERE cedula = '$cedula'");

    mysqli_close($conexion);
?>