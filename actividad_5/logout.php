<?php
    session_start();
    session_destroy();

    header("location: login.php"); // Redirigir al inicio de sesión después de cerrar sesión
?>