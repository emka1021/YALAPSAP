<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "Select * from `user_table` where user_name = '$user_session_name' ";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['user_name'];
    $user_email = $row_fetch['user_email'];
    $user_adress = $row_fetch['user_adress'];
    $user_mobile = $row_fetch['user_mobile'];
}

if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_adress = $_POST['user_adress'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");


    //update
    $update_data = "UPDATE user_table SET user_name='$username', user_email='$user_email',
    user_image='$user_image', user_adress='$user_adress', user_mobile='$user_mobile'
    WHERE user_id=$update_id";

    $result_query_update = mysqli_query($con, $update_data);
    if ($result_query_update) {
        echo "<script>alert('Veri Başarıyla Değiştirildi')</script>";
        echo "<script>window.open('profile.php?edit_account.php','_self')</script>";

    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hesabı Düzenle</title>
</head>

<body>
    <h3 class="class  text-success mb-4">Hesabı Düzenle</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="from-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value=" <?php echo $username ?>" name="user_username">
        </div>
        <div class="from-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email" value=" <?php echo $user_email ?>">
        </div>
        <div class="from-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_image">
        </div>
        <div class="from-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_adress" value=" <?php echo $user_adress ?>">
        </div>
        <div class="from-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value=" <?php echo $user_mobile ?>">
        </div>
        <input type="submit" value="Güncelle" class="bg-info py-2 px-4 border-0" name="user_update">
    </form>
</body>

</html>