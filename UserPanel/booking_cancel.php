<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container booking_search">


    <?php

    $customer_id = $_POST['customer_id'];
    bookingCancel($customer_id);

    ?>

    <div class="row justify-content-center">

        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body p-4">

                    <div class="text-center">

                        <img src="<?php getPath(); ?>/assets/imgs/posters/booking_cancel.svg" class="w-75">

                        <p class="fs-5 text-secondary mb-1">BOOKING CANCELED</p>
                        <small class="text-black-50 text-center">
                            Thanks, your booking is successfully cancelled.
                        </small>

                        <a href="<?php echo getPath(); ?>/home.php" class="btn btn-primary mt-3 w-100" id="btn_otp_validate">
                            Go To Home Page
                        </a>

                    </div>

                </div>


            </div>

        </div>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>

<?php require_once "ui_footer.php" ?>

<?php require_once "template/footer.php"; ?>