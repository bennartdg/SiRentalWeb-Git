<?php
include 'server/connection.php';

if ($_GET['user_id'] != 0) {
	$id = $_GET['user_id'];

	$query = "DELETE FROM users WHERE user_id = '$id'";

	mysqli_query($conn, $query);

	header('location: manage.php ');
	die();
} else if ($_GET['car_id'] != null) {
	$id = $_GET['car_id'];

	$query = "DELETE FROM car WHERE car_id = '$id'";

	mysqli_query($conn, $query);

	header('location: car.php ');
	die();
}
