<?php
$link = mysqli_connect("localhost", "root", "", "ecommerce");
if ($link->connect_error) {
    die("Connection not established");
} else {
    $productN = $_POST["Pname"];
    $price = $_POST['Pprice'];
    $category = $_POST['category'];
    $fileName = basename($_FILES["files"]["name"]);
    $submit = $_POST["submit"];
    $targetdir = "../products/";
    $targetfilepath = $targetdir . $fileName;
    $filetype = pathinfo($targetfilepath, PATHINFO_EXTENSION);
    if (isset($_POST["submit"]) && !empty($_FILES["files"]["name"])) {
        $query = "INSERT INTO products (ProductName,ProductDescription,Category,Image) values('$productN','$price','$category','$fileName')";
        if ($link->query($query) && move_uploaded_file($_FILES["files"]["tmp_name"], $targetfilepath)) {
            echo "Product Added";
        } else {
            echo ("There was an error uploading the file.
            File upload returned error code: " . $_FILES["files"]["error"]);
        }
    }
}
?>
<html>

<head>
    <style>
        <?php include '../css/addprod.css'
        ?>
    </style>
</head>

<body>
    <div>
        <?php
        $q = "SELECT * FROM products WHERE ID=9";
        $res = $link->query($q);
        $result = mysqli_fetch_array($res);
        ?>
        <img style=" width:444px;" src="../products/<?php echo $result['Image']; ?>">
        <h1> ProductName : <?php echo $result["ProductName"] ?></h1>
    </div>
</body>

</html>