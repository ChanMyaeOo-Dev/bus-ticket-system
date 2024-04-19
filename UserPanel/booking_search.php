<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container booking_search">

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 mb-3">

            <?php
            $invoices = [];

            if (isset($_POST['from'])) {
                $invoices = getInvoices($_POST['from'], $_POST['to'], $_POST['customer_phone']);
            }
            ?>

            <form action="#" class="card bg-white border-0" method="post">
                <h5 class="text-dark m-4 mb-3 fw-bold pb-3 border-bottom">ဘိုကင်ရှာရန်</h5>

                <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">

                    <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-2 mb-md-0"
                        data-id="From">

                        <i class="bi bi-bus-front text-dark fs-6"></i>
                        <select onfocus="on_focus(Type = `From`)" onfocusout="out_focus(Type = `From`)"
                            class="form-select border-0 text-black-50" aria-label="Default select example" name="from"
                            data-id="From" required>
                            <option value="">ထွက်ခွာ</option>
                            <option value="0">Maubin (မအူပင်)</option>
                            <option value="1">BOC (ဘီအိုစီ)</option>
                            <option value="2">Dala (ဒလ)</option>
                            <option value="3">Pyapon (ဖျာပုံ)</option>
                            <option value="4">Hinthada (ဟင်္သာတ)</option>
                            <option value="5">Pathein (ပုသိမ်)</option>
                        </select>

                    </div>

                    <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-2 mb-md-0"
                        data-id="To">

                        <i class="bi bi-geo-alt text-dark fs-6"></i>
                        <select onfocus="on_focus(Type = `To`)" onfocusout="out_focus(Type = `To`)"
                            class="form-select border-0 text-black-50" aria-label="Default select example" name="to"
                            data-id="To" required>
                            <option value="">ဆိုက်ရောက်</option>
                            <option value="0">Maubin (မအူပင်)</option>
                            <option value="1">BOC (ဘီအိုစီ)</option>
                            <option value="2">Dala (ဒလ)</option>
                            <option value="3">Pyapon (ဖျာပုံ)</option>
                            <option value="4">Hinthada (ဟင်္သာတ)</option>
                            <option value="5">Pathein (ပုသိမ်)</option>
                        </select>

                    </div>

                    <div class="custom_input_box w-100 shadow_ssm rounded py-1 d-flex align-items-center ps-3 me-2 mb-3 mb-md-0"
                        data-id="Phone">

                        <i class="bi bi-telephone text-dark fs-6"></i>
                        <input onfocus="on_focus(Type = `Phone`)" onfocusout="out_focus(Type = `Phone`)" type="text"
                            class="form-control border-0 text-black-50" name="customer_phone" placeholder="ဖုန်းနံပါတ်"
                            data-id="Phone" required>

                    </div>

                    <button class="btn custom-button btn-primary py-2 w-100">
                        <i class="bi bi-search me-1"></i>
                        ရှာရန်
                    </button>

                </div>

            </form>

        </div>

    </div>

    <div class="row justify-content-center">

        <?php if (count($invoices) > 0) {

            foreach ($invoices as $i) { ?>

                <div class="col-12 col-md-10 mb-3">

                    <a href="<?php getPath(); ?>/search_phone_auth.php?invoice_id=<?php echo $i['invoice_id']; ?>&cus_id=<?php echo $i['customer_id']; ?>"
                        class="text-decoration-none">

                        <div class="card border-0 shadow-sm custom_search_ticket">

                            <div class="card-body ">

                                <!--Medium Devices-->
                                <div class="d-flex align-items-center justify-content-between d-none d-md-flex">

                                    <?php $num = rand(1, 7); ?>
                                    <img src="<?php getPath(); ?>/assets/imgs/posters/user_<?php echo $num; ?>.svg"
                                        class="rounded ms-3" style="width: 60px!important;height: 60px!important;">

                                    <p class="mb-0 text-black-50 w-100 text-center">
                                        <?php echo getCustomersById($i['customer_id'])['name']; ?>
                                    </p>
                                    <p class="mb-0 text-black-50 w-100 text-center">
                                        <?php echo getCustomersById($i['customer_id'])['phone']; ?>
                                    </p>
                                    <p class="mb-0 text-black-50 w-100 text-center">
                                        <?php echo getCustomersById($i['customer_id'])['nrc']; ?>
                                    </p>
                                    <p class="mb-0 text-black-50 w-100 text-center text-nowrap">
                                        <?php echo getRouteName($i['route_from']) . " ~ " . getRouteName($i['route_to']); ?>
                                    </p>

                                    <p class="mb-0 text-black-50 w-100 text-center">
                                        <?php echo getTime($i['route_number']); ?>
                                    </p>

                                </div>

                                <!--Mobile Devices-->
                                <div class="d-flex align-items-start d-md-none">

                                    <img src="<?php getPath(); ?>/assets/imgs/posters/user_<?php echo $num; ?>.svg"
                                        class="rounded me-3 ms-md-3 me-md-0"
                                        style="width: 60px!important;height: 60px!important;">

                                    <div class="">
                                        <p class="mb-0 text-black-50 w-100">
                                            <?php echo getCustomersById($i['customer_id'])['name']; ?>
                                        </p>
                                        <p class="mb-0 text-black-50 w-100">
                                            <?php echo getCustomersById($i['customer_id'])['phone']; ?>
                                        </p>
                                        <p class="mb-0 text-black-50 w-100">
                                            <?php echo getCustomersById($i['customer_id'])['nrc']; ?>
                                        </p>
                                        <p class="mb-0 text-black-50 w-100">
                                            <?php echo getRouteName($i['route_from']) . " ~ " . getRouteName($i['route_to']); ?>
                                        </p>

                                        <p class="mb-0 text-black-50 w-100">
                                            <?php echo getTime($i['route_number']); ?>
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

            <?php }
        } ?>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>
<script>
    let input_texts = document.querySelectorAll(".form-control");
    let custom_inputs = document.querySelectorAll(".custom_input_box");

    function on_focus(type) {
        input_texts.forEach(input_text => {
            on_focus_check(input_text, type);
        })
    }


    const on_focus_check = (input_text, type) => {
        custom_inputs.forEach(custom_input => {
            custom_input.childNodes[3].dataset.id == type ? custom_input.classList.add("input_focus") : "";
        })
    }

    const out_focus = (type) => {
        input_texts.forEach(input_text => {
            out_focus_check(input_text, type);
        })
    }

    const out_focus_check = (input_text, type) => {
        custom_inputs.forEach(custom_input => {
            console.log(custom_input.dataset.id, type);
            custom_input.dataset.id === type ? custom_input.classList.remove("input_focus") : "";
        })
    }
</script>


<?php require_once "ui_footer.php" ?>

<?php require_once "template/footer.php"; ?>