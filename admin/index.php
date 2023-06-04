<?php
@session_start();
if (array_key_exists('username', $_SESSION) && array_key_exists('username', $_COOKIE)) {
  header('location:myweb/dashboard.php');
}
include('class/user.class.php');

$userObject = new User();
$error = [];

if (isset($_POST['submit'])) {
  if (isset($_POST['username']) && !empty($_POST['username'])) {
    $userObject->username = $_POST['username'];
  } else {
    $error['username'] = "This field is required!";
  }
  if (isset($_POST['password']) && !empty($_POST['password'])) {
    $userObject->password = $_POST['password'];
  } else {
    $error['password'] = "This field is required!";
  }

  if (count($error) < 1) {
    $status =  $userObject->login();
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <title>Admin Panel</title>
</head>

<body>

  <div class="content">
    <div class="logo"><img src="assets/img/logo.png" alt="">&nbsp;<span>Admin</span></div>
    <form class="loginForm" id="loginForm" method="post" action="" noValidate>
      <div class="form-content">
        <div class="title">
          <h3>Please LogIn</h3>
        </div>

        <hr>
        <div class="txt_field">
          <h4>USERNAME</h4>
          <input type="text" name="username" id="username" placeholder="Enter Your Username!" required>
        </div>
        <small><?php if (isset($error['username'])) {
                  echo $error['username'];
                } ?></small>
        <div class=" txt_field">
          <h4>PASSWORD</h4>
          <input type="password" name="password" id="password" placeholder="Enter Your Password!" required>
        </div>
        <small><?php if (isset($error['password'])) {
                  echo $error['password'];
                } ?></small>
        <?php
        if (isset($status)) {
          echo "<small>$status</small>";
        }
        ?>
        <div class="remember_me"><input type="checkbox" id="remember_me" name="remember_me" value="">
          <label for="remember_me">Remember Me</label>
        </div>

        <input type="submit" name="submit" value="Log In">
      </div>

    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('#loginForm').validate();
    })
  </script>
</body>


</html>