

<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- found awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<style>
    .img {
        width: 100%;
        margin: auto;
        display: block;

    }
</style>


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
                        <li class='nav-item'><a class='nav-link' href='#'>register</a></li>
                        <li class='nav-item'><a class='nav-link' href='#'>iletişim</a></li>
                        <li class='nav-item'><a class='nav-link' href='../cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item(); ?></sup></a></li>
                        <li class='nav-item'><a class='nav-link d-inline-flex' href='#'>Toplam Ücret:</a><?php total_cart_price() ?>/-</li>
                    </ul>

                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" name="search_data_product">
                    </form>
                </div>
            </div>
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
                    <a class='nav-link' href='#'>Hoşgeldin okur</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Hoşgeldin " . $_SESSION['username'] . "</a>
                    </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='user_login.php'>Giriş Yap</a></li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Çıkış Yap</a>
                    </li>";
                }
                ?>
                <li class='nav-item'>
                    <a class='nav-link' href='user_registration.php'>Kayıt Ol</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../admin_area/admin_login.php'>Admin Girişi</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../admin_area/admin_registration.php'>Admin Kayıt</a>
                </li>
            </ul>
        </nav>
        <?php
        $user_ip = getIPAddress();
        $get_user = "select * from `user_table` where user_ip='$user_ip'";
        $result = mysqli_query($con, $get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];
        ?>
        <div class="contaier">
            <h2 class="text-center text-info">Ödeme Sayfası</h2>
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-md-6">
                    <a href="https://www.ziraatbank.com.tr/tr"><img src="../images/odeme-secenekleri-e-ticarette-ne-kadar-onemlidir-1505805334.png" alt=""></a>

                </div>
                <div class="col-md-6">
                    <a href="order.php?user_id=<?php echo $user_id ?>">
                        <h2 class="text-center">Offline Ödeyin</h2>
                    </a>

                </div>
            </div>
        </div>




        <?php include '../includes/footer.php'; ?>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>