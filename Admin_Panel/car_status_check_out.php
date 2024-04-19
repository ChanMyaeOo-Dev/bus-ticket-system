<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>
        <?php
        $previous_url = $_SERVER['HTTP_REFERER'];
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4">

                <div class="head_section mb-4 w-100 d-flex align-items-center">
                    <a href="<?php echo $previous_url; ?>" class="me-3 text-decoration-none icon_button">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h3 class="fs-4 header_title">Check Out</h3>
                </div>

                <div class="col-12">
                    <?php

                    if (isset($_POST['r_no'])) {
                        $car = getCar($_POST['car_id']);
                        $customerList = getCustomerList($_POST['r_no'], $_POST['car_id']);
                    } else {
                        linkTo("car_status.php");
                    }
                    ?>


                    <div class="card mb-3 border-0 shadow-sm">

                        <div class="card-body p-4">

                            <p class="mb-2 pb-2 border-bottom text-secondary fs-5">
                                Car Information
                            </p>

                            <div class="w-100 py-3 d-flex align-items-center ps-1">

                                <p class="mb-0 w-100 text-black-50">
                                    Model
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Car Number
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Route A
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Route B
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Driver
                                </p>


                            </div>

                            <div class="w-100 border-top pt-3 d-flex align-items-center ps-1">

                                <p class="mb-0 w-100">
                                    <?php echo $car['car_model']; ?>
                                </p>

                                <p class="mb-0 w-100">
                                    <?php echo $car['car_number']; ?>
                                </p>

                                <p class="mb-0 w-100">
                                    <?php echo getRouteName($car['route_a']); ?>
                                </p>

                                <p class="mb-0 w-100">
                                    <?php echo getRouteName($car['route_b']); ?>
                                </p>

                                <p class="mb-0 w-100">
                                    <?php echo getDriverByCarId($car['car_id'])['name']; ?>
                                </p>


                            </div>

                        </div>

                    </div>

                    <div class="card mb-3 border-0 shadow-sm">

                        <div class="card-body px-4 pt-4">

                            <p class="mb-2 pb-3 border-bottom text-secondary fs-5">
                                Customers
                            </p>

                            <div class="w-100 py-3 d-flex align-items-center ps-1">

                                <p class="mb-0 w-100 text-black-50">
                                    Name
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Phone
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Nrc
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Seat Numbers
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Address
                                </p>

                                <p class="mb-0 w-100 text-black-50">
                                    Created At
                                </p>

                            </div>

                            <?php foreach ($customerList as $customer) { ?>

                                <div class="w-100 border-top py-3 d-flex align-items-center ps-1">

                                    <p class="mb-0 w-100 text-black">
                                        <?php echo $customer['customer_info']['name']; ?>
                                    </p>

                                    <p class="mb-0 w-100 text-black">
                                        <?php echo $customer['customer_info']['phone']; ?>
                                    </p>

                                    <p class="mb-0 w-100 text-black">
                                        <?php echo $customer['customer_info']['nrc']; ?>
                                    </p>

                                    <p class="mb-0 w-100 text-black">
                                        <?php echo "[ " . $customer['seat_numbers'] . " ]"; ?>
                                    </p>

                                    <p class="mb-0 w-100 text-black">
                                        <?php echo $_SESSION['gate']==0? $customer['customer_info']['location']:'GATE'; ?>
                                    </p>

                                    <p class="mb-0 w-100 text-black">
                                        <?php echo showTime($customer['customer_info']['created_at']); ?>
                                    </p>

                                </div>

                            <?php } ?>

                        </div>

                    </div>

                    <div class="d-flex align-items-center float-end mt-4">

                        <a href="<?php getPath(); ?>/car_status.php" class="btn btn-outline-primary me-2 px-4">
                            Back
                        </a>

                        <?php
                        $r_to = '';
                        if($_SESSION['gate']==0){
                            $r_to = $car['route_b'];
                        }else{
                            $r_to = 0;
                        }
                        ?>
                        <a href="<?php getPath(); ?>/check_out.php?r_from=<?php echo $_SESSION['gate']; ?>&r_to=<?php echo $r_to; ?>&r_no=<?php echo $_POST['r_no']; ?>&car_id=<?php echo $_POST['car_id']; ?>"
                            class="btn btn-primary px-4">
                            Confirm
                        </a>

                    </div>


                </div>

            </div>

        </main>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>

<?php require_once "template/footer.php"; ?>