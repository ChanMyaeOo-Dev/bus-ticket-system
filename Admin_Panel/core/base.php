<?php
session_start();

function getPath()
{
    echo "http://{$_SERVER['HTTP_HOST']}/Php_WorkSpace/Bus_Ticket_System/Admin_Panel";
}

function getCurrentPage()
{

    $currentPage = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
    ;

    switch ($currentPage) {
        case "ui_home.php":
            return "HOME";
        case "car_status.php":
        case "car_status_check_out.php":
            return "STATUS";
        case "car_management.php":
        case "car_edit.php":
            return "CARS";
        case "drivers.php":
        case "drivers_Edit.php":
            return "DRIVERS";
        case "pricing.php":
        case "pricing_edit.php":
            return "PRICE";
        case "booking_cancel.php":
            return "CANCEL";
        case "refund.php":
            return "REFUND";
        case "customer_history.php":
        case "history_detail.php":
            return "HISTORY";
        case "make_booking.php":
            return "CREATE_BOOK";
        case "booking_list.php":
        case "customer_detail.php":
            return "BOOKING_LIST";





    }
}

require_once "function.php";