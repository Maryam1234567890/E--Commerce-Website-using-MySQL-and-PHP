<?php
    include('../includes/connect.php');
    if (isset($_POST['insert_brand'])) 
    {
        $brand_title = mysqli_real_escape_string($con, $_POST['brand_title']); // Sanitize input to prevent SQL injection

        //select data from database
        $select_query = "select * from brands where brand_title ='$brand_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number>0)
        {
            echo "<script>alert('This brand is present inside the database')</script>";
        }
        else
        {
            $insert_query = "insert into brands (brand_title) VALUES ('$brand_title')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                echo "<script>alert('Brand has been inserted successfully')</script>";
            } else {
                echo "<script>alert('Brand insertion failed: " . mysqli_error($con) . "')</script>";
            }
        }
    }
?>


<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2>">
    <div class="input-group mb-3 my-3">
        <span class="input-group-text w-90 mb-2 bg-info " id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3 my-4 m-auto">
        
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" placeholder="Insert Categories" value="Insert Brands" >
        <!-- <button class="bg-info border-0 text-light p-2 my-3">Insert Brands</button> -->
    </div>
</form>

