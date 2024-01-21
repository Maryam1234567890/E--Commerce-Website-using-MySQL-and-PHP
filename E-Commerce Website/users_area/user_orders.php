<?php
        $username=$_SESSION['username'];
        $get_user="select * from user_table where username='$username'";
        $result=mysqli_query($con,$get_user);
        $row_fetch=mysqli_fetch_assoc($result);
        $user_id=$row_fetch['user_id'];
        //echo $user_id;

    ?>
    
    
    <h3 class="mt-3">My Orders</h3>
    <table class="table table-bordered mt-4 text-light">
        <thead>  
            <tr>
                <th class="bg-primary text-light">Sl. No.</th>
                <th class="bg-primary text-light">Amount Due</th>
                <th class="bg-primary text-light">Total Products</th>
                <th class="bg-primary text-light">Invoice Number</th>
                <th class="bg-primary text-light">Date</th>
                <th class="bg-primary text-light">Complete/Incomplete</th>
                <th class="bg-primary text-light">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $number=1;
                $get_order_details="select * from user_orders where user_id='$user_id'";
                $result_orders=mysqli_query($con,$get_order_details);
                while($row_orders=mysqli_fetch_assoc($result_orders))
                {
                    $order_id=$row_orders['order_id'];
                    $amount_due=$row_orders['amount_due'];
                    $total_products=$row_orders['total_products'];
                    $invoice_number=$row_orders['invoice_number'];
                    $order_date=$row_orders['order_date'];
                    $order_status=$row_orders['order_status'];
                    if($order_status=='pending')
                    {
                        $order_status='Incomplete';
                    }
                    else
                    {
                        $order_status='Complete';
                    }

                    
                    
                    echo "<tr>
                            <td class='bg-info text-light'>$number</td>
                            <td class='bg-info text-light'>$amount_due</td>
                            <td class='bg-info text-light'>$total_products</td>
                            <td class='bg-info text-light'>$invoice_number</td>
                            <td class='bg-info text-light'>$order_date</td>
                            <td class='bg-info text-light'>$order_status</td>";
                            ?>
                            <?php
                            if($order_status=='Complete')
                            {
                                echo "<td class='bg-info text-light'>Paid</td>";

                            }
                            else
                            {
                                echo "<td class='bg-info text-light'><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                                </tr>";
                            }
                           
                     
                    $number++;
                    
                }


            ?>
            
        </tbody>
    </table> 