<?php
session_start();

if (!isset($_SESSION["gate"])) {
    echo "<script>location.href='login.php'</script>";
} else {
    echo "<script>location.href='ui_home.php'</script>";
}