<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4">

                <div class="head_section mb-4 w-100 d-flex justify-content-between align-items-center">
                    <h3 class="fs-4 header_title">Routes Information</h3>
                </div>

                <div class="col-12">

                    <div class="card border-1 ">

                        <div class="card-body product_table m-1 m-md-3">

                            <div class="d-flex align-content-center pb-3">

                                <p class="mb-0 text-black-20 fs-5 me-3">Routes List</p>

                            </div>

                            <div class="row align-items-center justify-content-start py-3">

                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Car Numbers</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">From</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">To</p>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Choose Route</p>
                                </div>

                            </div>
                            
                            <?php foreach (getCars() as $c) { ?>

                                <div class="row align-items-center justify-content-start py-3 border-top">

                                    <div class="col-2 d-flex align-items-center">
                                        <p class="mb-0 table_body w-100">
                                            <?php echo $c['car_number']; ?>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <p class="mb-0 table_body w-100">
                                            <?php echo getRouteName($_SESSION['gate']); ?>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <p class="mb-0 table_body w-100">
                                            <?php echo $_SESSION['gate'] != 0 ? 'Maubin' : getRouteName($c['route_b']); ?>
                                        </p>
                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <form action="<?php getPath(); ?>/car_status_check_out.php" method="post" class="w-100">

                                            <input type="text" value="<?php echo $c['car_id']; ?>" name="car_id" hidden>

                                            <div class="d-flex align-items-center w-100">

                                                <div class="select_route
                                                    w-100 shadow_sm rounded py-1 d-flex align-items-center ps-2 me-3">

                                                    <i class="bi bi-geo-alt text-primary"></i>

                                                    <select class="form-select border-0 table_body" aria-label="Default select example" id="route_select" name="r_no">

                                                        <?php foreach (getAvailableRoutes($c['car_id']) as $r) { ?>

                                                            <option value="<?php echo $r['route_number']; ?>">
                                                            <?php echo "Route Number ".$r['route_number']." | ခရီးသည် ".$r['seat_count']." ယောက်ရှိပါပြီ။"; ?></option>

                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                <button class="btn btn-outline-primary text-nowrap">
                                                    Check Out
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>

<?php require_once "template/footer.php"; ?>