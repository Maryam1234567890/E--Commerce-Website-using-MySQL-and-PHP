<!-- sessions are used to store info (eg: when u login to website, u dont need to login again. ORR once u login and logout and login again your changes and  info is stored ) -->
<!-- the data is stored inside the server. We access data directly from the server-->
<?php
    //sessions()
    session_start();  //used for storing login details
    $_SESSION['username']="Maryam";
    $_SESSION['password']="Khan";
    $_SESSION['email']="maryam@gmail.com";
    echo "Session data is saved";

    



?>