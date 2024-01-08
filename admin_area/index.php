<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .product_img {
            width: 80px;
            object-fit: contain;
        }
        .footer{
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <!-- first child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expen-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="#" alt="">
                <nav class="navbar navbar-expen-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php
                            if (!isset($_SESSION['admin_name'])) {
                                echo "<li class='nav-item'>
            <a class='nav-link' href='login.php'>Hoşgeldin</a>
          </li>";
                            } else {
                                echo "<li class='nav-item'>
            <a class='nav-link' href='logout.php'>Hoşgeldin " . $_SESSION['admin_name'] . "</a>
          </li>";
                            }
                            ?>

                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- secon child -->
    <div class="bglight">
        <h3 class="text-center p-2">Admin Sayfası</h3>
    </div>

    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1">

            <div class="button text-center">
                <button classmy-3><a href="index.php?insert_product" class="nav-link text-light bg-info my-1">Ürün ekle</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">Ürünler</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Kategori Ekle</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">Kategoriler</a></button>
                <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Yayınevi Ekle</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">Yayınevleri</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">Siparişler</a></button>
                <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">Ödemeler</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">Üyeler</a></button>
                <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1">Çıkış Yap</a></button>

            </div>
        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-5">
        <?php
        if (isset($_GET['insert_product'])) {
            include('insert_product.php');
        }
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brands'])) {
            include('insert_brands.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        }
        if (isset($_GET['delete_product'])) {
            include('delete_product.php');
        }
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }
        if (isset($_GET['view_brands'])) {
            include('view_brands.php');
        }
        if (isset($_GET['edit_category'])) {
            include('edit_category.php');
        }
        if (isset($_GET['edit_brands'])) {
            include('edit_brands.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['delete_brands'])) {
            include('delete_brands.php');
        }
        if (isset($_GET['list_orders'])) {
            include('list_orders.php');
        }
        if (isset($_GET['list_payments'])) {
            include('list_payments.php');
        }
        if (isset($_GET['list_users'])) {
            include('list_users.php');
        }
        if (isset($_GET['delete_user'])) {
            include('delete_user.php');
        }
        ?>
    </div>
    <!-- last child -->
    </div>

   <div class="footer"><?php include '../includes/footer.php'; ?></div> 

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>