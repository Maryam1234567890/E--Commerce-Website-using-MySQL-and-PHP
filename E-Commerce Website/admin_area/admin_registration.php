
<?php
// Include your database connection code (e.g., $connection)
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_POST['admin_register'])) {
    $admin_name = mysqli_real_escape_string($con, $_POST['admin_username']);
    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_password = $_POST['admin_password'];
    $conf_admin_password = $_POST['conf_admin_password'];

    if (empty($admin_name) || empty($admin_password) || empty($conf_admin_password) || empty($admin_email)) {
        echo "<script>alert('Please fill in all the fields.')</script>";
    } elseif ($admin_password != $conf_admin_password) {
        echo "<script>alert('Passwords do not match.')</script>";
    } elseif (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.')</script>";
    } else {
        // Check if the username or email already exists
        $select_query = "SELECT * FROM admin WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
        $result = mysqli_query($con, $select_query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username or email already exists.')</script>";
        } else {
            // Hash the password
            $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

            // Insert the new admin
            $insert_query = "INSERT INTO admin (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hash_password')";
            $sql_execute = mysqli_query($con, $insert_query);

            if ($sql_execute) {
                echo "<script>alert('Admin registered successfully.')</script>";
                echo "<script>window.open('admin_login.php','_self')</script>";
            } else {
                echo "<script>alert('Error registering admin.')</script>";
                // You can include additional error handling here
            }
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <h2 class="text-center mb-5">
            Admin Registration
        </h2>
        <div class="row d-flex align-utems-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="admin_username"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="text" id="admin_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="admin_email"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="admin_password"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_admin_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_admin_password" class="form-control" placeholder="Confirm your Password" autocomplete="off" required="required" name="conf_admin_password"/>
                    </div>
                    <div class="">
                        <input type="submit" value="Register" class="btn bg-info px-3 py-2 border-0" name="admin_register">
                        <p class="small mt-2 pt-1">Already have an account?<a href="./admin_login.php"><strong>  Login</strong></a></p>
                    </div>
                </form>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>   
</body>
</html>

