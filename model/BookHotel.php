<div hidden style="visibility:hidden; display:none; background-color:black; width:100vw;height:100vh;">
  
      <?php

          include 'mysqlConnection.php';
          // include '../constants/constants.php';

          if (session_status() === PHP_SESSION_NONE) {
            session_start();
          }  
          $roomsNeeded=$_POST['roomsBooked'];
          $totalPerson=$_POST['totalPersons'];
          $hotelid=$_POST['hotelid'];
          $RoomPrice=0;
          $startDate=$_POST['startDate'];
          $endDate=$_POST['endDate'];
          $initialRommsAvailable=0;
          // echo "whow";
          
          

          
                            
                          include 'GetHotelById.php';
                          
                            while ($row = mysqli_fetch_array($conSql)) {
                              $RoomPrice=$row['priceprpn'];
                              $initialRommsAvailable=$row['RoomsAvailable'];
                              $isVAlidRooms = (float)($totalPerson/$row['maxPeopleInRoom']) <=$roomsNeeded?true:false;
                              if($isVAlidRooms)
                              {
                                  if($roomsNeeded > $row['RoomsAvailable']){
                                      echo "<script>";
                                      echo "alert('ERROR : Hotel currently does not have sufficent empty rooms to require your needs !!');";
                                    echo "window.location.replace('../view/UserSection/BookHotel.php?hotelid=".$hotelid."')"; //Redirects the user with JavaScript
                                      echo "</script>";
                                      die();
                                  }
                                  else{
                                      
                                      
                                  }
                              }
                              else{
                                  echo "<script>";
                                  echo "alert('ERROR : you have booked insufficent Rooms W.R.T max people in room!!');";
                                echo "window.location.replace('../view/UserSection/BookHotel.php?hotelid=".$hotelid."')"; //Redirects the user with JavaScript
                                  echo "</script>";
                                  die();
                                }
                            }

          include '../constants/constants.php';
          
          $interval = date_create($startDate)->diff(date_create($endDate));
          echo "<br>DAYS : ".$interval->format('%R%a days');
          echo "<br>Rooms Price : ".$RoomPrice;
          echo "<br>rooms ".$roomsNeeded;
          $totalCost = ((int)$RoomPrice*(int)$roomsNeeded)*(int)$interval->format('%R%a days');
          $sql = "insert into ".$billTable." (".$BDHotelRoomsBooked.",".$BDTotalHotelPrice.",".$totalPersonBooked.",".$checkinDate.",".$checkoutDate.") values (".$roomsNeeded.",".$totalCost.",".$totalPerson.",'".$startDate."','".$endDate."');";
          
          
          echo "<br>".$sql;
          // $exeQuery = mysqli_query($queryContents);
          if(mysqli_query($con,$sql))
          {
              $bill_id = mysqli_insert_id($con);   
              $sqlHotel="update ".$hotelTable." set ".$roomsAvailable." = ".((int)$initialRommsAvailable - (int)$roomsNeeded)." where ".$hotelId." = ".$hotelid.";";
              echo "<br>".$sqlHotel;
              if(mysqli_query($con,$sqlHotel))  // update the hotels romm availability criteria 
              {
                $sessionUserId=$_SESSION['userId'];
                $newDate=new DateTime();
                $sqlBookingUser="insert into ".$userBooking." (".$UBuserid.",".$UBhoteid.",".$UBhotelSelectDT.",".$UBbillid.") values (".$sessionUserId.",".$hotelid.",'".$newDate->format('y-m-d')."',".$bill_id.");";
                echo "<br>".$sqlBookingUser
                ;
                if(mysqli_query($con,$sqlBookingUser))  // update the hotels romm availability criteria 
                {
                  echo "<script>";
                  echo "alert('Hotel Booked Sucessfully , Hurrey !!');";
                  echo "window.location.replace('../view/MainPage.php')"; //Redirects the user with JavaScript
                  echo "</script>";
                  die();
                } 
                else{
                  echo "<script>";
                  echo "alert('Hotel Booking Caused Error  UHUH, Try Again !!');";
                  echo "window.location.replace('../view/UserSection/BookHotel.php?hotelid=".$hotelid."')"; //Redirects the user with JavaScript
                  echo "</script>";
                  die();
                }
              }
              
          }
          else{
            echo "<script>";
            echo "alert('Hotel Booking Caused Error , Try Again !!');";
            echo "window.location.replace('../view/UserSection/BookHotel.php?hotelid=".$hotelid."')"; //Redirects the user with JavaScript
            echo "</script>";
            die();
          }
          
          
      ?>
</div>