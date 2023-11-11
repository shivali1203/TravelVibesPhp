<div >
 
 
    <?php
          
            include 'mysqlConnection.php';
            // include '../constants/constants.php';
            $packageTable="package";
            $sql = "update ".$packageTable." set deletePackage=1 where packageid=".$_GET['packageId'].";";


            //$exeQuery = mysqli_query($queryContents);
            if (mysqli_query($con,$sql)) {

                    echo "<script>";
                    echo "alert('Package deleted !!');";
                    echo "window.location.replace('../view/AdminSection/viewPackages.php')"; //Redirects the user with JavaScript
                    echo "</script>";
                        
        }
        else {
                
                
                echo "<script>";
                echo "alert('Packages unable to delete !!');";
                echo "window.location.replace('../view/AdminSection/viewPackages.php')"; //Redirects the user with JavaScript
                echo "</script>";


              }    ?>


</div>
