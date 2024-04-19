<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <?php

        $invoice = [];

        if (isset($_GET['cus_id'])) {
            $invoice = getHistoryInvoiceByCusId($_GET['cus_id']);
        }
        $previous_url = $_SERVER['HTTP_REFERER'];
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4 g-3">

                <div class="head_section mb-2 w-100 d-flex align-items-center">
                    <a href="<?php echo $previous_url; ?>" class="me-3 text-decoration-none icon_button">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h3 class="fs-4 header_title">History Bookings' Detail</h3>
                </div>

                <div class="col-4">

                    <div class="card border-0 shadow-sm bg-white h-100">

                        <div class="card-body p-5 text-center">

                            <?php $num = rand(1, 7); ?>
                            <img src="<?php getPath(); ?>/assets/imgs/source/user_<?php echo $num; ?>.svg"
                                class="rounded-circle shadow-sm"
                                style="width: 200px!important;height: 200px!important;">

                            <p class="mb-1 mt-4 fs-5 text-primary">
                                <?php echo getCustomer($_GET['cus_id'])['name']; ?>
                            </p>
                            <p class="mb-3 fs-6 text-black-50">
                                <?php echo getRouteName($invoice['route_from']) . " ~ " . getRouteName($invoice['route_to']); ?>
                            </p>

                            <div class="d-flex align-items-center justify-content-between mb-2 pt-3 border-top">

                                <p class="text-black-50 mb-0">NRC</p>
                                <p class="fs-6 text-black-50 mb-0">
                                    <?php echo getCustomer($_GET['cus_id'])['nrc']; ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2  pb-3 border-bottom">

                                <p class="text-black-50 mb-0">Phone Number</p>
                                <p class="fs-6 text-black-50 mb-0">
                                    <?php echo getCustomer($_GET['cus_id'])['phone']; ?>
                                </p>

                            </div>

                        </div>

                    </div>


                </div>

                <div class="col-8">

                    <div class="card border-0 shadow-sm bg-white h-100">

                        <div class="card-body p-5">

                            <h5 class="text-dark mb-3 pb-3 pb-md-4 mb-md-4 border-bottom">
                                Booking Information
                            </h5>

                            <div class="d-flex align-items-center justify-content-between mb-2">

                                <p class="text-black-50 mb-0">Route</p>
                                <div class="d-flex align-items-center">
                                    <p class="fs-6 text-black mb-0">
                                        <?php echo getRouteName($invoice['route_from']); ?>
                                    </p>
                                    <i class="bi bi-dot mx-1 text-black-50"></i>
                                    <p class="fs-6 text-black mb-0">
                                        <?php echo getRouteName($invoice['route_to']); ?>
                                    </p>
                                </div>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2">

                                <p class="text-black-50 mb-0">Date</p>
                                <p class="fs-6 text-black mb-0">
                                    <?php echo showTime($invoice['date'], "d/m/Y"); ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                                <p class="text-black-50 mb-0">Time</p>
                                <p class="fs-6 text-black mb-0">
                                    <?php echo getTime($invoice['route_number']); ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2 pt-2">

                                <p class="text-black-50 mb-0">Seat Quantity</p>
                                <p class="fs-6 text-black mb-0">
                                    <?php echo $invoice['person_qty'] . " Seats"; ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2">

                                <p class="text-black-50 mb-0">Seat Numbers</p>
                                <p class="fs-6 text-black mb-0">
                                    <?php echo "[" . $invoice['seat_numbers'] . "]"; ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                                <p class="text-black-50 mb-0">Payment Method</p>
                                <p class="fs-6 text-black mb-0">
                                    <?php echo $invoice['payment']; ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3 mb-2">

                                <p class="text-black-50 fs-5 mb-0">Total</p>
                                <p class="fs-4 text-black mb-0">
                                    <?php echo $invoice['price_total'] . " Ks"; ?>
                                </p>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </main>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>

<script>
    function animate() {
        document.getElementById('animated_card').classList.add('animate__animated animate__fadeOut animate__faster');
    }
</script>

<?php require_once "template/footer.php"; ?>