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
    <title>Ecommerce Website using PHP and MySQL</title>
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
          <a class="nav-link" href="./users_area/user_registration.php">Register</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>   <!-- use fontawesome to get logos, sup is superscript to show no. of items in cart-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: Rs.<?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">  <!-- d-flex is display flex, use dto display in horizontal row-->
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

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

<!-- fourth child-->
<div class="row">
  <div class="col-md-10">
    <!--products-->
    <div class="row">
      <!--fetching products-->
      <?php
        //calling function 
        get_all_products();
        get_unique_categories();
        get_unique_brands();
      // $select_query = "SELECT * FROM `products` order by rand()";  //limit 0,7 to display only 7 products
      // $result_query=mysqli_query($con,$select_query);
      // // $row=mysqli_fetch_assoc($result_query);
      // // echo $row['product_title'];
      // while($row=mysqli_fetch_assoc($result_query))
      // {
      //   $product_id=$row['product_id'];
      //   $product_title=$row['product_title'];
      //   $product_description=$row['product_description'];
      //   $product_image1=$row['product_image1'];
      //   $product_price=$row['product_price'];
      //   $category_id=$row['category_id'];
      //   $brand_id=$row['brand_id'];
      //   // echo $product_title;
      //   // echo "<br>";
      //   echo "<div class='col-md-4 mb-2'>
      //   <div class='card'>
      //     <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      //     <div class='card-body'>
      //       <h5 class='card-title'>$product_title</h5>
      //       <p class='card-text'>$product_description</p>
      //       <a href='#' class='btn btn-primary'>Add To Cart</a>
      //       <a href='#' class='btn btn-info text-light'>View More</a>
      //     </div>
      //   </div>
      // </div>";
      // }
      ?>
      <!-- <div class="col-md-4 mb-2">
        <div class="card">
          <img src="./images/watch2.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add To Cart</a>
            <a href="#" class="btn btn-info text-light">View More</a>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-4 mb-2">
        <div class="card">
            <img src="./images/shirt4.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Add To Cart</a>
              <a href="#" class="btn btn-info text-light">View More</a>
            </div>
          </div> 
      </div>
      <div class="col-md-4 mb-2">
      <div class="card">
          <img src="./images/shoe4.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add To Cart</a>
            <a href="#" class="btn btn-info text-light">View More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-2">
        <div class="card">
            <img src="./images/shirt1.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Add To Cart</a>
              <a href="#" class="btn btn-info text-light">View More</a>
            </div>
          </div> 
      </div>
      <div class="col-md-4 mb-2">
        <div class="card">
            <img src="./images/watch1.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Add To Cart</a>
              <a href="#" class="btn btn-info text-light">View More</a>
            </div>
          </div> 
      </div>
      <div class="col-md-4 mb-2">
        <div class="card">
            <img src="./images/shoe1.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Add To Cart</a>
              <a href="#" class="btn btn-info text-light">View More</a>
            </div>
          </div> 
      </div> -->

    <!--row end-->  
    </div>
   <!--column end--> 
  </div>
  <div class="col-md-2 mb-2 bg-info p-0" >
    <!--sidenav-->

    <ul class="navbar-nav me-auto text-center">
      <!--brands to be displayed-->
      <li class="nav-item" >
        <a href="#" class="nav-link text-light bg-primary"><h4>Delivery Brands</h4></a>
      </li>
      <?php
        getbrands();
        // $select_brands = "select * from brands";
        // $result_brands = mysqli_query($con, $select_brands);
        // while ($row_data = mysqli_fetch_assoc($result_brands)) 
        // {
        //   $brand_title = $row_data['brand_title'];
        //   $brand_id = $row_data['brand_id'];
        //   echo "<li class='nav-item'>
        //   <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        //   </li>";
        // }
      ?>

      <!-- <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand 1</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand 3</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand 3</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand 4</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand 5</a>
      </li> -->
    </ul>

    <ul class="navbar-nav me-auto text-center">
      <!--categories to be displayed-->
      <li class="nav-item" >
        <a href="#" class="nav-link text-light bg-primary"><h4>Categories</h4></a>
      </li>
      <?php
        getcategories();
        // $select_categories = "select * from categories";
        // $result_categories = mysqli_query($con, $select_categories);
        // while ($row_data = mysqli_fetch_assoc($result_categories)) 
        // {
        //   $category_title = $row_data['category_title'];
        //   $category_id = $row_data['category_id'];
        //   echo "<li class='nav-item'>
        //   <a href='index.php?category =$category_id' class='nav-link text-light'>$category_title</a>
        //   </li>";
        // }
      ?>

      <!-- <li class="nav-item">
        <a href="#" class="nav-link text-light">Categories 1</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Categories 3</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Categories 3</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Categories 4</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Categories 5</a>
      </li> -->
    </ul>

  </div>
</div>



<!-- last child-->
  <div class="bg-info p-3 text-center">
    <p>All rights reserved © - Designed by Maryam and Manasvi </p>
  </div> 

 



<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>