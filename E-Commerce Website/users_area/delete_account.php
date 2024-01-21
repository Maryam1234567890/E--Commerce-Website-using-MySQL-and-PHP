<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-center mb-4 mt-4x">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mt-6">
            <input type="submit" value="Delete Account" class="btn bg-info px-5 py-2 border-light mx-4 text-light w-30" name="delete">
        </div>
        <div class="form-outline mt-6">
            <input type="submit" value="Don't Delete Account" class="btn bg-info px-4 py-2 border-light mx-4 text-light mt-4 w-20" name="dont_delete">
        </div>
    </form>
</body>
</html>

<?php
    @session_start();
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete']))
    {
        $delete_query="delete from user_table where username='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result)
        {
            session_destroy();
            echo "<script>alert('Account deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete']))
    {
        echo "<script>window.open('profile.php','_self')</script>";
    }

?>