<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">
                            <i class="bi bi-database-add text-primary me-2"></i>
                            Create new car
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="w-100 card border-0 rounded">

                            <?php

                            if (isset($_POST['btn_add'])) {
                                if (addCar()) {
                                    linkTo("car_management.php");
                                }
                            }

                            ?>

                            <form class="card bg-white border-0 mt-3" method="post">

                                <div
                                    class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                    <i class="bi bi-bus-front text-dark fs-6"></i>
                                    <input type="text" class="form-control border-0 text-black-50" name="car_model"
                                        placeholder="ကားမော်ဒယ်" required>

                                </div>

                                <div
                                    class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                    <i class="bi bi-sort-numeric-up text-dark fs-6"></i>
                                    <input type="text" class="form-control border-0 text-black-50" name="car_number"
                                        placeholder="ကားနာပါတ်" required>

                                </div>

                                <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 mb-2 mb-md-3
                                    <?php echo $_SESSION['gate'] == 0 ? 'd-flex' : 'd-none'; ?>
                                    ">

                                    <i class="bi bi-geo-alt text-dark fs-6"></i>
                                    <select class="form-select border-0 text-dark" aria-label="Default select example"
                                        name="route_b" <?php echo $_SESSION['gate'] == 0 ? 'required' : ''; ?>>
                                        <option value="" selected>Route B</option>
                                        <?php foreach (getGatesExceptGate() as $g) { ?>
                                            <option value="<?php echo $g['gate_id']; ?>"><?php echo $g['gate_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="button_group w-100 d-flex justify-content-end">
                                    <button type="reset" class="btn btn-outline-danger me-2 py-2" name="discard">
                                        Discard
                                    </button>
                                    <button class="btn btn-primary py-2" name="btn_add">
                                        Add
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4">

                <div class="head_section mb-4 w-100 d-flex justify-content-between align-items-center">
                    <h3 class="fs-4 header_title">Cars Management</h3>
                    <form class="row">
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-car-front"></i>
                                Create
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-12">

                    <div class="row g-3">

                        <div class="col-12">
                            <div class="card border-1">

                                <div class="card-body product_table m-1 m-md-3">

                                    <p class="mb-0 pb-3 text-black-20 fs-5">Bus List</p>

                                    <div class="row align-items-center justify-content-start py-3">

                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">Car Numbers</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">From</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">To</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">Driver</p>
                                        </div>

                                    </div>

                                    <?php foreach (getAllCars() as $c) { ?>

                                        <a href="<?php getPath() ?>/car_edit.php?id=<?php echo $c['car_id'] ?>"
                                        class="text-decoration-none">
                                        <div
                                            class="row table_data align-items-center justify-content-start py-3 border-top">

                                            <div class="col-3 d-flex align-items-center">
                                                <p class="mb-0 table_body w-100">
                                                    <?php echo $c['car_number']; ?>
                                                </p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center">
                                                <p class="mb-0 table_body w-100">
                                                    <?php echo getRouteName($_SESSION['gate']); ?>
                                                </p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center">
                                                <p class="mb-0 table_body w-100">
                                                    <?php echo $_SESSION['gate'] != 0 ? 'Maubin' : getRouteName($c['route_b']); ?>
                                                </p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center">
                                                <p class="mb-0 table_body w-100">
                                                    <?php
                                                    if ($c['has_driver'] != 0) {
                                                        echo getDriverByCarId($c['car_id'])['name'];
                                                    } else {
                                                        echo '<span class="text-black-50">ဒရိုင်ဘာမရှိသေးပါ<span>';
                                                    }
                                                    ?>
                                                </p>
                                                <i class="bi bi-chevron-right text-black-50"></i>
                                            </div>

                                        </div>
                                        </a>
                                    <?php } ?>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>

<?php require_once "template/footer.php"; ?>