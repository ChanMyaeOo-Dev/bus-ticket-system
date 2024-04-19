<?php

function getConnection(): bool|mysqli|null
{

    return mysqli_connect("localhost", "root", "root", "bus_ticket_system");
}

function linkTo($l)
{
    echo "<script>location.href='$l'</script>";
}
function linkToDingerServer($link)
{
    
    echo "<script>location.href='$link'</script>";
}

function runQuery($sql)
{
    if (mysqli_query(getConnection(), $sql)) {
        return true;
    } else {
        die("Query Fail : " . $sql);
    }
}

function fetchAll($sql): array
{
    $query = mysqli_query(getConnection(), $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($rows, $row);
    }

    return $rows;
}

function fetch($sql)
{
    $query = mysqli_query(getConnection(), $sql);
    return mysqli_fetch_assoc($query);
}

function showDate($d)
{
    return date("d/m/Y", strtotime($d));
}