<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Kayıt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
    overflow: hidden;
    background-color: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.container-fluid {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.5s forwards 0.3s;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
    max-width: 600px;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

h2 {
    color: #343a40;
    text-align: center;
}

.formlabel {
    color: #495057;
}

.form-outline {
    margin-bottom: 20px;
}

.form-control {
    border-radius: 5px;
}

.bg-info {
    background-color: #17a2b8 !important;
    border-color: #17a2b8 !important;
}

.bg-info:hover {
    background-color: #138496 !important;
    border-color: #117a8b !important;
}

.text-danger {
    color: #dc3545;
}

.mt-3 {
    margin-top: 1rem !important;
}

.py-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
}

.px-3 {
    padding-left: 1rem !important;
    padding-right: 1rem !important;
}

.border-0 {
    border: none !important;
}

.fw-bold {
    font-weight: bold;
}

.small {
    font-size: 0.875em;
}

.text-center {
    text-align: center;
}

    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">Üye Kayıt</h2>
        <div class="row">
            <div class="">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline justify-content-center">
                        <input type="text" id="user_username" class="form-control" placeholder="Kullanıcı Adı Giriniz" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <!-- email -->
                    <div class="form-outline">
                        <input type="email" id="user_email" class="form-control" placeholder="Email Giriniz" autocomplete="off" required="required" name="user_email"/>
                    </div>
                    <div class="form-outline">
                        <input type="file" id="user_image" class="form-control"  autocomplete="off" required="required" name="user_image"/>
                    </div>
                    
                     <!-- password -->
                     <div class="form-outline">
                        <input type="password" id="user_password" class="form-control" placeholder="şifre Giriniz" autocomplete="off" required="required" name="user_password"/>
                    </div>
        
                    <!-- adres -->
                    <div class="form-outline">
                        <input type="text" id="user_adress" class="form-control" placeholder="Adres Giriniz" autocomplete="off" required="required" name="user_adress"/>
                    </div>
                    <!-- iletişim -->
                    <div class="form-outline">
                        <input type="text" id="user_contact" class="form-control" placeholder="Telefon Numaranızı Giriniz" autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Kayıt Ol" name="user_register" class="bg-info mt-3 py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Hesabın zaten var mı ? <a href="user_login.php" class="text-danger">Giriş Yap</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['user_register'])) {
    $user_username = mysqli_real_escape_string($con, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_adress = mysqli_real_escape_string($con, $_POST['user_adress']);
    $user_contact = mysqli_real_escape_string($con, $_POST['user_contact']);
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // Select query
    $select_query = "SELECT * FROM `user_table` WHERE user_name='$user_username' OR user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Bu Kullanıcı Adı veya Email Başkası Tarafından Kullanılıyor')</script>";
        echo "<script>window.open('user_registration.php','_self')</script>";

    } else {
        // Insert query
        move_uploaded_file($user_image_tmp, './user_images/' . $user_image);
        $insert_query = "INSERT INTO `user_table` (user_name, user_email, user_password, user_image, user_ip, user_adress, user_mobile)
        VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_adress', '$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Veri Başarıyla Yüklendi')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";

        } else {
            die(mysqli_connect_error($con));
        }
    }


// ürün seçme

$select_cart_items = "select * from `cart_details` where ip_adress = '$user_ip'" ;
$result_cart = mysqli_query($con,$select_cart_items);
$rows_count = mysqli_num_rows($result_cart);
$_SESSION['username'] = $user_username;
if($rows_count>0){
    echo "<script>alert('Sepetinizde Ürün Var')</script>";
    echo "<script>window.open('users_area\checkout.php','_self')</script>";

}else {
    //echo "<script>window.open('../index.php','_self')</script>";
}
}
?>
