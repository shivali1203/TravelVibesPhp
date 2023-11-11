<?php

include 'mysqlConnection.php';
include '../constants/constants.php';
if (isset( $_POST['signin'] ) )
{
     $name = $_POST['name']; 
    $email = $_POST['email'];
    $pwd =  password_hash($_POST['password'],PASSWORD_BCRYPT);
    $mobile = $_POST['mobile'];
    $accCreationDate=date("Y-m-d h:i:sa");
 
 

    $target_file=null;
    $Catch=false;
        if(isset($_FILES["file"]["tmp_name"])===0){
        $check = getimagesize($_FILES["file"]["tmp_name"]);                                     
        }
        else{
            $catch=true;
            $Catch=true;
        }
   
    if($check !== false && $Catch===false) 
    {    
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/WT(indus sem5)/Travel/assets/Images/UserProfileImages/";
        $uploadOk = 0;
        $target_file = $target_dir.''.$name.'/'.basename($_FILES["file"]["name"]);              // getting the multipartfile data from the form
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));                 // check the extension weather it is jpg,png 
       
        $uploadOk = 1;  
        if (!file_exists($target_dir.''.$name)) {
            echo "<br>making directory";
            mkdir($target_dir.''.$name, 0777, true);
        }   

        if (file_exists($target_file)) {
            // echo "<br >Sorry, file already exists.";
            unlink($target_file);    // DELETE THE FILE
            if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)) {                 
                // echo "< br > Your File Updated Successfully Uploaded < br >";
            }
            else{
                echo "<script>";
                echo "alert('ERROR : Image was unable to save , please signin again !!');";
                echo "window.location.replace('../view/signin.php')"; //Redirects the user with JavaScript
                echo "</script>";
                die();
            }
        }
        else
        {
             if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)) {                 
            }
            else{
                echo "<script>";
                echo "alert('ERROR : Image was unable to save , please signin again !!');";
                echo "window.location.replace('../view/signin.php')"; //Redirects the user with JavaScript
                echo "</script>";
                die();
            }
        }

      } 
      else if($Catch==true){}
      else {
        echo "File is not an image.";
        $uploadOk = 0;

        echo "<script>";
        echo "alert('ERROR : Invalid Image File !!');";
        echo "window.location.replace('../view/signin.php')"; //Redirects the user with JavaScript
        echo "</script>";
        die();
      }

    
    $sql = "INSERT INTO ".$userTable." (".$userName.", ".$userEmail.", ".$mobileNo." , ".$password.",".$AccCreatedOn.",".$heroimg.")
    VALUES ('".$name."', '".$email."', '".$mobile."','".$pwd."','".$accCreationDate."' ,'".(($target_file!==NULL)?substr($target_file,37):"/assets/Images/UserProfileImages/profile.png")."')";
    if (mysqli_query($con, $sql)) {
       

        echo "<script>";
        echo "alert('Data Added Sucessfully !!');";
        echo "window.location.replace('../view/MainPage.php')"; //Redirects the user with JavaScript
        echo "</script>";
        die(); //Stops PHP from further execution
    
    } else {
     
        echo "<script>";
        echo "alert('Please Retry !!');";
        echo "window.location.replace('../view/signin.php')"; //Redirects the user with JavaScript
        echo "</script>";
        die(); //Stops PHP from further execution
    }
}
else{
    echo '<h1><center>401 PAGE IS UNAUTHORIZED<center><h1>';
}

?> 