<!DOCTYPE html>
<?php

      include '../../controller/checkUserIsUser.php';
      
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../assets/css/viewTable.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
    />
    <link
      rel="stylesheet"
      href="//use.fontawesome.com/releases/v5.0.7/css/all.css"
    />  
    <title>Document</title>
  </head>
  <body>
    
    <!--                                                         MAIN TOP HEADING                        -->
    <div class="header-absoute">
        <div class="header">
          <button class="nav-toggle" id="clickable" aria-label="open navigation">
            <span class="hamburger"></span>
          </button>
          <div class="title" onClick="redirectFunction()">
            <div class="titles">
              <img src="../../assets/Images/MainPage/logo.png" class="logo" alt="AirPlane Logo" />
              <h1>Travel Vibes</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- <div></div>                                           LEFT NAVIGATION              -->
      <!-- <div></div>                                           LEFT NAVIGATION              -->
      <div class="leftNav">
      <div class="nav__list nav__list--primary">
        <div class="nav1">
          <li class="nav__item"><a class="nav__link" href="../MainPage.php"><i class="fas fa-home   My-faEdit"></i>Home</a></li>
          <li class="nav__item"><a class="nav__link" href="../MainPage.php#aboutUs"> <i class="fas fa-info   My-faEdit" style="margin-left:5px;"></i>About Us</a></li>
        </div>
        
        <div class="nav2">
        <li class="nav__item"><a class="nav__link" href="ViewHotels.php"><i class="fas fa-warehouse  My-faEdit"></i>Hotel Booking</a></li>
        <li class="nav__item"><a class="nav__link" href="ViewPackage.php"><i class="fas fa-bus My-faEdit"></i>Travel Packages</a></li>
          <li class="nav__item"><a class="nav__link" href="../MainPage.php"><i class="fas fa-handshake   My-faEdit"></i>Contact Us</a></li>
        </div>
        <?php

              if(isset($_SESSION['userType'])!==true)
              {
                   echo "<div class='nav2'>";  
                   echo "<li class='nav__item'><a class='nav__link' href='../login.php'><i class='fas fa-key   My-faEdit'></i>Login</a></li>"  ;
                    echo "<li class='nav__item'><a class='nav__link ' href='../signin.php'><i class='fas fa-user-plus   My-faEdit'></i>Signup</a></li>" ; 
                  echo "</div>" ;
              }
              else{

                  if($_SESSION['userType']==='admin')
                  {
                    echo "<div class='nav2'>";
                    echo "<li class='nav__item'><a class='nav__link' href='../AdminSection/AdminPage.php'><i class='fas fa-lock   My-faEdit'></i>Admin Page</a></li>";
                    echo "</div>";
                  }
                  else{

                    echo "<div class='nav2'>";
                    echo "<li class='nav__item'><a class='nav__link' href='../profile.php'><i class='fas fa-user-circle   My-faEdit'></i>Profile</a></li>";
                    echo "<li class='nav__item'><a class='nav__link' href='History.php'><i class='fas fa-history   My-faEdit'></i>History</a></li>";
                    echo "</div>";
                  }
                 
                  echo "<div class='nav2'>";
                  echo "<li class='nav__item'><a class='nav__link' href='../../controller/logout.php'><i class='fas fa-key   My-faEdit'></i>Logout</a></li>";
                  echo "</div>";
              }
        ?>
        </div>
      </div>

    <div class="mainBody" style=" display: flex; flex-direction: row; justify-content: space-around; align-items: flex-start; padding-top: 14rem;">
                            
                                        <!-- HOTEL -->
                                        <!-- HOTEL -->
                                        <!-- HOTEL -->
                                        <!-- HOTEL -->
                                        
        <div class="table-section ">
                 
                <table class="table table-striped  table-bordered table-responsive-sm table-responsive-md table-responsive-lg table-dark table-image">
                <caption style="color:orangered;">Information of Hotels Booked By <?php echo " ".strtoupper($_SESSION['userName']); ?> <br>* To view the hotel click on the hotel name </caption>    
                <thead> 
                        <tr>
                        <th style="color: orangered;" scope="col">#</th>
                        <th style="vertical-align:middle;" scope="col">Date</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Hotel Name</th>
                        <th style="vertical-align:middle;" scope="col">Rooms Booked</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Total Price</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Person Booked</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Checkin checkout</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                      // include '../../constants/constants.php';
                      include '../../model/getHistoryHotels.php';
                       while ($row = mysqli_fetch_array($conSql)) {

                        
                        echo "      <tr>";
                        echo "         <th style='vertical-align:middle;' scope='row'>".$row[6]."</th>";
                        echo "      <td style='vertical-align:middle;text-align:center;'> ".$row[4]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'><a style='font-weight:900;' href='viewHotelDetails.php?hotelid=".$row[14]."'>".$row['HotelName']."</a></td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[8]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[10]." Rs</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[11]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[12]." TO ".$row[13]."</td>";
                        // echo " </tr>";

                       }
                    ?>
                    </tbody>
                </table>
    </div>
                                        <!-- PACKAGE -->
                                        <!-- PACKAGE -->
                                        <!-- PACKAGE -->
                                        <!-- PACKAGE -->
                                        <!-- PACKAGE -->
                                        <!-- PACKAGE -->
                                        <!-- PACKAGE -->
                                        
    
    <div class="table-section ">
                
                <table class="table table-striped  table-bordered table-responsive-sm table-responsive-md table-responsive-lg table-dark table-image">
                <caption style="color:orangered;">Information of Packages Booked By <?php echo " ".strtoupper($_SESSION['userName']); ?> <br>* To view the Package click on the Package name </caption>    
              <thead> 
                    <tr>
                        <th style="color: orangered; " scope="col">#</th>
                        <th style="vertical-align:middle;" scope="col">Date</th>
                        <th style="vertical-align:middle;" scope="col">Package Name</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Tickets Taken</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Price</th>
                     
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                      // include '../../constants/constants.php';
                      include '../../model/getHistoryPackage.php';
                      while ($row = mysqli_fetch_array($conSql)) 
                      {
                        echo "      <tr>";
                        echo "         <th style='vertical-align:middle;' scope='row'>".$row[6]."</th>";
                        echo "      <td style='vertical-align:middle;text-align:center;'> ".$row[3]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'><a style='font-weight:900;' href='ViewPackageDetails.php?packageId=".$row[14]."'>".$row[15]."</a></td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[7]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[9]."</td>";
                        echo " </tr>";

                      }
                    ?>
                   
                  
                    </tbody>
                </table>
        </div>
    </div>
 <!--                                                  FOOTER       -->
 <footer class="footer-section">
    <br><br><br>
    <div class="topFooter">
      <div class="titles">
        <img src="../../assets/Images/MainPage/logo.png" class="logo" alt="AirPlane Logo" />
        <h1>Travel Vibes</h1>
      </div>
      <div class="footer-nav">
        <li class="nav__item"><a class="nav__link" href="">Home</a></li>
        <li class="nav__item"><a class="nav__link" href="">About Us</a></li>
        <li class="nav__item"><a class="nav__link" href="">Explore</a></li>
        <li class="nav__item"><a class="nav__link" href="">Contact Us</a></li>
        <li class="nav__item"><a class="nav__link" href="">Login</a></li>
      </div>
    </div>
    <div
      class="underline"
      style="width: 80%; background-color: rgb(49, 48, 48)"
    ></div>
    <div class="social-links">
      <a href=""><i class="fab fa-linkedin-in"></i></a>
      <a href=""><i class="fab fa-twitter"></i></a>
      <a href=""><i class="fab fa-facebook"></i></a>
      <a href=""><i class="fab fa-instagram"></i></a>
      <a href=""><i class="fab fa-youtube"></i></a>
      <a href=""><i class="fab fa-github"></i></a>
    </div>
    <br><br><br>
  </footer>
  <script>
    const navToggle = document.querySelector(".nav-toggle");
    const nav = document.querySelector(".leftNav");
    navToggle.addEventListener("click", () => {
      $(".leftNav").toggle(
        function () {
          $(".leftNav").css({ "z-index": "-1" });
        },
        function () {
          $(".leftNav").css({ "z-index": "2" });
        }
      );
    });
    function redirectFunction()
    {
      
      window.location.replace("http://localhost/WT(indus%20sem5)/Travel/view/MainPage.php");
    }
  </script>
  <!-- Option 1: Bootstrap Bundle with Popper -->

  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
  ></script>
</body>
</html>