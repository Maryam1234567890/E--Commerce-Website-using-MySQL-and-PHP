
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if (isset($_POST['admin_login'])) {
    $admin_username = mysqli_real_escape_string($con, $_POST['admin_username']);
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM `admin` WHERE admin_name='$admin_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        $row_data = mysqli_fetch_assoc($result);
        if (password_verify($admin_password, $row_data['admin_password'])) {
            $_SESSION['username'] = $admin_username;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <div class="container fluid my-3">
        <h2 class="text-center">
            Admin Login
        </h2>
        <div class="row d-flex align-utems-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="admin_username"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="admin_password"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="btn bg-info px-3 py-2 border-0" name="admin_login">
                        <p class="small mt-2 pt-1">Don't have an account?<a href="./admin_registration.php"><strong>  Register</strong></a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>

