<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crud_read_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
    <title>Read_Office</title>
</head>

<body>
    <?php
    require_once("../dbconn.php");
    session_start();

    if (!isset($_SESSION["usuario"])) {
        header("location: login.php"); // Redirigir al inicio de sesión si no hay una sesión activa
    }

    $usuario = $_SESSION["usuario"];
    ?>

    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="../logout.php">Cerrar Sesión</a></li>
            <li class="breadcrumb-item"><a href="../mostrar_tablas.php">Mostrar Tablas</a></li>
            <li class="breadcrumb-item"><a href="../crud_user.php">Crud User</a></li>
            <li class="breadcrumb-item"><a href="../crud_office.php">Crud Offices</a></li>
            <li class="breadcrumb-item"><a href="../order_payment.php">Orders and Payments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perfil</li>
        </ol>
    </nav>

    <h1>Buscador de Office Mediante Codigo</h1>
    <br><br>

    <div class="text">
        <p>Ingrese el codigo de la Office a buscar, si la Office exite le apareceran los datos. <br>De no existir la
            Office, no aparecera nada aparte del enunciado de la tabla</p>
    </div>

    <div class="buscador">
        <form action="" method="POST">
            <div class="input_submit">
                <input type="text" required class="inputCode" name="codOffice" id="codOffice" placeholder="Codigo de Office">
        <br><br>
                <input type="submit" id="btnsearch" value="">
            </div>
        </form>
    </div>
<br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codOffice = $_POST['codOffice'];

        echo '<table class="table">
                <tr>
                    <th>OfficeCode</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>AddressLine1</th>
                    <th>AddressLine2</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>PostalCode</th>
                    <th>Territory</th>
                </tr>';

        getOffice($codOffice);

    }

    function getOffice($id)
    {
        global $dbconn;
        $sql = "SELECT * FROM offices WHERE officeCode LIKE $id";
        $result = $dbconn->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["officeCode"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["addressLine1"] . "</td>";
                echo "<td>" . $row["addressLine2"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
                echo "<td>" . $row["country"] . "</td>";
                echo "<td>" . $row["postalCode"] . "</td>";
                echo "<td>" . $row["territory"] . "</td>";
                echo "</tr>";
            }
        }
    }
    ?>
</body>

</html>