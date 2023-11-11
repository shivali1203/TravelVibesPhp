
<div hidden style="visibility:hidden; display:none; background-color:black; width:100vw;height:100vh;">
    
    <?php
         if (session_status() === PHP_SESSION_NONE) {
            session_start();
          }

        include 'mysqlConnection.php';
    
          // this gives all the hotels booked by the user logged in
        $sql = "select * from userbooking as u join billdata as b on u.billid=b.billid join hotel as h on h.hotelid=u.hotelid where u.userid=".$_SESSION['userId']." and u.packageId=0 and b.TotalPackagePrice=0;";
    
        $conSql=mysqli_query($con,$sql);

    if(mysqli_num_rows($conSql)<0){
        echo "<script>";
        echo "alert('No Hotels Available !!');";
        echo "window.location.replace('../AdminSection/AdminPage.php')"; //Redirects the user with JavaScript
        echo "</script>";
        die();
    }
    ?>
</div>
