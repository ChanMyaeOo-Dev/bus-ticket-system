<?php require_once "template/header.php";

if (checkout($_GET['r_from'],$_GET['r_to'],$_GET['r_no'],$_GET['car_id'])) {
    linkTo("car_status.php");
}