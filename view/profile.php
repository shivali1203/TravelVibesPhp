<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/css/profile.css" rel="stylesheet" />
    
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

</head>
<body>

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


      <div class="mainBody">
         

            <!--  YOUR DATA HERE -->
            <div class="profile_section">
                    <div class="img-container">
                    <?php echo "<img src='../".$_SESSION['heroimg']."' alt='".$_SESSION['userName']."' class='person-img'></img>" ?>
                    <!-- <img src=' . ' alt="pic1" class="person-img"/> -->
                        <span class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </span>
                    </div>
                    <div class="form__align">
                        <form class="rightForm"  action="../model/UserLogin.php" method="post">
                            <?php echo "<input type='text' value='Name  : ".$_SESSION['userName']."'/>" ?>
                            <?php echo "<input type='text' value='Email   : ".$_SESSION['userEmail']."'/>"?>
                            <?php echo "<input type='text' value='Mobile  : ".$_SESSION['mobile']."'/>"?>
                            <?php echo "<input type='text' value='Created On  : ".$_SESSION['AccCreatedOn']." GMT'/>"?>
                        </form>
                    </div>  
            </div>    


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
    <script src="../assets/js/MoveToMainPage.js"></script>
</body>
</html>