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
            height: auto;
            border: 2px solid green;
            margin-top: 100px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;

        }

        form {
            padding-top: 30px;
            padding-left: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 95%;
            margin-top: 5px;
            height: 60px;
            font-size: 25px;
        }

        input[type="submit"] {
            font-family: Arial, Helvetica, sans-serif;
            background: transparent;
            border-radius: 20px;
            border-style: groove;
            width: 100px;
            height: 50px;
            font-weight: 1000;
        }

        #submit {
            margin-top: 40px;
            text-align: center;
        }

        input[type="submit"]:hover {
            background-color: forestgreen;
            color: white;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 5px 15px rgba(145, 92, 182, .4);
        }

        .active {
            color: maroon;
            font-weight: bold;
        }

        #desc {
            margin-top: 5px;
        }

        #footer {
            text-align: center;
            margin-top: 100%;
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
        <div id="form">
            <form method="post" action="addprod.php" enctype="multipart/form-data"">
                <label>Product Name</label>
                <input type=" text" name="Pname" placeholder="Product Name"><br><br>
                <label>Product Price</label>
                <input type="number" name="Pprice" placeholder="product Price">
                <label>Product Description :</label>
                <textarea name="ProductDescription" id="desc" cols="30" rows="5"></textarea><br><br>
                <label for="category">
                    category
                </label>
                <input type="text" placeholder="category" name="category">
                <label for="file">Product Image</label>
                <input type="file" name="files" />
                <br><br>
                <input type="submit" name="submit" value="upload">
            </form>
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