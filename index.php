<?php
session_start();
?>
<html>

<head>
	<title>User Login</title>
</head>

<body>

	<?php
	if ($_SESSION["email"]) {
	?>
		Welcome <?php echo $_SESSION["email"]; ?>. Click here to <a href="logout.php"><button>Logout</button>
		<?php
	} else
		echo "<h1>Please login first .</h1>";
		?>
</body>
<?php
session_destroy();
?>

</html>