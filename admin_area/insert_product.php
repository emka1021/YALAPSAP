<?php

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_keywords = $_POST['product_keywords'];
    $description = $_POST['description'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // boş kontrol
    if ($product_title == '' or $description == '' or $product_keywords == '' or $product_category == '' or $product_brands == '' or $product_price == '' or
        $product_image1 == '' or  $product_image2 == '' or  $product_image3 == '') {
        echo "<script>alert('Lütfen tüm alanları doldurun.')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // insert query
        $insert_products = "INSERT INTO products (product_title, description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) 
        VALUES ('$product_title','$description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        
        $result_query = mysqli_query($con, $insert_products);
        
        if ($result_query) {
            echo "<script>alert('Ürün başarıyla eklendi.')</script>";
        } else {
            echo "<script>alert('Ürün eklenirken bir hata oluştu.')</script>";
        }
    }
}
?>


    <div class="container">
        <h1 class="text-center">Ürün Ekle</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <label for="product_title" class="form-label">Ürün Adı</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Ürün adını girin" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4">
                <label for="product_keywords" class="form-label">Ürün Anahtar Kelimeler</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Ürün anahtar kelimelerini girin" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4">
                <label for="description" class="form-label">Ürün Açıklaması</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Ürün açıklamasını girin" autocomplete="off" required="required">
            </div>

            <!-- kategori -->
            <div class="form-outline mb-4">
                <label for="product_category" class="form-label">Ürün Kategorisi</label>
                <select name="product_category" id="category-select" class="form-select" required="required">
                    <option value="">Kategori seçin</option>
                    <?php
                    $select_query = "SELECT * FROM categories";
                    $result_query = mysqli_query($con, $select_query);

                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];

                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- marka -->
            <div class="form-outline mb-4">
                <label for="product_brands" class="form-label">Ürün Markası</label>
                <select name="product_brands" id="brand-select" class="form-select" required="required">
                    <option value="">Marka seçin</option>
                    
                    <?php
                    $select_query = "SELECT * FROM brands";
                    $result_query = mysqli_query($con, $select_query);

                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];

                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="form-outline mb-4">
                <label for="product_image1" class="form-label">Ürün Resmi 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4">
                <label for="product_image2" class="form-label">Ürün Resmi 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4">
                <label for="product_image3" class="form-label">Ürün Resmi 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            
            <div class="form-outline mb-4">
                <label for="product_price" class="form-label">Ürün Fiyatı</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Ücret girin" autocomplete="off" required="required">
            </div>
           
            <div class="form-outline mb-4">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Ürün Ekle">
            </div>
        </form>
    </div>

