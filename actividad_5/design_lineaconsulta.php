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
    <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="logout.php">Cerrar Sesión</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mostrar Tablas</li>
                    <li class="breadcrumb-item"><a href="designorder.php">Detalles de orden</a></li>
                    <li class="breadcrumb-item"><a href="designproduct.php">Productos con sus líneas de productos</a></li>
                    <li class="breadcrumb-item"><a href="design_lineaconsulta.php">Ordenes con su línea de producto</a></li>
                    <li class="breadcrumb-item"><a href="ordenes_linea.php">Órdenes con su línea</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                </ol>
            </nav>
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