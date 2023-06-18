<?php
$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["Username"];
$password = $_POST["Pass"];
$date = $_POST["date"];
$link = mysqli_connect("localhost", "root", "", "ecommerce");
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    echo "Connected";
}
