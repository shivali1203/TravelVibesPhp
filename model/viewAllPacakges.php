<?php

    include 'mysqlConnection.php';
    // include '../constants/constants.php';
    $packageTable="package";
               
    $sql = "select * from ".$packageTable." where deletePackage=0;";
    $conSql=mysqli_query($con,$sql);


    //$exeQuery = mysqli_query($queryContents);
    if(mysqli_num_rows($conSql)<0){
        echo "<script>";
        echo "alert('No Package Available !!');";
        echo "window.location.replace('../AdminSection/AdminPage.php')"; //Redirects the user with JavaScript
        echo "</script>";
        die();
    }
    
    
?>