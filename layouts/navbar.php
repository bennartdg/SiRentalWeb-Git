<?php
include('server/connection.php');
session_start();

if (isset($_SESSION['logged_in'])) {
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['user_name'];
  $user_email = $_SESSION['user_email'];
  $user_password = $_SESSION['user_password'];
  $user_address = $_SESSION['user_address'];
  $user_phone = $_SESSION['user_phone'];
  $user_gender = $_SESSION['user_gender'];
  $user_level = $_SESSION['user_level'];
} else {
  $user_level = -1;
}

if (isset($_GET['logout'])) {
  if (isset($_SESSION['logged_in'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_level']);
    header('location: login.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/61f8d3e11d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="icon" href="assets/brand/TitleIcon.png" type="image/png" />
  <title>
    <?php
    if ($location == "0") {
      echo "SIRental";
    } else if ($location == "1") {
      echo "SIRental • About";
    } else if ($location == "2") {
      echo "SIRental • Contact";
    } else {
      echo $location;
    } ?>
  </title>
</head>

<body>
  <header>
    <div class="nav-container">
      <nav class="wrapper">
        <div class="brand">
          <a href="index.php">
            <div class="firstname">SI</div>
            <div class="lastname">RENTAL</div>
          </a>
        </div>
        <ul class="navigation">
          <li>
            <a href="index.php" class="<?php if ($location == '0') {
                                          echo 'active';
                                        } ?>">Home</a>
          </li>
          <li>
            <a href="about.php" class="<?php if ($location == '1') {
                                          echo 'active';
                                        } ?>">About</a>
          </li>
          <li>
            <a href="contact.php" class="<?php if ($location == '2') {
                                            echo 'active';
                                          } ?>">Contact</a>
          </li>
        </ul>
        <?php if (!isset($_SESSION['logged_in'])) { ?>
          <ul class="navigation">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php" class="btn-red">Register</a></li>
          </ul>
        <?php } else { ?>
          <?php if ($_SESSION['user_level'] == 0) { ?>
            <ul class="navigation">
              <li>
                <a href="profile.php">
                  <img src="./assets/icon/Admin.png" alt="" width="40px" style="border-radius: 100%;">
                </a>
                <ul class="dropdown">
                  <li type="border"><a href="profile.php">Profile</a></li>
                  <li><a href="index.php?logout=1" id=logout-btn>Logout</a></li>
                </ul>
              </li>
            </ul>
          <?php } else if ($_SESSION['user_level'] == 1) { ?>
            <ul class="navigation">
              <li>
                <a href="profile.php">
                  <img src="./assets/icon/Member.png" alt="" width="40px" style="border-radius: 100%;">
                </a>
                <ul class="dropdown">
                  <li type="border"><a href="/profile.php">Profile</a></li>
                  <li><a href="index.php?logout=1" id=logout-btn>Logout</a></li>
                </ul>
              </li>
            </ul>
          <?php } else if ($_SESSION['user_level'] == 2) { ?>
            <ul class="navigation">
              <li>
                <a href="profile.php">
                  <img src="./assets/icon/Customer.png" alt="" width="40px" style="border-radius: 100%;">
                </a>
                <ul class="dropdown">
                  <li type="border"><a href="/profile.php">Profile</a></li>
                  <li><a href="index.php?logout=1" id=logout-btn>Logout</a></li>
                </ul>
              </li>
            </ul>
          <?php } ?>
        <?php } ?>
      </nav>
    </div>
  </header>