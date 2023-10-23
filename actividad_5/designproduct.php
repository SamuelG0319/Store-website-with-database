<?php
session_start();
require_once("products.php");

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
}

$usuario = $_SESSION["usuario"];
$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$codusuario = $_SESSION["codusuario"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos con sus líneas de productos</title>
    <link rel="stylesheet" href="assets/css/designproduct.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
</head>

<body>
    <div class="table-products">
        <!-- Breadcrumb -->
        <?php include("nav_bar.php"); ?>
        <!-- /Breadcrumb -->
        <div class="header">Productos con sus líneas de productos</div>
        <table cellspacing="0">
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Line</th>
                <th>Product Scale</th>
                <th>Product Description</th>
            </tr>
            <tr>
                <?php
                lines();
                ?>
            </tr>
        </table>
</body>

</html>