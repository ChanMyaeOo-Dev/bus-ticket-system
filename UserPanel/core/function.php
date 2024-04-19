<?php
require_once "common_functions.php";
require_once "payment.php";

//==========Booking Functions Start==========

//Insert Functions

function uploadCustomerInformation($cus_id, $name, $phone, $nrc, $location)
{
    $sql = "INSERT INTO customers(customer_id,name,phone,nrc,location) VALUES ('$cus_id','$name','$phone','$nrc','$location')";
    return runQuery($sql);
}

function uploadInvoice($r_number, $r_from, $r_to, $car_id, $cus_id, $person_qty, $seats, $total_price, $payment_method, $qrcode)
{
    $sql = "INSERT INTO invoices(route_number,route_from,route_to,car_id,customer_id,person_qty,seat_numbers,price_total,payment,qr_code)
            VALUES ('$r_number','$r_from','$r_to','$car_id','$cus_id','$person_qty','$seats','$total_price','$payment_method','$qrcode')";
    return runQuery($sql);
}

//Upload Temp Data
function uploadTempCustomerInformation($cus_id, $name, $phone, $nrc, $location)
{
    $sql = "INSERT INTO temp_customers(customer_id,name,phone,nrc,location) VALUES ('$cus_id','$name','$phone','$nrc','$location')";
    return runQuery($sql);
}

function uploadTempInvoice($r_number, $r_from, $r_to, $car_id, $cus_id, $person_qty, $seats, $total_price, $payment_method, $qrcode)
{
    $sql = "INSERT INTO temp_invoices(route_number,route_from,route_to,car_id,customer_id,person_qty,seat_numbers,price_total,payment,qr_code)
            VALUES ('$r_number','$r_from','$r_to','$car_id','$cus_id','$person_qty','$seats','$total_price','$payment_method','$qrcode')";
    return runQuery($sql);
}

//End Temp

// Detele Temp Datas
function deleteTempInvoice($cus_id)
{
    $invoiceSql = "DELETE FROM `temp_invoices` WHERE customer_id='$cus_id'";
    if (runQuery($invoiceSql)) {
        $customerSql = "DELETE FROM `temp_customers` WHERE customer_id='$cus_id'";
        runQuery($customerSql);
    }
}

// Detele Temp Datas
//Get Functions

function getGateDatabaseNameFrom($from)
{
    switch ($from) {
        case "0":
            return "maubin_gate";
        case "1":
            return "boc_gate";
        case "2":
            return "dala_gate";
        case "3":
            return "pyapon_gate";
        case "4":
            return "hinthada_gate";
        case "5":
            return "pathein_gate";
    }
}

function getRouteName($num)
{

    switch ($num) {
        case "0":
            return "Maubin";
        case "1":
            return "BOC";
        case "2":
            return "Dala";
        case "3":
            return "Pyapon";
        case "4":
            return "Hinthada";
        case "5":
            return "Pathein";

    }
}

function getRouteEngName($num)
{

    switch ($num) {
        case "0":
            return "Maubin";
        case "1":
            return "BOC";
        case "2":
            return "Dala";
        case "3":
            return "Pyapon";
        case "4":
            return "Hinthada";
        case "5":
            return "Pathein";

    }
}

function getTime($route_number)
{
    switch ($route_number) {
        case "R1":
            return "6:00 AM";
        case "R2":
            return "8:00 AM";
        case "R3":
            return "10:00 AM";
        case "R4":
            return "12:00 PM";
        case "R5":
            return "2:00 PM";
        case "R6":
            return "4:00 PM";
    }
}

function getCarUsingRouteNumber($from, $to, $route_number): bool|array |null
{
    $sql = "SELECT * FROM invoices WHERE route_number='$route_number' AND route_from='$from' AND route_to='$to'";
    return fetchAll($sql);

}

function getCustomersById($id)
{
    $sql = "SELECT * FROM customers WHERE customer_id='$id'";
    return fetch($sql);
}

function getCustomersByPhone($phone): array
{
    $sql = "SELECT * FROM customers WHERE phone='$phone'";
    return fetchAll($sql);
}

function getInvoiceByCusId($id): array
{
    $sql = "SELECT * FROM invoices WHERE customer_id='$id'";
    return fetch($sql);
}

function getInvoices($from, $to, $phone): array
{
    $invoices = [];

    foreach (getCustomersByPhone($phone) as $c) {
        $cus_id = $c['customer_id'];
        $sql = "SELECT * FROM invoices WHERE route_from='$from' AND route_to='$to' AND customer_id='$cus_id'";

        if (fetch($sql)) {
            array_push($invoices, fetch($sql));
        }
    }
    return $invoices;
}

function isCustomerAuth($cus_id)
{
    $sql = "SELECT * FROM invoices WHERE customer_id='$cus_id'";
    if (count(fetchAll($sql)) > 0) {
        return true;
    } else {
        return false;
    }
}

function getInvoiceById($id)
{
    $sql = "SELECT * FROM invoices WHERE invoice_id='$id'";
    return fetch($sql);
}
function getTempInvoiceByCusId($id)
{
    $sql = "SELECT * FROM temp_invoices WHERE customer_id='$id'";
    return fetch($sql);
}
function getTempCustomer($id)
{
    $sql = "SELECT * FROM temp_customers WHERE customer_id='$id'";
    return fetch($sql);
}


function getPrice($route_from, $route_to)
{
    if ($route_from == 0) {
        $sql = "SELECT * FROM price_list WHERE route_b='$route_to'";
    } else {
        $sql = "SELECT * FROM price_list WHERE route_a='$route_to'";
    }
    return fetch($sql);
}

function bookingCancel($cus_id)
{
    $i = getInvoiceByCusId($cus_id);
    $r_number = $i['route_number'];
    $route_from = $i['route_from'];
    $route_to = $i['route_to'];
    $car_id = $i['car_id'];
    $customer_id = $i['customer_id'];
    $person_qty = $i['person_qty'];
    $seat_numbers = $i['seat_numbers'];
    $price_total = $i['price_total'];
    $payment = $i['payment'];
    $qr_code = $i['qr_code'];
    $refund_completed = 0;
    if ($payment == 'pay_on_ride') {
        $refund_completed = 1;
    }

    $sql = "INSERT INTO booking_cancels(route_number,route_from,route_to,car_id,customer_id,person_qty,seat_numbers,price_total,payment,refund_completed,qr_code)
            VALUES (
                '$r_number',
                '$route_from',
                '$route_to',
                '$car_id',
                '$customer_id',
                '$person_qty',
                '$seat_numbers',
                '$price_total',
                '$payment',
                '$refund_completed',
                '$qr_code'
            )";

    if (runQuery($sql)) {
        deleteInvoice($cus_id);
    }
}

function deleteInvoice($cus_id)
{
    $sql = "DELETE FROM `invoices` WHERE customer_id='$cus_id'";
    runQuery($sql);
}

//==========================

function getTimeTable(): array
{
    date_default_timezone_set('Asia/Yangon');
    $hour = (int) date("G", time());

    if ($hour > 15) {
        $routes = ["R1", "R2", "R3", "R4", "R5", "R6"];
    } elseif ($hour >= 14) {
        $routes = ["R6"];
    } elseif ($hour >= 12) {
        $routes = ["R5", "R6"];
    } elseif ($hour >= 10) {
        $routes = ["R4", "R5", "R6"];
    } elseif ($hour >= 8) {
        $routes = ["R3", "R4", "R5", "R6"];
    } elseif ($hour >= 6) {
        $routes = ["R2", "R3", "R4", "R5", "R6"];
    } else {
        $routes = ["R1", "R2", "R3", "R4", "R5", "R6"];
    }

    return $routes;
}