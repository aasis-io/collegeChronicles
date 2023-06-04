<!-- Header -->
<?php

include('headerFooter/header.php');

?>

<!--Header End-->

<!-- Siderbar -->
<?php
include('sidebar.php');

?>
<!-- Siderbar End -->
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
         </ol>
      </nav>
   </div>
   <section class="section dashboard">
      <div class="row">
         <div class="col-lg-12">
            <div class="row">

               <div class="col-xxl-4 col-md-6">
                  <a href="" class="item-wrapper">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Home <span>| </span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa-solid fa-house-chimney"></i></div>

                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-xxl-4 col-md-6">
                  <a href="manageCategory.php">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Category <span>| </span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa-solid fa-gears"></i></div>

                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-xxl-4 col-md-6">
                  <a href="manageNews.php">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">News <span>| </span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa-solid fa-newspaper"></i></div>

                           </div>
                        </div>
                     </div>
                  </a>
               </div>

               <div class="col-xxl-4 col-md-6">
                  <a href="manageAdvertisement.php">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Advertisement <span>| </span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa-solid fa-rectangle-ad"></i></div>

                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-xxl-4 col-md-6">
                  <a href="#">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Home Slide <span>| </span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa-solid fa-pen-to-square"></i></div>

                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-xxl-4 col-md-6">
                  <a href="#">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Advertisement <span>| </span></h5>
                           <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa-solid fa-camera"></i></div>

                           </div>
                        </div>
                     </div>
                  </a>
               </div>

            </div>
         </div>

      </div>
   </section>
</main>


<!-- Footer -->
<?php

include('headerFooter/footer.php');

?>
<!-- Footer End -->