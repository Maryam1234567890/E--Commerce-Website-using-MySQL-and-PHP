<!--connect file-->
<?php
  include('../includes/connect.php');
  //include_once('../functions/common_function.php');

  @session_start();
//   error_reporting(E_ALL);
//   ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
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
      .logo
      {
          width:7%;
          height:7%;
      }
    </style>

</head>
<body>



            <!-- Fourth child -->
            <div class="row">
        <div class="col-md-12">
            <!-- Products -->
            <div class="row">
                <?php
                if (!isset($_SESSION['username'])) {
                    include('user_login.php');
                } 
                else 
                {
                      include('payment.php');
                }
                ?>
            </div>
        </div>
    </div>




  

  </div>
</div>





<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>