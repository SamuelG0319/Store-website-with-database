<?php

require_once("dbconn.php");
function lines() {

// Consulta SQL para obtener órdenes con detalles
$sql = "SELECT pl.productLine, p.productCode, p.productName, p.productScale, p.productDescription 
        FROM productlines AS pl INNER JOIN products AS p ON pl.productline = p.productLine";

global $dbconn;
$result = $dbconn->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["productCode"] . "</td>";
        echo "<td>" . $row["productName"] . "</td>";
        echo "<td>" . $row["productLine"] . "</td>";
        echo "<td>" . $row["productScale"] . "</td>";
        echo "<td>" . $row["productDescription"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No se encontraron productos con sus líneas de productos.";
}

}

?>