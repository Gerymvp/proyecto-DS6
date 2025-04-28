<?php
$host = "localhost";
$user = "d42024";
$pass = "1234";
$db = "ds6";

$conexion = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conexion, "utf8");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = mysqli_real_escape_string($conexion, $_POST["cedula"]);
    $password = mysqli_real_escape_string($conexion, $_POST["password"]);

    $query = "SELECT * FROM usuarios WHERE cedula = '$cedula' AND password = '$password'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) === 1) {
        $admins = ["8-1020-1253", "8-1016-1726"];

        if (in_array($cedula, $admins)) {
            header("Location: employee_management.php");
            exit();
        } else {
            header("Location: panel_html.php");
            exit();
        }
    } else {
        echo "<script>alert('Empleado no existe o contraseña incorrecta');window.location.href='login.php';</script>";
        exit();
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #434343;
        }

        header {
            background-color: #0c7f7b;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .log {
            background-color: #333;
            color: white;
            padding: 30px;
            border-radius: 10px;
            width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 10%;
        }

        input {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            margin-top: 5px;
        }

        .log h2 {
            color: #0c7f7b;
            margin-bottom: 20px;
            text-align: center;
        }

        .log label {
            font-weight: bold;
            color: #87aaa9;
            display: block;
            margin-top: 20px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: cadetblue;
            color: white;
            margin-top: 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0c7f7b;
        }
    </style>
</head>

<body>
    <header>
        Bienvenido a la plataforma
    </header>

    <div class="content">
        <div class="log">
            <h2>Iniciar Sesión</h2>

            <form method="POST" action="login.php">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" id="cedula" placeholder="Ej: 8-888-8888" required>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="********" required>

                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
