<?php

require '../connection/connect.php';

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

$sql = "SELECT `email`, `password` FROM `users` WHERE `email` = '$email'";
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["password"] == $password) {
            session_start();
            $_SESSION["email"] = $row["email"];
            header("location: ../home.php");
        } else {
            echo "Password is incorrect";
            header("refresh:2, url= ../index.html");
        }
    }
} else {
    echo "Email doesn't exists";
    header("refresh:2, url= ../index.html");
}
