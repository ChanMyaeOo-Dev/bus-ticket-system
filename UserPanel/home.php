<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="headingPhoto my-3 text-center">
    <img class="w-75" src="./assets/imgs/posters/Header_1.svg" alt="Standing Girl Photo">
</div>

<div class="container-fluid main_container" style="padding-bottom: 0px !important">

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 mb-5">

            <form action="<?php getPath(); ?>/chose_seat.php" method="post">

                <div class="row d-flex g-3">

                    <div class="d-none d-md-flex justify-content-center align-items-center col-12 ps-2" style="height: 320px !important;">

                        <div class="w-75 d-flex flex-column justify-content-center align-items-center">
                            <h1 class="text-primary text-center">
                                Book Online Bus Ticket <br><span class="text-secondary">Around Maubin</span>
                            </h1>

                            <p class="mb-3 text-black-50 mt-2 ps-2 w-50 text-center">The leading bus ticketing system in Myanmar. Find the
                                best
                                price for your bus tickets.</p>

                            <div class="d-flex align-items-center flex-wrap">

                                <div class="card rounded-pill shadow_ssm me-2" style="border: 1px solid #fb8500; background-color: white; color: Black;">
                                    <div class="card-body px-4 py-2">
                                        <small class="mb-0">
                                            <i class="bi bi-bus-front me-2"></i>
                                            7 Trips
                                        </small>
                                    </div>
                                </div>
                                <div class="card rounded-pill shadow_ssm me-2" style="border: 1px solid #0ead69; background-color: white; color: Black;">
                                    <div class="card-body px-4 py-2">
                                        <small class="mb-0">
                                            <i class="bi bi-clock-history me-2"></i>
                                            24/7 Online Booking
                                        </small>
                                    </div>
                                </div>
                                <div class="card rounded-pill shadow_ssm me-2" style="border: 1px solid #0496ff; background-color: white; color: Black;">
                                    <div class="card-body px-4 py-2">
                                        <small class="mb-0">
                                            <i class="bi bi-wallet me-2"></i>
                                            Secure and Fast Payment
                                        </small>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body p-4">

                                <h5 class="text-dark mb-4 fw-bold pb-3 border-bottom">ခရီးစဉ်အသေးစိတ်ဖြည့်ပါ</h5>

                                <?php
                                $available_routes = getTimeTable();
                                ?>

                                <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 mb-2" data-id="From">

                                    <i class="bi bi-bus-front text-dark fs-6"></i>
                                    <select onfocus="on_focus(Type = `From`)" onfocusout="out_focus(Type = `From`)" class="from form-select border-0 text-black-50" id="route_from" aria-label="Default select example" name="from" data-id="From" required>
                                        <option value="">ထွက်ခွာ</option>
                                        <option value="0">Maubin (မအူပင်)</option>
                                        <option value="1">BOC (ဘီအိုစီ)</option>
                                        <option value="2">Dala (ဒလ)</option>
                                        <option value="3">Pyapon (ဖျာပုံ)</option>
                                        <option value="4">Hinthada (ဟင်္သာတ)</option>
                                        <option value="5">Pathein (ပုသိမ်)</option>
                                    </select>

                                </div>

                                <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 mb-2" data-id="To">

                                    <i class="bi bi-geo-alt text-dark fs-6"></i>
                                    <select onfocus="on_focus(Type = `To`)" onfocusout="out_focus(Type = `To`)" class="form-select border-0 text-black-50" id="route_to" aria-label="Default select example" name="to" data-id="To" required>
                                        <option value="">ဆိုက်ရောက်</option>
                                        <option value="0">Maubin (မအူပင်)</option>
                                        <option value="1">BOC (ဘီအိုစီ)</option>
                                        <option value="2">Dala (ဒလ)</option>
                                        <option value="3">Pyapon (ဖျာပုံ)</option>
                                        <option value="4">Hinthada (ဟင်္သာတ)</option>
                                        <option value="5">Pathein (ပုသိမ်)</option>
                                    </select>

                                </div>

                                <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 mb-2" data-id="Time">

                                    <i class="bi bi-clock text-dark fs-6"></i>
                                    <select onfocus="on_focus(Type = `Time`)" onfocusout="out_focus(Type = `Time`)" class="form-select border-0 text-black-50" aria-label="Default select example" name="time" data-id="Time" required>
                                        <option value="">Time</option>

                                        <option value="R1" class="<?php echo in_array("R1", $available_routes) ? '' : 'd-none'; ?>">
                                            Around 6:00 AM
                                        </option>
                                        <option value="R2" class="<?php echo in_array("R2", $available_routes) ? '' : 'd-none'; ?>">
                                            Around 8:00 AM
                                        </option>
                                        <option value="R3" class="<?php echo in_array("R3", $available_routes) ? '' : 'd-none'; ?>">
                                            Around 10:00 AM
                                        </option>
                                        <option value="R4" class="<?php echo in_array("R4", $available_routes) ? '' : 'd-none'; ?>">
                                            Around 12:00 PM
                                        </option>
                                        <option value="R5" class="<?php echo in_array("R5", $available_routes) ? '' : 'd-none'; ?>">
                                            Around 2:00 PM
                                        </option>
                                        <option value="R6" class="<?php echo in_array("R6", $available_routes) ? '' : 'd-none'; ?>">
                                            Around 4:00 PM
                                        </option>

                                    </select>

                                </div>

                                <div class="seat_num_counter custom_input_box d-flex align-items-center justify-content-between rounded shadow_ssm p-1" data-id="Icons">

                                    <button onfocus="on_focus(Type = `Icons`)" onfocusout="out_focus(Type = `Icons`)" type="button" class="btn_seat btn_seat_minus btn fw-bold" data-id="Icons">
                                        -
                                    </button>

                                    <input type="text" class="form-control border-0 text-center input-number" min="1" value="1 ခုံ" name="seat_display" readonly>

                                    <input type="text" class="seat_qty" name="seat_qty" value="1" hidden>

                                    <button onfocus="on_focus(Type = `Icons`)" onfocusout="out_focus(Type = `Icons`)" type="button" class="btn_seat btn_seat_add btn fw-bold" data-id="Icons">
                                        +
                                    </button>

                                </div>

                                <div class="custom_input_box cus_location d-none mt-2
                                        w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3" data-id="Location">

                                    <i class="bi bi-geo-alt text-dark fs-6"></i>
                                    <select onfocus="on_focus(Type = `Location`)" onfocusout="out_focus(Type = `Location`)" class="form-select border-0 text-black-50" id="maubin_cus_location" aria-label="Default select example" name="location" data-id="Location" required>
                                        <option value="" selected>လာရောက်ခေါ်ရမည့်နေရာ</option>
                                        <option value="GATE">ဂိတ်ကိုပဲလာစီးမယ်</option>
                                        <option value="Pagoda Street">ဘုရားလမ်းထိပ်</option>
                                        <option value="GTI">ဂျီတီအိုင် ဂိတ်</option>
                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6 col-12">
                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body p-4 d-flex flex-column">

                                <h5 class="text-dark mb-4 fw-bold pb-3 border-bottom">ခရီးသည်
                                    အချက်လက်ဖြည့်ပါ</h5>

                                <div class="d-flex flex-column justify-content-between h-100 gap-2">

                                    <div class="w-100 d-flex flex-column gap-2">
                                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3
                                                 me-md-3 mb-2 mb-md-0" data-id="Name">

                                            <i class="bi bi-person text-dark fs-6"></i>
                                            <input onfocus="on_focus(Type = `Name`)" onfocusout="out_focus(Type = `Name`)" type="text" class="form-control border-0 text-black-50" data-id="Name" name="customer_name" placeholder="ခရီးသည်အမည်" data-id="Name" required>

                                        </div>

                                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3
                                                 me-md-3 mb-2 mb-md-0" data-id="Phone">

                                            <i class="bi bi-telephone text-dark fs-6"></i>
                                            <input onfocus="on_focus(Type = `Phone`)" onfocusout="out_focus(Type = `Phone`)" type="text" class="form-control border-0 text-black-50" name="customer_phone" data-id="Phone" placeholder="ဖုန်းနံပါတ်" data-id="Phone" required>
                                        </div>

                                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3
                                                 me-md-3 mb-2 mb-md-0" data-id="NRC">

                                            <i class="bi bi-card-text text-dark fs-6"></i>
                                            <input onfocus="on_focus(Type = `NRC`)" onfocusout="out_focus(Type = `NRC`)" type="text" class="form-control border-0 text-black-50" name="customer_nrc" placeholder="မှတ်ပုံတင်နံပါတ်" data-id="NRC" required>

                                        </div>
                                    </div>

                                    <button class="btn btn-primary w-100 custom-button" id="btn_confirm">
                                        ထိုင်ခုံရွေးရန်
                                    </button>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    let btn_add = document.querySelector(".btn_seat_add");
    let btn_minus = document.querySelector(".btn_seat_minus");
    let seat_input = document.querySelector(".input-number");
    let seat_qty = document.querySelector(".seat_qty");
    let current_seat_number = parseInt(seat_input.value);
    let input_texts = document.querySelectorAll(".form-control");
    let custom_inputs = document.querySelectorAll(".custom_input_box");

    let max_seat_number = 6;

    function on_focus(type) {
        input_texts.forEach(input_text => {
            on_focus_check(input_text, type);
        })
    }


    const on_focus_check = (input_text, type) => {
        custom_inputs.forEach(custom_input => {
            custom_input.childNodes[3].dataset.id == type ? custom_input.classList.add("input_focus") : "";
        })
    }

    const out_focus = (type) => {
        input_texts.forEach(input_text => {
            out_focus_check(input_text, type);
        })
    }

    const out_focus_check = (input_text, type) => {
        custom_inputs.forEach(custom_input => {
            console.log(custom_input.dataset.id, type);
            custom_input.dataset.id == type ? custom_input.classList.remove("input_focus") : "";
        })
    }


    btn_add.addEventListener("click", () => {

        if (current_seat_number < max_seat_number) {
            current_seat_number++;
        }
        seat_input.value = current_seat_number + " ခုံ";
        seat_qty.value = current_seat_number;
    })

    btn_minus.addEventListener("click", () => {

        if (current_seat_number > 1) {
            current_seat_number--;
            seat_input.value = current_seat_number + " ခုံ";
            seat_qty.value = current_seat_number;
        }

    })

    let route_from = document.getElementById('route_from');
    let route_to = document.getElementById('route_to');

    route_from.addEventListener("change", function() {

        changeVisibilityOfCusLocation();
        // Clear Selected route_from

        if (parseInt(route_from.value) != 0) {

            for (let i = 0; i < route_to.length; i++) {
                if (route_to.options[i].value == 0) {
                    route_to.options[i].removeAttribute('disabled', '');
                } else {
                    route_to.options[i].setAttribute('disabled', '');
                }
            }
        } else {
            for (let i = 0; i < route_to.length; i++) {
                route_to.value = "";
                route_to.options[i].removeAttribute('disabled', '');
                if (route_to.options[i].value === route_from.value) {
                    route_to.options[i].setAttribute('disabled', '');
                }
            }
        }

    })

    function changeVisibilityOfCusLocation() {
        if (parseInt(route_from.value) === 0) {
            document.querySelector(".cus_location").classList.remove("d-none");
            document.getElementById('maubin_cus_location').required = true;
        } else {
            document.querySelector(".cus_location").classList.add("d-none");
            document.getElementById('maubin_cus_location').required = false;
        }
    }
</script>

<?php require_once "ui_footer.php" ?>

<?php require_once "template/footer.php"; ?>