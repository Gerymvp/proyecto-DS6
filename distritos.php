<?php
$host ="localhost";
$user ="d42024"; 
$pass ="1234";
$db   ="ds6";
$conexion = mysqli_connect($host, $user,$pass, $db);
$dis  = $_POST['dis'];

$busca_distrito = mysqli_query($conexion,"SELECT * FROM distrito WHERE codigo_provincia='$dis'");
if (!$busca_distrito) {
    die('Error en la consulta: ' . mysqli_error($conexion));
}
while ($distrito_encontrado = mysqli_fetch_assoc($busca_distrito)) {
    echo "<option value='".$distrito_encontrado['codigo_distrito']."'>".$distrito_encontrado['nombre_distrito']."</option>";
}
?>