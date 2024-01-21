<!--connect file-->
<?php
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website - Cart Details</title>
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
    <!--CSS file-->
    <link rel="stylesheet" href="style.css">

    <style>
        .card-img-top
        {
          width: 100%;
          height: 200px;
          object-fit: contain;
        }
        .cart_img
        {
            width: 50px;
            height: 50px;
            object_fit: contain;
        }
        .fixed-bottom-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #17a2b8; /* Customize the background color as needed */
            color: #fff; /* Customize the text color as needed */
        }
        
    </style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">  <!-- container-fluid is a bootstrap class that takes 100% width of the screen-->
        <!--first child-->
        <nav class="navbar navbar-expand-lg bg-primary">  <!-- navbar-expand-lg is for interactive website, bg-info changes background color to blue-->
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo"></img>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!--when we make the navbar small, to the side of screen-->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users_area/user_registration.php">Register</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>   <!-- use fontawesome to get logos, sup is superscript to show no. of items in cart-->
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>

<!--calling cart function-->
<?php
  cart();
?>

<!-- second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <ul class="navbar-nav me-auto">
        <?php
            if(!isset($_SESSION['username']))
            {
              echo "<li class='nav-item'>
              <a class='nav-link' href='#'>Welcome Guest</a>
              </li>";
            }
            else
            {
              echo "<li class='nav-item'>
              <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
              </li>";
            }


        ?>
        <?php
            if(!isset($_SESSION['username']))
            {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                    </li>";
            }
            else
            {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                    </li>";
            }


        ?>
    </ul>
</nav>

<!-- third child-->
<div class="bg-light">
  <h3 class="text-center" style="font-family:Lucida Handwriting; ">M&M Fashion</h3>
  <p class="text-center" style="font-family:Lucida Handwriting;"> Happy shopping!!
</div>

<!--fourth child table-->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
            <tbody>
                <!--php code to display dynamic data-->
                <?php
                    global $con;
                    $ip = getIPAddress();
                    $total_price = 0;
                    if (isset($_POST['update_cart'])) {
                        $quantities = $_POST['qty'];
                        foreach ($quantities as $product_id => $quantity) {
                            $update_cart = "UPDATE cart_details SET quantity = $quantity WHERE ip_address = '$ip' AND product_id = $product_id";
                            $result_products_quantity = mysqli_query($con, $update_cart);
                        }
                    }

                    // $cart_query = "SELECT cart_details.product_id, products.product_title, products.product_image1, 
                    //             products.product_price, cart_details.quantity
                    //             FROM cart_details
                    //             INNER JOIN products ON cart_details.product_id = products.product_id
                    //             WHERE cart_details.ip_address = '$ip'";
                    // $result = mysqli_query($con, $cart_query);
                    // $result_count = mysqli_num_rows($result);
                    // if($result_count>0)
                    // {
                    //     echo "<thead>
                    //             <tr>
                    //                 <th>Product Title</th>
                    //                 <th>Product Image</th>
                    //                 <th>Quantity</th>
                    //                 <th>Total Price</th>
                    //                 <th>Remove</th>
                    //                 <th colspan='2'>Operations</th>
                    //             </tr>
                    //         </thead>";
                    // while ($row = mysqli_fetch_array($result)) {
                    //     $product_id = $row['product_id'];
                    //     $product_title = $row['product_title'];
                    //     $product_image1 = $row['product_image1'];
                    //     $product_price = $row['product_price'];
                    //     $quantity = $row['quantity'];

                    //     // Calculate the subtotal for each product
                    //     $subtotal = $product_price * $quantity;
                    //     $total_price += $subtotal;


                    $ip = getIPAddress();
                    $total_price = total_cart_price($ip);

                    $cart_query = "SELECT cart_details.product_id, products.product_title, products.product_image1, 
                                    products.product_price, cart_details.quantity
                                    FROM cart_details
                                    INNER JOIN products ON cart_details.product_id = products.product_id
                                    WHERE cart_details.ip_address = '$ip'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                            </thead>";
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_image1 = $row['product_image1'];
                            $product_price = $row['product_price'];
                            $quantity = $row['quantity'];

                            // Calculate the subtotal for each product
                            $subtotal = $product_price * $quantity;
                            $total_price += $subtotal;
                    ?>
                    
                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                            <td><input type="text" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" class="form-input w-50"></td>
                            <td><?php echo $subtotal ?>/-</td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                            <td>
                                <input type="submit" value="Update Cart" class="bg-info px-2 py-1 border-light mx-4 text-light" name="update_cart">
                                <input type="submit" value="Remove Cart" class="bg-info px-2 py-1 border-light mx-4 text-light" name="remove_cart">
                            </td>
                        </tr>
                    <?php
                    }}
                    else
                    {
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                ?>
                
            </tbody>
        </table>
        </form>
    </div>
</div>

<!--function to remove item-->
<?php 
    function remove_cart_item()
    {
        global $con;
        if(isset($_POST['remove_cart']))
        {
            foreach($_POST['removeitem'] as $remove_id)
            {
                echo $remove_id;
                $delete_query="delete from cart_details where product_id=$remove_id";
                $run_delete=mysqli_query($con,$delete_query);
                if($run_delete)
                {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_id=remove_cart_item();
?>

<!-- Subtotal and buttons -->



<div class="container">
    <div class="row">
        <div class="d-flex mb-4 ">
            <?php
                if ($result_count > 0) {
                    echo '<h4>Subtotal: <strong>' . $total_price . '/-</strong></h4>';
                }
            ?>
            <div>
                <a href="index.php"><button class="bg-info px-3 py-1 border-light mx-3 text-light">Continue Shopping</button></a>
                <?php
                    if ($result_count > 0) {
                        echo '<a href="./users_area/checkout.php"><button class="bg-info px-3 py-1 border-light text-light">Checkout</button></a>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>






<!--include footer-->
<?php include("./includes/footer.php"); ?>  
<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>
</html>
