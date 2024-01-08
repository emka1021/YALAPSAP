<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kayıt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #212529;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        .container-fluid {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 50px;
            padding: 20px;
            animation: fadeInUp 1.5s ease-in-out;
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

        .form-group {
            margin-bottom: 20px;
        }

        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            animation: fadeInRight 1.5s ease-in-out;
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

        .img-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .bg-info {
            background-color: #2196F3;
            color: #fff;
            transition: background-color 0.3s ease-in-out;
        }

        .bg-info:hover {
            background-color: #1565C0;
        }

        .title {
            font-size: 2.5em;
            color: #000;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .form-container {
            animation: fadeInRight 1.5s ease-in-out;
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
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5 title">Admin Kayıt Sayfası</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5 align-items-center form-container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <label for="admin_name" class="form-label">
                            Kullanıcı Adı
                        </label>
                        <input type="text" id="admin_name" name="admin_name" placeholder="Lütfen Kullanıcı Adı Giriniz" required="required" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="admin_email" class="form-label">
                            Email
                        </label>
                        <input type="email" id="admin_email" name="admin_email" placeholder="Lütfen Email Giriniz" required="required" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="admin_password" class="form-label">
                            Şifre
                        </label>
                        <input type="text" id="admin_password" name="admin_password" placeholder="Lütfen Şifre Giriniz" required="required" class="form-control">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Kayıt Ol" name="admin_register" class="bg-info mt-3 py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Hesabın zaten var mı ? <a href="admin_login.php" class="text-danger">Giriş Yap</a></p>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 img-container">
                <img src="../images/man-with-inscription-admin-icon-outline-style-vector-30713429.jpg" alt="Admin Kayıt Ekranı" class="img-fluid">
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['admin_register'])) {
    $admin_name = mysqli_real_escape_string($con, $_POST['admin_name']);
    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_password = mysqli_real_escape_string($con, $_POST['admin_password']);
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

    // Select query
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Bu Kullanıcı Adı veya Email Başkası Tarafından Kullanılıyor')</script>";
        echo "<script>window.open('admin_register.php','_self')</script>";
    } else {
        // Insert query
        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Kayıt Başarıyla Tamamlandı')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";

        } else {
            die(mysqli_connect_error($con));
        }
    }
}
?>
