<!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
  <div class="row py-4">
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
      <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
      <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
      <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
      <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
      <div class="d-flex justify-content-start">
        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
        <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
      <div class="mb-3">
        <div class="mb-2">
          <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
          <a class="text-body" href=""><small>Jan 01, 2045</small></a>
        </div>
        <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
      </div>
      <div class="mb-3">
        <div class="mb-2">
          <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
          <a class="text-body" href=""><small>Jan 01, 2045</small></a>
        </div>
        <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
      </div>
      <div class="">
        <div class="mb-2">
          <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
          <a class="text-body" href=""><small>Jan 01, 2045</small></a>
        </div>
        <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
      <div class="m-n1">
        <?php
        foreach ($categoryList as $category) {
        ?>

          <a href="" class="btn btn-sm btn-secondary m-1"><?php echo $category['name']; ?></a>

        <?php } ?>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
      <div class="row">
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="img/news-110x110-2.jpg" alt=""></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="img/news-110x110-3.jpg" alt=""></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="img/news-110x110-4.jpg" alt=""></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="img/news-110x110-5.jpg" alt=""></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
  <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.

  </p>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<div id="progress">
  <span id="progress-value"><i class="fa-solid fa-chevron-up"></i></span>
</div>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<script>
  var today = new Date();
  var date = today.getDate();
  var monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];
  var month = monthNames[today.getMonth()];
  var year = today.getFullYear();
  var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  var day = days[today.getDay()];

  document.getElementById('datetime').innerHTML = day + ', ' + month + ' ' + date + ', ' + year + ' ';
</script>
<script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>
</body>

</html>