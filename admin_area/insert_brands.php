<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title = $_POST['brand_title'];
  $select_query = "SELECT * FROM `brands` WHERE brand_title='$brand_title'";
  $result_select = mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  if($number > 0){
    echo "<script>alert('Yayınevi zaten mevcut');</script>";
  }
  else {
    $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
    $result = mysqli_query($con, $insert_query);
    if($result){
      echo "<script>alert('Yayınevi eklendi');</script>";
    }
    else {
      echo "<script>alert('Yayınevi eklerken bir hata oluştu');</script>";
    }
  }
}
?>
<h2 class="text-center">Yayınevi</h2>

<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-3">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="brand_title" placeholder="Yayınevi" aria-label="insert_brands" aria-describedby="basic-addon1">
  </div>

  <div class="input-group w-90 mb-3 m-auto">
    <input type="submit" class="form-control" name="insert_brand" value="Yayınevi Ekle" aria-label="insert_brand" aria-describedby="basic-addon1">
  </div>
</form>
