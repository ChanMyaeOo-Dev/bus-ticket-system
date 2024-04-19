<?php require_once "template/header.php"; ?>
<?php
echo "<pre>";
print_r($_POST);

$customer_id = "cus_" . uniqid();

$qr_code = "https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=$customer_id";

uploadCustomerInformation($customer_id);
//Insert New Invoice
if (uploadInvoice($customer_id,$qr_code)) {
    linkTo('make_booking.php');
}
?>