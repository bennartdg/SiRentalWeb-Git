<!-- php ngambil id dari navbar select * from where user_id = id-->
<!-- import navbar -->
<!-- import sidebar -->
<?php
$location = 'Profile';
include("layouts/navbar.php");
$id=$_GET['user_id'];

$query="SELECT*FROM users WHERE user_id = $id";

$result=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

?>

<div class="container-profile">
  <div class="background-profile">
    <img src="assets/background/topo.png" alt="" class="background-image" />
  </div>
  <div class="content-profile">
    <div>
      <img src="assets/icon/Admin.png" alt="" class="profile-image" />
    </div>
    <!-- Masukin data -->
    <div class="profile-data">
      <h2><?php echo $row['user_name']?></h2>
      <p><?php echo $row['user_email']?></p>
      <p><?php if ($row['user_gender']== "M"){
        $gender = "Male";
      } else if ($row['user_gender']== 'F'){
        $gender="Female";
      } else {
        $gender="Undefined";
      }
      echo $gender;
      ?>
      </p>
      <div class="profile-data-privacy">
        <div>
          <i class="fa-solid fa-location-dot"></i>
          <p><?php echo $row['user_address']?></p>
        </div>
        <div>
          <i class="fa-solid fa-phone"></i>
          <p><?php echo $row['user_phone']?></p>
        </div>
      </div>
      <!-- Masukin sampe sini-->
      
    </div>
      <?php if ($row['user_level']== 0){
        $role = "Admin";
      } else if ($row['user_level']== 1){
        $role="Member";
      } else {
        $role="Customer";
      }
      ?>
    <div class="role" type="<?php echo $role?>">
    <?php echo $role ?>
      <!-- if level 0 type=admin, 1=member, 2=customer-->
    </div>
    <!-- panggil editprofil.php?user_id=$ -->
    <a href="" class="btn-edit-profil">
      <div>Edit Profile</div>
    </a>
  </div>
</div>
<!-- import footer -->
<?php
include('layouts/sidebar.php');
?>
</body>

</html>

<!-- cek update git hilmy -->