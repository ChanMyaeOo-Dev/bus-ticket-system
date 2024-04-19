<?php session_start(); ?>
<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid container-md main_container">

    <?php
    if (isset($_SESSION['user_id'])) {
        $customer_id = $_SESSION['user_id'];
        $invoice = getTempInvoiceByCusId($customer_id);
        $customer = getTempCustomer($customer_id);

        $from = $invoice['route_from'];
        $to = $invoice['route_to'];
        $route_number = $invoice['route_number'];
        $seat_qty = $invoice['person_qty'];
        $seat_numbers = $invoice['seat_numbers'];
        $payment_method = $invoice['payment'];
        $total_price = $invoice['price_total'];
        //from => car that arrive first Need To Fix Here
        $car_id = 1;

        $customer_name = $customer['name'];
        $customer_phone = $customer['phone'];
        $customer_nrc = $customer['nrc'];
        $customer_location = $customer['location'];

        $is_booking_success = false;

        $date = date("d/m/Y");

        $qr_code = $invoice['qr_code'];

        uploadCustomerInformation($customer_id, $customer_name, $customer_phone, $customer_nrc, $customer_location);
        //Insert New Invoice
        if (uploadInvoice($route_number, $from, $to, $car_id, $customer_id, $seat_qty, $seat_numbers, $total_price, $payment_method, $qr_code)) {
            $is_booking_success = true;
            if (deleteTempInvoice($customer_id)) {
                session_unset();
                session_destroy();
            }
        }
    } else {
        linkTo('home.php');
    }

    ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="z-index: 3000!important;">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">
                        <i class="bi bi-database-add me-2"></i>
                        ဘိုကင်ဖျက်သိမ်းရန်
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="w-100 card border-0 shadow-sm rounded">

                        <div class="card-body">

                            <form action="<?php getPath() ?>/booking_cancel.php" method="post">

                                <img src="<?php getPath(); ?>/assets/imgs/posters/booking_cancel.svg"
                                    style="height: 200px!important;">

                                <input type="text" name="customer_id" value="<?php echo $customer_id; ?>" hidden>
                                <input type="text" name="payment_method" value="<?php echo $payment_method; ?>" hidden>


                                <button type="submit" name="btn_cancel" class="btn btn-primary text-white w-100 mt-3">
                                    Confirm
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row justify-content-center g-3">

        <div class="col-12 col-md-11">
            <div class="alert alert-success" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                ဘိုကင်တင်ခြင်း အောင်မြင်ပါတယ်။
            </div>
        </div>

        <div class="col-12 col-md-3">

            <div class="card h-100 bg-white pt-4 d-flex justify-content-between">

                <div class="card-body d-flex flex-column p-4 align-items-center">

                    <h5 class="text-dark w-100 mb-3 pb-3 pb-md-4 mb-md-4 border-bottom text-center">Booking's QR
                        Code</h5>

                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="<?php echo $qr_code ?>" alt="" class="w-100">
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

                    <h5 class="text-dark text-center mb-3 pb-3 pb-md-4 mb-md-4 border-bottom">ဘိုကင်အကျဉ်းချုပ်</h5>

                    <div class="d-flex align-items-center justify-content-between mb-2">

                        <p class="text-black-50 mb-0">လမ်းကြောင်း</p>
                        <div class="d-flex align-items-center">
                            <p class="fs-6 text-black-50 mb-0">
                                <?php echo getRouteName($from); ?>
                            </p>
                            <i class="bi bi-dot mx-1 text-black-50"></i>
                            <p class="fs-6 text-black-50 mb-0">
                                <?php echo getRouteName($to); ?>
                            </p>
                        </div>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                        <p class="text-black-50 mb-0">ထွက်ခွာချိန်</p>
                        <p class="fs-6 text-black-50 mb-0">
                            <?php echo getTime($route_number); ?>
                        </p>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2 pt-2">

                        <p class="text-black-50 mb-0">ထိုင်ခုံ အရေတွက်</p>
                        <p class="fs-6 text-black-50 mb-0">
                            <?php echo $seat_qty . " ခုံ"; ?>
                        </p>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                        <p class="text-black-50 mb-0">ထိုင်ခုံ နံပါတ်</p>
                        <p class="fs-6 text-black-50 mb-0">
                            <?php echo "[" . $seat_numbers . "]"; ?>
                        </p>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2 pt-2">

                        <p class="text-black-50 mb-0">ခရီးသည်အမည်</p>
                        <p class="fs-6 text-black-50 mb-0">
                            <?php echo $customer_name; ?>
                        </p>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2  pb-3 border-bottom">

                        <p class="text-black-50 mb-0">ဖုန်းနံပါတ်</p>
                        <p class="fs-6 text-black-50 mb-0">
                            <?php echo $customer_phone; ?>
                        </p>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3 mb-2">

                        <p class="text-black-50 fs-5 mb-0">လက်မှတ်တန်ဖိုး</p>
                        <p class="fs-4 text-black mb-0">
                            <?php echo $total_price . " Ks"; ?>
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-12 col-md-4">

            <div class="card bg-white h-100">

                <div class="card-body p-4 p-md-5">

                    <h5 class="text-dark text-center mb-3 pb-3 pb-md-4 mb-md-4 border-bottom">မှတ်ချက်</h5>

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
                    <a href="<?php getPath(); ?>/faqs.php" class="btn btn-outline-primary w-100">
                        ဘိုကင်ဘယ်လိုဖျက်သိမ်းရမလဲ?
                    </a>
                </div>

            </div>

        </div>

        <!--        Print Layout-->

        <div class="col-12 bg-light d-none">

            <div class="card border-0 m-5 shadow" id="invoice">

                <div class="card-body">

                    <img src="<?php getPath(); ?>/assets/imgs/posters/booking_success.png" alt="" class="w-100">

                    <div class="d-flex align-items-start justify-content-between mb-3">

                        <div>
                            <p class="mb-2 fs-5 text-dark">
                                Customer Name :
                                <?php echo $customer_name; ?>
                            </p>
                            <p class="mb-2 fs-5 text-dark">
                                Customer Phone :
                                <?php echo $customer_phone; ?>
                            </p>
                            <p class="mb-2 fs-5 text-dark">
                                Customer Nrc :
                                <?php echo $customer_nrc; ?>
                            </p>
                            <p class="mb-4 fs-5 text-dark">
                                Seat Numbers :
                                <?php echo $seat_numbers; ?>
                            </p>
                        </div>

                        <img src="<?php echo $qr_code ?>" alt="" id="qr_container" class="qr_container">

                    </div>


                    <div class="row py-3 border-top">
                        <div class="col-3">
                            <p class="mb-0 text-black-50">
                                Booking Date
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="mb-0 text-black-50">
                                Route
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="mb-0 text-black-50">
                                Route Number
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="mb-0 text-black-50">
                                Payment Method
                            </p>
                        </div>
                    </div>

                    <div class="row py-3 border-top border-bottom">
                        <div class="col-3">
                            <p class="mb-0 text-secondary">
                                <?php echo $date; ?>
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="mb-0 text-secondary">
                                <?php echo getRouteEngName($from) . " - " . getRouteEngName($to); ?>
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="mb-0 text-secondary">
                                <?php echo $route_number; ?>
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="mb-0 text-secondary">
                                <?php echo $payment_method; ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>
<script src="<?php getPath(); ?>/node_modules/html2pdf.js/dist/html2pdf.bundle.min.js"></script>
<script>
    function generatePDF() {
        let element = document.getElementById('invoice');
        let opt = {
            filename: 'Ticket_Invoice.pdf',
            image: {
                type: 'jpeg',
                quality: 1
            },
            html2canvas: {
                scale: window.devicePixelRatio,
                y: 0,
                x: 0,
                scrollY: 0,
                scrollX: 0,
                windowWidth: 800,
                useCORS: true
            },
            jsPDF: {
                unit: 'in',
                format: 'a4',
                orientation: 'portrait'
            }
        };
        // New Promise-based usage:
        html2pdf().set(opt).from(element).save();
    }

    document.getElementById('qr_container').addEventListener('load', () => {

        generatePDF();

        document.getElementById('btn_save').addEventListener('click', function () {
            generatePDF();
        });

    });
</script>

<?php require_once "ui_footer.php"; ?>
<?php require_once "template/footer.php"; ?>