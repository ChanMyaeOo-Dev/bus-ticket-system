<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <?php

        $total_customers = getTotalCustomers();
        $total_bookings = count(getInvoiceHistory());
        $total_income = getTotalIncome();

        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">
                            <i class="bi bi-filter text-primary me-2"></i>
                            Filter By Date
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card bg-white border-0">
                            <div class="card-body">

                                <form action="<?php getPath(); ?>/customer_history.php" method="post">

                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">
                                            Start Date
                                        </label>
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">
                                            End Date
                                        </label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" required>
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

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <div class="row my-3">
                <div class="head_section mb-4 w-100 d-flex justify-content-between align-items-center">
                    <h3 class="fs-4 header_title">Dashboard</h3>
                </div>
                <!--                    Number Cards-->
                <div class="col-12">

                    <div class="mb-3 number_box d-flex align-items-center justify-content-between d-none d-md-flex">

                        <div class="number_card bg-white rounded w-100 p-4 d-flex align-items-center">

                            <img style="background-color: #6331CE24; border: 2px solid white !important; outline: 1px solid #6331CE  !important;"
                                src="<?php getPath(); ?>/assets/imgs/source/customers.svg" alt=""
                                class="iconLink me-3 border border-3 rounded-circle">

                            <div class="dashboard_card">
                                <h3 class="text-primary mb-0">
                                    <?php echo $total_customers; ?>
                                </h3>
                                <p class="text-black-50 mb-0 text-uppercase">Total Customer</p>
                            </div>
                        </div>
                        <div class="number_card bg-white rounded w-100 p-4 d-flex align-items-center mx-4">

                            <img style="background-color: #3182CE24; border: 2px solid white !important; outline: 1px solid #3182CE !important;"
                                src="<?php getPath(); ?>/assets/imgs/source/Ticket.svg" alt=""
                                class="iconLink me-3 border border-3 rounded-circle">

                            <div class="dashboard_card">
                                <h3 class="text-primary mb-0">
                                    <?php echo $total_bookings; ?>
                                </h3>
                                <p class="text-black-50 mb-0 text-uppercase">Total Bookings</p>
                            </div>
                        </div>
                        <div class="number_card bg-white rounded w-100 p-4 d-flex align-items-center">

                            <img style="background-color: #38A16924; border: 2px solid white !important; outline: 1px solid #38A169 !important;"
                                src="<?php getPath(); ?>/assets/imgs/source/dollar-sign.svg" alt=""
                                class="iconLink me-3 border border-3 rounded-circle">

                            <div class="dashboard_card">
                                <h3 class="text-primary mb-0">
                                    <?php echo $total_income; ?>
                                </h3>
                                <p class="text-black-50 mb-0 text-uppercase">Total Income</p>
                            </div>
                        </div>

                    </div>


                </div>

                <!--                    chart-->
                <div class="col-12">
                    <div class="row g-3 mb-3">
                        <div class="col-5">

                            <div class="card p-3 h-100">

                                <div class="card-body">

                                    <div class="d-flex align-items-center justify-content-between pb-3 mb-3">

                                        <p class="mb-0 text-black-20 fs-5">
                                            Booking Count According To Time
                                        </p>

                                    </div>

                                    <canvas id="route_chart" class="w-100 mb-4" height="350"></canvas>

                                    <input type="text" id="booking_r1" value="<?php echo getPopularRoutes()[0]; ?>"
                                        hidden>
                                    <input type="text" id="booking_r2" value="<?php echo getPopularRoutes()[1]; ?>"
                                        hidden>
                                    <input type="text" id="booking_r3" value="<?php echo getPopularRoutes()[2]; ?>"
                                        hidden>
                                    <input type="text" id="booking_r4" value="<?php echo getPopularRoutes()[3]; ?>"
                                        hidden>
                                    <input type="text" id="booking_r5" value="<?php echo getPopularRoutes()[4]; ?>"
                                        hidden>
                                    <input type="text" id="booking_r6" value="<?php echo getPopularRoutes()[5]; ?>"
                                        hidden>

                                </div>

                            </div>

                        </div>
                        <div class="col-7">

                            <div class="card p-3 h-100">

                                <div class="card-body">

                                    <div class="d-flex align-content-center justify-content-between pb-2">
                                        <p class="mb-0 text-black-20 fs-5">Booking History</p>
                                        <a href="<?php getPath(); ?>/customer_history.php"
                                            class="see_all fs-6 text-dark">
                                            See All
                                            <i class="bi-chevron-right"></i>
                                        </a>
                                    </div>

                                    <div class="row align-items-center justify-content-start py-3">

                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">Date</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">From</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">To</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 text-nowrap table_header">Customer Name</p>
                                        </div>

                                    </div>

                                    <?php foreach (getInvoiceHistory(5) as $d) { ?>
                                        <a class="text-decoration-none"
                                            href="<?php getPath(); ?>/history_detail.php?cus_id=<?php echo $d['customer_id']; ?>">
                                            <div
                                                class="table_data row align-items-center justify-content-start py-3 border-top">

                                                <div class="col-3 d-flex align-items-center">
                                                    <p class="mb-0 table_body w-100">
                                                        <?php echo showTime($d['date']); ?>
                                                    </p>
                                                </div>
                                                <div class="col-3 d-flex align-items-center">
                                                    <p class="mb-0 table_body w-100">
                                                        <?php echo getRouteName($d['route_from']); ?>
                                                    </p>
                                                </div>
                                                <div class="col-3 d-flex align-items-center">
                                                    <p class="mb-0 table_body w-100">
                                                        <?php echo getRouteName($d['route_to']); ?>
                                                    </p>
                                                </div>
                                                <div class="col-3 d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 table_body w-100">
                                                        <?php echo getCustomer($d['customer_id'])['name']; ?>
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
                </div>

                <!--                    Drivers-->
                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="card p-3 h-100">

                                <div class="card-body">

                                    <div class="d-flex align-items-center justify-content-between pb-3">

                                        <p class="mb-0 text-black-20 fs-5">
                                            Bus List
                                        </p>
                                        <a href="<?php getPath(); ?>/car_management.php" class="see_all fs-6 text-dark">
                                            See All
                                            <i class="bi-chevron-right"></i>
                                        </a>

                                    </div>
                                    <div class="row align-items-center justify-content-start py-3">

                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">Car Numbers</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">From</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">To</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 text-black-50 table_header">Driver</p>
                                        </div>

                                    </div>

                                    <?php foreach (getAllCars() as $c) { ?>

                                        <div
                                            class="table_data row align-items-center justify-content-start py-3 border-top">

                                            <div class="col-3 d-flex align-items-center">
                                                <p class="mb-0 table_body w-100">
                                                    <?php echo $c['car_number']; ?>
                                                </p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center">
                                                <p class="mb-0 table_body w-100">
                                                    <?php echo getRouteName($_SESSION['gate']); ?>
                                                </p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center">
                                                <p class="mb-0 table_body w-100">
                                                    <?php echo $_SESSION['gate'] != 0 ? 'Maubin' : getRouteName($c['route_b']); ?>
                                                </p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center">
                                                <p class="mb-0 table_body w-100">
                                                    <?php
                                                    if ($c['has_driver'] != 0) {
                                                        echo getDriverByCarId($c['car_id'])['name'];
                                                    } else {
                                                        echo '<span class="text-black-50">ဒရိုင်ဘာမရှိသေးပါ<span>';
                                                    }
                                                    ?>
                                                </p>
                                            </div>

                                        </div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </div>

        </main>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>

<script src="<?php getPath(); ?>/assets/js/Chart.min.js"></script>

<script>
    let booking_r1 = document.getElementById('booking_r1').value;
    let booking_r2 = document.getElementById('booking_r2').value;
    let booking_r3 = document.getElementById('booking_r3').value;
    let booking_r4 = document.getElementById('booking_r4').value;
    let booking_r5 = document.getElementById('booking_r5').value;
    let booking_r6 = document.getElementById('booking_r6').value;


    const plants_chart = document.getElementById('route_chart').getContext('2d');

    // Products in store shown by size
    const plantsChart = new Chart(plants_chart, {
        type: 'bar',
        data: {
            labels: ["6:00 AM", "8:00 AM", "10:00 AM", "12:00 PM", "2:00 PM", "4:00 PM"],
            datasets: [{
                label: "",
                barThickness: 25,
                maxBarThickness: 30,
                borderRadius: 2,
                data: [booking_r1, booking_r2, booking_r3, booking_r4, booking_r5, booking_r6],
                backgroundColor: [
                    '#024059cc',
                    '#024059cc',
                    '#024059cc',
                    '#024059cc',
                    '#024059cc',
                    '#024059cc'
                ],
                borderColor: [
                    '#024059ee',
                    '#024059ee',
                    '#024059ee',
                    '#024059ee',
                    '#024059ee',
                    '#024059ee'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            },
            layout: {
                padding: 0
            }
        }
    });
</script>

<?php require_once "template/footer.php"; ?>