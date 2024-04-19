<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">

    <div class="position-sticky h-100 pt-3 sidebar-sticky d-flex flex-column">

        <a class="navbar-brand bg-white col-md-3 col-lg-2 me-0 px-3 mb-4 w-100" href="<?php getPath(); ?>/ui_home.php">
                <img src="<?php getPath(); ?>/assets/imgs/source/logo.svg" style="width: 120px!important;">
        </a>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "HOME" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/ui_home.php">
                    <i class="bi bi-house-door me-2 fs-6"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "CREATE_BOOK" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/make_booking.php">
                    <i class="bi bi-ticket me-2 fs-6"></i>
                    Make Booking
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "BOOKING_LIST" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/booking_list.php">
                    <i class="bi bi-list-nested me-2 fs-6"></i>
                    Booking List
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "STATUS" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/car_status.php">
                    <i class="bi bi-stoplights me-2 fs-6"></i>
                    Check Out
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "REFUND" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/refund.php">
                    <i class="bi bi-receipt-cutoff me-2 fs-6"></i>
                    Refund
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "CARS" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/car_management.php">
                    <i class="bi bi-bus-front me-2 fs-6"></i>
                    Cars
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "DRIVERS" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/drivers.php">
                    <i class="bi bi-person-vcard me-2 fs-6"></i>
                    Drivers
                </a>
            </li>

            <li class="nav-item mb-2 <?php echo $_SESSION['gate'] == 0 ? 'd-block' : 'd-none'; ?>">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "PRICE" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/pricing.php">
                    <i class="bi bi-coin me-2 fs-6"></i>
                    Pricing
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "HISTORY" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/customer_history.php">
                    <i class="bi bi-clock-history me-2 fs-6"></i>
                    History
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a class="nav-link text-black-30 text-decoration-none
                <?php echo getCurrentPage() == "CANCEL" ? 'nav_active' : ''; ?>" aria-current="page" href="<?php getPath(); ?>/booking_cancel.php">
                    <i class="bi bi-x-octagon me-2 fs-6"></i>
                    Booking Cancels
                </a>
            </li>
            
        </ul>

        <div class="user_account w-100">
            <p class="account ms-2 text-dark-10 fs-6 text-capitalize">
                <i class="bi bi-person-check fs-4 me-2 text-primary"></i>
                <?php echo getRouteName($_SESSION['gate']) ?>
            </p>
            <a href="<?php getPath(); ?>/LogOut.php" class="btn btn-outline-primary custom_button w-100 d-flex justify-content-center align-items-center" onclick="return confirm('Are you sure to log out?')">
                <i class="bi bi-box-arrow-right fs-5"></i>
                Log out
            </a>
        </div>

    </div>

</nav>