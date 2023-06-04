<!-- Header -->
<?php

include('headerFooter/header.php');
include('../class/category.class.php');
$category = new Category();
$id = $_GET['id'];
$category->set('id', $id);
$data = $category->getById();

@session_start();

if (isset($_POST['submit'])) {
  if (isset($_POST['CategoryEntry']) && !empty($_POST['CategoryEntry'])) {
    $category->set('name', $_POST['name']);
    $category->set('rank', $_POST['rank']);
    $category->set('status', $_POST['status']);
    $category->set('modified_by', $_SESSION['id']);
    $category->set('modified_date', date('Y-m-d H:i:s'));
    $result = $category->edit();
    if ($result) {
      $ErrMs = "";
      $msg = "Category updated Successfully with id " . $result;
    } else {
      $msg = "";
    }
  } else {
    $ErrMsg = "Category Already Taken!";
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
    <h1>Edit Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item active">Edit Category</li>

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
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Edit</strong> Category</h5>
            <form role="form" id="submitForm" method="post" noValidate>
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-10"> <input type="text" name="name" class="form-control" id="name" value="<?php echo $data->name; ?>" required>
                  <input type="hidden" name="CategoryEntry" id="CategoryEntry">
                  <span id="categoryError" style="color:red"></span>
                </div>
              </div>
              <div class="row mb-3">
                <label for="rank" class="col-sm-2 col-form-label">Category Rank</label>
                <div class="col-sm-10"> <input type="number" name="rank" class="form-control" id="rank" value="<?php echo $data->rank; ?>" required></div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                <div class="col-sm-10">
                  <div class="form-check"><label>
                      <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" <?php if ($data->status == 1) {
                                                                                                              echo "checked";
                                                                                                            }  ?>> Active
                    </label></div>
                  <div class="form-check"><label>
                      <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0" <?php if ($data->status != 1) {
                                                                                                              echo "checked";
                                                                                                            }  ?>> Inactive
                    </label></div>
                </div>


              </fieldset>

              <div> <button type="submit" name="submit" class="btn btn-primary">Update</button> <button type="reset" class="btn btn-danger">Reset</button></div>
            </form>
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