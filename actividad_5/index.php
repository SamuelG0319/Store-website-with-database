<?php
    session_start();

    if (!isset($_SESSION["usuario"])) {
        header("location: login.php"); // Redirigir al inicio de sesión si no hay una sesión activa
    }

    $usuario = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bienvenido</title>
</head>

<body>
    <h1>Bienvenido, <?php echo $usuario; ?>.</h1>
    <a href="logout.php">Cerrar sesión</a>
</body>

</html>