
<div hidden style="visibility:hidden; display:none; background-color:black; width:100vw;height:100vh;">
    
    <?php
        
    include 'mysqlConnection.php';
    // include '../constants/constants.php';
    $hotelTable="hotel";
    
    if(isset($_POST['hotelid']))
    {
        $sql = "select * from ".$hotelTable." where hotelid=".$_POST['hotelid'].";";
    }
    else{
        $sql = "select * from ".$hotelTable." where hotelid=".$_GET['hotelid'].";";
    }
    $conSql=mysqli_query($con,$sql);
    echo "eoe";

    //$exeQuery = mysqli_query($queryContents);
    if(mysqli_num_rows($conSql)<0){
        echo "<script>";
        echo "alert('No Hotels Available !!');";
        echo "window.location.replace('../AdminSection/AdminPage.php')"; //Redirects the user with JavaScript
        echo "</script>";
        die();
    }
    ?>
</div>
