<!-- php ngambil id dari navbar select * from where user_id = id-->
<!-- import navbar -->
<!-- import sidebar -->
<?php
$location = 'Profile';
include("layouts/navbar.php");
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
      <h2>Bennart Dem Gunawan</h2>
      <p>ben@gmail.com</p>
      <p>Laki-laki</p>
      <div class="profile-data-privacy">
        <div>
          <i class="fa-solid fa-location-dot"></i>
          <p>Bandung</p>
        </div>
        <div>
          <i class="fa-solid fa-phone"></i>
          <p>Phone</p>
        </div>
      </div>
      <!-- Masukin sampe sini-->
    </div>
    <div class="role" type="admin">
      <!-- if level 0 type=admin, 1=member, 2=customer-->
      Admin
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