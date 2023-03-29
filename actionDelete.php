<?php
include 'server/connection.php';


$id = $_GET['user_id'];

$query = "DELETE FROM users WHERE user_id = '$id'";

mysqli_query($conn, $query);

header('location: manage.php ');
die();
?>