<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

    <div class="container-fluid container-md main_container">

        <?php
        $from = $_POST['from'];
        $to = $_POST['to'];
        $route_number = $_POST['time'];
        $seat_qty = $_POST['seat_qty'];
        $seat_numbers = $_POST['seat_numbers'];
        $total_seat = $_POST['total_seats'];
        //from => car that arrive first Need To Fix Here
        $car_id = 1;
        $customer_id = 0;

        if (isset($_SESSION['user_id'])) {
            $customer_id = $_SESSION['user_id'];
        }
        ?>

        <div class="row">

            <div class="col-12 col-md-7">

                <div class="card bg-white">

                    <div class="card-body p-md-5">

                        <h5 class="text-dark mb-3 pb-3 mb-md-4 pb-md-4 border-bottom">ခရီးသည် အချက်လက်ဖြည့်ပါ</h5>

                        <form action="<?php getPath(); ?>/showTicket.php" class="mt-3 mt-md-0" method="post">

                            <input type="text" hidden name="time" value="<?php echo $route_number; ?>">
                            <input type="text" hidden name="from" value="<?php echo $from; ?>">
                            <input type="text" hidden name="to" value="<?php echo $to; ?>">
                            <input type="text" hidden name="car_id" value="<?php echo $car_id; ?>">
                            <input type="text" hidden name="seat_qty" value="<?php echo $seat_qty; ?>">
                            <input type="text" hidden name="seat_numbers" value="<?php echo $seat_numbers ?>">
                            <input type="text" hidden name="customer_id" value="<?php echo $customer_id ?>">
                            <input type="text" name="total_seats" value="
                            <?php echo $total_seat; ?>" hidden>

                            <div class="mb-3">
                                <label class="mb-2" for="customer_name">ခရီးသည်အမည်</label>
                                <input type="text" class="form-control text-black-50" id="customer_name"
                                       name="customer_name" required>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2" for="customer_phone">ဖုန်းနံပါတ်</label>
                                <input type="text" class="form-control text-black-50" id="customer_phone"
                                       name="customer_phone" required>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2" for="customer_nrc">မှတ်ပုံတင်နံပါတ်</label>
                                <input type="text" class="form-control text-black-50" id="customer_nrc"
                                       name="customer_nrc" required>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2" for="customer_nrc">လာရောက်ခေါ်ရမည့်နေရာ</label>
                                <select class="form-select text-black-50" aria-label="Default select example"
                                        name="location" required>
                                    <option value="GATE" selected>Gate</option>
                                    <option value="Pagoda Street">ဘုရားလမ်း</option>
                                    <option value="GTI">GTI</option>
                                </select>
                            </div>

                            <button class="btn btn-primary w-100 mt-md-3" id="btn_confirm">
                                ငွေပေးချေမှုအဆင့်သို့
                            </button>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-12 col-md-5">

                <div class="card mt-3 mt-md-0 bg-white">

                    <div class="card-body p-4 p-md-5">

                        <h5 class="text-dark mb-3 pb-3 pb-md-4 mb-md-4 border-bottom">ဘိုကင်အကျဉ်းချုပ်</h5>

                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <p class="text-black-50 mb-0">လမ်းကြောင်း</p>
                            <div class="d-flex align-items-center">
                                <p class="fs-6 text-black-50 mb-0"><?php echo getRouteName($from); ?></p>
                                <i class="bi bi-dot mx-1 text-black-50"></i>
                                <p class="fs-6 text-black-50 mb-0"><?php echo getRouteName($to); ?></p>
                            </div>

                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                            <p class="text-black-50 mb-0">ထွက်ခွာချိန်</p>
                            <p class="fs-6 text-black-50 mb-0"><?php echo getTime($route_number); ?></p>

                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2 pt-2">

                            <p class="text-black-50 mb-0">ထိုင်ခုံ အရေတွက်</p>
                            <p class="fs-6 text-black-50 mb-0"><?php echo $seat_qty . " ခုံ"; ?></p>

                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2 pb-3 border-bottom">

                            <p class="text-black-50 mb-0">ထိုင်ခုံ နံပါတ်</p>
                            <p class="fs-6 text-black-50 mb-0"><?php echo "[" . $seat_numbers . "]"; ?></p>

                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-3 mb-2">

                            <p class="text-black-50 mb-0">လက်မှတ်တန်ဖိုး</p>
                            <p class="fs-6 text-black-50 mb-0"><?php echo ($seat_qty * 5000) . " Ks"; ?></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

    <script src="<?php getPath(); ?>/assets/js/app.js"></script>

<?php require_once "template/footer.php"; ?>