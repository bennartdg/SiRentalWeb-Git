<?php
include('server/connection.php');
include('actionLoginRequired.php');

$id = $_GET['user_id'];

$query = "SELECT * FROM users WHERE user_id = $id";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$location = "Edit Profile • ";
$location .= $row['user_name'];
include("layouts/navbar.php");


if (isset($_POST['btn_submit'])) {
  $username = $_POST['user_name'];
  $address = $_POST['user_address'];
  $phone = $_POST['user_phone'];

  $query = "UPDATE users SET 
  user_name = '$username', 
  user_address = '$address', 
  user_phone = '$phone' 
  WHERE user_id = '$id'";

  mysqli_query($conn, $query);

  header("location: profile.php?user_id='$id'");
}

if ($row['user_level'] == 0) {
  $role = "Admin";
} else if ($row['user_level'] == 1) {
  $role = "Member";
} else {
  $role = "Customer";
}

?>

<div class="container-edit-profile">
  <div class="background-profile">
    <img src="assets/background/topo.png" alt="" class="background-image" />
  </div>
  <div class="edit-profile-form">
    <div>
      <img src="assets/icon/<?php echo $role ?>.png" alt="" class="profile-image" />
    </div>
    <div>
      <h3>Edit Profile</h3>
    </div>
    <form action="" method="POST">
      <div class="text_field">
        <input type="text" name="user_name" placeholder="Current Name: <?php echo $row['user_name'] ?>" required>
      </div>
      <div class="text_field">
        <input type="text" name="user_address" placeholder="Current Address: <?php echo $row['user_address'] ?>" required>
      </div>
      <div class="text_field">
        <input type="text" name="user_phone" placeholder="Current Phone: <?php echo $row['user_phone'] ?>" required>
      </div>
      <div>
        <input type="submit" name="btn_submit" value="Submit">
      </div>
      <div class="under-button-submit">
        <div>
          <a href="profile.php?user_id=<?php echo $id ?>">Back</a>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
include('layouts/sidebar.php');
?>
</body>

</html>