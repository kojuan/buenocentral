<!DOCTYPE html>
<script>
    window.onscroll = function() {stickyHeader()};

    // Get the header
    
    let header = document.getElementById("headContainerSticky");

    // Get the offset position of the navbar
    let sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function stickyHeader() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
    }
</script>

<html>
<head>
<title>Bueno Central</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="assets/js/imageSlider.js"></script>
<script src="assets/js/automaticSlideShow.js"></script>
<link href="assets/css/style.css" type="text/css" rel="stylesheet"/>


</head>
<div class="headerOfHeaderContainer">
    <div class="headerContainer" id="headContainerSticky">
        <div class="logo">
            <a href="index.php"><img src="assets/images/bc_header.png"></a>
        </div>

        <div class="nav">
                <li><a href="#">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contactform.php">Contact Us</a></li>

        </div>
    </div>
</div>



   
<body>

    <br>
    <br>
    <br>
    <br>
    <!-- <div class="imageSliderContainer">
        <ul>
        <li>
            <input type="radio" checked="check" name="imgRadioSlide">
            <div class="slide">
                <img src="assets/images/image_1.jpg">

            </div>
        </li>

        <li>
            <input type="radio" name="imgRadioSlide">
            <div class="slide">
                <img src="assets/images/image_2.jpg">
                <div class="content">
                    <p>Bueno Central January Employee of the Month</p>
                </div>
            </div>
        </li>

        <li>
            <input type="radio" name="imgRadioSlide">
            <div class="slide">
                <img src="assets/images/image_3.jpg">

            </div>
        </li>

        <li>
            <input type="radio" name="imgRadioSlide">
            <div class="slide">
                <img src="assets/images/image_4.jpg">

            </div>
        </li>


        </ul>
    </div> -->


    <center><div>
    <fieldset>
  <legend>Announcement(s)</legend>
  <div style='background-color:#1d5a75;'><p style='color:#bae9ff'>
    <?php
    $filename = 'assets/txt/';
    $counter = 0;
    $file_exist = false;
    foreach (scandir($filename) as $announcement){
        if ($announcement == "." || $announcement == ".."){
            $counter++;
        } 
        else{
            ?>
            <fieldset>
                <?php
                echo "<div style='background-color:#216583;'><p style='color:#bae9ff'>";
                echo "<legend>" . $announcement . "</legend><br>";
                $fileOpen = fopen($filename . $announcement, 'r');
                $fileRead = fread($fileOpen, 1000);
                echo $fileRead . "<br><br>";
                fclose($fileOpen);
        
                $file_exist = true;
                ?>
            </fieldset>
            <br>
            <?php
        }
    }
    if ($file_exist == false){
        echo "<div style='background-color:#3094c0;'><p style='color:#e8eff2'>";
        echo "No Announcement for now. Stay updated.<br>";
    }
    ?>
    </fieldset>
    </div></center>

    <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="numbertext">1 / 4</div>
          <img src="assets/images/image_1.jpg" style="width:100%">
          <div class="text">Logo</div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 4</div>
          <img src="assets/images/image_2.jpg" style="width:100%">

        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 4</div>
          <img src="assets/images/image_3.jpg"style="width:100%">

        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="assets/images/image_4.jpg"style="width:100%">
          </div>
        
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
        </div>
        
        <br>
        
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span>
          <span class="dot" onclick="currentSlide(4)"></span> 
        </div>

    <p>
        <button onclick="topFunction()" id="goTopButton" title="Go to top"><img src="assets/images/topImageButton.png"></button>
    </p>
    <center><img src="assets/images/latestUpdates.png"></center>
    <center>
        Latest merchandise of Bueno Central <br>
        RESERVE NOW <br>
         / button / here
         <br>

    </center>
    
    
    <!-- <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
    <center><div class="fb-page" 
  data-tabs="timeline, events"
  data-href="https://www.facebook.com/BuenoCentral"
  data-width="780px"
  style="width: 800px"></div></center> -->
    
    </body>




<script>
    goToTopButton = document.getElementById("goTopButton");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        goToTopButton.style.display = "block";
    } else {
        goToTopButton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }


</script>

</html>
