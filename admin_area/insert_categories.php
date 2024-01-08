<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title = $_POST['cat_title'];
  $select_query = "SELECT * FROM `categories` WHERE category_title='$category_title'";
  $result_select = mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  if($number > 0){
    echo "<script>alert('Kategori zaten mevcut');</script>";
  }
  else {
    $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
    $result = mysqli_query($con, $insert_query);
    if($result){
      echo "<script>alert('Kategori eklendi');</script>";
    }
    else {
      echo "<script>alert('Kategori eklerken bir hata oluştu');</script>";
    }
  }
}
?>
<h2 class="text-center">Kategori</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-3">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Kategori" aria-label="insert_brands" aria-describedby="basic-addon1">
  </div>

  <div class="input-group w-90 mb-3 m-auto">
    <input type="submit" class="form-control" name="insert_cat" value="Kategori Ekle" aria-label="insert_category" aria-describedby="basic-addon1">
  </div>
</form>
