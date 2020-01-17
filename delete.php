<?php

require 'connection/connect.php';

$ID = $_REQUEST['ID'];

$query = "Delete from licenses where ID = $ID limit 1";


$result = mysqli_query($dbc, $query);
if ($result) {
    echo ('Deleted');
    header("location: home.php");
} else {
    echo mysqli_error($dbc);
}
