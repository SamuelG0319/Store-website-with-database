<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
}

require_once("dbconn.php");
$sql = "SHOW TABLES";
$result = $dbconn->query($sql);

$tables = array();

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        $tables[] = $row[0];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>La Ruta 66 - Tablas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/index_style.css">
</head>

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="logout.php">Cerrar Sesión</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mostrar Tablas</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <form method="post" action="mostrar_tablas.php">
                    <label for="table">Selecciona una tabla:</label>
                    <select name="table" id="table">
                        <?php
                        foreach ($tables as $table) {
                            echo "<option value='{$table}'>$table</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Mostrar datos">
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $selectedTable = $_POST["table"];

                    $sql = "SELECT * FROM {$selectedTable}";
                    $result = $dbconn->query($sql);

                    if ($result) {

                        echo "<h2>Datos de la tabla {$selectedTable}</h2>";
                        echo "<table border='1'>";
                        echo "<tr>";
                        for ($i = 0; $i < $result->columnCount(); $i++) {
                            $columnMeta = $result->getColumnMeta($i);
                            echo "<th>{$columnMeta['name']}</th>";
                        }
                        echo "</tr>";

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            foreach ($row as $valor) {
                                echo "<td>{$valor}</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Error al consultar la tabla.";
                    }
                }
                ?>

            </div>

        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>