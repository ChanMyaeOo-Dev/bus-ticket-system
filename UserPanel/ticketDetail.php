<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid container-md main_container">

    <?php

    $invoice_id = $_POST['invoice_id'];
    $invoice = getInvoiceById($invoice_id);
    $customer_id = $invoice['customer_id'];

    $car_time = getTime($invoice['route_number']);
    date_default_timezone_set('Asia/Yangon');
    $current_time = date('g:i A');

    $start_datetime = new DateTime($current_time);
    $diff = $start_datetime->diff(new DateTime($car_time));

    $hour = $diff->h * 60;
    $minute_diff = $hour + $diff->i;

    ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="z-index: 3000!important;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5 text-secondary" id="exampleModalLabel">
                        <i class="bi bi-trash me-2"></i>
                        ဘိုကင်ဖျက်သိမ်းရန်သေချာပါသလား?
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="p-3">

                        <form action="<?php getPath() ?>/booking_cancel.php" method="post" class="text-center">

                            <img src="<?php getPath(); ?>/assets/imgs/source/cancel.svg"
                                style="height: 320px!important;">

                            <input type="text" name="customer_id" value="<?php echo $customer_id; ?>" hidden>
                            <input type="text" name="payment_method" value="<?php echo $_POST['payment_method']; ?>"
                                hidden>

                            <button type="submit" name="btn_cancel" class="btn btn-primary text-white w-100 mt-5">
                                သေချာပါသည်
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row justify-content-center g-3">

        <div class="col-12 col-md-3">

            <div class="card h-100 bg-white pt-4 d-flex justify-content-between">

                <div class="card-body d-flex flex-column p-4 align-items-center">

                    <h5 class="text-dark w-100 mb-3 pb-3 pb-md-4 mb-md-4 border-bottom text-center">Booking's QR
                        Code</h5>

                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="<?php echo $invoice['qr_code']; ?>" class="w-100">
                    </div>

                </div>

                <div class="p-3">
                    <button class="btn btn-primary custom-button w-100" id="btn_save">Print</button>
                </div>

            </div>

        </div>

        <div class="col-12 col-md-4">

            <div class="card bg-white h-100">

                <div class="card-body p-4 p-md-5">

                    <h5 class="text-dark mb-3 pb-3 pb-md-4 mb-md-4 border-bottom text-center">ဘိုကင်အကျဉ်းချုပ်</h5>

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

                    <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                        <p class="text-black-50 mb-0">ထွက်ခွာချိန်</p>
                        <p class="fs-6 text-black-50 mb-0">
                            <?php echo getTime($invoice['route_number']); ?>
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

                    <div class="d-flex align-items-center justify-content-between mb-2 pt-2">

                        <p class="text-black-50 mb-0">ခရီးသည်အမည်</p>
                        <p class="fs-6 text-black-50 mb-0">
                            <?php echo getCustomersById($invoice['customer_id'])['name']; ?>
                        </p>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2  pb-3 border-bottom">

                        <p class="text-black-50 mb-0">ဖုန်းနံပါတ်</p>
                        <p class="fs-6 text-black-50 mb-0">
                            <?php echo getCustomersById($invoice['customer_id'])['phone']; ?>
                        </p>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3 mb-2">

                        <p class="text-black-50 mb-0 fs-5">လက်မှတ်တန်ဖိုး</p>
                        <p class="fs-4 text-black-90 mb-0">
                            <?php echo $invoice['price_total'] . " Ks"; ?>
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-12 col-md-4">

            <div class="card bg-white h-100">

                <div class="card-body p-4 p-md-5">

                    <h5 class="text-dark mb-3 pb-3 pb-md-4 mb-md-4 border-bottom text-center">မှတ်ချက်</h5>

                    <div class="d-flex align-items-start mb-3">

                        <i class="bi bi-check-circle text-dark me-2"></i>
                        <p class="text-black-50 mb-0">ကားထွက်လာလျှင်ဖုန်းဆက်ပေးပါမည်။</p>

                    </div>

                    <div class="d-flex align-items-start mb-3">

                        <i class="bi bi-check-circle text-dark me-2"></i>
                        <p class="text-black-50 mb-0">
                            ဘိုကင် ဖျက်သိမ်းလိုလျှင် ကားမထွက်ခင် မိနစ်သုံးဆယ်ကြိုတင်
                            ဖျက်သိမ်းနိုင်ပါသည်။ မိနစ်သုံးဆယ်နောက်ပိုင်း ဖျက်သိမ်းမှုများအတွက် ပြန်အမ်းငွေ
                            ပေးမည်မဟုတ်ပါ။
                        </p>

                    </div>


                </div>

                <div class="p-3">
                    <!-- Button trigger plant add modal -->
                    <button type="button" class="btn btn-outline-primary w-100
                    <?php echo $minute_diff <= 30 ? 'd-none' : ''; ?>" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        ဘိုကင်ဖျက်သိမ်းရန်
                    </button>
                </div>


            </div>

        </div>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>
<script src="<?php getPath(); ?>/node_modules/html2pdf.js/dist/html2pdf.bundle.min.js"></script>

<?php require_once "ui_footer.php"; ?>
<?php require_once "template/footer.php"; ?>