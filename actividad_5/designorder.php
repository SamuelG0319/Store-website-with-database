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




