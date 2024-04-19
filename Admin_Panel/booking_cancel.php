<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4">

                <div class="head_section mb-4 w-100 d-flex justify-content-between align-items-center">
                    <h3 class="fs-4 header_title">Booking Cancels</h3>
                </div>

                <?php

                $cancelInvoiceList = [];

                if (isset($_POST['btn_search'])) {
                    $cancelInvoiceList = getCancelInvoiceListByDate($_POST['start_date'], $_POST['end_date']);
                }else{
                    $cancelInvoiceList = getCancelInvoiceList();
                }

                ?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">
                                    <i class="bi bi-filter text-primary me-2"></i>
                                    Filter By Date
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="card bg-white border-0">
                                    <div class="card-body">

                                        <form action="<?php getPath(); ?>/booking_cancel.php" method="post">

                                            <div class="mb-3">
                                                <label for="start_date" class="form-label">
                                                    Start Date
                                                </label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="start_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="end_date" class="form-label">
                                                    End Date
                                                </label>
                                                <input type="date" class="form-control" id="end_date" name="end_date"
                                                    required>
                                            </div>
                                            <button class="btn btn-primary py-2 px-4 float-end" name="btn_search">
                                                Search
                                            </button>

                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-12">

                    <div class="animated_card card border-1">

                        <div class="card-body product_table m-1 m-md-3">

                            <div class="w-100 d-flex align-items-center justify-content-between pb-3">
                                <p class="mb-0 text-black fs-5">Cancel List</p>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="bi bi-filter me-1"></i>
                                    Filter By Date
                                </button>
                            </div>

                            <div class="row align-items-center justify-content-start py-3">

                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Cancel At</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">CUSTOMER NAME</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">FROM</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">TO</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Route Number</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Payment Method</p>
                                </div>

                            </div>

                            <?php foreach ($cancelInvoiceList as $i) { ?>
                                <a href="<?php getPath(); ?>/booking_cancel_detail.php?cus_id=<?php echo $i['customer_id']; ?>"
                                    class="text-decoration-none" onclick="animate()">
                                    <div class="row table_data align-items-center justify-content-start py-3 border-top">

                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo $i['date']; ?>
                                            </p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo getCustomer($i['customer_id'])['name']; ?>
                                            </p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo getRouteName($i['route_from']); ?>
                                            </p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body">
                                                <?php echo getRouteName($i['route_to']); ?>
                                            </p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body">
                                                <?php echo $i['route_number']; ?>
                                            </p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center justify-content-between">
                                            <p class="mb-0 table_body">
                                                <?php echo $i['payment']; ?>
                                            </p>
                                            <i class="bi bi-chevron-right text-black-50"></i>
                                        </div>

                                    </div>
                                </a>

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