<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crud_update_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
    <title>Update_User</title>
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

    <h1>Actualizar Usuario</h1>

    <div class="form">
        <form action="" method="POST" class="text">
            <label>Ingrese el codigo de Usuario a Actualizar: </label>
            <input type="text" required name="codUser" id="codUser" placeholder="codUser">
            <br><br>
            <label>Ingrese el User: </label>
            <input type="text" required name="user" id="user" placeholder="User_Name">
            <br><br>
            <label>Ingrese el Password: </label>
            <input type="text" required name="password" id="password" placeholder="Password">
            <br><br>
            <label>Ingrese el Name: </label>
            <input type="text" required name="name" id="name" placeholder="Name">
            <br><br>
            <label>Ingrese el LastName: </label>
            <input type="text" required name="lastName" id="lastName" placeholder="Last Name">
            <br><br>
            <input type="submit" value="Update User">
        </form>
    </div>

    <br><br>

    <table class="table text">
        <tr>
            <th>CodUser</th>
            <th>User</th>
            <th>Password</th>
            <th>Name</th>
            <th>LastName</th>
        </tr>

        <?php
        function getUsers()
        {
            global $dbconn;
            $sql = "SELECT * FROM user ";
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
        getUsers();
        ?>
    </table>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codUser = $_POST['codUser'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];

        if (updateUser($codUser, $user, $password, $name, $lastName)) {
            echo '';
            $_SESSION["codusuario"] = $codUser;
            $_SESSION["usuario"] = $user;
            $_SESSION["nombre"] = $name;
            $_SESSION["apellido"] = $lastName;
            // Redireccionar a otra página
            header("Location: ../crud_user.php");
            exit;
        } else {
            echo '<p>Error al actualizar el User</p>';
        }
    }
    function updateUser($codUser, $user, $password, $name, $lastName)
    {
        global $dbconn;
        $sql = "UPDATE user SET usuario='$user', contrasena='$password', nombre='$name', apellido='$lastName' WHERE codusuario=$codUser";
        $result = $dbconn->query($sql);
        return $result;
    }

    ?>

    <script type="text/javascript">
        document.querySelector("form").addEventListener("submit", function () {
            // Recarga la página
            alert("User Actualizado Exitosamente.");
        });</script>
</body>

</html>