<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row my-4">

        <?php require_once "ui_left_side_nav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <a href="<?php getPath(); ?>/pricing.php" class="me-3 text-decoration-none icon_button">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h3 class="fs-4 header_title">Pricing Edit</h3>

            </div>

            <div class="row mb-4">

                <div class="col-12">

                    <div class="animate__animated animate__fadeIn animate__faster card border-0 shadow-sm">

                        <div class="card-body product_table m-1 m-md-3">

                            <p class="mb-0 pb-3 text-black-20 fs-5">Route Price</p>

                            <?php
                            $price_id = $_GET['id'];
                            $p = getPrice($price_id);

                            if (isset($_POST['front_price'])) {
                                if (update_price($price_id)) {
                                    linkTo("pricing.php");
                                }
                            }

                            ?>

                            <div class="row align-items-center justify-content-start py-3">

                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Route A</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Route B</p>
                                </div>
                                <div class="col-3 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Front Seat(MMK)</p>
                                </div>
                                <div class="col-3 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Back Seat(MMK)</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header"></p>
                                </div>

                            </div>

                            <form method="post">

                                <div class="row align-items-center justify-content-between py-3 border-top">

                                    <div class="col-2 d-flex align-items-center">
                                        <p class="mb-0 table_body w-100">
                                            <?php echo getRouteName($p['route_a']); ?>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <p class="mb-0 table_body w-100">
                                            <?php echo getRouteName($p['route_b']); ?>
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control table_body" placeholder="Amount" name="front_price" value="<?php echo $p['front_seat_price']; ?>">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control table_body" placeholder="Amount" name="back_price" value="<?php echo $p['back_seat_price']; ?>">
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <button class="btn btn-primary">
                                            Done
                                        </button>
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