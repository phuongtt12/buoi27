<?php 
	require "../config.php";
	require "../connectDB.php";

	$name = $_POST["name"];
	$birthday = $_POST["birthday"];
	$gender = $_POST["gender"];
	$id = $_POST["id"];

	$sql = "UPDATE student SET name='$name', birthday='$birthday', gender='$gender' WHERE id=$id";
	// Thực hiện update
	if ($conn->query($sql) === TRUE) {
	    header("location: list.php");
	} else {
	    echo "Update thất bại: $sql " . $conn->error;
	}
 ?>