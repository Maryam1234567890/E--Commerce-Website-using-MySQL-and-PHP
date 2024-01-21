<?php
    session_start();
    if(isset($_SESSION['username']))
    {
        echo "Welcome ".$_SESSION['username'];
        echo "<br>";
        echo "Your password is ".$_SESSION['password'];
        echo "<br>";
        echo "Your email is ".$_SESSION['email'];
    }
    else
    {
        echo "Please login to continue";
    }

?>