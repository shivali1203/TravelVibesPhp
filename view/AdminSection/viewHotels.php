<!DOCTYPE html>
<?php

      include '../../controller/checkUserIsAdmin.php';
      
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
      <div class="leftNav">
        <div class="nav__list nav__list--primary">
            <div class="nav1">
                <li class="nav__item"><a class="nav__link" href="createHotel.php"><i class="fas fa-plus  My-faEdit"></i>Create Hotel</a></li>
                <li class="nav__item"><a class="nav__link" href="viewHotels.php"><i class="fas fa-list My-faEdit"></i>View Hotels</a></li>
            </div>
            <div class="nav1">
            <li class="nav__item"><a class="nav__link" href="createPackage.php"><i class="fas fa-plus  My-faEdit"></i>Create Pacakges</a></li>
            <li class="nav__item"><a class="nav__link" href="viewPackages.php"><i class="fas fa-list My-faEdit"></i>View Pacakges</a></li>
            </div>
            <div class="nav2">
                <li class="nav__item"><a class="nav__link" href=""><i class="fas fa-user  My-faEdit"></i>Users</a></li>
                <li class="nav__item"><a class="nav__link" href=""><i class="fas fa-search  My-faEdit"></i>Reviews</a></li>
            </div>
        </div>
      </div>

    <div class="mainBody">
        <div class="sub-title">
          <h1>Hotels List</h1>
          <div class="underline"></div>
        </divm>
    <?php
                      // include '../../constants/constants.php';
                      include '../../model/viewAllHotels.php';
                      while ($row = mysqli_fetch_array($conSql)) {}
?>
        <div class="table-section ">
                <table class="table table-striped  table-bordered table-responsive-sm table-responsive-md table-responsive-lg table-dark table-image">
                    <thead> 
                    <tr>
                        <th style="color: orangered;" scope="col">#</th>
                        <th style="vertical-align:middle;" scope="col">Image</th>
                        
                        <th style="vertical-align:middle;" scope="col">Name</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Price/Room/Night</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Type</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">State</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">City</th>
                        <!-- <th style="vertical-align:middle;text-align:center;" scope="col">Max People</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Room Available</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Star Rating</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Definition</th>
                        <th style="vertical-align:middle;text-align:center;" scope="col">Creation Date</th> -->
                        <th style="vertical-align:middle;text-align:center;" scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                      // include '../../constants/constants.php';
                      include '../../model/viewAllHotels.php';
                      while ($row = mysqli_fetch_array($conSql)) {

                        
                        echo "      <tr>";
                        echo "         <th style='vertical-align:middle;' scope='row'>".$row[0]."</th>";
                        
                        
                        if(str_starts_with($row[9],"https"))
                        {
                          echo "      <td style='vertical-align:middle;text-align:center;'><img src='".$row[9]."' style='max-width:200px;' class='img-fluid img-thumbnail'></td>";
                        }
                        else{
                          echo "      <td style='vertical-align:middle;text-align:center;'><img src='../..".$row[9]."' style='max-width:200px;' class='img-fluid img-thumbnail'></td>";
                        }
                        echo "      <td style='vertical-align:middle;text-align:center;'> ".$row[1]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'> Rs ".$row[12]." /.</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[2]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[3]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>".$row[4]."</td>";
                        // echo "      <td style='vertical-align:middle;text-align:center;'>".$row[5]."</td>";
                        // echo "      <td style='vertical-align:middle;text-align:center;'>".$row[6]."</td>";
                        // echo "      <td style='vertical-align:middle;text-align:center;'>".$row[7]."</td>";
                        // echo "      <td style='vertical-align:middle;text-align:center;'>".$row[8]."</td>";
                        // echo "      <td style='vertical-align:middle;text-align:center;'>".$row[10]."</td>";
                        echo "      <td style='vertical-align:middle;text-align:center;'>
                                                 <a href='viewHotelDetails.php?hotelid=".$row[0]."' class='btn btn-danger my-btn'>View Details</a> <br>
                                                 <a href='updateHotelDetails.php?hotelid=".$row[0]."' class='btn btn-danger my-btn'>Update Details</a><br>
                                                 <a href='../../model/deleteHotelDetails.php?hotelid=".$row[0]."' class='btn btn-danger my-btn'>Delete Details</a></td>";
             
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