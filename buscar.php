<?php
$host = "localhost";
$user = "d42024";
$pass = "1234";
$db = "ds6";
$conexion = mysqli_connect($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cedula'])) {
    $cedula = $_POST['cedula'];
    
    // Consulta principal del empleado
    $sql = "SELECT * FROM empleados WHERE cedula = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $cedula);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $respuesta = [
            "existe" => true,
            "datos" => $fila
        ];

        // Consultas adicionales para obtener los nombres
        $respuesta["datos"]["provincia2"] = obtenerNombre($conexion, "provincia", "codigo_provincia", $fila["provincia"], "nombre_provincia");
        $respuesta["datos"]["distrito2"] = obtenerNombre($conexion, "distrito", "codigo_distrito", $fila["distrito"], "nombre_distrito");
        $respuesta["datos"]["corregimiento2"] = obtenerNombre($conexion, "corregimiento", "codigo_corregimiento", $fila["corregimiento"], "nombre_corregimiento");
        $respuesta["datos"]["nacionalidad2"] = obtenerNombre($conexion, "nacionalidad", "codigo", $fila["nacionalidad"], "pais");
        $respuesta["datos"]["departamento2"] = obtenerNombre($conexion, "departamento", "codigo", $fila["departamento"], "nombre");
        $respuesta["datos"]["cargo2"] = obtenerNombre($conexion, "cargo", "codigo", $fila["cargo"], "nombre");

        echo json_encode($respuesta);
    } else {
        echo json_encode(["existe" => false]);
    }
}

function obtenerNombre($conexion, $tabla, $campoCodigo, $codigo, $campoNombre) {
    $stmt = mysqli_prepare($conexion, "SELECT $campoNombre FROM $tabla WHERE $campoCodigo = ?");
    mysqli_stmt_bind_param($stmt, "s", $codigo);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($res)) {
        return $row[$campoNombre];
    }
    return "";
}
?>