<?php

$location = 'Cars';

// if ($location == 0) {
//   $location = 'Members Cars';
// } else if ($location == 1) {
//   $location = 'My Cars';
// } else {
//   $location = 'Find a Car';
// }

include('layouts/navbar.php');
include('layouts/sidebar.php');

$level = $user_level;
$id = $user_id;


if ($level == 0 || $level == 2) {
  if (isset($_POST['find']) && $_POST['keyword'] != '') {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM car
    WHERE car_brand LIKE '%$keyword%' OR
    car_year LIKE '%$keyword%' OR
    car_type LIKE '%$keyword%' OR
    car_capacity LIKE '%$keyword%'";
  } else {
    $query = "SELECT * FROM car";
  }
} else {
  if (isset($_POST['find']) && $_POST['keyword'] != '') {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM car
    WHERE user_id = $id AND
    (car_brand LIKE '%$keyword%' OR
    car_year LIKE '%$keyword%' OR
    car_type LIKE '%$keyword%' OR
    car_capacity LIKE '%$keyword%')";
  } else {
    $query = "SELECT * FROM car WHERE user_id = $id";
  }
}

$result = mysqli_query($conn, $query);
$numRow = mysqli_num_rows($result);
?>
<div class="fcardcontainer">
  <div class="cars_title">
    <?php if ($level == 0) { ?>
      <div>
        <h1>Member's Cars</h1>
      </div>
    <?php } else if ($level == 1) { ?>
      <div>
        <h1>My Cars</h1>
      </div>
    <?php } else { ?>
      <div>
        <h1>What car you need?</h1>
      </div>
    <?php } ?>
    <div>
      <form action="" method="POST">
        <div class="search_field">
          <div class="search_icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
          <input type="text" name="keyword" placeholder="Find">
          <div>
            <button class="find_btn" name="find"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="cards">
    <?php if ($numRow != 0) { ?>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <!-- Card -->
        <div class="card">
          <img src="assets/cars/<?php echo $row['car_image'] ?>" alt="" />
          <div class="card-content">
            <!-- Plat -->
            <div>
              <p><?php echo $row['car_plate'] ?></p>
            </div>
            <!-- Plat End -->
            <!-- Brand + Year -->
            <div class="merk">
              <div>
                <h3><?php echo $row['car_brand'] ?></h3>
              </div>
              <div>
                <p><?php echo $row['car_year'] ?></p>
              </div>
            </div>
            <!-- Brand + Year End -->
            <!-- Type + Capacity -->
            <div class="type">
              <div>
                <h4><?php echo $row['car_type'] ?></h4>
              </div>
              <div>
                <p><?php echo $row['car_capacity'] ?> Seats</p>
              </div>
            </div>
            <!-- Type + Capacity End-->
            <!-- Transmission -->
            <div>
              <?php if ($row['car_transmission'] == 'M') { ?>
                <p>Manual</p>
              <?php } else if ($row['car_transmission'] == 'A') { ?>
                <p>Automatic</p>
              <?php } ?>
              <?php if ($level == 0) { ?>
                <h6>M.id: <?php echo $row['user_id'] ?></h6>
              <?php } ?>
            </div>
            <!-- Transmission End-->
            <!-- Price + Button -->
            <div class="price">
              <div>
                <h1>
                  <div class="dollar">$</div>
                  <div><?php echo $row['car_price'] ?></div>
                  <div class="tag">/day</div>
                </h1>
              </div>
              <div>
                <?php if ($level == 0 || $level == 1) { ?>
                  <div class="col-action">
                    <a href="actionDelete.php?car_id=<?php echo $row['car_id'] ?>" role="button" onclick="return confirm('This car will be deleted?')">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </div>
                <?php } else { ?>
                  <div><button class="rent-btn">RENT</button></div>
                <?php } ?>
              </div>
            </div>
            <!-- Price + Button End-->
          </div>
        </div>
        <!-- Card End -->
      <?php } ?>
    <?php } else { ?>
      <div class="empty">
        <img src="assets/background/EmptyIcon.png" alt="">
        <?php if ($level == 0) { ?>
          <h2>All Members Do not have a Car!</h2>
        <?php } else if ($level == 1) { ?>
          <h2>You Don't have a Car!</h2>
        <?php } else { ?>
          <h2>No Car Available!</h2>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>
<?php include('layouts/footer.html') ?>
</body>

</html>