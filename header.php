<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Daily Accent-Search, Explore, Discover</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="admin/assets/img/favicon.png" rel="icon">
  <link href="admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Topbar Start -->
  <div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
      <div class="col-lg-9">
        <nav class="navbar navbar-expand-sm bg-dark p-0">
          <ul class="navbar-nav ml-n2">
            <li class="nav-item border-right border-secondary">
              <a class="nav-link text-body small" href="#" id="datetime"></a>
            </li>
            <li class="nav-item border-right border-secondary">
              <a class="nav-link text-body small" href="#">Advertise</a>
            </li>
            <li class="nav-item border-right border-secondary">
              <a class="nav-link text-body small" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-body small" href="#">Login</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="col-lg-3 text-right d-none d-md-block">
        <nav class="navbar navbar-expand-sm bg-dark p-0">
          <ul class="navbar-nav ml-auto mr-n2">
            <li class="nav-item">
              <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
      <div class="col-lg-4">
        <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
          <!-- <h1 class="m-0 display-4 text-uppercase text-primary">Daily<span class="text-secondary font-weight-normal">Accent</span></h1> -->
          <img src="img/logo.png" alt="" width="400px">
        </a>
      </div>
      <div class="col-lg-8 text-center text-lg-right">
        <?php
        foreach ($adlist as $activeads) {
        ?> <a href="<?php echo $activeads['linkforad']; ?>">
            <img class="img-fluid" src="admin/images/<?php echo $activeads['image']; ?>" alt="">
          </a> <?php
              }
                ?>
      </div>
    </div>
  </div>
  <!-- Topbar End -->