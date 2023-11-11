<?php


    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION['userType'])!==true)
    {

        echo "<script>";
        echo "alert('Only Admin Can View This Page!!');";
        echo "window.location.replace('../../view/MainPage.php')"; //Redirects the user with JavaScript
        echo "</script>";
    }
    else if(isset($_SESSION['userType'])===true && $_SESSION['userType']==='admin')
    {

        echo "<script>";
        echo "alert('Only Admin Can View This Page!!');";
        echo "window.location.replace('../../view/MainPage.php')"; //Redirects the user with JavaScript
        echo "</script>";
    }
    else{}    
?>