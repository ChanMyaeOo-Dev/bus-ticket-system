<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-4">

                <div class="head_section mb-4 w-100 d-flex justify-content-between align-items-center">
                    <h3 class="fs-4 header_title">Refund</h3>
                </div>

                <?php

                $cancelInvoiceList = getRefundInvoiceList();
                $refundedList = getRefundedList();


                ?>

                <div class="col-12">

                    <div class="animated_card card border-1">

                        <div class="card-body product_table m-1 m-md-3">

                            <p class="mb-0 pb-3 text-black-20 fs-5">Need To Refund</p>

                            <div class="row align-items-center justify-content-start py-3">

                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Cancel At</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Payment Method</p>
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
                                <div class="col-2 d-flex justify-content-end align-items-center">
                                    <!-- <p class="mb-0 text-black-50 table_header">Edit</p> -->
                                </div>

                            </div>

                            <?php foreach ($cancelInvoiceList as $i) { ?>
                                <div class="row align-items-center justify-content-start py-3 border-top">

                                    <div class="col-2 d-flex align-items-center">
                                        <p class="mb-0 table_body w-100">
                                                <?php echo showTime($i['date'],"j/M/Y g:i A"); ?>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <p class="mb-0 table_body">
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
                                            <span class="text-black-50">
                                            <?php echo "(".getTime($i['route_number']).")"; ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <a href="<?php getPath(); ?>/refund_confirm.php?cus_id=<?php echo $i['customer_id']; ?>"
                                            class="btn btn-outline-primary" onclick="animate()">
                                            <i class="bi bi-upload me-1"></i>
                                            Refund
                                        </a>
                                    </div>

                                </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>

                <div class="col-12 mt-3">

                    <div class="animated_card card border-1">

                        <div class="card-body product_table m-1 m-md-3">

                            <p class="mb-0 pb-3 text-black-20 fs-5">Refund Completed</p>

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

                            <?php foreach ($refundedList as $i) { ?>
                                <a href="<?php getPath(); ?>/booking_cancel_detail.php?cus_id=<?php echo $i['customer_id']; ?>"
                                    class="text-decoration-none" onclick="animate()">
                                    <div class="row table_data align-items-center justify-content-start py-3 border-top">

                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo showTime($i['date'],"j/M/Y g:i A"); ?>
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
                                                <span class="text-black-50">
                                                <?php echo "(".getTime($i['route_number']).")"; ?>
                                                </span>
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