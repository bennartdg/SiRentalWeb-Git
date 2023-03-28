<?php
$location = "Manage";
include('layouts/navbar.php');
include('layouts/sidebar.php');
?>

<section>
  <div class="container-manage">
    <div class="content-manage">
      <h1>Member/Customer</h1>
      <!-- Looping Disini -->
      <div class="content-data">
        <div class="col-id">
          1
        </div>
        <div class="col-name">
          Bennart Dem Gunawan
        </div>
        <div class="col-email">
          ben@gmail.com
        </div>
        <div class="col-address">
          Bandung
        </div>
        <div class="col-phone">
          089536665217
        </div>
        <div class="col-action">
          <a href=""> <!-- actionDelete.php?user_id=<> -->
            <i class="fa-solid fa-trash"></i>
          </a>
        </div>
      </div>
      <!-- Sampai Sini -->
    </div>
  </div>
</section>