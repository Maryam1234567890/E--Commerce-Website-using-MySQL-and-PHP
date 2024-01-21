<?php
    include('../includes/connect.php');
    if (isset($_POST['insert_cat'])) 
    {
        $category_title = mysqli_real_escape_string($con, $_POST['cat_title']); // Sanitize input to prevent SQL injection

        //select data from database
        $select_query = "select * from categories where category_title ='$category_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number>0)
        {
            echo "<script>alert('This category is present inside the database')</script>";
        }
        else
        {
            $insert_query = "insert into categories (category_title) VALUES ('$category_title')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                echo "<script>alert('Category has been inserted successfully')</script>";
            } else {
                echo "<script>alert('Category insertion failed: " . mysqli_error($con) . "')</script>";
            }
        }
    }
?>



<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2>">
    <div class="input-group mb-3 my-3">
        <span class="input-group-text w-90 mb-2 bg-info " id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3 my-4 m-auto">
        
        <input type="submit" class="bg-info border-0 p-2 m-3" name="insert_cat" placeholder="Insert Categories" value="Insert Categories" >
        <!-- <button class="bg-info border-0 text-light p-2 my-3">Insert Categories</button> -->
    </div>
</form>
<!-- <?php include("../includes/footer.php") ?> -->



