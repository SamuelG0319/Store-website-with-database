<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/crud_create_style.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
    <title>Create_User</title>
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
            Create User
        </div>
        <form action="" method="POST">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" required name="user" id="user">
                    <div class="underline"></div>
                    <label for="">Insert User</label>
                </div>
                <br>
                <div class="input-data">
                    <input type="password" required name="password" id="password">
                    <div class="underline"></div>
                    <label for="">Insert Password</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" required name="name" id="name">
                    <div class="underline"></div>
                    <label for="">Insert Name</label>
                </div>
                <br>
                <div class="input-data">
                    <input type="text" required name="lastName" id="lastName">
                    <div class="underline"></div>
                    <label for="">Insert Last Name</label>
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
        $user = $_POST['user'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];

        if (createUser($user, $password, $name, $lastName)) {
            header("Location: ../crud_user.php");
            exit;
        } else {
            echo '<p>Error al crear el Usuario</p>';
        }
    }

    function createUser($user, $password, $name, $lastName)
    {
        global $dbconn;
        $sql = "INSERT INTO user (usuario, contrasena, nombre, apellido) VALUES ( '$user', '$password', '$name', '$lastName')";
        $result = $dbconn->query($sql);
        return $result;
    }
    ?>

    <script type="text/javascript">;
        document.querySelector("form").addEventListener("submit", function () {
            // Recarga la página
            alert("User Creado Exitosamente.");
        });
    </script>

</body>

</html>