<h3 class="text-center">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="text-center">
    <?php
        $get_payments = "SELECT * FROM user_payments";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);
        

        if ($row_count == 0) {
            echo "<h2 class='text-center mt-5'>No Payments received yet</h2>";
        } else {
            echo "<tr>
            <th>Sl. No.</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            
        </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['payment_id'];
                $invoice_number = $row_data['invoice_number'];
                $amount= $row_data['amount'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];
                //$status = $row_data['status'];
                
                $number++;

                // Add a "Delete" link for each order
                echo "<tr class='text-center'>
                    <td>$number</td>
                    
                    <td>$invoice_number</td>
                    <td>$amount</td>
                    <td>$payment_mode</td>
                    <td>$date</td>
                    

                    
                </tr>";
            }
        }
    ?>
</table>
<!-- index.php?delete_order=$order_id -->
<!-- <th>Delete</th>
<td><a href='delete_order.php?order_id=$order_id' class='text-black'><i class='fa-solid fa-trash'></i></a></td> -->