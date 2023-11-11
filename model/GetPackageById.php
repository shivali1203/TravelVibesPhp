<div hidden style="visibility:hidden; display:none;">
    <?php
          
            include 'mysqlConnection.php';
            // include '../constants/constants.php';
            $packageTable="package";
                    
            if(isset($_POST['packageId']))
            {
             $sql = "select * from ".$packageTable." where packageid=".$_POST['packageId'].";";
            }
            if(isset($_GET['packageId']))
            {
                $sql = "select * from ".$packageTable." where packageid=".$_GET['packageId'].";";
            }
            $conSql=mysqli_query($con,$sql);


            //$exeQuery = mysqli_query($queryContents);
            if(mysqli_num_rows($conSql)<0){
                echo "<script>";
                echo "alert('Package Not Available !!');";
                echo "window.location.replace('../AdminSection/viewPackages.php')"; //Redirects the user with JavaScript
                echo "</script>";
                die();
            }


    ?>
</div>
