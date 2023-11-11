<div >
<!-- hidden style="visibility:hidden; display:none; background-color:black; width:100vw;height:100vh;" -->
      <?php

          include 'mysqlConnection.php';
          // include '../constants/constants.php';

          if (session_status() === PHP_SESSION_NONE) {
            session_start();
          }  
          
          $ticketsSelected=$_POST['ticketsSelected'];
          $pakgId=$_POST['packageId'];
          $PackagePrice=0;
          $initialPackageAvailable=0;

          
                          include 'GetPackageById.php';
                          
                            while ($row = mysqli_fetch_array($conSql)) {
                              $PackagePrice=$row['price'];
                              $initialPackageAvailable=$row['ticketAvailable'];
                             
                            }

          include '../constants/constants.php';
          
       
          $totalCost = ((int)$ticketsSelected*(int)$PackagePrice);
          $sql = "insert into ".$billTable." (".$BDpackageTicketsTaken.",".$BDTotalPackagePrice.") values (".$ticketsSelected.",".$totalCost.");";
          
          echo "<br>".$sql;

          if(mysqli_query($con,$sql))
          {
              $bill_id = mysqli_insert_id($con);   
              $sqlHotel="update ".$packageTable." set ".$ticketAvailable." = ".((int)$initialPackageAvailable - (int)$ticketsSelected)." where ".$packageId." = ".$pakgId.";";
              echo "<br>".$sqlHotel;
              if(mysqli_query($con,$sqlHotel))  // update the hotels romm availability criteria 
              {
                $sessionUserId=$_SESSION['userId'];
                $newDate=new DateTime();
                $sqlBookingUser="insert into ".$userBooking." (".$UBuserid.",".$UBpackageid.",".$UBpackageSelectDate.",".$UBbillid.") values (".$sessionUserId.",".$pakgId.",'".$newDate->format('y-m-d')."',".$bill_id.");";
                echo "<br>".$sqlBookingUser;
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