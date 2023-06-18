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
    $query = "select * from users where Email = '$email'";
    if (mysqli_num_rows($link->query($query)) > 0) {
        echo "found";
    } else {
        $submit = "INSERT INTO users (Name,Email,Username,Password,DOB) values('$name','$email','$username','$password','$date')";
        if ($link->query($submit)) {
            header("location:../signup.html");
        }
    }
}
