<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['Pass'];
$link = mysqli_connect("localhost", "root", "", "ecommerce");
if ($link->connect_error) {
    die("connection failed");
} else {
    echo "connected";
    $query = "Select * from users where email='$email' AND Password='$pass'";
    $row = ($link->query($query))->fetch_assoc();
    if (is_array($row)) {
        $_SESSION["ID"] = $row["ID"];
        $_SESSION["user"] = $row["Username"];
    } else {
        echo "invalid username";
    }
    if (isset($_SESSION["user"])) {
        header("location:../index.html");
    }
}
