<div class="container-fluid bg-primary">

    <div class="container contact_information  py-1 px-5 d-flex align-items-center justify-content-center justify-content-md-between">
        <p class="small mb-0 text-black d-none d-md-block">
            <i class="bi bi-telephone me-1"></i>
            09779866151
        </p>
        <p class="small mb-0 text-black d-none d-md-block">
            Enjoy your trip without require to login.
        </p>
        <p class="small mb-0 text-black">
            <i class="bi bi-geo-alt me-1"></i>
            Maubin | Main Office
        </p>
    </div>

</div>

<div class="head_bar container-fluid position-sticky top-0 bg-white w-100 shadow-sm">

    <div id="navbar" class="container d-none d-md-block">

        <header class="d-flex flex-column flex-md-row align-items-center justify-content-between pt-3 pb-2 pb-md-3 px-5">

            <a href="<?php getPath(); ?>/home.php"
               class="d-flex align-items-center text-secondary text-decoration-none mb-3 mb-md-0 ps-3">
                <img src="<?php getPath(); ?>/assets/imgs/posters/logo.svg" style="width: 120px!important;">
            </a>

            <ul class="nav">
                <li class="nav-item">
                    <a href="<?php getPath(); ?>/home.php" class="nav-link text-dark fs-6
                <?php echo getCurrentPage() == "HOME" ? 'nav-active' : ''; ?>
                ">
                        <i class="bi bi-house me-1 icon"></i>
                        ပင်မစာမျက်နှာ
                    </a>
                </li>
                <li class="nav-item mx-3 mx-md-0">
                    <a href="<?php getPath(); ?>/booking_search.php" class="nav-link text-dark fs-6
                <?php echo getCurrentPage() == "SEARCH" ? 'nav-active' : ''; ?>
                ">
                        <i class="bi bi-search me-1"></i>
                        ဘိုကင်ရှာရန်
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php getPath(); ?>/faqs.php" class="nav-link text-dark fs-6 position-relative
                <?php echo getCurrentPage() == "FAQS" ? 'nav-active' : ''; ?>
                ">
                        <i class="bi bi-question-circle me-1"></i>
                        မေးလေ့ရှိသောမေးခွန်းများ
                    </a>
                </li>
            </ul>

        </header>

    </div>

    <div id="navbar" class="container p-2 d-block d-md-none">

        <header class="d-flex align-items-center justify-content-between py-2">

            <!-- <a class="btn_mobile_menu_btn btn btn-outline-primary border-0" data-bs-toggle="collapse" href="#mobile_menu_layout" role="button" aria-expanded="false" aria-controls="mobile_menu_layout">
                <i class="bi bi-list fs-5 text-secondary"></i>
            </a> -->

            <a href="<?php getPath(); ?>/home.php"
               class="btn btn-outline-secondary border-0"
               data-bs-toggle=" tooltip" data-bs-placement="top"
               data-bs-custom-class="custom-tooltip"
               data-bs-title="See All."
            >
                <i class="bi bi-arrow-left-circle fs-5 <?php echo noNeedAppBar() == "NEED" ? 'd-none' : ''; ?>"></i>
            </a>

            <a href="<?php getPath(); ?>/home.php"
               class="d-flex align-items-center text-secondary text-decoration-none">
                <img src="<?php getPath(); ?>/assets/imgs/posters/logo.svg" style="width: 120px!important;">
            </a>

            <a href="<?php getPath(); ?>"
               class="btn btn-sm btn-outline-primary border-0"
               data-bs-toggle="tooltip" data-bs-placement="top"
               data-bs-custom-class="custom-tooltip"
               data-bs-title="See All."
               disabled
            >
            </a>
            <!-- <a href="<?php getPath(); ?>/booking_search.php" class="btn_mobile_menu_btn btn btn-outline-secondary border-0">
                <i class="bi bi-phone me-1"></i>
            </a> -->

        </header>

    </div>


</div>

<div class="app_bar_disable_container
<?php echo noNeedAppBar() == "NO_NEED" ? 'd-none' : ''; ?>
">
    <div class="app_bar">
        <ul class="nav">
            <li class="nav-item">
                <a href="<?php getPath(); ?>/home.php" class="nav-link text-dark small
                <?php echo getCurrentPage() == "HOME" ? 'nav-active animate__animated animate__bounceIn animate__faster' : ''; ?>"
                   aria-current="page">
                    <i class="bi bi-house me-1 icon"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php getPath(); ?>/booking_search.php" class="nav-link text-dark small
                <?php echo getCurrentPage() == "SEARCH" ? 'nav-active animate__animated animate__bounceIn animate__faster' : ''; ?>
                ">
                    <i class="bi bi-search me-1"></i>
                    <span>Search</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php getPath(); ?>/faqs.php" class="nav-link text-dark small
                <?php echo getCurrentPage() == "FAQS" ? 'nav-active animate__animated animate__bounceIn animate__faster' : ''; ?>
                ">
                    <i class="bi bi-question-circle me-1"></i>
                    <span>FAQS</span>
                </a>
            </li>
        </ul>
    </div>
</div>