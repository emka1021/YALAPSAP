<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM `user_orders` WHERE order_id = $order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number_post = $_POST['invoice_number'];
    $amount_post = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, payment_mode, date) 
                     VALUES ($order_id, '$invoice_number_post', $amount_post, '$payment_mode', NOW())";

    $result = mysqli_query($con, $insert_query);

    if ($result) {
        echo "<h3 class='text-center text-light'>Ödeme Başarıyla Tamamlandı</h3>";
        $update_orders = "UPDATE `user_orders` SET order_status = 'Tamamlandı' WHERE order_id = $order_id";
        $result_orders = mysqli_query($con, $update_orders);

        if ($result_orders) {
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        } else {
            echo "<script>alert('Sipariş durumu güncellenirken bir hata oluştu.')</script>";
        }
    } else {
        echo "<script>alert('Ödeme işlemi sırasında bir hata oluştu.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ödeme Onayı</title>
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Ödemeyi Onayla</h1>
        <form action="" method="post">
            <div class="form outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form outline my-4 text-center w-50 m-auto">
                <label class="text-light">Toplam Tutar</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option value="" selected disabled>Ödeme Seçeneğini Seçin</option>
                    <option value="İnternet Bankacılığı">İnternet Bankacılığı</option>
                    <option value="Kapıda Ödeme">Kapıda Ödeme</option>
                    <option value="IBAN İle Aktarım">IBAN İle Aktarım</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Onayla" name="confirm_payment">
            </div>
        </form>
    </div>

</body>

</html>
