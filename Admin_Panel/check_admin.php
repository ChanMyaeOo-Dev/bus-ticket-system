<?php

function getConnectionToLogin(): bool|mysqli|null
{
    return mysqli_connect("localhost", "root", "root", "bus_ticket_system");
}

function fetchAdmins($sql)
{
    $query = mysqli_query(getConnectionToLogin(), $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($rows, $row);
    }

    return $rows;
}

function getAdminData()
{
    $sql = "SELECT * FROM admins";
    return fetchAdmins($sql);

}

function login()
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach (getAdminData() as $a) {

        if ($email == $a['user_name']) {

            if ($password == $a['password']) {

                $_SESSION["gate"] = $a['gate_id'];

                return true;

            }
        }

    }

    return false;

}
