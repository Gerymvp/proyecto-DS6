<?php
$host ="localhost";
$user ="d42024"; 
$pass ="1234";
$db   ="ds6";
$conexion = mysqli_connect($host, $user,$pass, $db);
$dep_codigo  = $_POST['car'];

$busca_cargo = mysqli_query($conexion,"SELECT codigo, nombre FROM cargo WHERE dep_codigo = '$dep_codigo'");
while ($cargo_encontrado = mysqli_fetch_assoc($busca_cargo)) {
    echo "<option value='".$cargo_encontrado['codigo']."'>".$cargo_encontrado['nombre']."</option>";
}
?>