<?php
require_once("dbconn.php");
global $dbconn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $sql = " SELECT * FROM user WHERE usuario = '$usuario' AND contrasena = '$contrasena' ";
    $result = $dbconn->query($sql);

    if ($data = $result->fetchObject()) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["nombre"] = $data->nombre;
        $_SESSION["apellido"] = $data->apellido;
        $_SESSION["codusuario"] = $data->codusuario;
        $_SESSION["contrasena"] = $data->contrasena;
        header("location: index.php");
    } else {
        session_start();
        $_SESSION["error_message"] = "Usuario o contraseña erróneos";
        header("location: login.php");
    }
}
?>