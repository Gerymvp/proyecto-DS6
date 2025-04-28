<?php
$host ="localhost";
$user ="d42024"; 
$pass ="1234";
$db   ="ds6";
$conexion = mysqli_connect($host, $user,$pass, $db);
$codigo_distrito  = $_POST['cor'];

$busca_corregimiento = mysqli_query($conexion,"SELECT codigo_corregimiento, nombre_corregimiento FROM corregimiento WHERE codigo_distrito = '$codigo_distrito'");
while ($corregimiento_encontrado = mysqli_fetch_assoc($busca_corregimiento)) {
    echo "<option value='".$corregimiento_encontrado['codigo_corregimiento']."'>".$corregimiento_encontrado['nombre_corregimiento']."</option>";
}
?>