<?php
if(isset($_GET['edit_brands'])){
    $edit_brands = $_GET['edit_brands'];
    $get_brands = "Select * from `brands` where brand_id = $edit_brands";
    $result = mysqli_query($con,$get_brands);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
}

if(isset($_POST['edit_brand'])){
    $brand_title = $_POST['brand_title'];
    $update_query = "update `brands` set brand_title = '$brand_title' where brand_id = $edit_brands";
    $result_brand = mysqli_query($con,$update_query);
    if($result_brand){
        echo "<script>alert('Yayınevi Başarıyla Güncellendi')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>"; 
    }
}
?>
<div class="container mt-5">
    <h1 class="text-center">Yayınevi Düzenle</h1>
    <form action="" method="post" >
        <div class="form outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Yayınevi Adı</label>
            <input type="text" id="brand_title"  value= '<?php echo $brand_title?>' name="brand_title" class="form-control" required="required">
        </div>
        <div>
        <div class="w-50 m-auto my-5">
            <input type="submit" name="edit_brand" class="btn btn-info px-3 mb-3" value="Güncelle">
        </div>
        </div>
</div>