<?php
$link = mysqli_connect("localhost", "root", "", "ecommerce");
if ($link->connect_error) {
    die("Connection not established");
} else {
    $productN = $_POST["Pname"];
    $price = $_POST['Pprice'];
    $category = $_POST['category'];
    $description = $_POST['ProductDescription'];
    $fileName = basename($_FILES["files"]["name"]);
    $submit = $_POST["submit"];
    $targetdir = "../products/";
    $targetfilepath = $targetdir . $fileName;
    $filetype = pathinfo($targetfilepath, PATHINFO_EXTENSION);
    if (isset($_POST["submit"]) && !empty($_FILES["files"]["name"])) {
        $query = "INSERT INTO products (ProductName,Price,ProductDescription,Category,Image) values('$productN','$price','$description','$category','$fileName')"; ?>
        <?php
        if ($link->query($query) && move_uploaded_file($_FILES["files"]["tmp_name"], $targetfilepath)) {
        ?><html>

            <head>
                <style>
                    <?php include '../css/addprod.css'
                    ?>
                </style>
            </head>

            <body>
                <div>
                    <?php
                    $q = "SELECT * FROM products";
                    $res = $link->query($q);
                    $result = mysqli_fetch_array($res);
                    ?>
                    <img style=" width:444px;" src="../products/<?php echo $result['Image']; ?>">
                    <h1> ProductName : <?php echo $result["ProductName"] ?></h1>
                    <h1> ProductDescription : <?php echo $result["ProductDescription"] ?></h1>
                    <h1> ProductCategory : <?php echo $result["Category"] ?></h1>
                </div>
            </body>

            </html><?php
                } else {
                    echo ("There was an error uploading the file.
File upload returned error code: " . $_FILES["files"]["error"]);
                }
            }
        } ?>