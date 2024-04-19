<?php
require_once("common_functions.php");

//==========Car Start==========

function getGates()
{
    $sql = "SELECT * FROM gates";
    return fetchAll($sql);
}
function getGatesExceptGate()
{
    $gate = $_SESSION['gate'];
    $sql = "SELECT * FROM gates WHERE gate_id != $gate";
    return fetchAll($sql);
}

function getRouteName($from)
{
    $sql = "SELECT * FROM gates WHERE gate_id='$from'";
    return fetch($sql)['gate_name'];
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

function getAllCars(): array
{
    $gate = $_SESSION['gate'];
    if ($gate == 0) {
        $sql = "SELECT * FROM cars";
    } else {
        $sql = "SELECT * FROM cars WHERE route_b='$gate'";
    }
    return fetchAll($sql);
}

function getCars(): array
{
    $gate = $_SESSION['gate'];
    if ($gate == 0) {
        $sql = "SELECT * FROM cars WHERE has_driver='1'";
    } else {
        $sql = "SELECT * FROM cars WHERE route_b='$gate' AND has_driver='1'";
    }
    return fetchAll($sql);
}

function getCarsForDriver(): array
{
    $gate = $_SESSION['gate'];
    if ($gate == 0) {
        $sql = "SELECT * FROM cars WHERE has_driver='0'";
    } else {
        $sql = "SELECT * FROM cars WHERE route_b='$gate' AND has_driver='0'";
    }
    return fetchAll($sql);
}


function getCar($id)
{
    $sql = "SELECT * FROM cars WHERE car_id='$id'";
    return fetch($sql);
}

function getInvoicesByRouteB($route_b)
{
    $gate = $_SESSION['gate'];

    if ($gate == 0) {
        $sql = "SELECT * FROM invoices WHERE route_from ='$gate' AND route_to ='$route_b'";
    } else {
        $sql = "SELECT * FROM invoices WHERE route_from ='$gate' AND route_to ='0'";
    }

    return fetchAll($sql);
}

function getCustomer($customer_id)
{
    $sql = "SELECT * FROM customers WHERE customer_id ='$customer_id'";
    return fetch($sql);
}

function getCarUsingRouteNumber($from, $to, $route_number): bool|array |null
{
    $sql = "SELECT * FROM invoices WHERE route_number='$route_number' AND route_to='$to'";
    return fetchAll($sql);

}

function getDriverByCarId($car_id)
{
    $sql = "SELECT * FROM drivers WHERE car_id='$car_id'";
    return fetch($sql);

}

function getDriver($id)
{
    $sql = "SELECT * FROM drivers WHERE driver_id='$id'";
    return fetch($sql);

}


function getAvailableRoutes($car_id)
{
    $gate = $_SESSION['gate'];
    $car_to = getCar($car_id)['route_b'];
    if ($gate == '0') {
        $car_to = getCar($car_id)['route_b'];
    } else {
        $car_to = '0';
    }
    $routes = [];

    $sql = "SELECT * FROM invoices WHERE route_from='$gate' AND route_to='$car_to'";

    foreach (fetchAll($sql) as $invoice) {
        if(count($routes)>0){
            foreach($routes as $index=>$r){
                if($r['route_number']==$invoice['route_number']){
                    $arr = array(
                        "route_number" => $r['route_number'],
                        "seat_count" => ($r['seat_count']+$invoice['person_qty'])
                    );

                    $routes[$index] = $arr;
                    break;

                }else{
                    $seat_qty = $invoice['person_qty'];
                    array_push(
                        $routes,
                        array(
                            "route_number" => $invoice['route_number'],
                            "seat_count" => $seat_qty
                        )
                    );
                }
            }
        }else{
            $seat_qty = $invoice['person_qty'];
            array_push(
                $routes,
                array(
                    "route_number" => $invoice['route_number'],
                    "seat_count" => intval($seat_qty)
                )
            );
        }
    }

    return $routes;
}

function getCustomerList($r_no, $car_id)
{
    $customerList = [];

    $car = getCar($car_id);
    $closet_routes = getInvoicesByRouteB($car['route_b']);

    foreach ($closet_routes as $r) {

        if ($r['route_number'] === $r_no) {
            $cus = array(
                "customer_info" => getCustomer($r['customer_id']),
                "seat_numbers" => getSeatNumberByRouteNumber($r['route_number'], $r['customer_id'])['seat_numbers']
            );
            array_push($customerList, $cus);
        }

    }
    return $customerList;
}

function getSeatNumberByRouteNumber($r_no, $cus_id)
{

    $sql = "SELECT * FROM invoices WHERE route_number='$r_no' AND customer_id='$cus_id'";
    return fetch($sql);

}

function getInvoices()
{
    $sql = "SELECT * FROM invoices";
    return fetchAll($sql);
}

function getInvoicesForInvoiceList($f, $t, $r_num)
{

    $sql = "SELECT * FROM invoices WHERE route_from='$f' AND route_to='$t' AND route_number='$r_num'";
    return fetchAll($sql);
}

function getInvoice($id)
{
    $sql = "SELECT * FROM invoices WHERE invoice_id='$id'";
    return fetch($sql);
}

function updateCarToInvoice($invoice_id, $car_id)
{
    $sql = "UPDATE `invoices` SET `car_id`='$car_id' WHERE invoice_id='$invoice_id'";
    return runQuery($sql);
}

function deleteInvoice($invoice_id)
{
    $sql_for_invoices = "DELETE FROM invoices WHERE invoice_id='$invoice_id'";
    runQuery($sql_for_invoices);
}

function saveInHistoryInvoice($r_number, $r_from, $r_to, $car_id, $cus_id, $person_qty, $seats, $price_total, $payment, $qrcode)
{
    $sql = "INSERT INTO invoice_history(route_number,route_from,route_to,car_id,customer_id,person_qty,seat_numbers,price_total,payment,qr_code)
            VALUES ('$r_number','$r_from','$r_to','$car_id','$cus_id','$person_qty','$seats','$price_total','$payment','$qrcode')";
    return runQuery($sql);
}

function checkout($route_from,$route_to, $r_no, $car_id)
{

    //    Get And Update Invoice List

    $sql = "SELECT * FROM invoices WHERE route_from = '$route_from' AND route_to='$route_to' AND route_number='$r_no'";
    $invoiceList = fetchAll($sql);

    foreach ($invoiceList as $i) {
        updateCarToInvoice($i['invoice_id'], $car_id);
    }

    //    Save In History Invoices AND Delete That Invoice

    foreach ($invoiceList as $i) {
        saveInHistoryInvoice(
            $i['route_number'],
            $i['route_from'],
            $i['route_to'],
            $i['car_id'],
            $i['customer_id'],
            $i['person_qty'],
            $i['seat_numbers'],
            $i['price_total'],
            $i['payment'],
            $i['qr_code']
        );
        deleteInvoice($i['invoice_id']);
    }

    return true;
}

function getDrivers()
{
    $gate = $_SESSION['gate'];
    $drivers = [];

    if ($gate == 0) {
        $sql = "SELECT * FROM drivers";
        $drivers = fetchAll($sql);
    } else {
        $sql = "SELECT * FROM drivers";

        foreach (fetchAll($sql) as $d) {
            if (getCar($d['car_id'])['route_b'] == $gate) {
                array_push($drivers, $d);
            }
        }

    }

    return $drivers;
}

function getAge($dob)
{
    $b = date("d-m-Y", strtotime($dob));
    //explode the date to get month, day and year
    $birthDate = explode("-", $b);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
    return $age . " Years Old";
}

function updateCarDriverStatus($car_id)
{
    $sql = "UPDATE `cars` SET `has_driver`='1' WHERE car_id='$car_id'";
    return runQuery($sql);
}

function addDriver()
{
    $name = preg_replace("/'/", "\&#39;", $_POST['name']);
    $phone = $_POST['phone'];
    $nrc = $_POST['nrc'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $car_id = $_POST['car_id'];
    $img = uploadImage();

    $sql = "INSERT INTO `drivers`(`profile_picture`, `name`, `birthday`, `nrc`, `address`, `phone`, `car_id`) VALUES
            ('$img','$name','$birthday','$nrc','$address','$phone','$car_id')";

    updateCarDriverStatus($car_id);

    return runQuery($sql);
}


function driver_update($id)
{
    $name = preg_replace("/'/", "\&#39;", $_POST['name']);
    $phone = $_POST['phone'];
    $nrc = $_POST['nrc'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $car_id = $_POST['car_id'];
    $img = uploadImageWithName($_POST['driver_img']);

    $sql = "UPDATE drivers SET name='$name',
                  phone='$phone',nrc='$nrc',address='$address',
                  birthday = '$birthday',car_id = '$car_id',
                  profile_picture='$img'
                  WHERE driver_id='$id'";

    return runQuery($sql);

}

function addCar()
{
    $car_model = $_POST['car_model'];
    $car_number = $_POST['car_number'];
    $gate = $_SESSION['gate'];

    if ($gate == 0) {
        $route_b = $_POST['route_b'];
        $sql = "INSERT INTO cars (car_model,car_number,route_a,route_b,has_driver) VALUES ('$car_model','$car_number','0','$route_b','0')";
    } else {
        $sql = "INSERT INTO cars (car_model,car_number,route_a,route_b,has_driver) VALUES ('$car_model','$car_number','0','$gate','0')";
    }

    return runQuery($sql);
}

function update_car()
{
    $car_id = $_POST['car_id'];
    $car_model = $_POST['car_model'];
    $car_number = $_POST['car_number'];
    $route_b = $_POST['route_b'];

    $sql = "UPDATE `cars` SET `car_model`='$car_model',`car_number`='$car_number',`route_b`='$route_b' WHERE car_id='$car_id'";
    return runQuery($sql);
}


function getPriceList()
{
    $sql = "SELECT * FROM price_list";
    return fetchAll($sql);
}

function getPrice($price_id)
{
    $sql = "SELECT * FROM price_list WHERE price_id='$price_id'";
    return fetch($sql);
}
function getRoutePrice($route_from, $route_to)
{
    if ($route_from == 0) {
        $sql = "SELECT * FROM price_list WHERE route_b='$route_to'";
    } else {
        $sql = "SELECT * FROM price_list WHERE route_a='$route_to'";
    }
    return fetch($sql);
}

function update_price($price_id)
{
    $front = $_POST['front_price'];
    $back = $_POST['back_price'];
    $sql = "UPDATE `price_list` SET `front_seat_price`='$front',`back_seat_price`='$back' WHERE price_id='$price_id'";
    return runQuery($sql);
}

//DashBoardData


function getInvoiceHistory($limit = 9999999)
{
    $gate = $_SESSION['gate'];
    $sql = "SELECT * FROM invoice_history WHERE route_from = '$gate' LIMIT $limit";
    return fetchAll($sql);
}

function getInvoiceHistoryByDate($start_date, $end_date)
{
    $gate = $_SESSION['gate'];
    $sql = "SELECT * FROM invoice_history WHERE route_from = '$gate' AND date BETWEEN '$start_date' AND '$end_date'";
    return fetchAll($sql);
}

function getTotalCustomers()
{
    $total_cus = 0;
    foreach (getInvoiceHistory() as $i) {
        $total_cus += $i['person_qty'];
    }
    return $total_cus;
}
function getTotalIncome()
{
    $total_income = 0;
    foreach (getInvoiceHistory() as $i) {
        $total_income += $i['price_total'];
    }
    return $total_income;
}


function getPopularRoutes()
{
    $arr = [0, 0, 0, 0, 0, 0];
    foreach (getInvoiceHistory() as $i) {

        $route_number = $i['route_number'];
        switch ($route_number) {
            case "R1": {
                    $arr[0] += $i['person_qty'];
                    break;
                }
            case "R2": {
                    $arr[1] += $i['person_qty'];
                    break;
                }
            case "R3": {
                    $arr[2] += $i['person_qty'];
                    break;
                }
            case "R4": {
                    $arr[3] += $i['person_qty'];
                    break;
                }
            case "R5": {
                    $arr[4] += $i['person_qty'];
                    break;
                }
            case "R6": {
                    $arr[5] += $i['person_qty'];
                    break;
                }

        }


    }
    return $arr;
}


function bookingCancel($cus_id)
{
    $sql = "INSERT INTO `booking_cancels`(`customer_id`,`is_confirmed`) VALUES ('$cus_id','0')";
    return runQuery($sql);
}


function bookingCancelUpdate($cus_id)
{
    $sql = "UPDATE `booking_cancels` SET `is_confirmed`='1' WHERE customer_id='$cus_id'";
    return runQuery($sql);
}

function getInvoiceByCusId($id)
{
    $sql = "SELECT * FROM invoices WHERE customer_id='$id'";
    return fetch($sql);
}
function getHistoryInvoiceByCusId($id)
{
    $sql = "SELECT * FROM invoice_history WHERE customer_id='$id'";
    return fetch($sql);
}
function getCancelInvoiceByCusId($id)
{
    $sql = "SELECT * FROM booking_cancels WHERE customer_id='$id'";
    return fetch($sql);
}

function getCancelInvoiceList()
{
    $gate = $_SESSION['gate'];
    $sql = "SELECT * FROM booking_cancels WHERE route_from='$gate'";
    return fetchAll($sql);
}

function getCancelInvoiceListByDate($start_date, $end_date)
{
    $gate = $_SESSION['gate'];
    $sql = "SELECT * FROM booking_cancels WHERE route_from = '$gate' AND date BETWEEN '$start_date' AND '$end_date'";
    return fetchAll($sql);
}

function getRefundInvoiceList()
{
    $gate = $_SESSION['gate'];
    $sql = "SELECT * FROM booking_cancels WHERE route_from='$gate' AND refund_completed = '0'";
    return fetchAll($sql);
}
function getRefundedList()
{
    $gate = $_SESSION['gate'];
    $sql = "SELECT * FROM booking_cancels WHERE route_from='$gate' AND refund_completed = '1' AND payment='online_payment'";
    return fetchAll($sql);
}

function refundComplete($cus_id)
{
    $sql = "UPDATE `booking_cancels` SET `refund_completed`='1' WHERE customer_id='$cus_id'";
    return runQuery($sql);
}



//==========Order End==========

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
function uploadCustomerInformation($cus_id)
{
    $name = $_POST['customer_name'];
    $phone = $_POST['customer_name'];
    $nrc = $_POST['customer_name'];
    $location = 'GATE';

    $sql = "INSERT INTO customers(customer_id,name,phone,nrc,location) VALUES ('$cus_id','$name','$phone','$nrc','$location')";
    return runQuery($sql);
}
function uploadInvoice($cus_id, $qrcode)
{

    $r_number = $_POST['route_number'];
    $r_from = $_POST['from'];
    $r_to = $_POST['to'];
    $car_id = 1;
    $seats = $_POST['seat_numbers'];
    $person_qty = count(explode(",", $_POST['seat_numbers']));
    $total_price = $_POST['total_p'];
    $payment_method = 'pay_on_ride';

    $sql = "INSERT INTO invoices(route_number,route_from,route_to,car_id,customer_id,person_qty,seat_numbers,price_total,payment,qr_code)
            VALUES ('$r_number','$r_from','$r_to','$car_id','$cus_id','$person_qty','$seats','$total_price','$payment_method','$qrcode')";
    return runQuery($sql);
}