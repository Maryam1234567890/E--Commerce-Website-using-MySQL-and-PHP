<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include('../includes/connect.php');
    //include('index.php');

    if(isset($_POST["insert_product"])) {
        $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
        $product_description = mysqli_real_escape_string($con, $_POST['product_description']);
        $keywords = mysqli_real_escape_string($con, $_POST['keywords']);
        $product_categories = (int)$_POST['product_categories'];
        $product_brands = (int)$_POST['product_brands'];
        $product_price = (float)$_POST['product_price'];
        $product_status = 'true';

        // Accessing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // Accessing image temp names
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        // Checking for empty fields
        if(empty($product_title) || empty($product_description) || empty($keywords) || empty($product_categories) || empty($product_brands) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)) {
            echo "<script>alert('Please fill all the required fields')</script>";
        } else {
            move_uploaded_file($temp_image1, "product_images/$product_image1");
            move_uploaded_file($temp_image2, "product_images/$product_image2");
            move_uploaded_file($temp_image3, "product_images/$product_image3");

            // Insert query 
            $insert_product = "INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$product_description', '$keywords', $product_categories, $product_brands, '$product_image1', '$product_image2', '$product_image3', $product_price, NOW(), '$product_status')";

            $result_query = mysqli_query($con, $insert_product);
            if ($result_query) {
                echo "<script>alert('Successfully inserted the product')</script>";
            } 
        }
    }
    @session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // User is logged in, display "Logout" button
    $logoutButton = '<a href="logout.php"><button class="bg-info px-2 py-1 border-light text-light my-5">Logout</button></a>';
    echo "<script>window.open('index.php','_self')</script>";
} else {
    // User is not logged in, display "Login" button
    $logoutButton = '<a href="admin_login.php"><button class="bg-info px-2 py-1 border-light text-light my-5">Login</button></a>';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>
    <!--bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKulqmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
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
    </style>
</head>
<body class="bg-light">
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
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../display_all.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./admin_registration.php">Register</a> 
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./admin_login.php">Login</a>
                </li>
                
            </ul>

            
            
            </div>
        </div>
        </nav>


   
        <!-- third child-->
        <div class="row">
            <div class="col-md-12 bg-info d-flex justify-content-center">

              
                <!--button*10>a.nav-link.text-light.bg-info.my-1-->
                <div class="button text-center">
                    
                    <a href="insert_product.php"><button class="bg-info px-2 py-1 border-light text-light my-5">Insert Products</button></a>
                    <a href="index.php?view_products"><button class="bg-info px-2 py-1 border-light text-light my-5">View Products</button></a>
                    <a href="index.php?insert_category"><button class="bg-info px-2 py-1 border-light text-light my-5">Insert Categories</button></a>
                    <a href="index.php?view_categories"><button class="bg-info px-2 py-1 border-light text-light my-5">View Categories</button></a>
                    <a href="index.php?insert_brands"><button class="bg-info px-2 py-1 border-light text-light my-5">Insert Brands</button></a>
                    <a href="index.php?view_brands"><button class="bg-info px-2 py-1 border-light text-light my-5">View Brands</button></a>
                    <a href="index.php?list_orders"><button class="bg-info px-2 py-1 border-light text-light my-5">All Orders</button></a>
                    <a href="index.php?list_payments"><button class="bg-info px-2 py-1 border-light text-light my-5">All Payments</button></a>
                    <a href="index.php?list_users"><button class="bg-info px-2 py-1 border-light text-light my-5">List Users</button></a>
                    <!-- <a href="logout.php"><button class="bg-info px-2 py-1 border-light text-light my-5">Logout</button></a> -->
                    <?php echo $logoutButton; ?>

                </div>      
            </div>  
        </div>
    </div>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">  <!--enctype="multipart/form-data" is used to post images or any data that is not text-->
        <!--product title-->    
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">   <!--for and id should be same-->
        </div>
        <!--product description-->    
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">   <!--for and id should be same-->
        </div>
        <!--product keyworkd-->    
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="keywords" class="form-label">Keywords</label>
            <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">   <!--for and id should be same-->
        </div>
        <!--categories-->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_categories" id="" class="form-select">
                <option value="">Select a Category</option>
                <?php 
                    $select_query="select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>
                <!-- <option value="">cat 1</option>
                <option value="">cat 2</option>
                <option value="">cat 3</option> -->
            </select>
        </div>
        <!--brands-->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class="form-select">
                <option value="">Select a Brand</option>
                <?php 
                    $select_query="select * from brands";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
                <!-- <option value="">b 1</option>
                <option value="">b 2</option>
                <option value="">b 3</option> -->
            </select>
        </div>
       

        
        <!--image 1-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
        </div>
        <!--image 2-->    
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
        </div>
        <!--image 3-->    
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
        </div>




        <!--product keyworkd-->    
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">   <!--for and id should be same-->
        </div>
        <!--Price-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">   <!--for and id should be same-->
        </div>


        


        </form>
    </div>
    <!-- last child-->
    <!--include footer-->
    <?php include("../includes/footer.php") ?>
</body>
</html>
