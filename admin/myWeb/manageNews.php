<!-- Header -->
<?php

include('headerFooter/header.php');
include('../class/news.class.php');
@session_start();
if (isset($_SESSION['message']) && $_SESSION['message'] != "") {
  $successMessage = $_SESSION['message'];
  $_SESSION['message'] = "";
}
$newsObject = new News();

$dataList = $newsObject->retrieve();
?>

<!--Header End-->

<!-- Siderbar -->
<?php
include('sidebar.php');

?>
<!-- Siderbar End -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Manage News</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item">News</li>
        <li class="breadcrumb-item active">Manage News</li>

      </ol>
    </nav>
  </div>
  <?php
  if (isset($successMessage)) {
    echo '<div class="alert alert-success">' . $successMessage . '</div>';
  }
  ?>
  <a href="addNews.php"><button class="btn btn-primary" style="margin: 1rem 0;"><i class="bi bi-plus-lg"></i>Add News</button></a>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Manage</strong> News</h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Short Detail</th>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Slider</th>
                  <th scope="col">Featured</th>
                  <th scope="col">Breaking</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>

                <?php foreach ($dataList as $key => $news) { ?>
                  <tr scope="row">
                    <td> <?php echo $key + 1; ?></td>
                    <td> <?php echo $news['title']; ?> </td>
                    <td> <?php echo substr($news['short_detail'], 0, 90); ?>... </td>
                    <td>
                      <img height='100' width='100' src="../images/<?php echo $news['thumb_img']; ?>" alt="" srcset="">
                    </td>
                    <td>
                      <img height='50' width='100' src="../images/<?php echo $news['slider_img']; ?>" alt="" srcset="">
                    </td>
                    <td><?php
                        if ($news['featured'] == 1) {
                          echo "<span class='badge bg-success'>Yes</span>";
                        } else {
                          echo "<span class='badge bg-danger'>No</span>";
                        }
                        ?>
                    </td>
                    <td><?php
                        if ($news['breaking'] == 1) {
                          echo "<span class='badge bg-success'>Yes</span>";
                        } else {
                          echo "<span class='badge bg-danger'>No</span>";
                        }
                        ?>
                    </td>
                    <td><?php
                        if ($news['status'] == 1) {
                          echo "<span class='badge bg-success'>Active</span>";
                        } else {
                          echo "<span class='badge bg-danger'>Inactive</span>";
                        }
                        ?>
                    </td>

                    <td width="15%">
                      <a href="editNews.php?id=<?php echo $news['id']; ?>" role="btn" class="btn btn-primary"><i class="ri ri-edit-2-fill"></i>&nbsp;Edit</a>
                      <a href="deleteNews.php?id=<?php echo $news['id']; ?>" role="btn" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="bi bi-trash"></i>&nbsp;Delete</a>
                    </td>
                  </tr>
                <?php  } ?>


              </tbody>
            </table>
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