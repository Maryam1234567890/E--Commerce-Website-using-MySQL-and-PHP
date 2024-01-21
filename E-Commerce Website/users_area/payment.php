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
    <title>Payment Page</title>
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
</head>
<style>
    img
    {
        width: 50%;
        margin: auto;
        display: block;
    }
</style>
<body>

    <!--php code to access user id-->
    <?php
        $user_ip=getIPAddress();
        $get_user="select * from user_table where user_ip='$user_ip'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_assoc($result);
        $user_id=$run_query['user_id'];


    ?>

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
        <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                      </li>";
            } else {
                echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
                      </li>";
            }
        ?>

        <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                        <a class='nav-link' href='user_login.php'>Login</a>
                      </li>";
            } else {
                echo "<li class='nav-item'>
                        <a class='nav-link' href='logout.php'>Logout</a>
                      </li>";
            }
        ?>
    </ul>
</nav>


    <div class="container">
        <h2 class="text-center py-3">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center text-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../images/upi.png" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id?>"><img src="../images/cod.png" alt=""></a>
            </div>
        </div>
    </div>

    <?php include("../includes/footer.php") ?>
</body>
</html>