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

    <meta charset="UTF-8">

    <title>La Ruta 66 - Tablas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/index_style.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/table_style.css">

</head>

<body class="img js-fullheight">
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

            <div class="container" style="text-align:center;">
                <form method="post" action="mostrar_tablas.php" style="display: inline-block;">
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
                <hr>
            </div>

            <div class="container" style="text-align: center;">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $selectedTable = $_POST["table"];

                    $sql = "SELECT * FROM {$selectedTable}";
                    $result = $dbconn->query($sql);

                    if ($result) {
                        echo "<h2>Datos de la tabla {$selectedTable}</h2>";
                        echo "<hr>";

                ?>
            </div>

            <div class="table-responsive">

                <?php
                        echo "<table class='table custom-table'>";
                        echo "<thead>";
                        echo "<tr>";
                        for ($i = 0; $i < $result->columnCount(); $i++) {
                            $columnMeta = $result->getColumnMeta($i);
                            echo "<th scope='col'>{$columnMeta['name']}</th>";
                        }
                        echo "</tr>";
                        echo "</thead>";
                ?>

                <tbody>
            <?php
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr class='row100 body'>";
                            foreach ($row as $valor) {
                                echo "<td>{$valor}</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "Error al consultar la tabla";
                    }
                }
            ?>
                </tbody>
            </div>

        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/table_main.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"81a6a4927f27daa3","b":1,"version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>

</body>

</html>