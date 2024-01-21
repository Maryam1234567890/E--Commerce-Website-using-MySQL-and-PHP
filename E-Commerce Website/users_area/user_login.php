<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  @session_start(); //@ --> only if the page is active then start the session
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
        
        /* body
        {
            overflow-x: hidden;
        } */
        /* body 
        {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        footer 
        { 
            margin-top: auto;
        } */
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
                
            </ul>
            <form class="d-flex" role="search" action="../search_product.php" method="get">  <!-- d-flex is display flex, use dto display in horizontal row-->
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product" name="search_data_product">
            </form>
            </div>
        </div>
        </nav>

        <!--second child-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_login.php">Login</a>
                </li>
            </ul>
        </nav>


        <!-- third child-->
        <div class="bg-light">
        <h3 class="text-center" style="font-family:Lucida Handwriting; ">M&M Fashion</h3>
        <p class="text-center" style="font-family:Lucida Handwriting;"> Happy shopping!!
        </div>


    <div class="container-fluid my-3">  <!--container-fluid takes 100% of width -->
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                


                <form action="" method="post" enctype="multipart/form-data">  <!--enctype="multipart/form-data" is used to post images or any data that is not text-->
                    <!--username field-->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <br>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!--password field-->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">User Password</label>
                        <br>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!--login button-->
                    <div class="form-outline mt-4 pt-2">
                        <input type="submit" value="Login" class="btn bg-info py-2 px-3 border-0 text-light" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-info">Register</a></p>
                    </div>
                </form>



            </div>
        </div>
    </div>
        
    <!-- last child-->
    <!--include footer-->
    <?php include("../includes/footer.php") ?>
</body>
</html>



<?php
    if(isset($_POST['user_login']))
    {
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];
        $user_ip=getIPAddress();

        $select_query="select * from user_table where username='$user_username'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        //fetch password from database
        $row_data=mysqli_fetch_assoc($result);

        //cart item
        $select_query_cart="select * from cart_details where ip_address='$user_ip'";
        $select_cart=mysqli_query($con,$select_query_cart);
        $row_count_cart=mysqli_num_rows($select_cart);

        if($row_count>0)
        {
            $_SESSION['username']=$user_username; 
            if(password_verify($user_password, $row_data['user_password']))
            {
                //echo "<script>alert('Login Successful')</script>";
                
                if($row_count==1 and $row_count_cart==0)  //if user exists and has no items in cart
                {
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }
                else //user has items in cart
                {
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }
            else
            {
                echo "<script>alert('Invalid Credentials')</script>";
            }
        }
        else
        {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }

?>