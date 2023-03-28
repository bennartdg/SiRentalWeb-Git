<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: index.php');
  exit;
}

if (isset($_POST['login_btn'])) {
  $email = $_POST['user_email'];
  $password = $_POST['user_password'];

  $query = "SELECT * FROM users WHERE user_email = ? AND user_password = ? LIMIT 1";

  $stmt_login = $conn->prepare($query);
  $stmt_login->bind_param('ss', $email, $password);

  if ($stmt_login->execute()) {
    $stmt_login->bind_result($user_id, $user_name, $user_email, $user_password, $user_address, $user_phone, $user_gender, $user_level);
    $stmt_login->store_result();

    if ($stmt_login->num_rows() == 1) {
      $stmt_login->fetch();
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['user_password'] = $user_password;
      $_SESSION['user_address'] = $user_address;
      $_SESSION['user_phone'] = $user_phone;
      $_SESSION['user_gender'] = $user_gender;
      $_SESSION['user_level'] = $user_level;
      $_SESSION['logged_in'] = true;

      header('location: index.php?message=Logged in successfully');
    } else {
      header('location: login.php?error=Cound not verify your account!');
    }
  } else {
    //Error
    header('location: login.php?error=Something went wrong!');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link rel="icon" href="assets/brand/TitleIcon.png" />
  <title>Login</title>
</head>

<body type="login">
  <div class="container">
    <form action="login.php" id="login-form" method="POST">
      <h1>Welcome Back!</h1>
      <div class="text_field">
        <input type="email" name="user_email" autocomplete="new-email" required placeholder="Email" />
      </div>
      <div class="text_field">
        <input type="password" name="user_password" autocomplete="new-password" required placeholder="Password" />
      </div>
      <div>
        <input type="submit" id="login-btn" name="login_btn" value="Login" />
      </div>
      <div class="under-button-submit">
        <div>
          <a href="index.php">Back</a>
        </div>
        <div>
          Need an account?
          <a href="register.php" role="button">Register Here!</a>
        </div>
      </div>
      <div class="alert" role="alert">
        <?php if (isset($_GET['error'])) {
          echo $_GET['error'];
        }
        ?>
      </div>
    </form>
  </div>
</body>

</html>