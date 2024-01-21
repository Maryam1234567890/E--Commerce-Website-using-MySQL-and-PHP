<?php
@session_start();
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE username = '$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
    $user_image = $row_fetch['user_image'];
}

if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $new_username = mysqli_real_escape_string($con, $_POST['username']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_address = mysqli_real_escape_string($con, $_POST['user_address']);
    $user_mobile = mysqli_real_escape_string($con, $_POST['user_mobile']);

    // Check if a new image was uploaded
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

    if (!empty($_FILES['user_image']['name'])) 
    {
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $image_path = "./user_images/" . $user_image;
        move_uploaded_file($user_image_tmp, $image_path);
        $update_data = "UPDATE user_table SET username = '$new_username', user_email = '$user_email', user_image = '$user_image', user_address = '$user_address', user_mobile = '$user_mobile' WHERE user_id = '$update_id'";
    } else 
    {
        // No new image uploaded, keep the old one
        $update_data = "UPDATE user_table SET username = '$new_username', user_email = '$user_email', user_address = '$user_address', user_mobile = '$user_mobile' WHERE user_id = '$update_id'";
    }
    

    $result_query_update = mysqli_query($con, $update_data);
    if ($result_query_update) {
        echo "<script>alert('Data updated successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .edit_img
    {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }
</style>
<body>
    <h3 class="text-center mt-3 mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo $user_email; ?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="user_images/<?php echo $user_image; ?>" alt="" class="edit_img">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $user_address; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo $user_mobile; ?>">
        </div>
        <input type="submit" value="Update" class="btn bg-info px-2 py-1 border-light mx-4 text-light" name="user_update">
    </form>
</body>
</html>