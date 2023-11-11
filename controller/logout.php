<?php 

    session_start();
    session_destroy();
    // session_abort();
    echo "<script>";
    echo "alert('You have been Loged Out !! ".session_status()."');";
    echo "window.location.replace('../view/login.php')"; //Redirects the user with JavaScript
    echo "</script>";

?>