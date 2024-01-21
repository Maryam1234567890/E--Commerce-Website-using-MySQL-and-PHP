<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!--bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    
</head>
<body>
    <h3 class="text-center">All Products</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Product ID</th>
                <th class="text-center">Product Title</th>
                <th class="text-center">Product Image</th>
                <th class="text-center">Product Price</th>
                <th class="text-center">Total Sold</th>
                <th class="text-center">Status</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $get_products="select * from products";
                $result=mysqli_query($con,$get_products);
                $number=0;
                while($row=mysqli_fetch_assoc($result))
                {
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $status=$row['status'];
                    $number++;
                ?>
                <tr>
                    <td class='text-center'><?php echo $number ?></td>
                    <td class='text-center'><?php echo $product_title ?></td>
                    <td class='text-center'><img src='./product_images/<?php echo $product_image1 ?>' class='product_img'></img></td>
                    <td class='text-center'><?php echo $product_price ?>/-</td>
                    <td class='text-center'><?php $get_count="select * from orders_pending where product_id='$product_id'";
                    $result_count=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?></td>
                    <td class='text-center'><?php echo $status ?></td>
                    <td class='text-center'><a href='index.php?edit_products=<?php echo $product_id?>' class='text-black'><i class='fas fa-edit'></i></a></td>
                    <td class='text-center'><a href='index.php?delete_product=<?php echo $product_id?>' class='text-black'><i class='fas fa-trash'></i></a></td>
                </tr>
            <?php
                }
            ?>
            
        </tbody>
    </table>
    
</body>
</html>
