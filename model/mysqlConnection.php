<?php
// Create connection
$con=mysqli_connect("localhost","root","root","travelvibes"); 

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{
    // echo "<h2>MYSQL TravelVibes Database Connected !!!</h2>";
}
?> 