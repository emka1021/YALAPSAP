<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Hesabı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- found awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image {
            width: 110px;
            object-fit: contain;
        }

        .footer {
          margin-top: 100px;
        }

        .edit_image {
            width: 100px;
            height: 100px;
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
                        <li class='nav-item'><a class='nav-link active' aria-currents='page' href='../index.php'>Home</a></li>
                        <li class='nav-item'><a class='nav-link' href='../display_all.php'>Ürünler</a></li>
                        <li class='nav-item'><a class='nav-link' href='../contact.php'>İletişim</a></li>
                        <li class='nav-item'><a class='nav-link' href='../cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item(); ?></sup></a></li>
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
                    <a class='nav-link' href='./user_login.php'>Giriş Yap</a></li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./php'>Çıkış Yap</a>
                    </li>";
                }
                ?>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item'><a class='nav-link' href='./profile.php'>Profil</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='./user_registration.php'>Kayıt Ol</a></li>";
                }
                ?>


            </ul>
        </nav>

        <!-- siparişiniz var alanı -->
        <div class="row mt-4 pb-30">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link active text-light">
                            <h4>Profil</h4>
                        </a>
                    </li>
                    <?php
                    $username =  $_SESSION['username'];
                    $user_image = "select * from `user_table` where user_name = '$username'";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image['user_image'];
                    echo "<li>
                        <img src='./user_images/$user_image' class='profile_img my-4'>

                    </li>"
                    ?>

                    <li class="nav-item ">
                        <a href="profile.php" class="nav-link active text-light">Bekleyen Siparişler</a>
                    </li>
                    </li>
                    <li class="nav-item ">
                        <a href="profile.php?edit_account" class="nav-link active text-light">Hesabı Düzenle</a>
                    </li>
                    </li>
                    <li class="nav-item ">
                        <a href="profile.php?my_orders" class="nav-link active text-light">Siparişlerim</a>
                    </li>
                    </li>
                    <li class="nav-item ">
                        <a href="profile.php?delete_account" class="nav-link active text-light">Hesabı Sil</a>
                    </li>
                    </li>
                    <li class="nav-item ">
                        <a href="logout.php" class="nav-link active text-light">Çıkış Yap</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?></div>

        </div>

        <div class="footer"><?php include '../includes/footer.php'; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>