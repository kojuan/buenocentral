<!DOCTYPE html>


<html>


<head>
<title>Bueno Central - Contact Form</title>
<meta charset="utf-8" />
<link href="assets/css/contactformstyle.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<div class="headerOfHeaderContainer">

    <div class="headerContainer" id="headContainerSticky">

        <div class="logo">
            <a href="index.php"><img src="assets/images/bc_header.png"></a>
        </div>

        <div class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="#">Contact Us</a></li>

        </div>
    </div>
</div>


<body>
    <br>
  

    <div class="row"> <!-- table -->
  <div class="column"> <!-- first column -->
  <center><h2>Contact Form</h2></center>

  <form name="contactform" class="form" action="?" method="post">

    <p class="name">
        <label for="name" class="userName">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter name here..." />
    </p>

    <p class="email">
        <label for="email" class="email">Email</label>
        <input type="text" name="email" id="email" placeholder="your_email@example.com" />
    </p>

    <p class="text">
        <textarea name="text" placeholder="Enter message here..."></textarea>
    </p>

    <p class="submit">
        <input type="submit" value="Send">
    </p>
</form>

<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "khian_juan@yahoo.com";
    $email_subject = "NO SUBJECT LINE";

    
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['text']))
        {
            died('We are sorry, but there appears to be a problem with the form you submitted.');       
        }

    $fullName = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['text']; // required
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
     
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
      }
     
        $string_exp = "/^[A-Za-z .'-]+$/";
    
    if(!preg_match($string_exp,$fullName)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
        }

    if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
        }
        
        if(strlen($error_message) > 0) {
            died($error_message);
        }
        
        $email_message = "Form details below.\n\n";
          
    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
      }

      $email_message .= "Name: ".clean_string($fullName)."\n";
      $email_message .= "Email: ".clean_string($email_from)."\n";
      $email_message .= "Message: ".clean_string($comments)."\n";

      // create email headers
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);  
        ?>
            <!-- include your own success html here -->
            Thank you for contacting us. We will be in touch with you very soon.
            <?php
            }
        ?>


<!-- <a href="https://www.facebook.com/BuenoCentral/" class="fa fa-facebook"></a> -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
<br><center><div class="fb-page" 
  data-href="https://www.facebook.com/BuenoCentral/"
  data-width="1000" 
  data-hide-cover="false"
  data-show-facepile="false"></div><center><br>

  </div>

  <div class="column"> <!-- first column -->
  <center><h2>Map</h2></center>
  <div class="mapouter"><div class="gmap_canvas"><iframe width="750" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=bueno%20central%20mati&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/">for major operating systems</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:750px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:750px;}</style></div>
  </div>
</div>


 
</body>

</html>