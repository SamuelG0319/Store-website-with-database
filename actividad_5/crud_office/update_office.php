<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crud_update_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
    <title>Update_Office</title>
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

    <h1>Actualizar Office</h1>

    <div class="form">
        <form action="" method="POST" class="text">
            <label>Ingrese el codigo de Office a Actualizar: </label>
            <input type="text" required class="space" name="codOffice" id="codOffice" placeholder="OfficeCode">
            <br>
            <label>Ingrese la City: </label>
            <input type="text" required class="space" name="city" id="city" placeholder="City">
            <br>
            <label>Ingrese el Phone: </label>
            <input type="text" required class="space" name="phone" id="phone" placeholder="Phone">
            <br>
            <label>Ingrese el AddressLine1: </label>
            <input type="text" required class="space" name="addressLine1" id="addressLine1"
                placeholder="Address Line 1">
            <br>
            <label>Ingrese el AddressLine2: </label>
            <input type="text" class="space" name="addressLine2" id="addressLine2" placeholder="Address Line 2">
            <br>
            <label>Ingrese el State: </label>
            <input type="text" class="space" name="state" id="state" placeholder="State">
            <br>
            <label>Ingrese el Country: </label>
            <input type="text" required class="space" name="country" id="country" placeholder="Country">
            <br>
            <label>Ingrese el Postal Code: </label>
            <input type="text" required class="space" name="postalCode" id="postalCode" placeholder="Postal Code">
            <br>
            <label>Ingrese el Territory: </label>
            <input type="text" required class="space" name="territory" id="territory" placeholder="Territory">
            <br>
            <input type="submit" value="Update Office">
        </form>
    </div>
    <br><br>
    <table class="table">
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
        </tr>
        <?php
        function getOffice()
        {
            global $dbconn;
            $sql = "SELECT * FROM offices ";
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
        getOffice();
        ?>
    </table>
    <br>


    <?php
    function updateOffice($codOffice, $city, $phone, $addressLine1, $addressLine2, $state, $country, $postalCode, $territory)
    {
        global $dbconn;
        $sql = "UPDATE offices SET city='$city', phone='$phone', addressLine1='$addressLine1', addressLine2='$addressLine2', state='$state', country='$country', postalCode='$postalCode', territory='$territory' WHERE officeCode=$codOffice";
        $result = $dbconn->query($sql);
        return $result;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codOffice = $_POST['codOffice'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $addressLine1 = $_POST['addressLine1'];
        $addressLine2 = $_POST['addressLine2'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalCode'];
        $territory = $_POST['territory'];
    
        if (updateOffice($codOffice, $city, $phone, $addressLine1, $addressLine2, $state, $country, $postalCode, $territory)) {
            // Redirige después de haber realizado todas las operaciones necesarias
            header("Location: ../crud_office.php");
            exit; // Añade exit para detener la ejecución después de la redirección
        } else {
            $errorMessage = 'Error al Actualizar la Office';
        }
    }
    ?>



    <script type="text/javascript">
        document.querySelector("form").addEventListener("submit", function () {
            // Recarga la página
            alert("User Actualizado Exitosamente.");
        });</script>
</body>

</html>