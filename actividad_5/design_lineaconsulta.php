<?php
session_start();
require_once("consulta_orderproduct.php");

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
    <title>Ordenes con su línea de producto</title>
    <link rel="stylesheet" href="assets/css/designconsulta.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
</head>

<body>
    <div class="table-consulta">
        <!-- Breadcrumb -->
        <?php include("nav_bar.php"); ?>
        <!-- /Breadcrumb -->
        <div class="header">Ordenes con su línea de producto</div>
        <table cellspacing="0">
            <tr>
                <th>Order Number</th>
                <th>Product Code</th>
                <th>Product Line</th>
                <th>Product Name</th>
                <th>Order Line Number</th>
                <th>Quantity Ordered</th>
                <th>Total Price</th>
            </tr>
            <tr>
                <?php
                consulta();
                ?>
            </tr>
        </table>
</body>

</html>