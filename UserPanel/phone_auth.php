<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container booking_search">

    <?php

    $from = $_POST['from'];
    $to = $_POST['to'];
    $route_number = $_POST['time'];
    $seat_qty = $_POST['seat_qty'];
    $seat_numbers = $_POST['seat_numbers'];
    $payment_method = $_POST['payment_method'];
    $total_price = $_POST['total_price'];
    //from => car that arrive first Need To Fix Here
    $car_id = 1;
    $customer_id = $_POST['customer_id'];

    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_nrc = $_POST['customer_nrc'];
    $customer_location = $_POST['location'];

    $ph = substr($customer_phone, -9);
    $phone_number_with_code = '+959' . $ph;
    $qr_code = "https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=$customer_id";

    if ($_POST['payment_method'] == "online_payment") {

        uploadTempCustomerInformation($customer_id, $customer_name, $customer_phone, $customer_nrc, $customer_location);
        //Insert New Invoice
        if (uploadTempInvoice($route_number, $from, $to, $car_id, $customer_id, $seat_qty, $seat_numbers, $total_price, $payment_method, $qr_code)) {
            linkTo(getSomething($_POST['customer_name'], $_POST['total_price']));
            // linkTo('ticket_for_payment.php');
        }
    }

    ?>

    <div class="row justify-content-center">

        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body p-4">

                    <div class="text-center">

                        <img src="<?php getPath(); ?>/assets/imgs/posters/otp_img.svg" class="w-75">

                        <p class="fs-5 text-secondary mb-1">Verification</p>
                        <small class="text-black-50 text-center">ဖုန်းနာပါတ်
                            အားအတည်ပြုရန်
                            <?php echo $phone_number_with_code; ?>
                            သို့ပို့ထားသော<br>Code 6
                            လုံးအား ရိုက်ထည့်ပေးပါ
                        </small>
                        <div id="recaptcha-container"></div>

                        <input type="text" id="phone_number" value="<?php echo $phone_number_with_code; ?>" hidden>

                        <input type="number" maxlength="6" max="6" oninput="optInputWatch()" id="otp_input"
                            class="form-control text-center fs-4 mt-3" placeholder="______" name="otp"
                            style="letter-spacing: 1em!important;" autocomplete="false" readonly
                            onfocus="this.removeAttribute('readonly');">

                        <button class="btn btn-primary mt-3 w-100 d-none" id="btn_otp_validate">

                            <div class="spinner-border text-secondary d-none loading" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="text">Validate</span>

                        </button>

                        <form action="<?php getPath(); ?>/showTicket.php" id="form" method="post" class="mt-4">
                            <input type="text" hidden name="time" value="<?php echo $route_number; ?>">
                            <input type="text" hidden name="from" value="<?php echo $from; ?>">
                            <input type="text" hidden name="to" value="<?php echo $to; ?>">
                            <input type="text" hidden name="car_id" value="<?php echo $car_id; ?>">
                            <input type="text" hidden name="seat_qty" value="<?php echo $seat_qty; ?>">
                            <input type="text" hidden name="seat_numbers" value="<?php echo $seat_numbers; ?>">
                            <input type="text" hidden name="payment_method" value="<?php echo $payment_method; ?>">
                            <input type="text" hidden name="total_price" value="<?php echo $total_price; ?>">
                            <input type="text" hidden name="customer_id" value="<?php echo $customer_id ?>">
                            <input type="text" hidden name="customer_name" value="<?php echo $customer_name; ?>">
                            <input type="text" hidden name="customer_phone" value="<?php echo $customer_phone; ?>">
                            <input type="text" hidden name="customer_nrc" value="<?php echo $customer_nrc; ?>">
                            <input type="text" hidden name="location" value="<?php echo $customer_location; ?>">
                            <button class=" border-0 bg-white link-dark" type="submit">Skip Only In Development
                                State</a>
                        </form>


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="<?php getPath(); ?>/assets/js/app.js"></script>

<!-- Add the latest firebase dependecies from CDN -->
<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-auth.js"></script>

<script>
    // Paste the config your copied earlier
    var firebaseConfig = {
        apiKey: "AIzaSyAr5vSJVw7BK0gV2GuGq1awcqSdcold62k",
        authDomain: "phoneauthtesting-f57c3.firebaseapp.com",
        projectId: "phoneauthtesting-f57c3",
        storageBucket: "phoneauthtesting-f57c3.appspot.com",
        messagingSenderId: "820873444278",
        appId: "1:820873444278:web:4233979e106661d17cdf17",
        measurementId: "G-HKLGVCJ9FP"
    };

    firebase.initializeApp(firebaseConfig);
    setTimeout(function () {
        // Create a Recaptcha verifier instance globally
        // Calls submitPhoneNumberAuth() when the captcha is verified
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
            "recaptcha-container",
            {
                size: "normal",
                callback: function (response) {
                    document.getElementById('recaptcha-container').classList.add('d-none');
                    submitPhoneNumberAuth();
                }
            }
        );

        recaptchaVerifier.render().then(function (widgetId) {
            window.recaptchaWidgetId = widgetId;
        });

    }, 2000);

    // This function runs when the 'sign-in-button' is clicked
    // Takes the value from the 'phoneNumber' input and sends SMS to that phone number
    function submitPhoneNumberAuth() {
        var phoneNumber = document.getElementById("phone_number").value;
        // var phoneNumber = "+959795875124";
        var appVerifier = window.recaptchaVerifier;
        firebase
            .auth()
            .signInWithPhoneNumber(phoneNumber, appVerifier)
            .then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    // This function runs when the 'confirm-code' button is clicked
    // Takes the value from the 'code' input and submits the code to verify the phone number
    // Return a user object if the authentication was successful, and auth is complete
    function submitPhoneNumberAuthCode() {
        var code = document.getElementById("otp_input").value;
        confirmationResult
            .confirm(code)
            .then(function (result) {
                document.getElementById('form').submit();
            })
            .catch(function (error) {
                document.querySelector('.text').classList.remove('d-none');
                document.querySelector('.text').innerHTML = "Wrong!";

                document.querySelector('.loading').classList.add('d-none');
                console.log(error);
            });
    }
    document.getElementById('btn_otp_validate').addEventListener("click", function () {
        document.querySelector('.text').classList.add('d-none');
        document.querySelector('.loading').classList.remove('d-none');
        submitPhoneNumberAuthCode();
    })

    //This function runs everytime the auth state changes. Use to verify if the user is logged in
    firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
            // console.log("USER LOGGED IN");
        } else {
            // No user is signed in.
            // console.log("USER NOT LOGGED IN");
        }
    });
</script>
<script>
    function optInputWatch() {
        let input = document.getElementById('otp_input')
        if (input.value.length >= input.maxLength) {
            document.getElementById('btn_otp_validate').classList.remove('d-none');
            input.value = input.value.slice(0, input.maxLength);
        } else {
            document.getElementById('btn_otp_validate').classList.add('d-none');
        }

    }
</script>
<?php require_once "ui_footer.php" ?>

<?php require_once "template/footer.php"; ?>