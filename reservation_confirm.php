<?php 
$n=10; 
function getName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 
$refNum = getName($n);
?> 

<html>
<head>
<title>Bueno Central - Reservation</title>
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/cssreservationConfirm.css" type="text/css">
<head>
<body>
<div class="centertext" id="HTMLtoPDF">
<a id="test"></a>
        <center>
            <img src="assets/images/bc_header.png">

            <br>
        =-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-= Reservation Receipt =-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=
        <h2><i><label class="welcometext">Reservation Complete</label></i></h4>
        <h2><label class="fontchange_name"><?php echo $_POST["firstNameReservation"] . " " . $_POST["surNameReservation"];?></label></h2>
        <h4>Email Address:</h4>
        <h2><label class="fontchange"><?php echo $_POST["emailReservation"];?></label></h2>
        <h4>Phone Number:</h4>
        <h3><label class="fontchange"><font style="font-size:1.7rem"><?php echo $_POST["phoneReservation"]; ?></label></font></h3>
        <h4>Quantity:</h4>
        <h3><label class="fontchange"><?php 
            if (isset($_POST['submit'])) {
                echo $_POST['quantityReservation']; 
            }?></h3></label>
        <h4>Size:</h4>
        <h3><label class="fontchange"><?php
            if (isset($_POST['submit'])) {
            echo $_POST['sizeReservation']; 
            }
        ?></label></h3>
        <h4>REFERRAL NUMBER:</h4>
        <h3><label class="fontchange"><?php
            if (isset($_POST['submit'])) {
            
            echo $refNum;
            ?><br><?php 
            }
        ?></label></h3>
        </center> 
        <?php 

            $con = mysqli_connect('localhost','root','');


            if(!$con)
                {
                echo 'Not Connected To Server';
                }

            if(!mysqli_select_db($con,'bc'))
                {
                echo 'Database Not Selected';
                }

                $firstname = $_POST["firstNameReservation"];
                $surname = $_POST["surNameReservation"];
                $email = $_POST["emailReservation"];
                $phone = $_POST["phoneReservation"];
                $quantity = $_POST["quantityReservation"];
                $size = $_POST["sizeReservation"];
                $submit = $_POST["submit"];


            $sql = "INSERT INTO reservation (firstName, surName, userEmail, userPhoneNumber, userQuantityReserved, userSizeReserved, referral_number) VALUES ('$firstname','$surname','$email','$phone','$quantity','$size', '$refNum')";

            if(!mysqli_query($con,$sql))
            {
            echo 'Database error';
            }
            else
            {
            echo '';
            }

            ?>
           <center>=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=</center>
            </div>
            <center> <a href="#" onclick="HTMLtoPDF()" style="color:black;">Save Receipt as .PDF file</a>  <br><br>
<a href="index.php" class="btn btn-primary btn-sm" style="color:black;">Go back to Homepage</center></a>
            <br><br>
            <center><img src="assets/images/BCUWAK.png"></center>
    </body>


    <script src="assets/js/jspdf.js"></script>
	<script src="assets/js/jquery-2.1.3.js"></script>
	<script src="assets/js/pdfFromHTML.js"></script>
 
    </head>
    </html>