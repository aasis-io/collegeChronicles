<!-- Header -->
<?php

include('headerFooter/header.php');
include('../class/advertisement.class.php');

$advertisement = new Advertisement();

@session_start();
if (isset($_POST['submit'])) {
  $advertisement->set('rank', $_POST['rank']);
  $advertisement->set('linkforad', $_POST['linkforad']);
  $advertisement->set('slider_key', $_POST['slider_key']);

  $advertisement->set('status', $_POST['status']);
  $advertisement->set('created_by', $_SESSION['id']);
  $advertisement->set('created_date', date('Y-m-d H:i:s'));
  if ($_FILES['image']['error'] == 0) {
    if (
      $_FILES['image']['type'] == "image/png" ||
      $_FILES['image']['type'] == "image/gif" ||

      $_FILES['image']['type'] == "image/jpg" ||
      $_FILES['image']['type'] == "image/jpeg"
    ) {
      if ($_FILES['image']['size'] <= 1024 * 1024) {
        $imageName = uniqid() . $_FILES['image']['name'];
        move_uploaded_file(
          $_FILES['image']['tmp_name'],
          '../images/' . $imageName
        );
        $advertisement->set('image', $imageName);
      } else {
        $imageError = "Error, Exceeded 1mb!";
      }
    } else {
      $imageError = "Invalid Image!";
    }
  }
  if ($_FILES['slider_img']['error'] == 0) {
    if (
      $_FILES['slider_img']['type'] == "image/png" ||
      $_FILES['slider_img']['type'] == "image/jpg" ||
      $_FILES['slider_img']['type'] == "image/gif" ||

      $_FILES['slider_img']['type'] == "image/jpeg"
    ) {
      if ($_FILES['slider_img']['size'] <= 1024 * 1024) {
        $imageName = uniqid() . $_FILES['slider_img']['name'];
        move_uploaded_file(
          $_FILES['slider_img']['tmp_name'],
          '../images/' . $imageName
        );
        $advertisement->set('slider_img', $imageName);
      } else {
        $imageError = "Error, Exceeded 1mb!";
      }
    } else {
      $imageError = "Invalid Image!";
    }
  }
  $result = $advertisement->save();
  if (is_integer($result)) {
    $ErrMs = "";
    $msg = "Advertisement inserted Successfully with id " . $result;
  } else {
    $msg = "";
  }
}
?>

<!--Header End-->

<!-- Siderbar -->
<?php
include('sidebar.php');

?>
<!-- Siderbar End -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Advertisement</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item">Advertisement</li>
        <li class="breadcrumb-item active">Add Advertisement</li>

      </ol>
    </nav>
  </div>
  <?php if (isset($msg)) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-circle me-1"></i><?php echo $msg;  ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
  <?php  } ?>
  <?php if (isset($ErrMsg)) { ?>
    <div class="alert alert-danger alert-dismissible fade show"><i class="bi bi-exclamation-octagon me-1"></i><?php echo $ErrMsg;  ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
  <?php  } ?>
  <section class="section">

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><strong>Add</strong> Advertisement</h5>
          <form role="form" id="submitForm" method="post" enctype="multipart/form-data" noValidate>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Advertisement Rank</label>
              <div class="col-sm-10"> <input type="number" class="form-control" name="rank" required></div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Link For Ad</label>
              <div class="col-sm-10"> <input type="link" class="form-control" name="linkforad" required></div>
            </div>





            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-6" enctype="multipart/form-data"> <input class="form-control" type="file" name="image" required></div><label class="col-sm-4" for="" style="color: red;">size of ad</label>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Banner Image</label>
              <div class="col-sm-6" enctype="multipart/form-data"> <input class="form-control" type="file" name="slider_img" required></div><label class="col-sm-4" for="" style="color: red;">800px * 500px</label>
            </div>

            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Slider Key</legend>
              <div class="col-sm-10">
                <div class="form-check"><label>
                    <input class="form-check-input" type="radio" name="slider_key" id="optionsRadios2" value="1" checked> Yes
                  </label></div>
                <div class="form-check"> <label>
                    <input class="form-check-input" type="radio" name="slider_key" id="optionsRadios2" value="0"> No
                  </label></div>
              </div>
            </fieldset>




            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check"><label>
                    <input class="form-check-input" type="radio" name="status" id="optionsRadios2" value="1" checked> Active
                  </label></div>
                <div class="form-check"> <label>
                    <input class="form-check-input" type="radio" name="status" id="optionsRadios2" value="0"> Inactive
                  </label></div>
              </div>
            </fieldset>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10"> <button type="submit" class="btn btn-primary" name="submit">Submit</button></div>
            </div>
          </form>
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
<script src="../assets/js/ckeditor/ckeditor.js"></script>

<script>
  $(document).ready(function() {
    $('#name').keyup(function() {
      const value = $("#name").val();
      $.ajax({
        url: "checkCategoryName.php",
        method: "post",
        dataType: "text",
        data: {
          'categoryName': value
        },
        success: function(res) {
          if (res != "success") {
            $("#categoryError").text(res);
            $("#CategoryEntry").val("");
          } else {
            $("#categoryError").text("");
            $("#CategoryEntry").val("success");

          }
        }
      })
    })
  })
</script>