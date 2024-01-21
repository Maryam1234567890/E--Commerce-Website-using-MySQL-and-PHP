<!--connect file-->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
    <link rel="stylesheet" href="../style.css">

    <style>
      .card-img-top
      {
          width: 100%;
          height: 200px;
          object-fit: contain;
      }
      .profile_img
      {
          width: 100%;
          height: 200px;
          object-fit: contain;
          display: block;
      }
      
    </style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">  <!-- container-fluid is a bootstrap class that takes 100% width of the screen-->
        <!--first child-->
        <nav class="navbar navbar-expand-lg bg-primary">  <!-- navbar-expand-lg is for interactive website, bg-info changes background color to blue-->
  <div class="container-fluid">
    <img src="../images/logo.png" alt="" class="logo"></img>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!--when we make the navbar small, to the side of screen-->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>   <!-- use fontawesome to get logos, sup is superscript to show no. of items in cart-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: Rs.<?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="get">  <!-- d-flex is display flex, use dto display in horizontal row-->
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product" name="search_data_product">
      </form>
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
              <a class='nav-link' href='user_login.php'>Login</a>
                    </li>";
            }
            else
            {
              echo "<li class='nav-item'>
              <a class='nav-link' href='logout.php'>Logout</a>
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


<!--fourth child-->
<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-info text-center" style="height:100vh">
            <li class="nav-item bg-primary">
                <a class="nav-link text-light" href="#"><h4>Your Profile</h4></h1></a> 
            </li>

            <?php
                $username=$_SESSION['username'];
                $user_image="select * from user_table where username='$username'";
                $user_image=mysqli_query($con,$user_image);
                $row_image=mysqli_fetch_array($user_image);
                $user_image=$row_image['user_image'];
                echo "<li class='nav-item bg-info mt-3'>
                        <img src='./user_images/$user_image' alt='' class='profile_img'>
                    </li>";
            ?>


            <li class="nav-item bg-info">
                <a class="nav-link text-light" href="profile.php">Pending Orders</h1></a> 
            </li>
            <li class="nav-item bg-info">
                <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</h1></a> 
            </li>
            <li class="nav-item bg-info">
                <a class="nav-link text-light" href="profile.php?my_orders">My Orders</h1></a> 
            </li>
            <li class="nav-item bg-info">
                <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</h1></a> 
            </li>
            <li class="nav-item bg-info">
                <a class="nav-link text-light" href="logout.php">Logout</h1></a> 
            </li>

        </ul>
    </div>
    <div class="col-md-10 text-center">
        <?php 
            get_user_order_details(); 
            if(isset($_GET['edit_account']))
            {
              include('edit_account.php');
            }
            if(isset($_GET['my_orders']))
            {
              include('user_orders.php');
            }
            if(isset($_GET['delete_account']))
            {
              include('delete_account.php');
            }
        
        ?>
    </div>
</div>

<!-- last child-->
<!--include footer-->
<?php include("../includes/footer.php") ?>

 



<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>