<?php
@session_start();
if ((!array_key_exists('username', $_SESSION) && array_key_exists('username', $_COOKIE)) || empty($_COOKIE) || empty($_SESSION)) {
   header('location:../index.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Admin Panel</title>
   <meta name="robots" content="noindex, nofollow">
   <meta content="" name="description">
   <meta content="" name="keywords">
   <link href="../assets/img/logo-no-background.png" rel="icon">
   <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="../assets/css/bootstrap-icons.css" rel="stylesheet">
   <link href="../assets/css/boxicons.min.css" rel="stylesheet">
   <link href="../assets/css/quill.snow.css" rel="stylesheet">
   <link href="../assets/css/quill.bubble.css" rel="stylesheet">
   <link href="../assets/css/remixicon.css" rel="stylesheet">
   <link href="../assets/css/simple-datatables.css" rel="stylesheet">
   <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
   <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between"> <a href="dashboard.php" class="logo d-flex align-items-center"> <img src="../assets/img/logo-no-background.png" alt=""> <span class="d-none d-lg-block">Admin</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
      <div class="search-bar">
         <form class="search-form d-flex align-items-center" method="POST" action="#"> <input type="text" name="query" placeholder="Search" title="Enter search keyword"> <button type="submit" title="Search"><i class="bi bi-search"></i></button></form>
      </div>
      <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
            <!-- <li class="nav-item dropdown">
                  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"> <i class="bi bi-bell"></i> <span class="badge bg-primary badge-number">4</span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                     <li class="dropdown-header"> You have 4 new notifications <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                           <h4>Lorem Ipsum</h4>
                           <p>Quae dolorem earum veritatis oditseno</p>
                           <p>30 min. ago</p>
                        </div>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                           <h4>Atque rerum nesciunt</h4>
                           <p>Quae dolorem earum veritatis oditseno</p>
                           <p>1 hr. ago</p>
                        </div>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                           <h4>Sit rerum fuga</h4>
                           <p>Quae dolorem earum veritatis oditseno</p>
                           <p>2 hrs. ago</p>
                        </div>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                           <h4>Dicta reprehenderit</h4>
                           <p>Quae dolorem earum veritatis oditseno</p>
                           <p>4 hrs. ago</p>
                        </div>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="dropdown-footer"> <a href="#">Show all notifications</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"> <i class="bi bi-chat-left-text"></i> <span class="badge bg-success badge-number">3</span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                     <li class="dropdown-header"> You have 3 new messages <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="message-item">
                        <a href="#">
                           <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                           <div>
                              <h4>Jassa</h4>
                              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                              <p>4 hrs. ago</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="message-item">
                        <a href="#">
                           <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                           <div>
                              <h4>Jassa</h4>
                              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                              <p>6 hrs. ago</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="message-item">
                        <a href="#">
                           <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                           <div>
                              <h4>Jassa</h4>
                              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                              <p>8 hrs. ago</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="dropdown-footer"> <a href="#">Show all messages</a></li>
                  </ul>
               </li> -->
            <li class="nav-item dropdown pe-3">
               <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?></span> </a>
               <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">
                     <h6><?php echo $_SESSION['name']; ?></h6>
                     <span style="text-transform: uppercase; font-weight: 700;"><?php echo $_SESSION['role']; ?></span>
                  </li>
                  <li>
                     <hr class="dropdown-divider">
                  </li>
                  <li> <a class="dropdown-item d-flex align-items-center" href="#"> <i class="bi bi-person"></i> <span>My Profile</span> </a></li>
                  <li>
                     <hr class="dropdown-divider">
                  </li>
                  <li> <a class="dropdown-item d-flex align-items-center" href="#"> <i class="bi bi-gear"></i> <span>Account Settings</span> </a></li>
                  <li>
                     <hr class="dropdown-divider">
                  </li>

                  <hr class="dropdown-divider">
            </li>
            <li> <a class="dropdown-item d-flex align-items-center" href="logout.php"> <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span> </a></li>
         </ul>
         </li>
         </ul>
      </nav>
   </header>