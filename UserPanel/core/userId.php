<?php
session_start();
$user_id = "cus_" . uniqid();
$_SESSION['user_id'] = $user_id;