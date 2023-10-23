<?php
session_start();
require_once("orderdetails.php");

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
    <title>Detalles de orden</title>
    <link rel="stylesheet" href="assets/css/designorder.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
</head>

<body>
    <div class="table-orders">
        <!-- Breadcrumb -->
        <?php include("nav_bar.php"); ?>
        <!-- /Breadcrumb -->
        <div class="header">Detalles de orden</div>
        <table cellspacing="0">
            <tr>
                <th>Order Number</th>
                <th>Product Code</th>
                <th>Quantity Ordered</th>
                <th>Price Each</th>
                <th>Order Line Number</th>
            </tr>
            <tr>
                <?php
                details();
                ?>
            </tr>
        </table>
    </div>
</body>

</html>