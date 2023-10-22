<!doctype html>
<html lang="en">

<head>
    <title>La Ruta 66 - Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">La Ruta 66</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">¿Tienes una cuenta?</h3>
                        <?php
                        session_start();

                        if (isset($_SESSION["error_message"])) {
                            echo '<div class="alert alert-danger">' . $_SESSION["error_message"] . '</div>';
                            unset($_SESSION["error_message"]);
                        }
                        ?>
                        <form action="login_process.php" method="post" class="signin-form">
                            <div id="error-message"></div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" name="contrasena" placeholder="Contraseña" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>