<?php require_once "core/base.php";?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link href="<?php getPath();?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php getPath();?>/assets/css/dashboard.css">

</head>
<body>

<header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="<?php getPath();?>/index.php">Company name</a>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="w-100 text-center">
        <small class="mb-0 text-white fw-bolder">Hello</small>
    </div>

</header>

<div class="container-fluid">

    <div class="row">

        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

            <div class="position-sticky pt-3 sidebar-sticky">

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers" class="align-text-bottom"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>

                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers" class="align-text-bottom"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>

                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers" class="align-text-bottom"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>

                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers" class="align-text-bottom"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>

                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers" class="align-text-bottom"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>

                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>

            </div>

        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h1 class="h2">Dashboard</h1>

                <div class="btn-toolbar mb-2 mb-md-0">

                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                        This week
                    </button>

                </div>

            </div>

            <div class="custom_data">

                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <p class="my-3 rounded shadow-sm p-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>

            </div>

        </main>

    </div>

</div>


<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
