<?php require_once "template/header.php"; ?>

    <div class="container-fluid bg-primary">

        <div
                class="container contact_information  py-1 px-5 d-flex align-items-center justify-content-center justify-content-md-between">
            <p class="small mb-0 text-black d-none d-md-block">
                <i class="bi bi-telephone me-1"></i>
                09779866151
            </p>
            <p class="small mb-0 text-black d-none d-md-block">
                Enjoy your trip without require to login.
            </p>
            <p class="small mb-0 text-black">
                <i class="bi bi-geo-alt me-1"></i>
                Maubin | Main Office
            </p>
        </div>

    </div>

    <div class="head_bar container-fluid position-sticky top-0 bg-white w-100 shadow-sm">

        <div id="navbar" class="container p-2">

            <header class="d-flex align-items-center justify-content-center py-2">

                <a href="<?php getPath(); ?>/home.php"
                   class="d-flex align-items-center text-secondary text-decoration-none">
                    <img src="<?php getPath(); ?>/assets/imgs/posters/logo.svg" style="width: 120px!important;">
                </a>

            </header>

        </div>

    </div>

    <div class="container-fluid main_container booking_search">

    <div class="row justify-content-center">

        <div class="col-12">

            <?php

            $cus_id = '';

            if (isset($_GET['cus_id'])) {
                $cus_id = $_GET['cus_id'];
            }
            $is_customer_auth = isCustomerAuth($cus_id);
            $invoice = getInvoiceByCusId($cus_id);
            $customer = getCustomersById($cus_id);
            ?>

            <div class="card p-3">

                <div class="card-body">

                    <div class="text-center">

                        <img src="<?php getPath(); ?>/assets/imgs/posters/cus_correct.svg" class="w-75">

                        <p class="fs-5 text-secondary mb-1">
                            <?php echo getCustomersById($cus_id)['name']; ?>
                        </p>
                        <small class="text-black-50 text-center">
                            Customer အချက်အလက် မှန်ကန်ပါသည်။
                        </small>

                        <div class="card border-0 mt-3">

                            <div class="card-body">

                                <div class="d-flex align-items-center justify-content-between py-3 border-bottom border-top">
                                    <p class="text-black-50 mb-0">Phone Number</p>
                                    <p class="text-black-50 mb-0"><?php echo $customer['phone']; ?></p>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                                    <p class="text-black-50 mb-0">Nrc</p>
                                    <p class="text-black-50 mb-0"><?php echo $customer['nrc']; ?></p>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                                    <p class="text-black-50 mb-0">Route</p>
                                    <p class="text-black-50 mb-0"><?php echo getRouteEngName($invoice['route_from']) . " ~ " . getRouteEngName($invoice['route_to']); ?></p>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                                    <p class="text-black-50 mb-0">Seat Numbers</p>
                                    <p class="text-black-50 mb-0"><?php echo $invoice['seat_numbers']; ?></p>
                                </div>

                                <div class="d-flex align-items-center justify-content-between pt-3">
                                    <p class="text-black-50 mb-0">Valid Date</p>
                                    <p class="text-black-50 mb-0"><?php echo showDate($invoice['date']); ?></p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        let headBarHeight = document.querySelector(".head_bar").offsetHeight;

        document.querySelector(".main_container").style.marginTop = (headBarHeight - 48) + "px";

    </script>


<?php require_once "template/footer.php"; ?>