<h3 class="text-center">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="text-center">
    <?php
        $get_orders = "SELECT * FROM user_orders";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);
        

        if ($row_count == 0) {
            echo "<h2 class='text-center mt-5'>No orders yet</h2>";
        } else {
            echo "<tr>
            <th>Sl. No.</th>
            <th>Due Amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order Date</th>
            <th>Status</th>  
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

                // Add a "Delete" link for each order
                echo "<tr class='text-center'>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    
                </tr>";
            }
        }
    ?>
</table>
<!-- index.php?delete_order=$order_id -->
<!-- <th>Delete</th>
<td><a href='delete_order.php?order_id=$order_id' class='text-black'><i class='fa-solid fa-trash'></i></a></td> -->