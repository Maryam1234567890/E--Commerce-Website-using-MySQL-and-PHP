
<?php
include('../includes/connect.php');
include('../functions/common_function.php');

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
    <title>Admin Dashboard</title>
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
    <!-- css file-->
    <link rel="stylesheet" href="../style.css">

    <style>
        .admin_image
        {
            width:100px;
            object-fit: contain;
        }
        .footer
        {
            position: absolute;
            bottom: 0;
        }
        .fixed-bottom-footer 
        {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #17a2b8; /* Customize the background color as needed */
            color: #fff; /* Customize the text color as needed */
        }
        .product_img
        {
            width:10%;
            object-fit:contain;
        }
    </style>

</head>
<body>


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


    

    
        <!--third child-->
        
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

    <!--fourth child-->
    <div class="container my-3">
        <?php 
            if(isset($_GET['insert_category']))
            {
                include('insert_categories.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['insert_brands']))
            {
                include('insert_brands.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['view_products']))
            {
                include('view_products.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['edit_products']))
            {
                include('edit_products.php');
            }
        ?>
    </div>
    <div class="container">
        <?php 
            if(isset($_GET['delete_product']))
            {
                include('delete_product.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['view_categories']))
            {
                include('view_categories.php');
            }
        ?>
    </div>
    <div class="container">
        <?php 
            if(isset($_GET['view_brands']))
            {
                include('view_brands.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['edit_category']))
            {
                include('edit_category.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['edit_brand']))
            {
                include('edit_brand.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['delete_category']))
            {
                include('delete_category.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['delete_brand']))
            {
                include('delete_brand.php');
            }
        ?>
        <div class="container">
        <?php 
            if(isset($_GET['list_orders']))
            {
                include('list_orders.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['list_payments']))
            {
                include('list_payments.php');
            }
        ?>
    </div>

    <div class="container">
        <?php 
            if(isset($_GET['list_users']))
            {
                include('list_users.php');
            }
        ?>
    </div>

    </div>

    <!-- last child-->
    <!-- <div class="footer bg-info p-3 text-center">
        <p>All rights reserved © - Designed by Maryam and Manasvi </p>
    </div>  -->
    <!-- <div class="fixed-bottom-footer">
       
    </div> -->
    <?php include("../includes/footer.php") ?>

 <!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>   

</body>
</html>
