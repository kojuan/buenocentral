<!DOCTYPE html>
<?php
session_start();
?>

<script>
    let loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

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
<title>Bueno Central - Gallery</title>
<link href="assets/css/style.css" type="text/css" rel="stylesheet"/>
<link href="assets/css/lightbox.min.css" type="text/css" rel="stylesheet"/>
<script src="assets/js/lightbox-plus-jquery.min.js"></script>
</head>
<div class="headerOfHeaderContainer">

    <div class="headerContainer" id="headContainerSticky">

        <div class="logo">
            <a href="index.php"><img src="assets/images/bc_header.png"></a>
        </div>

        <div class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="contactform.php">Contact Us</a></li>
        </div>
    </div>
</div>



<body class="bg">
    <form action = "?" method ="POST" enctype ="multipart/form-data">
        <div class="demo-table">
            <hr><br><br><br>
        </div>
    </form>
</body>


<button onclick="topFunction()" id="goTopButton" title="Go to top"><img src="assets/images/topImageButton.png"></button>
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

<!--FOLDER DIRECTORY-->
<center>
<div class="demo-table">
    <?php
    
    $folder ="assets/images/gallery/";

    if (is_dir($folder)){
        
        if($open = opendir($folder)){
            while (($file = readdir($open)) !=false){
                if ($file =="." || $file =='..') continue;

                echo ' <a href="assets/images/gallery/'.$file.' "data-lightbox="mygallery" ><img src ="assets/images/gallery/'.$file.'
                "width="24.5%"></a>';
            }
            closedir($open);
        }
    }
?>
</div>
</center>

</a>