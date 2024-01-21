<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();

  // Check if the 'user_id' key is set in the URL query parameters.
  if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
  } 
  else 
  {
    $user_id = 0;
  }

  // Get the user's IP address
  $get_ip_address = getIPAddress();
  
  // Initialize variables
  $total_price = 0;
  $count_products = 0;
  $invoice_number = mt_rand();
  $status = 'pending';

  // Query the cart for the products and calculate the total price
  $cart_query_price = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
  $result_cart_price = mysqli_query($con, $cart_query_price);

  while($row_price = mysqli_fetch_assoc($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM products WHERE product_id = $product_id";
    $run_price = mysqli_query($con, $select_product);

    while($row_product_price = mysqli_fetch_assoc($run_price)) {
      $product_price = $row_product_price['product_price'];
      $total_price += $product_price;
    }

    $count_products++;
  }

  // Get the quantity from the cart
  $get_cart = "SELECT * FROM cart_details";
  $run_cart = mysqli_query($con, $get_cart);
  $get_item_quantity = mysqli_fetch_array($run_cart);
  $quantity = $get_item_quantity['quantity'];

  if($quantity == 0) {
    $quantity = 1;
  }

  $subtotal = $total_price * $quantity;

  // Insert the order into the database
  $insert_orders = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ('$user_id', '$subtotal', '$invoice_number', '$count_products', NOW(), '$status')";
  $result_query = mysqli_query($con, $insert_orders);

  if($result_query) {
    echo "<script>alert('Order submitted successfully')</script>"; 
    echo "<script>window.open('profile.php','_self')</script>";
  }


  //Insert pending orders
  $insert_pending_orders = "INSERT INTO orders_pending (user_id, invoice_number, product_id, quantity, order_status) VALUES ('$user_id', '$invoice_number', '$product_id', '$quantity', '$status')";
  $result_pending_orders = mysqli_query($con, $insert_pending_orders);

  //Delete items from cart after placing order
  $empty_cart="delete from cart_details where ip_address='$get_ip_address'";
  $result_delete=mysqli_query($con,$empty_cart);



?>
