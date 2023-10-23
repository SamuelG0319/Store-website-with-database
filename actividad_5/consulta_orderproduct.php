<?php

require_once("dbconn.php");

function consulta() {

// Consulta SQL para seleccionar información de dos tablas usando JOIN
$sql = "SELECT od.orderNumber, od.productCode, p.productLine, p.productName, od.orderLineNumber, od.quantityOrdered, od.quantityOrdered * od.priceEach AS totalPrice 
        FROM orderdetails AS od INNER JOIN products AS p ON od.productCode = p.productCode
        GROUP BY od.orderNumber, od.productCode, p.productLine, p.productName, od.orderLineNumber;";

global $dbconn;
$result = $dbconn->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["orderNumber"] . "</td>";
        echo "<td>" . $row["productCode"] . "</td>";
        echo "<td>" . $row["productLine"] . "</td>";
        echo "<td>" . $row["productName"] . "</td>";
        echo "<td>" . $row["orderLineNumber"] . "</td>";
        echo "<td>" . $row["quantityOrdered"] . "</td>";
        echo "<td>" . $row["totalPrice"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No se encontraron registros.";
}
}

?>