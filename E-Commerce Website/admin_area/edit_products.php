<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <?php
        include('../includes/connect.php'); // Include your database connection file.

        if(isset($_GET['edit_products']))
        {
            $edit_id = $_GET['edit_products'];

            // Fetch product data
            $get_data = "SELECT * FROM products WHERE product_id = '$edit_id'";
            $result = mysqli_query($con, $get_data);
            $row = mysqli_fetch_assoc($result);
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];

            // Select category name
            $select_category = "SELECT * FROM categories WHERE category_id = '$category_id'";
            $result_category = mysqli_query($con, $select_category);
            $row_category = mysqli_fetch_assoc($result_category);
            $category_title = $row_category['category_title'];

            // Select brand name
            $select_brand = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
            $result_brand = mysqli_query($con, $select_brand);
            $row_brand = mysqli_fetch_assoc($result_brand);
            $brand_title = $row_brand['brand_title'];
        }
    ?>
    <div class="container-fluid my-3">
        <h2 class="text-center">Edit Product</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Product Title -->
                    <div class="form-outline mb-4">
                        <label for="product_title" class="form-label">Product Title</label>
                        <br>
                        <input type="text" id="product_title" class="form-control" required="required" name="product_title" value="<?php echo $product_title; ?>">
                    </div>
                    <!-- Product Description -->
                    <div class="form-outline mb-4">
                        <label for="product_desc" class="form-label">Product Description</label>
                        <br>
                        <input type="text" id="product_desc" class="form-control" required="required" name="product_desc" value="<?php echo $product_description; ?>">
                    </div>
                    <!-- Product Keywords -->
                    <div class="form-outline mb-4">
                        <label for="product_keywords" class="form-label">Product Keywords</label>
                        <br>
                        <input type="text" id="product_keywords" class="form-control" required="required" name="product_keywords" value="<?php echo $product_keywords; ?>">
                    </div>
                    <!-- Product Category -->
                    <div class="form-outline mb-4">
                        <label for="product_category" class="form-label">Product Category</label>
                        <select name="product_category" class="form-select">
                            <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                            <?php
                                // Select all categories
                                $select_category_all = "SELECT * FROM categories";
                                $result_category_all = mysqli_query($con, $select_category_all);

                                while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                                    $category_title_all = $row_category_all['category_title'];
                                    $category_id_all = $row_category_all['category_id'];

                                    // Check if the current category is the selected one and skip it
                                    if ($category_id_all == $category_id) {
                                        continue;
                                    }

                                    echo "<option value='$category_id_all'>$category_title_all</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <!-- Product Brand -->
                    <div class="form-outline mb-4">
                        <label for="product_brand" class="form-label">Product Brand</label>
                        <select name="product_brand" class="form-select">
                            <option value="<?php echo $brand_id; ?>"><?php echo $brand_title; ?></option>
                            <?php
                                // Select all brands
                                $select_brand_all = "SELECT * FROM brands";
                                $result_brand_all = mysqli_query($con, $select_brand_all);

                                while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                                    $brand_title_all = $row_brand_all['brand_title'];
                                    $brand_id_all = $row_brand_all['brand_id'];

                                    // Check if the current brand is the selected one and skip it
                                    if ($brand_id_all == $brand_id) {
                                        continue;
                                    }

                                    echo "<option value='$brand_id_all'>$brand_title_all</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <!-- Product Image 1 -->
                    <div class="form-outline mb-4">
                        <label for="product_image1" class="form-label">Product Image 1</label>
                        <br>
                        <div class="d-flex">
                            <input type="file" id="product_image1" class="form-control w-90 m-auto" name="product_image1">
                            <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="product_img">
                        </div>
                    </div>
                    <!-- Product Image 2 -->
                    <div class="form-outline mb-4">
                        <label for="product_image2" class="form-label">Product Image 2</label>
                        <br>
                        <div class="d-flex">
                            <input type="file" id="product_image2" class="form-control w-90 m-auto" name="product_image2">
                            <img src="./product_images/<?php echo $product_image2; ?>" alt="" class="product_img">
                        </div>
                    </div>
                    <!-- Product Image 3 -->
                    <div class="form-outline mb-4">
                        <label for="product_image3" class="form-label">Product Image 3</label>
                        <br>
                        <div class="d-flex">
                            <input type="file" id="product_image3" class="form-control w-90 m-auto" name="product_image3">
                            <img src="./product_images/<?php echo $product_image3; ?>" alt="" class="product_img">
                        </div>
                    </div>
                    <!-- Product Price -->
                    <div class="form-outline mb-4">
                        <label for="product_price" class="form-label">Product Price</label>
                        <br>
                        <input type="text" id="product_price" class="form-control" required="required" name="product_price" value="<?php echo $product_price; ?>">
                    </div>
                    <!-- Update Product -->
                    <div class="form-outline mt-4 pt-2">
                        <input type="submit" value="Update Product" class="btn bg-info py-2 px-3 border-0 text-light" name="edit_product">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Updating products -->
    <?php
        if(isset($_POST['edit_product']))
        {
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_desc'];
            $product_keywords = $_POST['product_keywords'];
            $category_id = $_POST['product_category'];
            $brand_id = $_POST['product_brand'];
            $product_price = $_POST['product_price'];

            // Check if any image file was uploaded and move them
            if(!empty($_FILES['product_image1']['name'])) {
                $product_image1 = $_FILES['product_image1']['name'];
                $temp_image1 = $_FILES['product_image1']['tmp_name'];
                move_uploaded_file($temp_image1, "./product_images/$product_image1");
            }
            if(!empty($_FILES['product_image2']['name'])) {
                $product_image2 = $_FILES['product_image2']['name'];
                $temp_image2 = $_FILES['product_image2']['tmp_name'];
                move_uploaded_file($temp_image2, "./product_images/$product_image2");
            }
            if(!empty($_FILES['product_image3']['name'])) {
                $product_image3 = $_FILES['product_image3']['name'];
                $temp_image3 = $_FILES['product_image3']['tmp_name'];
                move_uploaded_file($temp_image3, "./product_images/$product_image3");
            }

            // Query to update products
            $update_product = "UPDATE products SET product_title='$product_title', 
                product_description='$product_description',
                product_keywords='$product_keywords', 
                category_id='$category_id', 
                brand_id='$brand_id', 
                product_price='$product_price'";

            if(!empty($_FILES['product_image1']['name'])) {
                $update_product .= ", product_image1='$product_image1'";
            }
            if(!empty($_FILES['product_image2']['name'])) {
                $update_product .= ", product_image2='$product_image2'";
            }
            if(!empty($_FILES['product_image3']['name'])) {
                $update_product .= ", product_image3='$product_image3'";
            }

            $update_product .= " WHERE product_id=$edit_id";

            $result_update = mysqli_query($con, $update_product);

            if($result_update)
            {
                echo "<script>alert('Product updated successfully')</script>";
                echo "<script>window.open('./insert_product.php','_self')</script>";
            }
        }
    ?>
    <!-- <?php include("../includes/footer.php") ?> -->
</body>
</html>
