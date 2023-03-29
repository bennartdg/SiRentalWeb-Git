<?php
$location = 'Profile';
include("layouts/navbar.php");
$id = $_GET['user_id'];

$query = "SELECT * FROM users WHERE user_id = $id";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

?>

<?php if ($row['user_level'] == 0) {
  $role = "Admin";
} else if ($row['user_level'] == 1) {
  $role = "Member";
} else {
  $role = "Customer";
}
?>

<div class="container-profile">
  <div class="background-profile">
    <img src="assets/background/topo.png" alt="" class="background-image" />
  </div>
  <div class="content-profile">
    <div>
      <img src="assets/icon/<?php echo $role; ?>.png" alt="" class="profile-image" />
    </div>
    <div class="profile-data">
      <h2><?php echo $row['user_name'] ?></h2>
      <p><?php echo $row['user_email'] ?></p>
      <p><?php if ($row['user_gender'] == "M") {
            $gender = "Male";
          } else if ($row['user_gender'] == 'F') {
            $gender = "Female";
          } else {
            $gender = "Undefined";
          }
          echo $gender;
          ?>
      </p>
      <div class="profile-data-privacy">
        <div>
          <i class="fa-solid fa-location-dot"></i>
          <p><?php echo $row['user_address'] ?></p>
        </div>
        <div>
          <i class="fa-solid fa-phone"></i>
          <p><?php echo $row['user_phone'] ?></p>
        </div>
      </div>
    </div>
    <div class="role" type="<?php echo $role ?>">
      <?php echo $role ?>
    </div>
    <a href="editProfile.php?user_id=<?php echo $row['user_id']?>" class="btn-edit-profil">
      <div>Edit Profile</div>
    </a>
  </div>
</div>
<?php
include('layouts/sidebar.php');
?>
</body>

</html>