<?php

//==========Commons Functions Start==========

function getConnection(): bool|mysqli|null
{
    return mysqli_connect("localhost", "root", "root", "bus_ticket_system");
}

function linkTo($l)
{
    echo "<script>location.href='$l'</script>";
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

function fetch($sql): array |bool|null
{
    $query = mysqli_query(getConnection(), $sql);
    return mysqli_fetch_assoc($query);

}

function showTime($timestamp, $format = "F j,Y"): string
{
    return date($format, strtotime($timestamp));
}

function uploadImage()
{

    $temp = $_FILES['driver_img']['tmp_name'];
    $fileName = $_FILES['driver_img']['name'];
    $saveFolder = "store/";

    $newName = $saveFolder . uniqid() . "_" . $fileName;

    if (move_uploaded_file($temp, $newName)) {
        return $newName;
    }

}

function uploadImageWithName($name)
{
    $temp = $_FILES['driver_img']['tmp_name'];

    if ($temp == "") {
        return $name;
    } else {
        unlink($name);

        $fileName = $_FILES['driver_img']['name'];
        $saveFolder = "store/";

        $newName = $saveFolder . uniqid() . "_" . $fileName;

        if (move_uploaded_file($temp, $newName)) {
            return $newName;
        }
    }


}

function alert($str){
    echo "<script>alert('$str')</script>";
}

//==========Commons Functions End==========

?>