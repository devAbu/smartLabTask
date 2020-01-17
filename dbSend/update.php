<?php

require '../connection/connect.php';

$ID = $_REQUEST["ID"];
$name = $_REQUEST["name"];
$type = $_REQUEST["type"];
$period = $_REQUEST["period"];

$query = "UPDATE licenses set `name` = '$name', `type` = '$type', `period` = '$period' where ID = '$ID'";

$result = @mysqli_query($dbc, $query);

if ($result) {
    echo "Licenses updated successfully";
    header("refresh:2, url= ../home.php");
}
