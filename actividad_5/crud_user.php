<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
}

$usuario = $_SESSION["usuario"];
$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$codusuario = $_SESSION["codusuario"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>La Ruta 66 - Inicio</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/index_style.css">
</head>

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <?php include ("nav_bar.php");?>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <a href="crud_user/create_user.php">Create User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <a href="crud_user/read_user.php">Read User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <a href="crud_user/update_user.php">Update User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <a href="crud_user/delete_user.php">Delete User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>