<!-- Header -->
<?php

include('headerFooter/header.php');
include('../class/category.class.php');
include('../class/news.class.php');

$category = new Category();
$categoryList = $category->retrieve();

$news = new News();
$news->set('id', $_GET['id']);
$retrieveData = $news->getById();

@session_start();
if (isset($_POST['submit'])) {
  $news->set('title', $_POST['title']);
  $news->set('short_detail', $_POST['short_detail']);
  $news->set('detail', $_POST['detail']);
  $news->set('featured', $_POST['featured']);
  $news->set('breaking', $_POST['breaking']);
  $news->set('status', $_POST['status']);
  $news->set('slider_key', $_POST['slider_key']);
  $news->set('category_id', $_POST['category_id']);
  $news->set('modified_by', $_SESSION['id']);
  $news->set('modified_date', date('Y-m-d H:i:s'));
  if (empty($_FILES['thumb_img']['name'])) {
    $news->set('thumb_img', $_POST['old_image']);
  } else {
    if ($_FILES['thumb_img']['error'] == 0) {
      if (
        $_FILES['thumb_img']['type'] == "image/png" ||
        $_FILES['thumb_img']['type'] == "image/jpg" ||
        $_FILES['thumb_img']['type'] == "image/jpeg"
      ) {
        if ($_FILES['thumb_img']['size'] <= 1024 * 1024) {
          $imageName = uniqid() . $_FILES['thumb_img']['name'];
          move_uploaded_file(
            $_FILES['thumb_img']['tmp_name'],
            '../images/' . $imageName
          );
          $news->set('thumb_img', $imageName);
        } else {
          $imageError = "Error, Exceeded 1mb!";
        }
      } else {
        $imageError = "Invalid Image!";
      }
    }
  }
  if (empty($_FILES['slider_img']['name'])) {
    $news->set('slider_img', $_POST['old_image']);
  } else {
    if ($_FILES['slider_img']['error'] == 0) {
      if (
        $_FILES['slider_img']['type'] == "image/png" ||
        $_FILES['slider_img']['type'] == "image/jpg" ||
        $_FILES['slider_img']['type'] == "image/jpeg"
      ) {
        if ($_FILES['slider_img']['size'] <= 1024 * 1024) {
          $imageName = uniqid() . $_FILES['slider_img']['name'];
          move_uploaded_file(
            $_FILES['slider_img']['tmp_name'],
            '../images/' . $imageName
          );
          $news->set('slider_img', $imageName);
        } else {
          $imageError = "Error, Exceeded 1mb!";
        }
      } else {
        $imageError = "Invalid Image!";
      }
    }
  }

  $result = $news->edit();
  if ($result) {
    $ErrMs = "";
    $news->set('id', $_GET['id']);
    $retrieveData = $news->getById();
    $msg = "News updated Successfully with id " . $result;
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
    <h1>Edit News</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item">News</li>
        <li class="breadcrumb-item active">Edit News</li>

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
          <h5 class="card-title"><strong>Edit</strong> News</h5>
          <form role="form" id="submitForm" method="post" enctype="multipart/form-data" noValidate>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">News Title</label>
              <div class="col-sm-10"> <input type="text" class="form-control" name="title" value="<?php echo $retrieveData->title;  ?>" required></div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">News Category</label>
              <div class="col-sm-10">

                <select class="form-select" name="category_id" required>
                  <option value="">Select Category</option>
                  <?php foreach ($categoryList as $category) {  ?>
                    <option value="<?php echo $category['id'];  ?>" <?php if ($retrieveData->category_id == $category['id']) {
                                                                      echo "selected";
                                                                    }  ?>>
                      <?php echo $category['name'];  ?>
                    </option>
                  <?php  } ?>
                </select>
              </div>
            </div>





            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Short Detail</label>
              <div class="col-sm-10"><textarea class="form-control" rows="3" name="short_detail" required><?php echo $retrieveData->short_detail;  ?></textarea></div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Detail</label>
              <div class="col-sm-10"><textarea class="form-control ckeditor" rows="3" name="detail" required><?php echo $retrieveData->detail;  ?></textarea></div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Thumbnail</label>
              <div class="col-sm-6" enctype="multipart/form-data"> <input type="hidden" value="<?php echo $retrieveData->thumb_img;  ?>" name="old_image">
                <img src="../images/<?php echo $retrieveData->thumb_img;  ?>" height="200" width="200" alt="" srcset=""><input class="form-control" type="file" name="thumb_img" required>
              </div><label class="col-sm-4" for="" style="color: red;">330px * 330px</label>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Slider Image</label>
              <div class="col-sm-6" enctype="multipart/form-data"> <input type="hidden" value="<?php echo $retrieveData->slider_img;  ?>" name="old_image">
                <img src="../images/<?php echo $retrieveData->slider_img;  ?>" height="120" width="200" alt="" srcset=""><input class="form-control" type="file" name="slider_img" required>
              </div><label class="col-sm-4" for="" style="color: red;">1600px * 1000px</label>
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Featured News</legend>
              <div class="col-sm-10">
                <div class="form-check"><label>
                    <input class="form-check-input" type="radio" name="featured" id="optionsRadios2" value="1" <?php if ($retrieveData->featured == 1) {
                                                                                                                  echo "checked";
                                                                                                                }  ?>> Yes
                  </label></div>
                <div class="form-check"> <label>
                    <input class="form-check-input" type="radio" name="featured" id="optionsRadios2" value="0" <?php if ($retrieveData->featured != 1) {
                                                                                                                  echo "checked";
                                                                                                                }  ?>> No
                  </label></div>
              </div>
            </fieldset>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Breaking News</legend>
              <div class="col-sm-10">
                <div class="form-check"><label>
                    <input class="form-check-input" type="radio" name="breaking" id="optionsRadios2" value="1" <?php if ($retrieveData->breaking == 1) {
                                                                                                                  echo "checked";
                                                                                                                }  ?>> Yes
                  </label></div>
                <div class="form-check"> <label>
                    <input class="form-check-input" type="radio" name="breaking" id="optionsRadios2" value="0" <?php if ($retrieveData->breaking != 1) {
                                                                                                                  echo "checked";
                                                                                                                }  ?>> No
                  </label></div>
              </div>
            </fieldset>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Slider Key</legend>
              <div class="col-sm-10">
                <div class="form-check"><label>
                    <input class="form-check-input" type="radio" name="slider_key" id="optionsRadios2" value="1" <?php if ($retrieveData->slider_key == 1) {
                                                                                                                    echo "checked";
                                                                                                                  }  ?>> Yes
                  </label></div>
                <div class="form-check"> <label>
                    <input class="form-check-input" type="radio" name="slider_key" id="optionsRadios2" value="0" <?php if ($retrieveData->slider_key != 1) {
                                                                                                                    echo "checked";
                                                                                                                  }  ?>> No
                  </label></div>
              </div>
            </fieldset>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check"><label>
                    <input class="form-check-input" type="radio" name="status" id="optionsRadios2" value="1" <?php if ($retrieveData->status == 1) {
                                                                                                                echo "checked";
                                                                                                              }  ?>> Active
                  </label></div>
                <div class="form-check"> <label>
                    <input class="form-check-input" type="radio" name="status" id="optionsRadios2" value="0" <?php if ($retrieveData->status != 1) {
                                                                                                                echo "checked";
                                                                                                              }  ?>> Inactive
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