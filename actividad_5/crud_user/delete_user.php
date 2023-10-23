<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crud_delete_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
    <title>Delete_User</title>
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

    <h1>Delete User by Code</h1>

    <div class="buscador">
        <form action="" method="POST" class="form">
            <div class="input_submit">
                <input type="number" class="inputCode" required name="delete" id="delete"
                    placeholder="Codigo de Usuario a Eliminar">
                <input type="submit" id="btnsearch" value="">
            </div>
        </form>
    </div>

    <table>
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
    <br><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['delete'];

        if (deleteUser($id)) {
            echo '';
            // Redireccionar a otra página
            header("Location: ../crud_user.php");
            exit;
        } else {
            echo '<p>Error al Eliminarl el User</p>';
        }
    }

    function deleteUser($id)
    {
        global $dbconn;
        $sql = "DELETE FROM user WHERE codusuario=$id";
        $result = $dbconn->query($sql);
        return $result;
    }
    ?>

    <script type="text/javascript">document.querySelector("form").addEventListener("submit", function () {
            // Recarga la página
            alert("User Borrado Exitosamente.");
        });</script>
</body>

</html>