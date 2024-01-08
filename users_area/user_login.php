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
    <title>Üye Girişi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
       body {
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

        .form-outline {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .bg-info {
            background-color: #17a2b8 !important;
            border-color: #17a2b8 !important;
            font-size: 18px;
        }

        .text-danger {
            color: #dc3545;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .text-center {
            text-align: center;
        }
</style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">Üye Girişi</h2>
        <div class="row">
            <div class="">
                <form action="" method="post">
                    <!-- username -->
                    <div class="form-outline">
                        <input type="text" id="user_username" class="form-control" placeholder="Kullanıcı Adı Girin" autocomplete="off" required="required" name="user_username"/>
                    </div>

                    <!-- password -->
                    <div class="form-outline">
                        <input type="password" id="user_password" class="form-control" placeholder="Şifre Girin" autocomplete="off" required="required" name="user_password"/>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Giriş" name="user_login" class="bg-info mt-3 py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Hesabın yok mu? <a href="user_registration.php" class="text-danger">Kayıt Ol</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php


if(isset($_POST['user_login'])){
    $user_username = mysqli_real_escape_string($con, $_POST['user_username']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);

    $select_query = "SELECT * FROM `user_table` WHERE user_name = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $user_ip = getIPAddress();
    //sepet
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_adress = '$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if($row_count > 0){
        $_SESSION['username'] = $user_username;
        $row_data = mysqli_fetch_assoc($result);  
        if(password_verify($user_password, $row_data['user_password'])){
            //echo "<script>alert('Giriş Başarılı')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Giriş Başarılı')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Giriş Başarılı')</script>";
                echo "<script>window.location.href = 'payment.php';</script>";
            }
            
        } else {
            echo "<script>alert('Kullanıcı Adı ya da Şifre Hatalı')</script>";
        }
    } else {
        echo "<script>alert('Kullanıcı Adı ya da Şifre Hatalı')</script>";
    }
}
?>
