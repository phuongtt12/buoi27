<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Quản lý sinh viên</title>
		<link rel="stylesheet" href="../public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
		<link rel="stylesheet" href="../public/css/style.css">
		<link rel="shortcut icon" href="../public/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div class="container" style="margin-top:20px;">
			<a href="../student/list.php" class="active btn btn-info">Students</a>
			<a href="../subject/list.php" class=" btn btn-info">Subject</a>
			<a href="../register/list.php" class=" btn btn-info">Register</a>
			<div style="height:40px; margin-top:20px">
				<div class="error bg-danger container-fluid text-center">
				</div>
				<div class="message bg-primary container-fluid text-center">
				</div>
			</div>
			<?php 
				session_start();
			 ?>
			<div class="alert alert-primary"><?=!empty($_SESSION["message"]) ? $_SESSION["message"] : ""?></div>
			<div class="alert alert-danger"><?=!empty($_SESSION["error"]) ? $_SESSION["error"] : ""?></div>
			<?php 
				unset($_SESSION["message"]);
				unset($_SESSION["error"]);
			 ?>