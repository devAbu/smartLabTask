<?php

require "../connection/connect.php";

$name = $_REQUEST["name"];
$type = $_REQUEST["type"];
$period = $_REQUEST["period"];
$creator = $_REQUEST["creator"];

$sql = "INSERT INTO licenses (`name`, `type`, `period`, `creator`) VALUES ('$name', '$type', $period, '$creator')";

$result = @mysqli_query($dbc, $sql);
if ($result) {
    header("location: ../home.php");
} else {
    echo mysqli_error($dbc);
}
