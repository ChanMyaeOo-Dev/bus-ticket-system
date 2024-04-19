<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4">

                <div class="head_section mb-4 w-100 d-flex justify-content-between align-items-center">
                    <h3 class="fs-4 header_title">Pricing</h3>
                </div>

                <div class="col-12">

                    <div class="animated_card card border-1">

                        <div class="card-body product_table m-1 m-md-3">

                            <p class="mb-0 pb-3 text-black-20 fs-5">Price List</p>

                            <div class="row align-items-center justify-content-start py-3">

                                <div class="col-3 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Route A</p>
                                </div>
                                <div class="col-3 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Route B</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Front Seat</p>
                                </div>
                                <div class="col-2 d-flex justify-content-end align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Back Seat</p>
                                </div>
                                <div class="col-2 d-flex justify-content-end align-items-center">
                                    <!-- <p class="mb-0 text-black-50 table_header">Edit</p> -->
                                </div>

                            </div>

                            <?php foreach (getPriceList() as $p) { ?>

                                <div class="row align-items-center justify-content-start py-3 border-top">

                                    <div class="col-3 d-flex align-items-center">
                                        <p class="mb-0 table_body w-100">
                                            <?php echo getRouteName($p['route_a']); ?>
                                        </p>
                                    </div>
                                    <div class="col-3 d-flex align-items-center">
                                        <p class="mb-0 table_body w-100">
                                            <?php echo getRouteName($p['route_b']); ?>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <p class="mb-0 table_body">
                                            <?php echo $p['front_seat_price'] . " Ks"; ?>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end align-items-center">
                                        <p class="mb-0 table_body">
                                            <?php echo $p['back_seat_price'] . " Ks"; ?>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end align-items-center">
                                        <a href="<?php getPath(); ?>/pricing_edit.php?id=<?php echo $p['price_id']; ?>" class="btn btn-outline-primary" onclick="animate()">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
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

<script>
    function animate() {
        document.getElementById('animated_card').classList.add('animate__animated animate__fadeOut animate__faster');
    }
</script>

<?php require_once "template/footer.php"; ?>