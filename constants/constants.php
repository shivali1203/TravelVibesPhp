<?php


         $headerClickMoveToMainPage =array("data"=>"http://localhost/WT(indus%20sem5)/Travel/view/MainPage.php");

        //  ADMIN AUTHENTICATION

        $adminUserName="admin@admin.com";
        $adminPassword="admin";


        // TABLESSSS

                $userTable = "user";
                $userBooking="userbooking";
                $billTable="billdata";
                $hotelTable="hotel";
                $hotelImages="hotelImage";
                $packageTable="package";
                $packageImages="packageimages";
                


        // USERTABLE TABLE COLUMNS 
                        $userId="userId";
                        $userName="userName";
                        $userEmail="userEmail";
                        $mobileNo="mobileNo";
                        $password="password";
                        $isActive="isActive";
                        $AccCreatedOn="AccCreatedOn";
                        $heroimg="heroimg";                     //is commoon for all tables



        // HOTEL TABLE COLUMNS

                        $hotelId='hotelid';
                        $hotelName='HotelName';
                        $hotelType='Hoteltype';
                        $hotelstate='State';
                        $hotelcity='city';
                        $maxPeopleInRoom='maxPeopleInRoom';
                        $roomsAvailable='RoomsAvailable';
                        $starRating='starRating';
                        $definition='Definition';
                        // $heroImg='heroimg';
                        $hotelCreatedDT='hotelCreationDT';
                        $isdeletedHotel='deleteHotel';        
                        $priceprpn="priceprpn";

 //  Package Extra Images  Tables Column Name

        // $imageId ="imageId";
        $hotelImagesId="hotelid";
        // $Image="Image";

        // Package Table Column

        $packageId="packageId";
        
        $apckageName="packageName";
        // $Pac0kageHeroImg="HeroImg";
        $packageState="state";
        $packagePrice="price";
        $ModelOfTransport="ModeofTransport";
        $packageDefinition="definition";
        $ticketAvailable="ticketAvailable";
        $packageStartDate="startDate";
        $packageEndDate="endDate";
        $packageCreationDT="packageCreationDT";
        

        //  Package Extra Images  Tables Column Name

        $imageId ="imageId";
        $packageImgid="packageid";
        $Image="Image";


        //  User Booking column
        $UBuserid="userid";
        $UBpackageid="packageid";
        $UBhoteid="hotelid";
        $UBpackageSelectDate="packgeSelectDT";
        $UBhotelSelectDT="hotelSelectDT";
        $UBbillid="billid";


        //  Bill Data talbe column
        $BDbillid="billlid";
        $BDpackageTicketsTaken="packageTicketsTaken";
        $BDHotelRoomsBooked="HotelTicketsTaken";
        $BDTotalPackagePrice="TotalPackagePrice";
        $BDTotalHotelPrice="TotalHotelPrice";
        
        $totalPersonBooked="totalPersonBooked";   
        $checkinDate="checkinDate";        
        $checkoutDate="checkout";        

?>