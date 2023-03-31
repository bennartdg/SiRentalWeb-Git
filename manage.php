<?php
$location = "Manage";
include('layouts/navbar.php');
include('layouts/sidebar.php');

$level = $_GET['user_level'];

if ($level == "Member") {
  if (isset($_POST['find']) && $_POST['keyword'] != '') {
    $keyword = $_POST['keyword'];
    $q = "SELECT * FROM users 
    WHERE user_level = 1 AND
    (user_name LIKE '%$keyword%' OR
    user_email LIKE '%$keyword%' OR
    user_address LIKE '%$keyword%')";
  } else {
    $q = 'SELECT * FROM users WHERE user_level = 1';
  }
} else {
  if (isset($_POST['find'])) {
    $keyword = $_POST['keyword'];
    $q = "SELECT * FROM users 
    WHERE user_level = 2 AND
    (user_name LIKE '%$keyword%' OR
    user_email LIKE '%$keyword%' OR
    user_address LIKE '%$keyword%')";
  } else {
    $q = 'SELECT * FROM users WHERE user_level = 2';
  }
}

$result = mysqli_query($conn, $q);

?>

<section>
  <div class="container-manage">
    <div class="content-manage">
      <div class="manage-head">
        <div>
          <h1><?php echo $level ?></h1>
        </div>
        <div>
          <form action="" method="POST">
            <div class="search_field">
              <input type="text" name="keyword" placeholder="Find">
              <div>
                <button class="find_btn" name="find"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="content-data">
          <div class="col-id">
            <?php echo $row['user_id'] ?>
          </div>
          <div class="col-name">
            <?php echo $row['user_name'] ?>
          </div>
          <div class="col-email">
            <?php echo $row['user_email'] ?>
          </div>
          <div class="col-address">
            <?php echo $row['user_address'] ?>
          </div>
          <div class="col-phone">
            <?php echo $row['user_phone'] ?>
          </div>
          <div class="col-action">
            <a href="actionDelete.php?user_id=<?php echo $row['user_id']; ?>" role="button" onclick="return confirm('This data will be deleted?')">
              <i class="fa-solid fa-trash"></i>
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>