<h3 class="text-center text-success">Tüm Siparişler</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_orders = "Select * from `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);


        if ($row_count == 0) {
            echo " <h2 class='bg-danger text-center mt-5'>Henüz Sipariş Yok</h2>";
        } else {
            echo "      <tr>
            <th>Sipariş Sırası</th>
            <th>Toplam Tutar</th>
            <th>Sipariş Numarası</th>
            <th>Ürünler</th>
            <th>Sipariş Tarihi</th>
            <th>Durum</th>
            <th>Sil</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];
                $number++;
                echo " 
        <tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$total_products</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='' type='button' class='btn btn-primary 'text-light'' data-toggle='modal' data-target='#exampleModal'>
        <i class='fa-solid fa-trash'></i></a></td>    
        </tr>";
            }
        }
        ?>


        </tbody>
</table>