<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "ecommerce");
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/addproduct.css">
    <style>
        html,
        body {
            min-height: 100%;
            position: relative;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0px;
            padding: 0px;
            background-color: green;
        }

        ul {
            padding-top: 15px;
            margin: 0px;
        }

        ul li {
            display: inline;
            float: right;
            padding: 0px 20px 30px 0px;
        }

        ul li a {
            text-decoration: none;
            font-size: 20px;
            color: white;
        }

        #nav-bar {
            background-color: #606c38;
            height: 56px;
            position: relative;
        }

        #form {
            width: 400px;
            height: 400px;
            border: 2px solid green;
            margin-top: 100px;
            margin-left: auto;
            margin-right: auto;

        }
    </style>
</head>

<body>
    <?php
    $query = "Select * FROM admin where ID='$_SESSION[ID]' and Email='$_SESSION[email]'";
    if (($link->query($query))->num_rows > 0) {
    ?>
        <div id="nav-bar">
            <header>
                <ul>
                    <li><a>Home</a></li>
                    <li><a>Contact</a></li>
                    <li><a>About us</a></li>
                    <li><a class="active">Login</a></li>
                    <li><a class="active">Add product</a></li>
                    <li><a href="../signup.html">Signup</a></li>
                </ul>
            </header>
        </div>
    <?php
    } else {
        echo "You cannot access this page";
    } ?>
</body>
<?php
session_destroy();
?>

</html>