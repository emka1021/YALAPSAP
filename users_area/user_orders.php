<?php
$username = $_SESSION['username'];
$get_user = "Select * from `user_table` where user_name = '$username'";
$result = mysqli_query($con,$get_user);
$row_fetch =mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];


?>
<div>
    <h3 class="text-succes">Tüm Siparişlerim</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Sipariş Sırası</th>
                <th>Toplam Tutar</th>
                <th>Ürün Sayısı</th>
                <th>Sipariş Numarası</th>
                <th>Tarih</th>
                <th>Ödeme Durumu</th>
                <th>Sipariş Durumu</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
             <?php
             $get_order_details = "Select * from `user_orders` where user_id=$user_id";
             $result_orders = mysqli_query($con,$get_order_details);
             while($row_orders = mysqli_fetch_assoc($result_orders)){
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_number = $row_orders['invoice_number'];
                $order_status = $row_orders['order_status'];
                $order_date = $row_orders['order_date'];

                $number = 1;
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td> $invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='confirm_payment.php'>Alışverişi Tamamla</a>
                </td>
            </tr>";
            $number++;
             }
             ?>
            
        </tbody>
    </table>
</div>