<?php

require_once("dbconn.php");
function details() {

// Consulta SQL para obtener órdenes con detalles
$sql = "SELECT * FROM orderdetails";

global $dbconn;
$result = $dbconn->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["orderNumber"] . "</td>";
        echo "<td>" . $row["productCode"] . "</td>";
        echo "<td>" . $row["quantityOrdered"] . "</td>";
        echo "<td>" . $row["priceEach"] . "</td>";
        echo "<td>" . $row["orderLineNumber"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No se encontraron órdenes con detalles.";
}

}

?>
