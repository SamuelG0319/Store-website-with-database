<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
}

$usuario = $_SESSION["usuario"];
$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$codusuario = $_SESSION["codusuario"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>La Ruta 66 - Inicio</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/order_payment.css">
</head>

<body>

    <!-- Breadcrumb -->
    <?php include ("nav_bar.php");?>
    <!-- /Breadcrumb -->

    <h1 class="title">Agrupación de Customer Segun Ordenes y Pagos</h1>

    <br><br>

    <h2 class="subtitle">5 Clientes con mas Ordenes</h2>
    <?php
    require_once("dbconn.php");
    global $dbconn;

    // Consulta SQL para obtener los 5 clientes con más órdenes\
    $sql = "SELECT ord.customerNumber, COUNT(ord.customerNumber) as cantidad_repeticiones, c.customerNumber, c.customerName
            FROM orders ord
            INNER JOIN customers c ON ord.customerNumber = c.customerNumber
            GROUP BY ord.customerNumber 
            ORDER BY cantidad_repeticiones DESC 
            LIMIT 5;";

    /*$sql = "SELECT c.customerNumber, c.customerName, o.customerNumber, o.orderNumber, od.orderNumber, od.quantityOrdered 
            FROM customers c
            INNER JOIN orders o ON c.customerNumber = o.customerNumber
            INNER JOIN orderdetails od ON o.orderNumber = od.orderNumber
            ORDER BY quantityOrdered DESC
            LIMIT 5";*/

    $result = $dbconn->query($sql);

    if ($result->rowCount() > 0) {
        echo "<table class='table'>
                <tr>
                    <th class='enunciado'>Customer ID</th>
                    <th class='enunciado'>Customer Name</th>
                    <th class='enunciado'>Numero de Ordenes</th>
                    
                </tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . $row["customerNumber"] . "</td>
                    <td>" . $row["customerName"] . "</td>
                    <td>" . $row["cantidad_repeticiones"] . "</td>
                    
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }

    ?>
    <br><br>
    <h2 class="subtitle">5 Clientes con menos pagos</h2>
    <?php
    // Consulta SQL para obtener los 5 clientes con menos pagos
    $sql = "SELECT p.customerNumber, COUNT(p.customerNumber) as menos, c.customerNumber, c.customerName
            FROM payments p
            INNER JOIN customers c ON p.customerNumber = c.customerNumber
            GROUP BY p.customerNumber
            ORDER BY menos ASC
            LIMIT 5";

    $result = $dbconn->query($sql);

    if ($result->rowCount() > 0) {
        echo "<table class='table'>
                <tr>
                    <th class='enunciado'>Customer ID</th>
                    <th class='enunciado'>Customer Name</th>
                    <th class='enunciado'>Pagos realizados</th>
                </tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . $row["customerNumber"] . "</td>
                    <td>" . $row["customerName"] . "</td>
                    <td>" . $row["menos"] . "</td>  
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
    ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>