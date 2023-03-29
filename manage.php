<?php
$location = "Manage";
include('layouts/navbar.php');
include('layouts/sidebar.php');

$level = $_GET['user_level'];

if($level == "Member"){
  $q = 'SELECT * FROM users WHERE user_level = 1';
}else{
  $q = 'SELECT * FROM users WHERE user_level = 2';
}

$result = mysqli_query($conn, $q);

?>

<section>
  <div class="container-manage">
    <div class="content-manage">
      <h1><?php echo $level ?></h1>
      <!-- Looping Disini -->
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
            <a href="actionDelete.php?user_id=<?php echo $row['user_id']; ?>" 
            role="button" onclick="return confirm('This data will be deleted?')">
              <i class="fa-solid fa-trash"></i>
            </a>
          </div>
        </div>
      <?php } ?>
      <!-- Sampai Sini -->
    </div>
  </div>
</section>