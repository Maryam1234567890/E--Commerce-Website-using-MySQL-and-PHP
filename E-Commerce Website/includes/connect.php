<?php
    $con=mysqli_connect('localhost','root','','Mystore');
    if(!$con)
    {
        echo 'connetion successful';
    }
    // else
    // {
    //     die(mysqli_error($con));
    // }
?>