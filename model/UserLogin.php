<?php

    
    include 'mysqlConnection.php';
    include '../constants/constants.php';
    if (isset( $_POST['login'] ) )
    {

        $email = $_POST['email'];
        $pwd =  $_POST['password'];  
        $sql = "select * from ".$userTable.";";
        $conSql=mysqli_query($con,$sql);
    
        if($email===$adminUserName && $pwd===$adminPassword)
        {
            session_start();
            $_SESSION["sessionId"]=session_id();
            $_SESSION["userType"]="admin";
            echo "<script>alert('ADMIN Login is Successfull !!');";
            echo "window.location.replace('../view/MainPage.php')</script>"; //Redirects the user with JavaScript
            die();
        }

        while ($row = mysqli_fetch_array($conSql)) {
            if(password_verify($pwd, $row[4]) and $email===$row[2])
            {
                
                    session_start();
                    $_SESSION['userId']=$row[0];
                    $_SESSION['userName']=$row[1];
                    $_SESSION['userEmail']=$row[2];
                    $_SESSION['mobile']=$row[3];
                    $_SESSION['password']=$row[4];
                    $_SESSION['isActive']=$row[5];
                    $_SESSION['AccCreatedOn']=$row[6];
                    $_SESSION['heroimg']=$row[7];
                    $_SESSION["sessionId"]=session_id();
                    $_SESSION["userType"]="user";

                    echo "<script>";
                    echo "alert('".$_SESSION['userName']." Login is Successfull !!');";
                    echo "window.location.replace('../view/MainPage.php')"; //Redirects the user with JavaScript
                    echo "</script>";
                    die();
            }
        }
                    echo "<script>";
                    echo "alert('Invalid Credentials Please Try Again !!');";
                    echo "window.location.replace('../view/login.php')"; //Redirects the user with JavaScript
                    echo "</script>";
                    die();
    }
    else{
        echo '<h1><center>401 PAGE IS UNAUTHORIZED<center><h1>';
    }
?>