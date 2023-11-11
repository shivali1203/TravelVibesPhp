<?php


    
include 'mysqlConnection.php';
include '../constants/constants.php';

    if (isset( $_POST['createHotel'] ) )
    {
        // $hotelTable=".hotel";
        $id=$_POST['hotelid'];
        $name=$_POST['name'];
        $type=$_POST['type'];
        $city=$_POST['city'];
        $price=$_POST['price'];
        $state=$_POST['state'];
        $star=(int) $_POST['star'];
        $maxPeopleInroom=(int) $_POST['maxPeopleInRoom'];
        $roomAvail=(int) $_POST['roomAvailable'];
        $features=htmlspecialchars($_POST['features']);
        $hotelCreationDT=date("Y-m-d h:i:sa");
        

        
        $sql = "update ".$hotelTable." set ".
        $hotelName." = '".$name."' ,".
        $hotelcity." = '".$city."' ,".            
        $hotelstate." = '".$state."' ,".            
        $starRating." = ".$star." ,".            
        $priceprpn." = ".$price." , ".            
        $hotelType." = '".$type."' , ".            
        $maxPeopleInRoom." = ".$maxPeopleInroom." , ".
        $roomsAvailable." = ".$roomAvail." , ".            
        $definition." = '".$features."' where hotelid = ".$id;   
        echo "<br>".$sql."<br>";
            if (mysqli_query($con, $sql)) 
            {

                    // $id = mysqli_insert_id($con);
                    //  echo ''.$id;
                    // // Data is set in the sql now add the image 
                    $target_file=null;
                    $Catch=false;
                    $check=false;
                    echo '<br>'.isset($_FILES["file"]["tmp_name"]).'<br>'.isset($_FILES["file"]["tmp_name"]);
                    if($_FILES['file']['size'] != 0 )  
                    {
                        echo "going in";
                         $check = getimagesize($_FILES["file"]["tmp_name"]);                                     
                    }
                    else
                    {
                        echo "going Out";
                        $Catch=true;
                    }
                    echo "<br>Check : ".$check;
                    echo "<br>Catch : ".$Catch;

                    if($check !== false && $Catch===false)          // image is adde by the user and we have to add it into the DB
                    {
                        $target_dir = $_SERVER['DOCUMENT_ROOT']."/WT(indus sem5)/Travel/assets/Images/HotelImages/";
                        $target_file = $target_dir.''.$id.'/'.basename($_FILES["file"]["name"]);              // getting the multipartfile data from the form
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));                 // check the extension weather it is jpg,png 
                    

                        // $uploadOk = 1;  
                        if (!file_exists($target_dir.''.$id)) {
                            // echo "<br >making directory";
                            // echo "<br > Targe Dir : ".$target_dir;
                            // echo "<br > target_file  : ".$target_file;
                            // echo "<br > imageFileType  : ".$imageFileType;
                            
                            mkdir($target_dir.''.$id, 0777, true);
                            mkdir($target_dir.''.$id.'/'.'Extra',0777,true);
                        }   
                        echo '<br>file Exists : '.file_exists($target_file);
                        if (!file_exists($target_file)) {                          // echo "<br >Sorry, file already exists.";
                           
                            if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)) 
                            {                 
                                $sqlAddImg="update ".$hotelTable." set ".$heroimg." = '".substr($target_file,37)."' where ".$hotelId." = ".$id.";";
                              
                                if (mysqli_query($con, $sqlAddImg)) 
                                {
                                    echo "<script>";
                                    echo "alert('DATA and IMAGE Added Sucessfully  !!');";
                                    echo "window.location.replace('../view/AdminSection/viewHotels.php')"; //Redirects the user with JavaScript
                                    echo "</script>";
                                    die(); //Stops PHP from further execution
                                }
                                else{
                                echo "<script>";
                                echo "alert('ERROR : Image was unable to save  in DB , please create Hotel again !!');";
                                 echo "window.location.replace('../view/AdminSection/updateHotelDetails.php?hotelid=".$id."')"; //Redirects the user with JavaScript
                                echo "</script>";
                                die();
                                }
                            }
                            else{
                                echo "<script>";
                                echo "alert('ERROR : Image was unable to save , please create Hotel again !!');";
                                 echo "window.location.replace('../view/AdminSection/updateHotelDetails.php?hotelid=".$id."')"; //Redirects the user with JavaScript
                                echo "</script>";
                                die();
                            }
                        }
                        else
                        {
                            unlink($target_file);    // DELETE THE FILE
                            if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)) 
                            {
                                $sqlAddImg="update ".$hotelTable." set ".$heroimg." = '".substr($target_file,37)."' where ".$hotelId." = ".$id.";";
                                echo '<br><br> 2 : '.$sqlAddImg;
                                if (mysqli_query($con, $sqlAddImg)) 
                                {
                                    echo "<script>";
                                    echo "alert('DATA and Default IMAGE Added Sucessfully !!');";
                                    echo "window.location.replace('../view/AdminSection/viewHotels.php')"; //Redirects the user with JavaScript
                                    echo "</script>";
                                    die(); //Stops PHP from further execution
                                }
                                else{
                                echo "<script>";
                                echo "alert('ERROR : Default Image was unable to save  in DB , please update Hotel again !!');";
                                 echo "window.location.replace('../view/AdminSection/updateHotelDetails.php?hotelid=".$id."')"; //Redirects the user with JavaScript
                                echo "</script>";
                                die();
                                }                   
                            }
                            else{
                                echo "<script>";
                                echo "alert('ERROR : Image was unable to save , please update Hotel again !!');";
                                 echo "window.location.replace('../view/AdminSection/updateHotelDetails.php?hotelid=".$id."')"; //Redirects the user with JavaScript
                                echo "</script>";
                                die();
                            }
                        }
                        
                    }
                    else if($Catch===true){     // image is not enetered by the ADMIN so add the default immage from dummyImnage site.

                               
                    }        // image is not added by the user so nothing to do.......
                    else {
                                echo "File is not an image.";
                                echo "<script>";
                                echo "alert('ERROR : Invalid Image File !!');";
                                echo "window.location.replace('../view/AdminSection/updateHotelDetails.php?hotelid=".$id."')"; //Redirects the user with JavaScript
                                echo "</script>";
                            die();
                    }            

                    echo "<script>";
                    echo "alert('Data Added Sucessfully !!');";
                     echo "window.location.replace('../view/AdminSection/viewHotels.php')"; //Redirects the user with JavaScript
                    echo "</script>";
                    die(); //Stops PHP from further execution

            } else {

                        // echo 'HERE<br >';
                        // // echo  'WO : '.$con.'<br>';
                        // echo  'WO : '.mysqli_query($con,$sql).'<br   >';
                        // echo  'WO : '.$sql.'<br >';
                        
                    echo "<script>";
                    echo "alert('Please Retry!!');";
                    echo "window.location.replace('../view/AdminSection/createHotel.php')"; //Redirects the user with JavaScript
                    echo "</script>";
                    die(); //Stops PHP from further execution
            }
    }   
?>