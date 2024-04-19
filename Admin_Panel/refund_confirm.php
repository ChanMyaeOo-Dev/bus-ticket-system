<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>
        <?php 
        $previous_url = $_SERVER['HTTP_REFERER'];
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4 g-3">

                <div class="head_section mb-4 w-100 d-flex align-items-center">
                    <a href="<?php echo $previous_url; ?>" class="me-3 text-decoration-none icon_button">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h3 class="fs-4 header_title">Refund Confirmation</h3>
                </div>

                <?php

                $invoice = [];

                if (isset($_GET['cus_id'])) {
                    $invoice = getCancelInvoiceByCusId($_GET['cus_id']);
                }

                if (isset($_POST['btn_confirm'])) {
                    if(refundComplete($_POST['cus_id'])){
                        linkTo('refund.php');
                    }
                }
                ?>

                <div class="col-6">

                    <div class="card bg-white h-100">

                        <div class="card-body p-5">

                            <h5 class="text-dark mb-3 pb-3 pb-md-4 mb-md-4 border-bottom">
                                Booking Information
                            </h5>

                            <div class="d-flex align-items-center justify-content-between mb-2">

                                <p class="text-black-50 mb-0">လမ်းကြောင်း</p>
                                <div class="d-flex align-items-center">
                                    <p class="fs-6 text-black-50 mb-0">
                                        <?php echo getRouteName($invoice['route_from']); ?>
                                    </p>
                                    <i class="bi bi-dot mx-1 text-black-50"></i>
                                    <p class="fs-6 text-black-50 mb-0">
                                        <?php echo getRouteName($invoice['route_to']); ?>
                                    </p>
                                </div>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2">

                                <p class="text-black-50 mb-0">နေ့စွဲ</p>
                                <p class="fs-6 text-black-50 mb-0">
                                    <?php echo showTime($invoice['date'], "d/m/Y"); ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                                <p class="text-black-50 mb-0">ထွက်ခွာချိန်</p>
                                <p class="fs-6 text-black-50 mb-0">
                                    <?php echo getTime($invoice['route_number']); ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2 pt-2">

                                <p class="text-black-50 mb-0">ခရီးသည်အမည်</p>
                                <p class="fs-6 text-black-50 mb-0">
                                    <?php echo getCustomer($_GET['cus_id'])['name']; ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2  pb-3 border-bottom">

                                <p class="text-black-50 mb-0">ဖုန်းနံပါတ်</p>
                                <p class="fs-6 text-black-50 mb-0">
                                    <?php echo getCustomer($_GET['cus_id'])['phone']; ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2 pt-2">

                                <p class="text-black-50 mb-0">ထိုင်ခုံ အရေတွက်</p>
                                <p class="fs-6 text-black-50 mb-0">
                                    <?php echo $invoice['person_qty'] . " ခုံ"; ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                                <p class="text-black-50 mb-0">ထိုင်ခုံ နံပါတ်</p>
                                <p class="fs-6 text-black-50 mb-0">
                                    <?php echo "[" . $invoice['seat_numbers'] . "]"; ?>
                                </p>

                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3 mb-2">

                                <p class="text-black-50 fs-5 mb-0">လက်မှတ်တန်ဖိုး</p>
                                <p class="fs-4 text-black mb-0">
                                    <?php echo $invoice['price_total'] . " Ks"; ?>
                                </p>

                            </div>

                            <form method="post">
                                <input type="text" name="cus_id" value="<?php echo $invoice['customer_id'] ?>" hidden>
                                <button type="submit" name="btn_confirm"
                                    class="btn btn-primary py-2 mt-3 w-100 mb-0">Refund Complete</button>
                            </form>
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