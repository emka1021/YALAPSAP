<?php
if(isset($_GET['delete_brands'])){
    $delete_brands = $_GET['delete_brands'];
    $delete_query = "Delete from `categories` where category_id = $delete_brands";
    $result = mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Yayınevi Başarıyla Silindi')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}
?>