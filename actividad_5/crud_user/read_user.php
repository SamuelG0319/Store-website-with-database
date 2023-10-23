<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crud_read_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
    <title>Read_User</title>
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

    <h1>Buscador de User Mediante Codigo</h1>
    <br><br>
    <div class="text">
        <p>Ingrese el codigo del usuario a buscar, si el usuario exite le apareceran los datos. <br>De no existir el usuario, no aparecera nada aparte del enunciado de la tabla</p>
    </div>

    <div class="buscador">
        <form action="" method="POST">
            <div class="input_submit">
                <input type="text" required class="inputCode" name="codUser" id="codUser"
                    placeholder="Codigo de Usuario">
                <input type="submit" id="btnsearch" value="">
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codUser = $_POST['codUser'];

        echo '<table class="table">
            <tr>
                <th>CodUser</th>
                <th>User</th>
                <th>Password</th>
                <th>Name</th>
                <th>LastName</th>
            </tr>';

        getUser($codUser);

    }

    function getUser($id)
    {
        global $dbconn;
        $sql = "SELECT * FROM user WHERE codusuario LIKE  $id";
        $result = $dbconn->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["codusuario"] . "</td>";
                echo "<td>" . $row["usuario"] . "</td>";
                echo "<td>" . $row["contrasena"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["apellido"] . "</td>";
                echo "</tr>";
            }
        }
    }
    ?>
</body>

</html>