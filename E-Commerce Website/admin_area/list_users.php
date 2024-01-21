<h3 class="text-center">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="text-center">
    <?php
        $get_orders = "SELECT * FROM user_table";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);
        

        if ($row_count == 0) {
            echo "<h2 class='text-center mt-5'>No users yet</h2>";
        } else {
            echo "<tr>
            <th>Sl. No.</th>
            <th>Username</th>
            <th>User email</th>
            <th>User Image</th>
            <th>User address</th>
            <th>User mobile</th> 
        </tr>
        </thead>
        <tbody class='class='text-center' bg-secondary text-light'>";

            $number=0; 
            while($row_data=mysqli_fetch_assoc($result))
            {
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $number++;
            echo "<tr class='text-center'>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img class='product_img 'src='../users_area/user_images/$user_image' alt='$username'/></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            
            </tr>";
            }
        }
    ?>
</table>
<!-- index.php?delete_order=$order_id -->
<!-- <th>Delete</th>
<td><a href='delete_order.php?order_id=$order_id' class='text-black'><i class='fa-solid fa-trash'></i></a></td> -->