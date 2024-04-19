<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <?php
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4 g-3">

                <div class="head_section mb-2 w-100 d-flex align-items-center">
                    <h3 class="fs-4 header_title">Make Booking</h3>
                </div>

                <div class="col-12">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <p class="fs-5 text-dark pb-3 mb-3 border-bottom">
                                Fill Route Information
                            </p>

                            <?php
                            $available_routes = getTimeTable();
                            ?>

                            <form method="post">
                                <div class="d-flex align-self-center justify-content-between">

                                    <!-- If Gate Is Maubin -->
                                    
                                    <div class="<?php echo $_SESSION['gate']==0?'':'d-none'; ?> custom_input_box w-100 me-3 shadow_ssm rounded py-1 d-flex align-items-center ps-3">

                                        <i class="bi bi-bus-front text-dark fs-6"></i>
                                        <input onfocus="on_focus(Type = `Phone`)" onfocusout="out_focus(Type = `Phone`)"
                                            type="text" class="form-control border-0 text-black-50"
                                            readonly value="<?php echo getRouteName($_SESSION['gate']); ?>">
                                            <input type="text" name="from" value="<?php echo $_SESSION['gate']; ?>" hidden>
                                    </div>

                                    <div class="<?php echo $_SESSION['gate']==0?'':'d-none'; ?> custom_input_box w-100 me-3 shadow_ssm rounded py-1 d-flex align-items-center ps-3"
                                        data-id="To">

                                        <i class="bi bi-geo-alt text-dark fs-6"></i>
                                        <select class="form-select border-0 text-dark" aria-label="Default select example"
                                        name="to">
                                        <option value="" selected>Route To</option>
                                        <?php foreach (getGatesExceptGate() as $g) { ?>
                                            <option value="<?php echo $g['gate_id']; ?>"
                                            <?php echo isset($_POST['btn_search']) ? $_POST['to']==$g['gate_id']?'selected':'' : ''; ?>><?php echo $g['gate_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>

                                    </div>
                                
                                    <!-- If Gate Is Not Maubin -->
                                    
                                    <div class="<?php echo $_SESSION['gate']==0?'d-none':''; ?> custom_input_box w-100 me-3 shadow_ssm rounded py-1 d-flex align-items-center ps-3">

                                        <i class="bi bi-bus-front text-dark fs-6"></i>
                                        <input onfocus="on_focus(Type = `Phone`)" onfocusout="out_focus(Type = `Phone`)"
                                            type="text" class="form-control border-0 text-black-50"
                                            readonly value="<?php echo getRouteName($_SESSION['gate']); ?>">
                                    </div>
                                    <div class="<?php echo $_SESSION['gate']==0?'d-none':''; ?> custom_input_box w-100 me-3 shadow_ssm rounded py-1 d-flex align-items-center ps-3">
                                    <i class="bi bi-geo-alt text-dark fs-6"></i>
                                    <input onfocus="on_focus(Type = `Phone`)" onfocusout="out_focus(Type = `Phone`)"
                                        type="text" class="form-control border-0 text-black-50"
                                        readonly value="<?php echo getRouteName('0'); ?>">
                                    </div>
                                    
                                    <div class="custom_input_box w-100 me-3 shadow_ssm rounded py-1 d-flex align-items-center ps-3"
                                        data-id="Time">

                                        <i class="bi bi-clock text-dark fs-6"></i>
                                        <select onfocus="on_focus(Type = `Time`)" onfocusout="out_focus(Type = `Time`)"
                                            class="form-select border-0 text-black-50"
                                            aria-label="Default select example" name="time" data-id="Time" required>
                                            <option value="" selected>Time</option>

                                            <option value="R1"
                                                class="<?php echo in_array("R1", $available_routes) ? '' : 'd-none'; ?>"
                                                <?php echo isset($_POST['btn_search']) ? $_POST['time']=='R1'?'selected':'' : ''; ?>>
                                                Around 6:00 AM
                                            </option>
                                            <option value="R2"
                                                class="<?php echo in_array("R2", $available_routes) ? '' : 'd-none'; ?>"
                                                <?php echo isset($_POST['btn_search']) ? $_POST['time']=='R2'?'selected':'' : ''; ?>>
                                                Around 8:00 AM
                                            </option>
                                            <option value="R3"
                                                class="<?php echo in_array("R3", $available_routes) ? '' : 'd-none'; ?>"
                                                <?php echo isset($_POST['btn_search']) ? $_POST['time']=='R3'?'selected':'' : ''; ?>>
                                                Around 10:00 AM
                                            </option>
                                            <option value="R4"
                                                class="<?php echo in_array("R4", $available_routes) ? '' : 'd-none'; ?>"
                                                <?php echo isset($_POST['btn_search']) ? $_POST['time']=='R4'?'selected':'' : ''; ?>>
                                                Around 12:00 PM
                                            </option>
                                            <option value="R5"
                                                class="<?php echo in_array("R5", $available_routes) ? '' : 'd-none'; ?>"
                                                <?php echo isset($_POST['btn_search']) ? $_POST['time']=='R5'?'selected':'' : ''; ?>>
                                                Around 2:00 PM
                                            </option>
                                            <option value="R6"
                                                class="<?php echo in_array("R6", $available_routes) ? '' : 'd-none'; ?>"
                                                <?php echo isset($_POST['btn_search']) ? $_POST['time']=='R6'?'selected':'' : ''; ?>>
                                                Around 4:00 PM
                                            </option>

                                        </select>

                                    </div>

                                    <button class="btn btn-primary w-100" name="btn_search">Search</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

            <div class="<?php echo isset($_POST['btn_search']) ? '' : 'd-none'; ?> col-6">
            
                <?php

                $gate = $_SESSION['gate'];
                if (isset($_POST['btn_search'])) {
                    
                    if($gate==0){
                        $route_from = $_POST['from'];
                        $route_to = $_POST['to'];
                    }else{
                        $route_from = $gate;
                        $route_to = 0;
                    }
                    $route_number = $_POST['time'];
                    $front_seat_price = getRoutePrice($route_from, $route_to)['front_seat_price'];
                    $back_seat_price = getRoutePrice($route_from, $route_to)['back_seat_price'];
                }

                
                //from => car that arrive first Need To Fix Here
                $car_id = 1;

                $taken_seats = [];

                if (count(getCarUsingRouteNumber($route_from, $route_to, $route_number)) != 0) {

                    foreach (getCarUsingRouteNumber($route_from, $route_to, $route_number) as $r) {

                        foreach (explode(",", $r['seat_numbers']) as $seats) {

                            if (in_array($seats, $taken_seats)) {
                            } else {
                                array_push($taken_seats, $seats);
                            }
                        }
                    }
                }

                //from => car that arrive first Need To Fix Here
                $car_id = 1;

                ?>
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">

                        <p class="fs-5 text-dark pb-3 mb-3 border-bottom">
                            Choose Seat
                        </p>

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

            <div class="<?php echo isset($_POST['btn_search']) ? '' : 'd-none'; ?> col-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">

                    <form action="<?php getPath(); ?>/bookingUpload.php" method="post">

                        <p class="fs-5 text-dark pb-3 mb-3 border-bottom">
                            Fill Customer Information
                        </p>

                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3
                            mb-2" data-id="Name">

                            <i class="bi bi-person text-dark fs-6"></i>
                            <input onfocus="on_focus(Type = `Name`)" onfocusout="out_focus(Type = `Name`)" type="text"
                                class="form-control border-0 text-black-50" data-id="Name" name="customer_name"
                                placeholder="ခရီးသည်အမည်" data-id="Name" required>

                        </div>

                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3
                            mb-2" data-id="Phone">

                            <i class="bi bi-telephone text-dark fs-6"></i>
                            <input onfocus="on_focus(Type = `Phone`)" onfocusout="out_focus(Type = `Phone`)" type="text"
                                class="form-control border-0 text-black-50" name="customer_phone" data-id="Phone"
                                placeholder="ဖုန်းနံပါတ်" data-id="Phone" required>
                        </div>

                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3
                            mb-4" data-id="NRC">

                            <i class="bi bi-card-text text-dark fs-6"></i>
                            <input onfocus="on_focus(Type = `NRC`)" onfocusout="out_focus(Type = `NRC`)" type="text"
                                class="form-control border-0 text-black-50" name="customer_nrc"
                                placeholder="မှတ်ပုံတင်နံပါတ်" data-id="NRC" required>

                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between p-3 border-top border-bottom">

                            <input type="text" id="front_price"
                                value="<?php echo getRoutePrice($route_from, $route_to)['front_seat_price']; ?>" hidden>
                            <input type="text" id="back_price"
                                value="<?php echo getRoutePrice($route_from, $route_to)['back_seat_price']; ?>" hidden>

                            <p class="fs-5 text-black-50 mb-0">လက်မှတ်တန်ဖိုး</p>
                            <p class="fs-4 text-black-90 mb-0" id="total_price">0 ကျပ်</p>

                        </div>

                        <input type="text" hidden name="from" value="<?php echo $route_from; ?>">
                        <input type="text" hidden name="to" value="<?php echo $route_to; ?>">
                        <input type="text" hidden name="route_number" value="<?php echo $route_number; ?>">
                        <input type="text" hidden name="seat_numbers" id="seat_numbers" value="0">
                        <input type="text" hidden name="total_p" id="total_p" value="0">
                        
                        <button class="btn btn-primary w-100 mt-md-3 custom-button">
                            Confirm
                        </button>

                    </form>

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

<script>
    let arr = [];
    let seats = document.getElementById("seat_numbers");
    let max_seat = 12;

    function makeActive(e) {

        let id = e.srcElement.id;
        let btn = document.getElementById(id);

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