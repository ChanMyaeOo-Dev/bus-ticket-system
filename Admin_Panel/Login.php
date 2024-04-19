<?php require_once "core/base.php" ?>
<?php require_once "check_admin.php" ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login To Admin Panel</title>
    <link href="<?php getPath(); ?>/style.css" rel="stylesheet">

    <style>
        body {
            background: #005ce603 !important;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
<!-- 
        <img class="Logo" src="./assets/imgs/source/Logo.svg" alt="Logo"> -->

        <div class="row min-vh-100 position-relative align-items-center justify-content-center" style="overflow: hidden !important;">

            <!-- <img class="texture" src="./assets/imgs/source/Background-Texture.svg" alt="texture"> -->
            <div class="col-7 image_container min-vh-100 d-flex justify-content-center align-items-center">
                <img src="./assets/imgs/source/Bus Stop-cuate.svg" alt="Bus Stop Cuate">
            </div>

            <div class="col-5 right_section min-vh-100">

                <div class="d-flex flex-column justify-content-center align-items-center" style="width: 400px !important;">
                    <div class="w-100 mb-3">
                        <p class="fs-2 fw-semibold text-white mb-1">Welcome Back!</p>
                        <p class="fs-6" style="color: #EBEBEB !important;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, vitae!
                            Inventore earum eaque consectetur aspernatur hic animi esse. Similique, eos?
                        </p>
                    </div>

                    <?php

                    if (isset($_POST['btnLogin'])) {

                        if (login()) {
                            linkTo("ui_home.php");
                        } else {
                            echo "<script>alert('Username or Password Wrong!')</script>";
                        }
                    }

                    ?>

                    <form method="post" class="w-100">

                        <div class="w-100 border border-light rounded py-2 d-flex align-items-center px-3 mb-3">

                            <i class="bi bi-envelope text-white me-2 fs-5"></i>
                            <input type="email" class="form-control w-100 border-0 bg-transparent text-white" placeholder="Enter your email" name="email" value="maubin@gmail.com">

                        </div>

                        <div class="w-100 border border-light rounded py-2 d-flex align-items-center px-3 mb-0">

                            <i class="bi bi-lock text-white me-2 fs-5"></i>
                            <input type="password" class="form-control w-100 border-0 bg-transparent text-white" placeholder="Enter your password" name="password" value="123">

                        </div>

                        <button type="submit" name="btnLogin" class="custom_button btn btn-light w-100 mt-4 py-2">Login</button>

                    </form>

                </div>

            </div>
        </div>

    </div>

    <script src="<?php getPath(); ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>