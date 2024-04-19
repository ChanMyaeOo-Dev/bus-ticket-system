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
                    <h3 class="fs-4 header_title">Booking List</h3>
                </div>

                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body p-4">

                            <p class="fs-5 text-dark pb-3 mb-3 border-bottom">
                                Fill Route Information
                            </p>

                            <?php
                            $available_routes = getTimeTable();
                            ?>

                            <form method="post" id="search_form">

                                <div class="d-flex align-self-center justify-content-between">

                                    <!-- If Gate Is Maubin -->
                                    
                                    <div class="<?php echo $_SESSION['gate']==0?'':'d-none'; ?> custom_input_box w-100 me-3 shadow_ssm rounded py-1 d-flex align-items-center ps-3">

                                        <i class="bi bi-bus-front text-dark fs-6"></i>
                                        <input onfocus="on_focus(Type = `Phone`)" onfocusout="out_focus(Type = `Phone`)"
                                            type="text" class="form-control border-0 text-black-50"
                                            readonly value="<?php echo getRouteName($_SESSION['gate']); ?>">
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

                                    <button class="btn btn-primary w-100" name="btn_search" id="btn_search">Search</button>

                                </div>
                                
                            </form>
                        </div>
                    </div>

                </div>

                <!-- Results -->
                <?php
                    $invoices = [];
                    $route_to = 0;
                    $gate = $_SESSION['gate'];

                    if (isset($_POST['btn_search'])) {

                        if($gate == 0){
                        $route_to = $_POST['to'];
                        }
                    $time = $_POST['time'];
                    $invoices = getInvoicesForInvoiceList($gate,$route_to,$time);

                    $total_seat = 0;

                    foreach($invoices as $i){
                        $total_seat += count(explode(",", $i['seat_numbers']));
                    }
                    }
                ?>

                <?php 
                if (count($invoices) > 0) {
                ?>

                <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body px-4 py-3 d-flex align-items-center justify-content-between">
                        <p class="text-secondary mb-0">
                            Total - <?php echo $total_seat." Seats."; ?>
                        </p>
                        <button class="btn btn-sm btn-outline-primary" onclick="refresh()">
                            <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                        </button>
                    </div>
                </div>
                </div>

                <?php
                foreach ($invoices as $i) { ?>

                    <div class="col-12 mb-3">

                        <a href="<?php getPath(); ?>/customer_detail.php?cus_id=<?php echo $i['customer_id']; ?>"
                            class="text-decoration-none">

                            <div class="card border-0 shadow-sm custom_search_ticket">

                                <div class="card-body ">
                                    
                                    <div class="d-flex align-items-center justify-content-between">

                                        <?php $num = rand(1, 7); ?>
                                        <img src="<?php getPath(); ?>/assets/imgs/source/user_<?php echo $num; ?>.svg"
                                            class="rounded ms-3" style="width: 48px!important;height: 48px!important;">

                                        <p class="mb-0 text-black-50 w-100 text-center">
                                            <?php echo getCustomer($i['customer_id'])['name']; ?>
                                        </p>
                                        <p class="mb-0 text-black-50 w-100 text-center">
                                            <?php echo getCustomer($i['customer_id'])['phone']; ?>
                                        </p>
                                        <p class="mb-0 text-black-50 w-100 text-center">
                                            <?php echo getCustomer($i['customer_id'])['nrc']; ?>
                                        </p>
                                        <p class="mb-0 text-black-50 w-100 text-center text-nowrap">
                                            <?php echo getRouteName($i['route_from']) . " ~ " . getRouteName($i['route_to']); ?>
                                        </p>

                                        <p class="mb-0 text-black-50 w-100 text-center">
                                            <?php echo "[ ".$i['seat_numbers']." ]"; ?>
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                <?php }
                } ?>


                <div class="<?php echo isset($_POST['btn_search']) ? count($invoices)<=0? 'd-block' : 'd-none' :'d-none'; ?> col-12">
                <div class="text-center opacity-50">
                <img src="<?php getPath(); ?>/assets/imgs/source/empty_booking.svg" style="width: 360px!important;">
                    
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
function refresh(){
    // document.getElementById("search_form").submit(); 
    document.getElementById('btn_search').click();
}
</script>
<?php require_once "template/footer.php"; ?>