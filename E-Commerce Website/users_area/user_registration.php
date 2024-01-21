<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../display_all.php">Products</a>
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



        <!-- third child-->
        <div class="bg-light">
        <h3 class="text-center" style="font-family:Lucida Handwriting; ">M&M Fashion</h3>
        <p class="text-center" style="font-family:Lucida Handwriting;"> Happy shopping!!
        </div>


    <div class="container-fluid my-3">  <!--container-fluid takes 100% of width -->
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                


                <form action="" method="post" enctype="multipart/form-data">  <!--enctype="multipart/form-data" is used to post images or any data that is not text-->
                    <!--username field-->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <br>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!--email field-->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <br>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!--image field-->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <br>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>
                    <!--password field-->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">User Password</label>
                        <br>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!--confirm password field-->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <br>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <!--address field-->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <br>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                    </div>
                    <!--contact field-->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <br>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <!--register button-->
                    <div class="form-outline mt-4 pt-2">
                        <input type="submit" value="Register" class="btn bg-info py-2 px-3 border-0 text-light" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-info">Login</a></p>
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


<!--php code-->
<?php
        if(isset($_POST['user_register']))
        {
            $user_username=$_POST['user_username'];
            $user_email=$_POST['user_email'];
            $user_image=$_FILES['user_image']['name'];  //image
            $user_image_tmp=$_FILES['user_image']['tmp_name'];
            $user_password=$_POST['user_password'];
            $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
            $conf_user_password=$_POST['conf_user_password'];
            $user_address=$_POST['user_address'];
            $user_contact=$_POST['user_contact'];
            $user_ip=getIPAddress();
            
            //select query
            $select_query="select * from user_table where username='$user_username' or user_email='$user_email'";
            $result=mysqli_query($con,$select_query);
            $rows_count=mysqli_num_rows($result);
            if($rows_count>0)
            {
                echo "<script>alert('Username or Email already exists')</script>";
            }
            else if($user_password!=$conf_user_password)
            {
                echo "<script>alert('Passwords do not match')</script>";
            }
            else
            {
                //insert_query
                move_uploaded_file($user_image_tmp,"../user_images/$user_image");
                $insert_query="insert into user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) 
                values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
                $sql_execute=mysqli_query($con,$insert_query);
                if($sql_execute)
                {
                    echo "<script>alert('Data inserted successfully. Please Login.')</script>";
                }
                else
                {
                    die(mysqli_error($con));
                }
            }

            //selecting cart items
            $select_cart_items="select * from cart_details where ip_address='$user_ip'";
            $result_cart=mysqli_query($con,$select_cart_items);
            $rows_count=mysqli_num_rows($result_cart);
            if($rows_count>0)
            {
                $_SESSION['username']=$user_username;
                // echo "<script>alert('You have items in your cart')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }
            else
            {
                echo "<script>window.open('../index.php','_self')</script>";
            }


        }

?>