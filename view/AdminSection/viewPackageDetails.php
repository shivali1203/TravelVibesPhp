<!DOCTYPE html>
<?php

      include '../../controller/checkUserIsAdmin.php';
      
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
        <!-- <div class="sub-title">
          <h1>Package List</h1>
          <div class="underline"></div>
        </div> -->
        <?php
                      // include '../../constants/constants.php';
                      include '../../model/GetPackageById.php';
                      while ($row = mysqli_fetch_array($conSql)) {
?>
        <div class="full-structure">
            <div class="left-heroimg">
                <img src="<?php echo "../..".$row['heroimg'] ?>">
            </div>
            <div class="right-Data">
                            <div class="detail-heading">
                                    <h1><?php echo "".$row['packageName']?>
                                        <div class="underline"></div>
                                    </h1>
                                    <h3><?php echo "".$row['ticketAvailable']?> Tickets left</h3>
                            </div>
                <div class="detail-info">
                    <div class="up-info">
                        <div class="left-up-info">
                            State : <?php echo "".$row['state']?><br>
                            Ticket Price : <?php echo "".$row['price']?> Rs<br>
                            Transport :  <?php echo "".$row['modeOfTransport']?><br>
                        </div>
                        <div class="right-up-info">
                            Creation Date : <?php echo "".$row['packageCreationDT']?>
                        </div>
                    </div>
                    <p class="definition">
                     <?php echo "".$row['definition']?>
                    </p>
                    <div class="low-info">
                        <div class="left-low-info">
                            Start Date :  <?php echo "".$row['startDate']?><br>
                            End Date : <?php echo "".$row['endDate']?><br>
                        </div>
                        <div class="right-low-info">
                          <form action="../../model/addPackageExtraImage.php" method="post" enctype="multipart/form-data">
                              <label for="fileExtra">Upload Image</label>
                              <input hidden id="fileExtra" type="file" name="file" placeholder="File" accept=" image/png, image/jpg, image/jpeg" />
                              <label for="submit">Save Image</label>
                              <input type="number" value="<?php echo "".$row[0] ?>" name="packageId" hidden/>
                              <input hidden id="submit" name="submit" type="submit" value="submit"/>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
      
        <?php } ?>



          <div class="sub-title">
            <h1 style="text-align:center;color: white;">Extra Images</h1>
            <div class="underline" style="width:20vw; height:1vh; margin-bottom:3rem;"></div>
          </div>    
                        <?php

                              // include '../../constants/constants.php';
                              include '../../model/getPackageExtraImages.php';
                      ?>
                        <div class="extra-Images">
                        <div class="row photos">
                                  <?php
                                  
                                  
                              while ($row = mysqli_fetch_array($conSql)){
                                  ?>
                                  <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="" data-lightbox="photos"><img class="img-fluid" src="../..<?php echo ''.$row['Image'] ?>"></a></div>
                                  <?php
                                    }
                                  ?>
                        </div>
                        </div>


    </div>
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