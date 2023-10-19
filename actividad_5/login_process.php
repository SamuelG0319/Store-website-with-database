<?php
    require_once("dbconn.php");
    global $dbconn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = " SELECT * FROM user WHERE usuario = '$usuario' AND contrasena = '$contrasena' ";
        $result = $dbconn->query($sql);

        if ($data=$result->fetchObject()) {
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("location: index.php");
        } else {
            echo '<div class="alert alert-danger"> Usuario o contraseña erróneos</div>';
        }
    }
?>