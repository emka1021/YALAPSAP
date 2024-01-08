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
    <title>Admin Giriş</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #212529;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 50px;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .img-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-login {
            background-color: #2196F3;
            color: #fff;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-login:hover {
            background-color: #1565C0;
        }

        .title {
            font-size: 2.5em;
            color: #000;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            animation: fadeInUp 1.5s ease-in-out;
        }


        .form-container {
            animation: fadeInRight 1.5s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto form-container">
                <h2 class="title text-center mb-5">Admin Giriş</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="admin_name" class="form-label">Kullanıcı Adı</label>
                        <input type="text" id="admin_name" name="admin_name" placeholder="Lütfen Kullanıcı Adı Giriniz" required="required" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Şifre</label>
                        <input type="password" id="password" name="password" placeholder="Lütfen Şifre Giriniz" required="required" class="form-control">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Giriş" name="admin_login" class="btn btn-login mt-3 py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Hesabın yok mu ? <a href="admin_registration.php" class="text-danger">Giriş Yap</a></p>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-md-4 img-container">
                <img src="../images/man-with-inscription-admin-icon-outline-style-vector-30713429.jpg" alt="Admin Kayıt Ekranı" class="img-fluid">
            </div>
        </div>
    </div>
</body>

</html>
<?php


if (isset($_POST['admin_login'])) {
    $admin_name = mysqli_real_escape_string($con, $_POST['admin_name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        $row_data = mysqli_fetch_assoc($result);
        if (password_verify($password, $row_data['admin_password'])) {
            $_SESSION['admin_name'] = $admin_name;
            echo "<script>alert('Giriş Başarılı'); window.location.href = 'index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Kullanıcı Adı ya da Şifre Hatalı')</script>";
        }
    } else {
        echo "<script>alert('Kullanıcı Adı ya da Şifre Hatalı')</script>";
    }
}
?>