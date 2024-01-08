<?php
// include('./includes/connect.php');

// ürün getirme
function getProducts()
{
    global $con; // $con değişkenini global olarak tanımla
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $description = $row['description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$description</p>
                    <h5 class='card-title'>Ücret: $product_price</h5>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Sepete ekle</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ürüne bak</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}

// özel kategori
function get_unique_categories()
{
    global $con;
    if (isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $category_id = $_GET['category'];
            $select_query = "SELECT * FROM products where category_id=$category_id";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if ($num_of_rows == 0) {
                echo "<h2>Maalesef ürün yok </h2>";
            }
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $description = $row['description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$description</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Sepete ekle</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ürüne bak</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}
//bütün komutlar
function get_all_products()
{
    global $con; // $con değişkenini global olarak tanımla
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM products ORDER BY RAND()";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $description = $row['description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$description</p>
                    <h5 class='card-title'>Ücret: $product_price</h5>

                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Sepete ekle</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ürüne bak</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}

function get_unique_brands()
{
    global $con;

    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM products WHERE brand_id = $brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2>Maalesef bu türden yok</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $description = $row['description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$description</p>
                        <h5 class='card-title'>Ücret: $product_price</h5>

                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Sepete ekle</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ürüne bak</a>
                        </div>
                </div>
            </div>";
        }
    }
}


// Marka getirme



function getbrands()
{
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
        <a href='index.php?brand=$brand_title' class='nav-link'>$brand_title</a>
    </li>";
    }
}

//kategori
function getcategories()
{
    global $con;
    $select_cetegories = "SELECT * FROM categories";
    $result_cetegories = mysqli_query($con, $select_cetegories);

    while ($row_data = mysqli_fetch_assoc($result_cetegories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
<a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
</li>";
    }
}

//ürünleri aratma

function search_product()
{
    global $con; // $con değişkenini global olarak tanımla

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `products` where product_title like '%$search_data_value%'";
        $select_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
        $result_query = mysqli_query($con, $search_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $description = $row['description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$description</p>
                    <h5 class='card-title'>Ücret: $product_price</h5>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Sepete ekle</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ürüne bak</a>
                </div>
            </div>
        </div>";
        }
    }
}



// ürüne bakma
function view_details()
{
    global $con; 

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        if (!isset($_GET['category']) && !isset($_GET['brand'])) {
            $select_query = "SELECT * FROM products WHERE product_id = $product_id";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $description = $row['description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                // Ürün detayları
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$description</p>
                            <h5 class='card-title'>Ücret: $product_price</h5>

                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Ürünü ekle</a>
                            <a href='index.php' class='btn btn-secondary'>Ana Sayfa</a>
                        </div>
                    </div>
                </div>";

                // Farklı resimler
                echo "<div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center'>Farklı resimleri</h4>
                            </div>
                            <div class='col-md-6'><img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'></div>
                            <div class='col-md-6'><img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='...'></div>
                        </div>
                    </div>";
            }
        }
    }
}
// ip adress
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
    // $ip = getIPAddress();  
    //                 echo 'User Real IP Address - '.$ip;
}
// sepete ekle
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add' AND product_id = $get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script>alert('Bu ürün zaten eklenmiş')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO cart_details (product_id, ip_adress, quantity) VALUES ('$get_product_id', '$get_ip_add', 0)";
            mysqli_query($con, $insert_query);
            echo "<script>alert('Ürün Sepete Eklendi')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// item numarası
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo  $count_cart_items;
}





function check_admin_login($admin_name, $admin_password)
{
    global $con;

    // Güvenli sorgu oluşturun
    $admin_name = mysqli_real_escape_string($con, $admin_name);

    // Veritabanında kullanıcıyı kontrol et
    $query = "SELECT * FROM admin WHERE admin_name = '$admin_name'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        // Eğer kullanıcı varsa, şifreyi doğrulayın
        if ($row && password_verify($admin_password, $row['admin_password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        // Veritabanı sorgusunda hata oluştu
        echo "Veritabanı hatası: " . mysqli_error($con);
        return false;
    }
}

// toplam fiyat
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;

    $cart_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add'";
    $result = mysqli_query($con, $cart_query);

    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM products WHERE product_id = '$product_id'";
        $result_products = mysqli_query($con, $select_products);

        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }

    echo $total_price;
}

//sipariş detayları

function get_user_order_details()
{
    global $con;
    $username =  $_SESSION['username'];
    $get_details = "SELECT * FROM `user_table` WHERE user_name = '$username'";
    $result_query = mysqli_query($con, $get_details);

    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];

        if (!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])) {
            $get_orders = "SELECT * FROM `user_orders` WHERE user_id = $user_id AND order_status = 'pending'";
            $result_orders_query = mysqli_query($con, $get_orders);
            $row_count = mysqli_num_rows($result_orders_query);

            if ($row_count > 0) {
                echo "<h3 class='text-center'>Toplam <span class='text-danger'>$row_count</span> siparişiniz var</h3>
                    <p class='text-center'><a href='./profile.php?my_orders' class='text-dark'>Sipariş Detayları</a></p>";
            } else {
                echo "<h3 class='text-center text-success mt-5 mb-2'>Bekleyen Siparişiniz Yok</h3>
                    <p class='text-center'><a href='../index.php' class='text-dark'>Ürünleri Keşfet</a></p>";
            }
        }
    }
}

