<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/crud_create_style.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
    <title>Create_Office</title>
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

    <!-- Breadcrumb -->
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

    <div class="container">
        <div class="text">
            Create Office
        </div>
        <form action="" method="POST">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" required name="city" id="city">
                    <div class="underline"></div>
                    <label for="">Insert City</label>
                </div>
                <br>
                <div class="input-data">
                    <input type="text" required name="phone" id="phone">
                    <div class="underline"></div>
                    <label for="">Insert Phone</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" required name="addressLine1" id="addressLine1">
                    <div class="underline"></div>
                    <label for="">Insert Address Line 1</label>
                </div>
                <br>
                <div class="input-data">
                    <input type="text" required name="addressLine2" id="addressLine2">
                    <div class="underline"></div>
                    <label for="">Insert Address Line 2</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" required name="state" id="state">
                    <div class="underline"></div>
                    <label for="">Insert State</label>
                </div>
                <br>
                <div class="input-data">
                    <input type="text" required name="country" id="country">
                    <div class="underline"></div>
                    <label for="">Insert Country</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" required name="postalCode" id="postalCode">
                    <div class="underline"></div>
                    <label for="">Insert Postal Code</label>
                </div>
                <br>
                <div class="input-data">
                    <input type="text" required name="territory" id="territory">
                    <div class="underline"></div>
                    <label for="">Insert Territory</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data textarea">
                    <br />
                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner"></div>
                            <input type="submit" value="submit">
                        </div>
                    </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $addressLine1 = $_POST['addressLine1'];
        $addressLine2 = $_POST['addressLine2'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalCode'];
        $territory = $_POST['territory'];

        if (createOffice($city, $phone, $addressLine1, $addressLine2, $state, $country, $postalCode, $territory)) {
            header("Location: ../crud_office.php");
            exit;
        } else {
            echo '<p>Error al crear la Office</p>';
        }
    }

    function createOffice($city, $phone, $addressLine1, $addressLine2, $state, $country, $postalCode, $territory)
    {
        global $dbconn;
        $sql = "INSERT INTO offices (city, phone, addressLine1, addressLine2, state, country, postalCode, territory) VALUES ( '$city', '$phone', '$addressLine1', '$addressLine2', '$state', '$country', '$postalCode', '$territory')";
        $result = $dbconn->query($sql);
        return $result;
    }
    ?>

    <script type="text/javascript">
        document.querySelector("form").addEventListener("submit", function () {
            alert("Office Creada Exitosamente.");
        });
    </script>

</body>

</html>