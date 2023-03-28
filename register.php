<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link rel="icon" href="assets/brand/TitleIcon.png" />
  <title>Register</title>
</head>

<body type="register">
  <div class="container" type="register">
    <form autocomplete="off" method="POST" action="actionRegister.php">
      <h1>CREATE YOUR ACCOUNT!</h1>
      <div class="separate">
        <div>
          <div class="text_field">
            <input type="text" name="user_name" autocomplete="off" required placeholder="Username">
          </div>
          <div class="text_field">
            <input type="email" name="user_email" autocomplete="new-email" required placeholder="Email">
          </div>
          <div class="text_field">
            <input type="password" name="user_password" autocomplete="new-password" required placeholder="Password">
          </div>
          <div class="text_field">
            <input type="password" name="user_password_confirm" autocomplete="new-password" required placeholder="Confirm Password">
          </div>
        </div>
        <div>
          <div class="text_field">
            <input type="text" name="user_address" autocomplete="off" required placeholder="Address">
          </div>
          <div class="text_field">
            <input type="text" name="user_phone" autocomplete="off" required placeholder="Phone">
          </div>
          <div>
            <div class="radios">
              <h5>Gender:</h5>
              <input type="radio" name="user_gender" id="male" value="M" require><label for="male" type="register">Male</label>
              <input type="radio" name="user_gender" id="female" value="F" require><label for="female" type="register">Female</label>
            </div>
            <div class="radios">
              <h5>Register as:</h5>
              <input type="radio" name="user_level" id="member" value="1" require><label for="member" type="register">Member</label>
              <input type="radio" name="user_level" id="customer" value="2" require><label for="customer" type="register">Customer</label>
            </div>
          </div>
        </div>
      </div>
      <div>
        <input type="submit" id="register-btn" name="register_btn" value="Register" />
      </div>
      <div class="under-button-submit">
        <div>
          <a href="index.php">Back</a>
        </div>
        <div>
          Already have an account?
          <a href="login.php" role="button">Login Now!</a>
        </div>
      </div>
      <div class="alert" role="alert">
        <?php if (isset($_GET['error'])) {
          echo $_GET['error'];
        }
        ?>
      </div>
      <div class="message">
        <?php if (isset($_GET['message'])) {
          echo $_GET['message'];
        }
        ?>
      </div>
    </form>
  </div>
</body>

</html>