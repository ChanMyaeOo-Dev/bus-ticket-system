<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container">

    <div class="row">

        <?php require_once "ui_left_side_nav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-md-5 h-100">

            <?php

            $driver = getDriver($_GET['id']);

            if (isset($_POST['btn_update'])) {

                if (driver_update($driver['driver_id'])) {
                    linkTo("drivers.php");
                }
            }

            ?>

            <div class="row my-4">

                <div class="head_section mb-4 w-100 d-flex align-items-center">
                    <a href="<?php getPath(); ?>/drivers.php" class="me-3 text-decoration-none icon_button">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h3 class="fs-4 header_title">Driver Details</h3>
                </div>

                <div class="col-12">

                    <div class="w-100 card border-1 rounded p-2">

                        <div class="card-body">

                            <p class="mb-0 pb-5 text-black-20 fs-5">Driver Information</p>

                            <form method="post" enctype="multipart/form-data">

                                <div class="row g-5 align-items-start">

                                    <div class="col-3 custom_photo_div">
                                        <img src="<?php echo $driver['profile_picture']; ?>"
                                            class="w-100 shadow-sm mb-2 rounded output">
                                        <div class="custom_photo_add_icon">
                                            <label for="driver_img"
                                                class="photo_choose_icon btn btn-outline-primary driver_img rounded shadow-sm w-100 text-center">
                                                <i class="bi bi-camera fs-5"></i>
                                            </label>
                                            <input type="file" id="driver_img" name="driver_img" accept="image/*"
                                                onchange="loadFile(event)" hidden>
                                            <input type="text" name="driver_img"
                                                value="<?php echo $driver['profile_picture']; ?>" hidden>
                                        </div>
                                    </div>

                                    <div class="col-9 ps-2">

                                        <div class="w-100 d-flex">
                                            <div
                                                class="custom_input_box w-100 rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                <i class="bi bi-person text-dark fs-6"></i>
                                                <input type="text" class="form-control border-0 text-black-30"
                                                    name="name" placeholder="Name"
                                                    value="<?php echo $driver['name']; ?>" required>

                                            </div>
                                            <div
                                                class="custom_input_box w-100 rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                <i class="bi bi-telephone text-dark fs-6"></i>
                                                <input type="text" class="form-control border-0 text-black-30"
                                                    name="phone" placeholder="Phone Number"
                                                    value="<?php echo $driver['phone']; ?>" required>

                                            </div>
                                        </div>

                                        <div class="w-100 d-flex">
                                            <div
                                                class="custom_input_box w-100 rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                <i class="bi bi-person-vcard text-dark fs-6"></i>
                                                <input type="text" class="form-control border-0 text-black-30"
                                                    name="nrc" placeholder="Nrc" value="<?php echo $driver['nrc']; ?>"
                                                    required>

                                            </div>
                                            <div
                                                class="custom_input_box w-100 rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                <i class="bi bi-geo-alt text-dark fs-6"></i>
                                                <input type="text" class="form-control border-0 text-black-30"
                                                    name="address" placeholder="Address"
                                                    value="<?php echo $driver['address']; ?>" required>

                                            </div>
                                        </div>

                                        <div class="w-100 d-flex">
                                            <div
                                                class="custom_input_box w-100 rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                <i class="bi bi-calendar3 text-dark fs-6 me-2"></i>
                                                <p class="text-black-30 mb-0 text-nowrap">Birthday : </p>
                                                <input type="date" class="form-control border-0 text-black-30"
                                                    name="birthday" value="<?php echo $driver['birthday']; ?>" required>

                                                <input type="text" name="car_id"
                                                    value="<?php echo $driver['car_id']; ?>" hidden>

                                            </div>


                                            <div
                                                class="custom_input_box w-100 rounded py-1 d-flex align-items-center ps-3 me-2 mb-2">

                                                <i class="bi bi-bus-front text-dark fs-6"></i>
                                                <select class="form-select border-0 text-black-50"
                                                    aria-label="Default select example" name="car_id" required>
                                                    <option value="">Car Id</option>

                                                    <?php foreach (getAllCars() as $c) { ?>
                                                        <option value="<?php echo $c['car_id']; ?>"
                                                        <?php echo $c['car_id']== $driver['car_id']?'selected':''; ?>>
                                                        <?php echo $c['car_number']; ?></option>
                                                    <?php } ?>

                                                </select>

                                            </div>
                                            
                                        </div>

                                        <button type="submit" name="btn_update" class="btn btn-primary px-5 py-2 me-2 float-end">
                                            Update
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

<script>
    let loadFile = function (event) {
        let output = document.querySelector(".output");
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

<?php require_once "template/footer.php"; ?>