<?php require_once "core/userId.php"; ?>
<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

    <div class="container-fluid container-md main_container">

        <?php
        $from = $_POST['from'];
        $to = $_POST['to'];
        $route_number = $_POST['time'];
        $seat_qty = $_POST['seat_qty'];

        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $customer_nrc = $_POST['customer_nrc'];
        $customer_location = $_POST['location'];

        $front_seat_price = getPrice($from, $to)['front_seat_price'];
        $back_seat_price = getPrice($from, $to)['back_seat_price'];
        //from => car that arrive first Need To Fix Here
        $car_id = 1;
        $customer_id = 0;

        if (isset($_SESSION['user_id'])) {
            $customer_id = $_SESSION['user_id'];
        }

        $taken_seats = [];

        if (count(getCarUsingRouteNumber($from, $to, $route_number)) != 0) {

            foreach (getCarUsingRouteNumber($from, $to, $route_number) as $r) {

                foreach (explode(",", $r['seat_numbers']) as $seats) {

                    if (in_array($seats, $taken_seats)) {
                    } else {
                        array_push($taken_seats, $seats);
                    }
                }

                if ((count($taken_seats) + $seat_qty) > 12) {
                    $seat_left = 12 - count($taken_seats);
                    echo "<script>alert('Sorry only $seat_left seats left.')</script>";
                    linkTo("home.php");
                }
            }
        }

        //from => car that arrive first Need To Fix Here
        $car_id = 1;

        ?>

        <div class="row justify-content-center" style="padding-bottom: 0px !important;">

            <div class="col-12 col-md-11">

                <div class="row g-4 justify-content-between">

                    <div class="col-12 col-md-6">

                        <div class="card bg-light border-0 shadow-sm">

                            <div class="card-body pt-md-5">

                                <h5 class="text-dark mb-0 mb-3 pb-3 mb-md-4 pb-md-4 border-bottom">
                                    ထိုင်ခုံ <span class="text-secondary"><?php echo $seat_qty; ?></span> ခုံရွေးချယ်ပါ
                                </h5>

                                <!--        Roll Line 1-->

                                <div class="row g-2 m-0 p-0">
                                    <div class="seat col-4">
                                        <button class="btn_choose_seat btn btn-dark w-100 text-black" disabled>Driver
                                        </button>
                                    </div>
                                    <div class="seat col-4">
                                        <button type="button" id="1" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('1', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            1
                                        </button>
                                    </div>
                                    <div class="seat col-4">
                                        <button type="button" id="2" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('2', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            2
                                        </button>
                                    </div>
                                </div>

                                <!--        Roll Line 2-->

                                <div class="row g-2 m-0 p-0">

                                    <div class="seat col-4">
                                        <button type="button" id="3" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('3', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            3
                                        </button>
                                    </div>
                                    <div class="seat col-4">
                                        <button type="button" id="4" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('4', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            4
                                        </button>
                                    </div>
                                    <div class="seat col-4">
                                        <button type="button" id="5" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('5', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            5
                                        </button>
                                    </div>

                                </div>

                                <!--        Roll Line 3-->

                                <div class="row g-2 m-0 p-0">

                                    <div class="seat col-4">
                                        <button type="button" id="6" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('6', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            6
                                        </button>
                                    </div>
                                    <div class="seat col-4">
                                        <button type="button" id="7" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('7', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            7
                                        </button>
                                    </div>
                                    <div class="seat col-4">
                                        <button type="button" id="8" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('8', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            8
                                        </button>
                                    </div>

                                </div>

                                <!--        Roll Line 4-->

                                <div class="row g-2 m-0 mb-4 p-0">

                                    <div class="seat col-3">
                                        <button type="button" id="9" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('9', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            9
                                        </button>
                                    </div>
                                    <div class="seat col-3">
                                        <button type="button" id="10" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('10', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            10
                                        </button>
                                    </div>
                                    <div class="seat col-3">
                                        <button type="button" id="11" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('11', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            11
                                        </button>
                                    </div>
                                    <div class="seat col-3">
                                        <button type="button" id="12" onclick="makeActive(event)"
                                                class="btn_choose_seat shadow_ssm text-dark btn <?php echo in_array('12', $taken_seats) ? 'btn-booked disabled border-0' : 'btn-available'; ?> w-100">
                                            12
                                        </button>
                                    </div>

                                </div>

                                <!--                    Description-->

                                <div class="d-flex align-items-center justify-content-between px-3 pt-2 border-top">

                                    <div class="d-flex align-items-center text-dark">
                                        <i class="bi bi-person text-dark me-1"></i>
                                        <?php echo $seat_qty; ?>
                                    </div>

                                    <div class="d-flex align-items-center text-dark">
                                        <i class="bi bi-square-fill text-primary me-1"></i>
                                        Selected
                                    </div>

                                    <div class="d-flex align-items-center text-dark">
                                        <i class="bi bi-square-fill text-booked me-1"></i>
                                        Booked
                                    </div>

                                    <div class="d-flex align-items-center text-dark">
                                        <i class="bi bi-square-fill text-available me-1"></i>
                                        Available
                                    </div>

                                </div>

                                <div class="alert alert-light d-flex align-items-center mt-4" role="alert">
                                    <div>
                                        <p class="text-secondary mb-0" style="text-align: justify!important;">
                                            <?php echo "ခရီးသည်တစ်ဦးလျှင် ခေါင်းခန်း - " . $front_seat_price . " ကျပ်၊ " . "နောက်ခန်း - " . $back_seat_price . " ကျပ် ဖြစ်ပါသည်။"; ?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-md-6">

                        <div class="card mt-3 mt-md-0 bg-white border-0 shadow-sm">

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

                                <div class="d-flex align-items-center justify-content-between mb-2 pt-2 pb-3 border-bottom">

                                    <p class="text-black-50 mb-0">ထိုင်ခုံ အရေတွက်</p>
                                    <p class="fs-6 text-black-50 mb-0"><?php echo $seat_qty . " ခုံ"; ?></p>

                                </div>

                                <div class="d-flex align-items-center justify-content-between pt-2">

                                    <p class="text-black-50 mb-0">ခရီးသည်အမည်</p>
                                    <p class="fs-6 text-black-50 mb-0"><?php echo $customer_name; ?></p>

                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-3 pt-3">

                                    <p class="text-black-50 mb-0">ဖုန်းနံပါတ်</p>
                                    <p class="fs-6 text-black-50 mb-0"><?php echo $customer_phone; ?></p>

                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-2  pb-3 border-bottom">

                                    <p class="text-black-50 mb-0">မှတ်ပုံတင်နံပါတ်</p>
                                    <p class="fs-6 text-black-50 mb-0"><?php echo $customer_nrc; ?></p>

                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-3 pb-3 border-bottom">

                                    <input type="text" id="front_price"
                                           value="<?php echo getPrice($from, $to)['front_seat_price']; ?>" hidden>
                                    <input type="text" id="back_price"
                                           value="<?php echo getPrice($from, $to)['back_seat_price']; ?>" hidden>

                                    <p class="fs-5 text-black-50 mb-0">လက်မှတ်တန်ဖိုး</p>
                                    <p class="fs-4 text-black-90 mb-0" id="total_price">0 ကျပ်</p>

                                </div>

                                <form action="<?php getPath(); ?>/phone_auth.php" class="mt-3 mt-md-0" method="post"
                                      name="dataForm">

                                    <input type="text" hidden name="time" value="<?php echo $route_number; ?>">
                                    <input type="text" hidden name="from" value="<?php echo $from; ?>">
                                    <input type="text" hidden name="to" value="<?php echo $to; ?>">
                                    <input type="text" hidden name="car_id" value="<?php echo $car_id; ?>">
                                    <input type="text" hidden name="seat_qty" value="<?php echo $seat_qty; ?>">
                                    <input type="text" hidden name="seat_numbers" id="seat_numbers" value="0">
                                    <input type="text" hidden name="customer_id" value="<?php echo $customer_id ?>">
                                    <input type="text" hidden name="customer_name"
                                           value="<?php echo $customer_name; ?>">
                                    <input type="text" hidden name="customer_phone"
                                           value="<?php echo $customer_phone; ?>">
                                    <input type="text" hidden name="customer_nrc" value="<?php echo $customer_nrc; ?>">
                                    <input type="text" hidden name="location" value="<?php echo $customer_location; ?>">
                                    <input type="text" hidden name="total_price" id="total_p" value="0">

                                    <div class="d-flex align-items-center py-3 border-bottom mb-3">

                                        <div class="form-check me-3">
                                            <input value="pay_on_ride" class="payment_method form-check-input"
                                                   type="radio" name="payment_method" id="flexRadioDefault2" checked>
                                            <label class="form-check-label text-black-50" for="flexRadioDefault2">
                                                ကားပေါ်ရောက်မှငွေပေးချေမယ်။
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input value="online_payment" class="payment_method form-check-input"
                                                   type="radio" name="payment_method" id="flexRadioDefault1">
                                            <label class="form-check-label text-black-50" for="flexRadioDefault1">
                                                ယခုပေးချေမယ်။
                                            </label>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary w-100 mt-md-3 d-none custom-button"
                                            id="btn_seat_confirm">
                                        ငွေပေးချေမှုအဆင့်သို့
                                    </button>

                                </form>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

    <script src="<?php getPath(); ?>/assets/js/app.js"></script>

    <script>
        let arr = [];
        let seats = document.getElementById("seat_numbers");
        let max_seat = <?php echo $seat_qty ?>;

        var rad = document.dataForm.payment_method;
        for (var i = 0; i < rad.length; i++) {
            rad[i].addEventListener('change', function () {
                console.log(this.value)
            });
        }

        function makeActive(e) {

            let id = e.srcElement.id;

            let btn = document.getElementById(id);
            let btn_confirm = document.getElementById("btn_seat_confirm");

            if (arr.includes(id)) {
                arr.splice(arr.indexOf(id), 1);
                btn.classList.toggle("seat_active");
                btn.classList.toggle("seat_available");
            } else {

                if (arr.length < max_seat) {
                    arr.push(id);
                    btn.classList.toggle("seat_active");
                    btn.classList.toggle("seat_available");
                }

            }

            seats.value = arr;

            //Update Price
            let front = parseInt(<?php echo $front_seat_price ?>);
            let back = <?php echo $back_seat_price ?>;

            if (arr.length === parseInt(max_seat)) {
                btn_confirm.classList.add("d-block");
                btn_confirm.classList.remove("d-none");

                let total = 0;
                arr.forEach(e => {
                    if (parseInt(e) === 1 || parseInt(e) === 2) {
                        total += front;
                    } else {
                        total += back;
                    }
                });
                document.getElementById('total_price').innerHTML = total + ' ကျပ်';
                document.getElementById('total_p').value = total;

            } else {
                btn_confirm.classList.add("d-none");
                btn_confirm.classList.remove("d-block");

                let total = 0;
                arr.forEach(e => {
                    if (parseInt(e) === 1 || parseInt(e) === 2) {
                        total += front;
                    } else {
                        total += back;
                    }
                });
                document.getElementById('total_price').innerHTML = total + ' ကျပ်';
                document.getElementById('total_p').value = total;
            }
        }
    </script>

<?php require_once "template/footer.php"; ?>