<?php
include('server/connection.php');
session_start();

if (isset($_POST['register_btn'])) {
  $username = $_POST['user_name'];
  $email = $_POST['user_email'];
  $password = $_POST['user_password'];
  $confirm_password = $_POST['user_password_confirm'];
  $address = $_POST['user_address'];
  $phone = $_POST['user_phone'];
  $gender = $_POST['user_gender'];
  $level = $_POST['user_level'];

  $q = "SELECT * FROM users WHERE user_email='$email'";

  $result = mysqli_query($conn, $q);
  $numRow = mysqli_num_rows($result);

  if ($numRow != 0) {
    header('location: register.php?error=Email is already Used!');
  } else {
    if ($password != $confirm_password) {
      header('location: register.php?error=Password does not match! Try Again!');
    } else {
      $query = "INSERT INTO users VALUES ('', '$username', '$email', '$password', '$address', '$phone', '$gender', '$level')";

      mysqli_query($conn, $query);

      header("location: register.php?message=Account created successfully!");
    }
  }
}
