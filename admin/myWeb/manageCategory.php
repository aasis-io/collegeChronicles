<!-- Header -->
<?php

include('headerFooter/header.php');
include('../class/category.class.php');
@session_start();
if (isset($_SESSION['message']) && $_SESSION['message'] != "") {
   $successMessage = $_SESSION['message'];
   $_SESSION['message'] = "";
}
$categoryObject = new Category();

$dataList = $categoryObject->retrieve();
?>

<!--Header End-->

<!-- Siderbar -->
<?php
include('sidebar.php');

?>
<!-- Siderbar End -->
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Manage Category</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item">Category</li>
            <li class="breadcrumb-item active">Manage Category</li>
         </ol>
      </nav>
   </div>
   <?php
   if (isset($successMessage)) {
      echo '<div class="alert alert-success">' . $successMessage . '</div>';
   }
   ?>

   <a href="addCategory.php"><button class="btn btn-primary" style="margin: 1rem 0;"><i class="bi bi-plus-lg"></i>Add Category</button></a>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <h5 class="card-title"><strong>Manage</strong> Category</h5>
                  <table class="table datatable">
                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Rank</th>
                           <th scope="col">Ststus</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($dataList as $key => $category) { ?>
                           <tr scope="row">
                              <td> <?php echo $key + 1; ?></td>
                              <td> <?php echo $category['name']; ?> </td>
                              <td> <?php echo $category['rank']; ?> </td>
                              <td><?php
                                    if ($category['status'] == 1) {
                                       echo "<span class='badge bg-success'>Active</span>";
                                    } else {
                                       echo "<span class='badge bg-danger'>Inactive</span>";
                                    }
                                    ?>
                              </td>

                              <td width="20%">
                                 <a href="editCategory.php?id=<?php echo $category['id']; ?>" role="btn" class="btn btn-primary"><i class="ri ri-edit-2-fill"></i>&nbsp;Edit</a>
                                 <a href="deleteCategory.php?id=<?php echo $category['id']; ?>" role="btn" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="bi bi-trash"></i>&nbsp;Delete</a>
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