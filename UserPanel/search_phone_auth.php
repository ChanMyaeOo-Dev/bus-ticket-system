<?php require_once "template/header.php"; ?>
<?php require_once "ui_head_bar.php"; ?>

<div class="container-fluid main_container booking_search">

    <?php
    $customer_phone = getCustomersById($_GET['cus_id'])['phone'];

    $ph = substr($customer_phone, -9);
    $phone_number_with_code = '+959' . $ph;

    $invoice_id = $_GET['invoice_id'];
    $payment_method = getInvoiceByCusId($_GET['cus_id'])['payment'];
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

                        <button class="btn btn-primary mt-3 w-100" id="btn_otp_validate">

                            <div class="spinner-border text-secondary d-none loading" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="text">Validate</span>

                        </button>

                        <form action="<?php getPath(); ?>/ticketDetail.php" id="form" method="post" class="mt-4">
                            <input type="text" hidden name="invoice_id" value="<?php echo $invoice_id; ?>">
                            <input type="text" hidden name="payment_method" value="<?php echo $payment_method; ?>">

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