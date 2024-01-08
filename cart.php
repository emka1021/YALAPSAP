<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- found awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }

        .footer {
            position: absolute;
            bottom: 0;
        }

        .cart_img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class='nav-item'><a class='nav-link active' aria-currents='page' href='index.php'>Home</a></li>
                        <li class='nav-item'><a class='nav-link' href='display_all.php'>Ürünler</a></li>
                        <li class='nav-item'><a class='nav-link' href='contact.php'>İletişim</a></li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./admin_area/admin_login.php'>Admin Girişi</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./admin_area/admin_registration.php'>Admin Kayıt</a>
                        </li>
                        <li class='nav-item'><a class='nav-link' href='cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item(); ?></sup></a></li>
                        <li class='nav-item'><a class='nav-link d-inline-flex' href='#'>Toplam Ücret:</a><?php total_cart_price() ?>/-</li>
                    </ul>

                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light">
                    </form>
                </div>
            </div>

            <style>
                .navbar-nav .nav-link {
                    transition: color 0.3s;
                }

                .navbar-nav .nav-link:hover {
                    color: #fff !important;
                }

                /* Navbar animasyonu */
                .navbar-toggler-icon {
                    transition: transform 0.3s;
                }

                .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
                    transform: rotate(90deg);
                }

                /* Admin kayıt ve giriş sayfalarının stil ayarları */
                body.admin-style nav {
                    background-color: #333;
                    /* Koyu arka plan rengi */
                    color: #fff;
                    /* Beyaz metin rengi */
                }
            </style>
        </nav>

        <!-- calling cart function -->
        <?php
        cart()
        ?>

 
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Hoşgeldin Okur</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Hoşgeldin " . $_SESSION['username'] . "</a>
                    </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Giriş Yap</a></li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Çıkış Yap</a>
                    </li>";
                }
                ?>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item'><a class='nav-link' href='./users_area/profile.php'>Profil</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_registration.php'>Kayıt Ol</a></li>";
                }
                ?>


            </ul>
        </nav>


        <?php
        $title = "Kelimelerin Yaşlandığı Yer: Yalapşap";
        $content = "Eski Kitapların Yeni Hikayesi";
        ?>
        <div style="
        background-color: #f5f5f5; 
        padding: 20px;
        text-align: center;
        animation: bounceIn 1.5s ease-in-out;
    ">
            <style>
                @keyframes bounceIn {
                    from {
                        opacity: 0;
                        transform: scale(0.8);
                    }

                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                h3 {
                    color: #2196F3;
                    font-size: 2.5em;
                    margin-top: 0;

                }

                p {
                    color: #333;
                    margin-top: 5px;
                    font-size: 1.3em;
                }
            </style>

            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
        </div>

        <!-- fourth child tablo -->
        <div class="container">
            <div class="class-row">
                <form action="" method="post">
                    <table class="table table-bordred text-center">

                        <?php
                        global $con;
                        $get_ip_add = getIPAddress();
                        $total_price = 0;

                        $cart_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo " <thead>
                                <th>Ürün</th>
                                <th>Ürün Resmi</th>
                                <th>Toplam Ücret</th>
                                <th>Kaldır</th>
                                <th colspan='2'>Uygula</th>
                            </thead>
                            <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "SELECT * FROM products WHERE product_id = '$product_id'";
                                $result_products = mysqli_query($con, $select_products);

                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];

                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;



                        ?>
                                    <tr>
                                        <tbody>
                                            <td><?php echo $product_title ?></td>
                                            <td><img src="admin_area\product_images\<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                            <td><?php echo $price_table ?></td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id  ?>"></td>
                                            <td><input type="submit" value="Sepeti Güncelle" name="update_cart" class="bg-info px-3 py-2 border-0 mx-3"></td>
                                            <td> <input type="submit" name="remove_cart" value="Ürünü Sil" class="bg-info px-3 py-2 border-0 mx-3"></td>

                                        </tbody>
                                    </tr>

                        <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'> Sepette Ürün Yok</h2>";
                        }
                        ?>
                        </tbody>

                    </table>
                    <!-- Toplam Ücret-->
                    <div class="d-inline-flex px-3 mb-5">
                        <?php
                        $get_ip_add = getIPAddress();


                        $cart_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='px-3'>Toplam: <strong> $total_price </strong></h4>
                            </div>
                            <a href='index.php' class='btn bg-info px-3 py-2 border-0 mx-3'>Alışverişe Devam Et</a>
                            <a href='./users_area/payment.php' class='btn bg-danger text-light px-3 py-2 border-0 mx-3'>Alışverişi Tamamla</a>
                            ";
                        }

                        ?>

                    </div>


                </form>
            </div>
        </div>
    </div>

    <!-- function ürün sil -->
    <?php
    function remove_cart_item()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "Delete from `cart_details` where product_id = '$remove_id'";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }

    echo $remove_item = remove_cart_item();
    ?>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/js/all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>