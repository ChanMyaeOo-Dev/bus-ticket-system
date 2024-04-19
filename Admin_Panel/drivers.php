<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">


        <?php require_once "ui_left_side_nav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <?php

            if (isset($_POST["btn_add"])) {

                if (addDriver()) {
                    linkTo("drivers.php");
                }
            }

            ?>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" style="width: 720px !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">
                                <i class="bi bi-database-add text-primary me-2"></i>
                                Register New Driver
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="w-100 card border-0 shadow-sm rounded">

                                <div class="card-body">

                                    <form method="post" enctype="multipart/form-data">

                                        <div class="row g-4 mb-4 align-items-end">

                                            <div class="col-3">
                                                <img src="<?php getPath(); ?>/assets/imgs/source/default_plant.svg" class="w-100 shadow-sm mb-2 rounded output">
                                                <label for="driver_img" class="btn btn-outline-primary driver_img rounded shadow-sm w-100 text-center">
                                                    Add Image</label>
                                                <input type="file" id="driver_img" name="driver_img" accept="image/*" onchange="loadFile(event)" hidden>
                                            </div>

                                            <div class="col-9 ps-5">

                                                <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                    <i class="bi bi-person text-dark fs-6"></i>
                                                    <input type="text" class="form-control border-0 text-black-50" name="name" placeholder="Name" required>

                                                </div>
                                                <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                    <i class="bi bi-telephone text-dark fs-6"></i>
                                                    <input type="text" class="form-control border-0 text-black-50" name="phone" placeholder="Phone Number" required>

                                                </div>
                                                <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                    <i class="bi bi-person-vcard text-dark fs-6"></i>
                                                    <input type="text" class="form-control border-0 text-black-50" name="nrc" placeholder="Nrc" required>

                                                </div>
                                                <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2">

                                                    <i class="bi bi-geo-alt text-dark fs-6"></i>
                                                    <input type="text" class="form-control border-0 text-black-50" name="address" placeholder="Address" required>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                            <i class="bi bi-calendar3 text-dark fs-6 me-2"></i>
                                            <p class="text-black-50 mb-0 text-nowrap">Birthday : </p>
                                            <input type="date" class="form-control border-0 text-black-50" name="birthday" required>

                                        </div>
                                        <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-3">

                                            <i class="bi bi-bus-front text-dark fs-6"></i>
                                            <select class="form-select border-0 text-black-50" aria-label="Default select example" name="car_id" required>
                                                <option value="">Car Id</option>

                                                <?php foreach (getCarsForDriver() as $c) { ?>
                                                    <option value="<?php echo $c['car_id']; ?>"><?php echo $c['car_number']; ?></option>
                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="button_group d-flex justify-content-end w-100">
                                            <button type="reset" name="btn_add" class="btn btn-outline-danger me-2">
                                                Discard
                                            </button>
                                            <button type="submit" name="btn_add" class="btn btn-primary">
                                                Add
                                            </button>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row my-4">

                <div class="head_section mb-4 w-100 d-flex justify-content-between align-items-center">
                    <h3 class="fs-4 header_title">Driver</h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-database-add"></i>
                        Create
                    </button>
                </div>

                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body product_table m-1 m-md-3">

                            <div class="d-flex align-content-center justify-content-between pb-3">

                                <p class="mb-0 text-black-20 fs-5">Driver List</p>

                            </div>


                            <div class="row align-items-center justify-content-start py-3">

                                <div class="col-1 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">#</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Name</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Phone</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Age</p>
                                </div>
                                <div class="col-3 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Nrc</p>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <p class="mb-0 text-black-50 table_header">Car No</p>
                                </div>

                            </div>

                            <?php foreach (getDrivers() as $d) { ?>
                                <a class="text-decoration-none" href="<?php getPath(); ?>/drivers_Edit.php?id=<?php echo $d['driver_id']; ?>">
                                    <div class="row table_data align-items-center justify-content-start py-3 border-top">

                                        <div class="col-1 d-flex align-items-center">
                                            <img src="<?php echo $d['profile_picture']; ?>" class="driver_image rounded-circle">
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo $d['name']; ?>
                                            </p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo $d['phone']; ?>
                                            </p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo getAge($d['birthday']); ?>
                                            </p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo $d['nrc']; ?>
                                            </p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <p class="mb-0 table_body w-100">
                                                <?php echo getCar($d['car_id'])['car_number']; ?>
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
    let loadFile = function(event) {
        let output = document.querySelector(".output");
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

<?php require_once "template/footer.php"; ?>