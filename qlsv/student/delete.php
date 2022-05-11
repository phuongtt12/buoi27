<?php 
	require "../config.php";
	require "../connectDB.php";
	
	$id = $_GET["id"];
	$sql = "DELETE FROM student WHERE id = $id";
	// Thực hiện delete
	if ($conn->query($sql) === TRUE) {
	    header("location: list.php");
	} else {
	    echo "Delete thất bại: " . $conn->error;
	}
 ?>