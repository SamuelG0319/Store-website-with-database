<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
    exit();
}

require_once("dbconn.php");
global $dbconn;

$usuario = $_SESSION["usuario"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $newUser = $_POST["newUser"];
    $newPass = $_POST["newPass"];
    $newName = $_POST["newName"];
    $newApellido = $_POST["newApellido"];

    $sql = "UPDATE user SET usuario = :newUser, contrasena = :newPass, nombre = :newName, apellido = :newApellido WHERE usuario = :usuario";
    
    $stmt = $dbconn->prepare($sql);
    $stmt->bindParam(":newUser", $newUser);
    $stmt->bindParam(":newPass", $newPass);
    $stmt->bindParam(":newName", $newName);
    $stmt->bindParam(":newApellido", $newApellido);
    $stmt->bindParam(":usuario", $usuario);

    if ($stmt->execute()) {

        $_SESSION["usuario"] = $newUser;
        $_SESSION["nombre"] = $newName;
        $_SESSION["apellido"] = $newApellido;

        header("location: index.php");
        exit();
    } else {
        echo "Error al actualizar el perfil. Inténtalo de nuevo.";
    }
}