<h3 class="text-center text-success">Tüm Ödemeler</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_payments = "Select * from `user_payments`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);


        if ($row_count == 0) {
            echo " <h2 class='bg-danger text-center mt-5'>Henüz Bir Ödeme Yapılmamış</h2>";
        } else {
            echo "      <tr>
            <th>Ödeme Sırası</th>
            <th>Sipariş Numarası</th>
            <th>Toplam Tutar</th>
            <th>Ödeme Şekli</th>
            <th>Sipariş Tarihi</th>
            <th>Sipariş Tarihi</th>
            <th>Sil</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['payment_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];
                $number++;
                echo " 
        <tr>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$payment_mode</td>
        <td>$date</td>
        <td><a href='' type='button' class='btn btn-primary 'text-light'' data-toggle='modal' data-target='#exampleModal'>
        <i class='fa-solid fa-trash'></i></a></td>    
        </tr>";
            }
        }
        ?>


        </tbody>
</table>