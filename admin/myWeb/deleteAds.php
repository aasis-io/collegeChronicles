
<?php
$id = $_GET['id'];

include('../class/advertisement.class.php');
$adsObject = new Advertisement();
$adsObject->set('id', $id);
$status = $adsObject->delete();
@session_start();
if ($status == 'success') {
  $_SESSION['message'] = 'Category Deleted Successfully!';
  header('location:manageAdvertisement.php');
} else {
  $_SESSION['message'] = "Failed To Delete Category!";
  header('location:manageAdvertisement.php');
}
?>