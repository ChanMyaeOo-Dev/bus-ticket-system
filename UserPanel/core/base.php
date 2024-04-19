<?php
// echo "<pre>";
// print_r($_SERVER);

function getPath()
{
    echo "http://{$_SERVER['HTTP_HOST']}/Php_WorkSpace/Bus_Ticket_System/UserPanel";
}

function getCurrentPage()
{
    $currentPage = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

    switch ($currentPage) {
        case "home.php":
            return "HOME";
        case "booking_search.php":
            return "SEARCH";
        case "faqs.php":
            return "FAQS";
    }
}

function noNeedAppBar()
{
    if (getCurrentPage() == "HOME" || getCurrentPage() == "SEARCH" || getCurrentPage() == "FAQS") {
        return "NEED";
    } else {
        return "NO_NEED";
    }
}

require_once "function.php";
