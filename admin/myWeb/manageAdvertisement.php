<!-- Header -->
<?php

include('headerFooter/header.php');
include('../class/advertisement.class.php');
@session_start();
if (isset($_SESSION['message']) && $_SESSION['message'] != "") {
  $successMessage = $_SESSION['message'];
  $_SESSION['message'] = "";
}
$adsObject = new Advertisement();

$dataList = $adsObject->retrieve();
?>

<!--Header End-->

<!-- Siderbar -->
<?php
include('sidebar.php');

?>
<!-- Siderbar End -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Manage Advertisement</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item">News</li>
        <li class="breadcrumb-item active">Manage Advertisement</li>

      </ol>
    </nav>
  </div>
  <?php
  if (isset($successMessage)) {
    echo '<div class="alert alert-success">' . $successMessage . '</div>';
  }
  ?>
  <a href="addAdvertisement.php"><button class="btn btn-primary" style="margin: 1rem 0;"><i class="bi bi-plus-lg"></i>Add Advertisement</button></a>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Manage</strong> Advertisement</h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Rank</th>
                  <th scope="col">Link For Ad</th>
                  <th scope="col">Image</th>
                  <th scope="col">Banner</th>
                  <th scope="col">Status</th>
                  <th scope="col">Slider Key</th>

                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>

                <?php foreach ($dataList as $key => $advertisement) { ?>
                  <tr scope="row">
                    <td> <?php echo $key + 1; ?></td>
                    <td> <?php echo $advertisement['rank']; ?> </td>
                    <td> <?php echo $advertisement['linkforad']; ?>... </td>
                    <td>
                      <img height='20' width='100' src="../images/<?php echo $advertisement['image']; ?>" alt="" srcset="">
                    </td>
                    <td>
                      <img height='65' width='104' src="../images/<?php echo $advertisement['slider_img']; ?>" alt="" srcset="">
                    </td>

                    <td><?php
                        if ($advertisement['status'] == 1) {
                          echo "<span class='badge bg-success'>Active</span>";
                        } else {
                          echo "<span class='badge bg-danger'>Inactive</span>";
                        }
                        ?>
                    </td>

                    <td><?php
                        if ($advertisement['slider_key'] == 1) {
                          echo "<span class='badge bg-success'>Active</span>";
                        } else {
                          echo "<span class='badge bg-danger'>Inactive</span>";
                        }
                        ?>
                    </td>

                    <td width="15%">
                      <a href="editAds.php?id=<?php echo $advertisement['id']; ?>" role="btn" class="btn btn-primary"><i class="ri ri-edit-2-fill"></i>&nbsp;Edit</a>
                      <a href="deleteAds.php?id=<?php echo $advertisement['id']; ?>" role="btn" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="bi bi-trash"></i>&nbsp;Delete</a>
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