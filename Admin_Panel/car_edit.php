<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row my-4">

        <?php require_once "ui_left_side_nav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <a href="<?php getPath(); ?>/car_management.php" class="me-3 text-decoration-none icon_button">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <h3 class="fs-4 header_title">Car Information Edit</h3>

            </div>

            <div class="row mb-4">

                <div class="col-12">

                    <div class="animate__animated animate__fadeIn animate__faster card border-0 shadow-sm">

                        <div class="card-body product_table m-1 m-md-3">

                            <p class="mb-0 pb-4 text-black-20 fs-5">Information</p>

                            <?php

                            $c = [];
                            if(isset($_GET['id'])){
                                $c = getCar($_GET['id']);
                            }

                            if (isset($_POST['btn_update'])) {
                                if(update_car()){
                                    linkTo('car_management.php');
                                }
                            }

                            ?>

                            <form method="post">

                                <div class="row align-items-center justify-content-between">

                                <input type="text" value="<?php echo $_GET['id']; ?>" name="car_id" hidden>
                                    <div class="col-3">
                                        <div
                                            class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2">

                                            <i class="bi bi-bus-front text-dark fs-6"></i>
                                            <input type="text" class="form-control border-0 text-secondary"
                                            value="<?php echo $c['car_model']; ?>"
                                                name="car_model" placeholder="ကားမော်ဒယ်" required>

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div
                                            class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2">

                                            <i class="bi bi-bus-front text-dark fs-6"></i>
                                            <input type="text" class="form-control border-0 text-secondary"
                                            value="<?php echo $c['car_number']; ?>"
                                                name="car_number" placeholder="ကားနာပါတ်" required>

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3
                                            <?php echo $_SESSION['gate'] == 0 ? 'd-flex' : 'd-none'; ?>
                                            ">
                                            <i class="bi bi-geo-alt text-dark fs-6"></i>
                                            <select class="form-select border-0 text-dark" aria-label="Default select example"
                                                name="route_b" <?php echo $_SESSION['gate'] == 0 ? 'required' : ''; ?>>
                                                <option value="" selected>Route B</option>
                                                <?php foreach (getGatesExceptGate() as $g) { ?>
                                                    <option value="<?php echo $g['gate_id']; ?>"
                                                    <?php echo $g['gate_id']==$c['route_b']?'selected':'' ?>>
                                                    <?php echo $g['gate_name']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>
                                    
                                    <div class="col-3">
                                        <button class="btn btn-primary px-5 py-2" name="btn_update">Done</button>
                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>

<?php require_once "template/footer.php"; ?>