<?php
include('server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style/style.css" />
  <link rel="icon" href="assets/brand/TitleIcon.png" type="image/png" />
  <title>Sidebar</title>
</head>

<body>
  <?php if ($user_level == 0) { ?>
    <div class="sidebar">
      <ul>
        <li>
          <div class="menu">
            <i class="fa-solid fa-bars" id="btn"></i>
            <h3>Manage</h3>
          </div>
        </li>
        <li>
          <a href="manage.php?user_level=Member">
            <i class="fa-regular fa-address-card"></i>
            <span class="sidebar-item">Member</span>
          </a>
        </li>
        <li>
          <a href="manage.php?user_level=Customer">
            <i class="fa-solid fa-user-group fa-sm"></i>
            <span class="sidebar-item">Customer</span>
          </a>
        </li>
        <li>
          <a href="cars.php?user_level=Admin">
            <i class="fa-solid fa-car"></i>
            <span class="sidebar-item">Cars</span>
          </a>
        </li>
      </ul>
    </div>
  <?php } else if ($user_level == 1) { ?>
    <div class="sidebar">
      <ul>
        <li>
          <div class="menu">
            <i class="fa-solid fa-bars" id="btn"></i>
            <h3>Menu</h3>
          </div>
        </li>
        <li>
          <a href="cars.php?user_level=Member">
            <i class="fa-solid fa-car"></i>
            <span class="sidebar-item">My Cars</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <span class="sidebar-item">History</span>
          </a>
        </li>
      </ul>
    </div>
  <?php } else if ($user_level == 2) { ?>
    <div class="sidebar">
      <ul>
        <li>
          <div class="menu">
            <i class="fa-solid fa-bars" id="btn"></i>
            <h3>Menu</h3>
          </div>
        </li>
        <li>
          <a href="cars.php?user_level=Customer">
            <i class="fa-solid fa-car"></i>
            <span class="sidebar-item">Find Car</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-car-on"></i>
            <span class="sidebar-item">On Rent</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <span class="sidebar-item">History</span>
          </a>
        </li>
      </ul>
    </div>
  <?php } ?>
</body>

</html>