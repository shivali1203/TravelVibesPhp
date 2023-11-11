<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../assets/css/MainPage.css" rel="stylesheet" type="text/css" />
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
            <img src="../assets/Images/MainPage/logo.png" class="logo" alt="AirPlane Logo" />
            <h1>Travel Vibes</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- <div></div>                                           LEFT NAVIGATION              -->
    <div class="leftNav">
      <div class="nav__list nav__list--primary">
        <div class="nav1">
          <li class="nav__item"><a class="nav__link" href="MainPage.php"><i class="fas fa-home   My-faEdit"></i>Home</a></li>
          <li class="nav__item"><a class="nav__link" href="#aboutUs"> <i class="fas fa-info   My-faEdit" style="margin-left:5px;"></i>About Us</a></li>
        </div>
        
        <div class="nav2">
        <li class="nav__item"><a class="nav__link" href="UserSection/ViewHotels.php"><i class="fas fa-warehouse  My-faEdit"></i>Hotel Booking</a></li>
        <li class="nav__item"><a class="nav__link" href="UserSection/ViewPackage.php"><i class="fas fa-bus My-faEdit"></i>Travel Packages</a></li>
          <li class="nav__item"><a class="nav__link" href=""><i class="fas fa-handshake   My-faEdit"></i>Contact Us</a></li>
        </div>
        <?php

              if(isset($_SESSION['userType'])!==true)
              {
                   echo "<div class='nav2'>";  
                   echo "<li class='nav__item'><a class='nav__link' href='login.php'><i class='fas fa-key   My-faEdit'></i>Login</a></li>"  ;
                    echo "<li class='nav__item'><a class='nav__link ' href='signin.php'><i class='fas fa-user-plus   My-faEdit'></i>Signup</a></li>" ; 
                  echo "</div>" ;
              }
              else{

                  if($_SESSION['userType']==='admin')
                  {
                    echo "<div class='nav2'>";
                    echo "<li class='nav__item'><a class='nav__link' href='AdminSection/AdminPage.php'><i class='fas fa-lock   My-faEdit'></i>Admin Page</a></li>";
                    echo "</div>";
                  }
                  else{

                    echo "<div class='nav2'>";
                    echo "<li class='nav__item'><a class='nav__link' href='profile.php'><i class='fas fa-user-circle   My-faEdit'></i>Profile</a></li>";
                    echo "<li class='nav__item'><a class='nav__link' href='UserSection/History.php'><i class='fas fa-history   My-faEdit'></i>History</a></li>";
                    echo "</div>";
                  }
                 
                  echo "<div class='nav2'>";
                  echo "<li class='nav__item'><a class='nav__link' href='../controller/logout.php'><i class='fas fa-key   My-faEdit'></i>Logout</a></li>";
                  echo "</div>";
              }

        ?>

        
        </div>
      </div>
    
    <div class="mainBody">
      <div
        id="carouselExampleSlidesOnly"
        style="z-index: -2"
        class="carousel slide"
        data-ride="carousel"
        data-interval="5000"
        >
        <div class="carousel-inner">
          <div class="carousel-item">
            <img
              class="w-100"
              style="z-index: -2"
              src="../assets/Images/MainPage/caraousal1.jpg"
              alt="First slide"
            />
            <div class="carousel-caption d-none d-md-block">
              <h1>Open your door to the world</h1>
              <h5>
                <span>Travel Vibes</span> lets you share a place to stay,
                connect with travellers, meet up and find accommodation on your
                journey. It is and will always be a free, open source,
                not-for-profit, democratic community.
              </h5>
            </div>
          </div>
          <div class="carousel-item active">
            <img class="w-100" src="../assets/Images/MainPage/caraousal2.jpg" alt="Second slide" />
            <div class="carousel-caption d-none d-md-block">
              <h1>Life is either a daring adventure or nothing at all</h1>
              <h5>
                <span>Travel Vibes</span> collaborates with vocational
                rehabilitation (VR) programs across the country to connect those
                with individuals to satisfying career opportunities in the world
                of travel.
              </h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="w-100" src="../assets/Images/MainPage/caraousal3.jpg" alt="Third slide" />
            <div class="carousel-caption d-none d-md-block">
              <h1>
                Travel doesn’t become adventure until you leave yourself behind
              </h1>
              <h5>
                You’ve landed at your destination and you’re overwhelmed with
                options of what to see, eat, and do, but there are some
                challenges to accomplishing it all. So,<span>Travel Vibes</span>
                sets activities that help travellers get to the heart of the
                local experience while removing some of the roadblocks
              </h5>
            </div>
          </div>
        </div>
      </div>

         <!-- Services -->
        <!-- Services -->
        <!-- Services -->
        <!-- Services -->
        <!-- Services -->
        <!-- Services -->
      
        <div id="aboutUs" class="services-section">
            <div class="sub-title">
              <h1>Services</h1>
              <div class="underline"></div>
              <p>
                Our Travel Consultants are all fully trained in providing the
                following services:
              </p>
            </div>
            <div class="services">
              <div class="service">
                <i class="fas fa-bookmark"></i>
                <div class="data">
                  <h1>Travel Reservations</h1>
                  <p>
                    As an IATA, ASATA and ANTA accredited travel agency Trip Travel
                    offers cost effective flight reservations to all destinations.
                    Preference for any particular airline is of course taken into
                    consideration whenever reservations are made. Trip Travel’s
                    association with Tourvest Travel Services gives Trip Travel a
                    firm representation in the international arena.
                  </p>
                </div>
              </div>
              <div class="service">
                <i class="fas fa-home"></i>
                <div class="data">
                  <h1>Accommodation</h1>
                  <p>
                    As an IATA, ASATA and ANTA accredited travel agency Trip Travel
                    offers cost effective flight reservations to all destinations.
                    Preference for any particular airline is of course taken into
                    consideration whenever reservations are made. Trip Travel’s
                    association with Tourvest Travel Services gives Trip Travel a
                    firm representation in the international arena.
                  </p>
                </div>
              </div>
              <div class="service">
                <i class="fas fa-users"></i>
                <div class="data">
                  <h1>Accounting services</h1>
                  <p>
                    As an IATA, ASATA and ANTA accredited travel agency Trip Travel
                    offers cost effective flight reservations to all destinations.
                    Preference for any particular airline is of course taken into
                    consideration whenever reservations are made. Trip Travel’s
                    association with Tourvest Travel Services gives Trip Travel a
                    firm representation in the international arena.
                  </p>
                </div>
              </div>
              <div class="service">
                <i class="fas fa-car"></i>
                <div class="data">
                  <h1>Car Hire</h1>
                  <p>
                    As an IATA, ASATA and ANTA accredited travel agency Trip Travel
                    offers cost effective flight reservations to all destinations.
                    Preference for any particular airline is of course taken into
                    consideration whenever reservations are made. Trip Travel’s
                    association with Tourvest Travel Services gives Trip Travel a
                    firm representation in the international arena.
                  </p>
                </div>
              </div>
            </div>
          </div>

                <!-- REVIEWS  -->
      <!-- REVIEWS  -->
      <!-- REVIEWS  -->
      <!-- REVIEWS  -->
      <!-- REVIEWS  -->
      <!-- REVIEWS  -->
      <div class="reviews-section">
        <div class="sub-title">
          <h1>Reviews</h1>
          <div class="underline"></div>
        </div>
        <div class="reviews">
            <article class="review">
                <div class="img-container">
                  <img src="../assets/Images/MainPage/Pic1.jpg" alt="pic1" class="person-img" />
                  <span class="quote-icon">
                    <i class="fas fa-quote-left"></i>
                  </span>
                </div>
                <h4 class="author">Mitansh Gor</h4>
                <p class="info">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Officiis, temporibus voluptate quidem adipisci assumenda illum
                  eveniet atque nesciunt obcaecati soluta.
                </p>
              </article>
              <article class="review">
                  <div class="img-container">
                    <img src="../assets/Images/MainPage/Pic2.jpg" alt="" class="person-img" />
                    <span class="quote-icon">
                      <i class="fas fa-quote-left"></i>
                    </span>
                  </div>
                  <h4 class="author">Manav S Patel</h4>
                  <p class="info">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Officiis, temporibus voluptate quidem adipisci assumenda illum
                    eveniet atque nesciunt obcaecati soluta.
                  </p>
                </article>
                <article class="review">
                    <div class="img-container">
                      <img src="../assets/Images/MainPage/Pic3.jpg" alt="" class="person-img" />
                      <span class="quote-icon">
                       <i class="fas fa-quote-left "></i>
                      </span>
                    </div>
                    <h4 class="author">Gabriella</h4>
                    <p class="info">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                      Officiis, temporibus voluptate quidem adipisci assumenda illum
                      eveniet atque nesciunt obcaecati soluta.
                    </p>
                  </article>
        </div>
      </div>
        <!-- contact Us -->
        <!-- contact Us -->
        <!-- contact Us -->
        <!-- contact Us -->
        <!-- contact Us -->
        <!-- contact Us -->
        <section class="contact-us">
          <div class="sub-title">
            <h1>Connect with Us</h1>
            <div class="underline"></div>
          </div>
          <div class="inner-contact">
            <p class="leftQuote">
            <iframe class="iframe" style="width: 100%; filter: grayscale(70%); max-width:100%; max-height:300px; border-radius: 10px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14689.447425330382!2d72.5006607769666!3d23.01048230934513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9ad9da91785f%3A0x293927860b753ab8!2sPrahlad%20Nagar%2C%20Ahmedabad%2C%20Gujarat%20380015!5e0!3m2!1sen!2sin!4v1631975753319!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </p>
            <form class="rightForm">
              <input type="text" placeholder="Enter Name" />
              <input type="email" placeholder="Enter Email" />
              <input type="email" placeholder="Enter Message" />
              <input type="submit" value="Submit" />
            </form>
          </div>
          <br>
        </section>
    </div>

    <!--                                                  FOOTER       -->
    <footer class="footer-section">
      <br><br><br>
      <div class="topFooter">
        <div class="titles">
          <img src="../assets/Images/MainPage/logo.png" class="logo" alt="AirPlane Logo" />
          <h1>Travel Vibes</h1>
        </div>
        <div class="footer-nav">
          <li class="nav__item"><a class="nav__link" href="http://localhost/WT(indus%20sem5)/Travel/view/MainPage.php">Home</a></li>
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