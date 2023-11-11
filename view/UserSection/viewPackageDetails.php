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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/boot  3strap/4.0.0/css/bootstrap.min.css"
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
                  include '../../model/getPackageExtraImages.php';
                  if(mysqli_num_rows($conSql)>0)
                  {
                  echo  "<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>";
                      echo "<ol class='carousel-indicators'>";
                            $i1 = 0;               
                            while ($row = mysqli_fetch_array($conSql))
                            {
                                if($i1==0)
                                {
                                      echo "<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
                                    $i1++;
                                }
                                else
                                {
                                      echo "<li data-target='#carouselExampleIndicators' data-slide-to='".$i1++."' ></li>";
                                }
                            } 
                    echo "</ol>";

                echo "<br><br><div class='carousel-inner'>";
                    $i1=0;
                    include '../../model/getPackageExtraImages.php';    
                    while ($row = mysqli_fetch_array($conSql))
                    {
                          if($i1==0)
                          {
                              
                              echo "<div class='carousel-item active'>";
                              echo "<img src='../..".$row[2]."' class='d-block w-100' alt='...' style='height:700px; width:100vw; '>" ; 
                              echo "</div>";
                              $i1++;
                          }
                          else
                          {
                              echo "<div class='carousel-item '>";
                              echo "<img src='../..".$row[2]."' class='d-block w-100' alt='...' style='height:700px; width:100vw;'>"; 
                              echo "</div>";
                          }
     
                    }
   
              echo "<br></div>";
              echo "<br><a class='carousel-control-prev ' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                <br><span class='carousel-control-prev-icon  p-4' aria-hidden='true'></span><br>
                <span class='sr-only bg-danger'>Previous</span>
              <br></a>
              <br><a class='carousel-control-next ' href='#carouselExampleIndicators' role='button' data-slide='next'>
                <br><span class='carousel-control-next-icon  p-4' aria-hidden='true'></span>
                <br><span class='sr-only text-danger'>Next</span>
              <br></a>

              </div>";

                  }
  ?>






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
                          <form action="BookPackage.php?packageId=<?php echo "".$row[0]; ?>" method="post" enctype="multipart/form-data">
                              <label  for="submit">Book Now</label>
                              <input hidden id="submit" name="submit" type="submit" value="Book Now"/>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
      
        <?php } ?>


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