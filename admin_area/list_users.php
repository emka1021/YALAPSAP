<h3 class="text-center text-success">Tüm Kullanıcılar</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_users = "Select * from `user_table`";
        $result = mysqli_query($con, $get_users);
        $row_count = mysqli_num_rows($result);


        if ($row_count == 0) {
            echo " <h2 class='bg-danger text-center mt-5'>Henüz Kullanıcı Yok</h2>";
        } else {
            echo "      <tr>
            <th>Katılım Sırası</th>
            <th>Üye Adı</th>
            <th>Email</th>
            <th>Üye Resmi</th>
            <th>Adres</th>
            <th>Telefon Numarası</th>
            <th>Sil</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $user_id = $row_data['user_id'];
                $username = $row_data['user_name'];
                $user_email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $user_adress = $row_data['user_adress'];
                $user_mobile = $row_data['user_mobile'];
                $number++;
                echo " 
        <tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image' alt='$username' class='product_img'></td>
        <td>$user_adress</td>
        <td>$user_mobile</td>
        <td><a href='index.php?delete_user=<?php echo $user_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
 
        </tr>";
            }
        }
        ?>


        </tbody>
</table>