
    <h3 class="text-danger mb-4">Hesabı Sil</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto"
            name="delete" value="Hesabı Sil">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto"
            name="dont_delete" value="Hesabı Silme">
        </div>
    </form>

    <?php
    $username_sessions = $_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query = "Delete from `user_table` where user_name = '$username_sessions'";
        $result = mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Hesap Başarıyla Silindi')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";

    }
    ?>