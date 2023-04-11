<?php
include 'server/connection.php';

if ($_GET['user_id'] != null) {
	$id = $_GET['user_id'];

	$q = "SELECT user_level FROM users WHERE user_id = '$id'";

	$result = mysqli_query($conn, $q);

	$row = mysqli_fetch_assoc($result);

	$level = $row['user_level'];

	$query = "DELETE FROM users WHERE user_id = '$id'";

	mysqli_query($conn, $query);

	if ($level == 2) {
		header('location: manage.php?user_level=Customer');
	} else {
		header('location: manage.php?user_level=Member');
	}
	die();
} else if ($_GET['car_id'] != null) {
	$id = $_GET['car_id'];

	$query = "DELETE FROM car WHERE car_id = '$id'";

	mysqli_query($conn, $query);

	header('location: cars.php');
	die();
}
