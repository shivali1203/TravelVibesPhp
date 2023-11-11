<!DOCTYPE html>
      <?php 
        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }
      ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../assets/css/viewPackageDetail.css" rel="stylesheet" type="text/css" />
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
          <li class="nav__item"><a class="nav__link" href="#aboutUs"> <i class="fas fa-info   My-faEdit" style="margin-left:5px;"></i>About Us</a></li>
        </div>
        
        <div class="nav2">
        <li class="nav__item"><a class="nav__link" href="ViewHotels.php"><i class="fas fa-warehouse  My-faEdit"></i>Hotel Booking</a></li>
        <li class="nav__item"><a class="nav__link" href="ViewPackage.php"><i class="fas fa-bus My-faEdit"></i>Travel Packages</a></li>
          <li class="nav__item"><a class="nav__link" href=""><i class="fas fa-handshake   My-faEdit"></i>Contact Us</a></li>
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
                    echo "<li class='nav__item'><a class='nav__link' href=''><i class='fas fa-history   My-faEdit'></i>History</a></li>";
                    echo "</div>";
                  }
                 
                  echo "<div class='nav2'>";
                  echo "<li class='nav__item'><a class='nav__link' href='../../controller/logout.php'><i class='fas fa-key   My-faEdit'></i>Logout</a></li>";
                  echo "</div>";
              }
        ?>
        </div>
      </div>
 
    <div class="mainBody">

        <?php

                      // include '../../constants/constants.php';
                      include '../../model/GetHotelById.php';
                      while ($row = mysqli_fetch_array($conSql)) {
        ?>

        <div class="full-structure">
            <div class="left-heroimg">
                <img src="<?php echo '../..'.$row['heroImg']; ?>">
            </div>
            <div class="right-Data">
                            <div class="detail-heading">
                                    <h1><?php echo"".$row['HotelName']?>
                                        <div class="underline"></div>
                                    </h1>
                                    <h3><?php echo"".$row['RoomsAvailable']?> Rooms Empty<br>
                                         <?php echo"".$row['maxPeopleInRoom']?>  Person / Room
                                  </h3>
                            </div>
                <div class="detail-info">
                    <div class="up-info">
                        <div class="left-up-info">
                            Type : <?php echo"".$row['Hoteltype']?> <br>
                            Room Price/Night : <?php echo"".$row['priceprpn']?> Rs<br>
                        </div>
                        <div class="right-up-info">
                          <?php
                            echo "Star Rating : ";                      
                            for($i=0;$i<$row['maxPeopleInRoom'];$i++){
                              echo "<i style='color:orangered;' class='fas fa-star'></i>";
                            }
                          ?>
                          <br>
                            <!-- Creation Date : <?php echo"".$row['hotelCreationDT']?> -->
                        </div>
                    </div>
                    <p class="definition">
                        <?php echo"".$row["Definition"];?>
                    </p>
                    <div class="low-info">
                        <div class="left-low-info">
                          State : <?php echo"".$row['State']?><br>
                            City : <?php echo"".$row['city']?><br>
                           
                            <!-- Start Date : 20/12/2021<br>
                            End Date : 20/12/2021<br> -->
                        </div>
                        <div class="right-low-info">
                        <form  action="../../model/BookHotel.php" method="post" enctype="multipart/form-data">
                          <input type="number" placeholder="Room You need" min="1" max="<?php echo"".$row['RoomsAvailable']?>" name="roomsBooked" />
                          <div style="display:flex; flex-direction: row;justify-content: center;align-items: center;">
                          <input type="date" placeholder="No of days" min="1" max="100" name="startDate" /> &nbspTO&nbsp
                          <input type="date" placeholder="No of days" min="1" max="100" name="endDate" />
                          </div>
                          <input type="number" value="<?php echo "".$row[0]; ?>" name="hotelid" hidden />
                          <!-- ?hotelid= -->
                          <input type="number" placeholder="Total Persons" min="1"  name="totalPersons" />
                           <label style="margin-top: 1rem;" for="submit">Book Now</label>
                           <input type="submit" id="submit" value="Book Rooms" hidden>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>



        
      
                                     <!--     FOOTER       -->
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