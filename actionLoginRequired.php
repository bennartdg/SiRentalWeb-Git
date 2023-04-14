<?php

//this file is to avoid an access for a page without login session!

if (!isset($_SESSION['logged_in'])) {
  header('location: login.php?message=You need to Login to access that page!');
}
