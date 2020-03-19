<?php
session_start();
    $conn = new mysqli('localhost', 'root', '', 'bc');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "UPDATE countervisit SET visits = visits+1 WHERE id = 1";
    $conn->query($sql);

    $sql = "SELECT visits FROM countervisit WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "no results";
    }
    
    $conn->close();
?>
     
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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="assets/css/w3.css">
<link href="assets/css/style.css" type="text/css" rel="stylesheet"/>

</head>
<div class="headerOfHeaderContainer">
    <div class="headerContainer" id="headContainerSticky">
        <div class="logo">
            <a href="index.php"><img src="assets/images/bc_header.png"></a>
        </div>

        <div class="nav">
                <li><a href="#">Home</a></li>
                <li><a href="gallery/gallery_index.php">Gallery</a></li>
                <li><a href="contactform.php">Contact Us</a></li>
        </div>
    </div>
</div>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <br><br><br><br>
    <center><p>[Date / Time]: <span id="time"></span></p></center>
    <br>
    <script type="text/javascript">
        let timestamp = '<?=time();?>';
        function updateTime(){
        $('#time').html(Date(timestamp));
        timestamp++;
        }
        $(function(){
        setInterval(updateTime, 1000);
        }); 
    </script>

    <fieldset><center><div>
    <legend>Announcement(s)</legend>
    <div style='background-color:#1d5a75;'><p style='color:#bae9ff'>
    <?php
        $filename = 'assets/txt/';
        $counter = 0;
        $file_exist = false;
        foreach (scandir($filename) as $announcement){
            if ($announcement == "." || $announcement == ".."){
                $counter++;
                
            } //if loop
            else{
                ?>
                <fieldset>
                    <?php
                    $splitter =  explode(".",$announcement);
                    echo "<div style='background-color:#216583;'><p style='color:#bae9ff'>";
                    echo "<legend>" . $splitter[0] . "</legend><br>";

                    $fileOpen = fopen($filename . $announcement, 'r');
                    $fileRead = fread($fileOpen, 1000);
                    echo $fileRead . "";
                    fclose($fileOpen);
            
                    $file_exist = true;
                    ?>
                </fieldset>
                <br>
                <?php
            } //else loop
        } //foreach loop
        if ($file_exist == false){
            echo "<div style='background-color:#3094c0;'><p style='color:#e8eff2'>";
            echo "No Announcement for now. Stay updated.<br>"; }
    ?>
    </fieldset></div></center>

    <div class="w3-content w3-section" style="max-width:1550px;">
        <img class="mySlides w3-animate-fading" src="assets/images/image_1.jpg" style="width:100%">
        <img class="mySlides w3-animate-fading" src="assets/images/image_2.jpg" style="width:100%">
        <img class="mySlides w3-animate-fading" src="assets/images/image_3.jpg" style="width:100%">
        <img class="mySlides w3-animate-fading" src="assets/images/image_4.jpg" style="width:100%">
        <img class="mySlides w3-animate-fading" src="assets/images/image_5.jpg" style="width:100%">
        <img class="mySlides w3-animate-fading" src="assets/images/image_6.jpg" style="width:100%">
    </div>

    <?php
        // define variables and set to empty values
        $firstname = $surname = $email = $phone = $quantity = $size = $submit = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = test_input($_POST["firstNameReservation"]);
        $surname = test_input($_POST["surNameReservation"]);
        $email = test_input($_POST["emailReservation"]);
        $phone = test_input($_POST["phoneReservation"]);
        $quantity = test_input($_POST["quantityReservation"]);
        $size = test_input($_POST["sizeReservation"]);
        $submit = test_input($_POST["submit"]);
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    ?>

    <center>
    <!-- <a href="#" class="buttonBCEXCLUSIVES" name="btnBcExclusives" disabled>BC EXCLUSIVES</a> -->
     <!-- The Band Section -->
    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">ABOUT US</h2>
    <p class="w3-opacity"><i>"Basta Bueno, Barato!"</i></p>
    <p class="w3-justify"> The Bueno Central provides convenient style of shopping experience.  We're dedicated to giving you the very best of local and exported products, with a focus on customer service and business quality.
    Established on 2015, Bueno Central has come a long way from its beginnings in the City of Mati, Davao Oriental.
    </p>
	<script src="assets/js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});
		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>
    </center>
    <script>
        let myIndex = 0;
        carousel();

        function carousel() {
        let i;
        let x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 5000);    
        }
    </script>
    <p><button onclick="topFunction()" id="goTopButton" title="Go to top"><img src="assets/images/topImageButton.png"></button></p>
    </body>
    <script>
        goToTopButton = document.getElementById("goTopButton");
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() 
        {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                goToTopButton.style.display = "block";} else {
                goToTopButton.style.display = "none";}}

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera 
        }
    </script>

</html>
    <!-- <div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-1">
						<div class="booking-form">
							<form action="reservation_confirm.php" method="post">
								<div class="booking-cta">
                                <h2>BC EXCLUSIVES</h2>
                                <h1>Make your reservation</h1>

								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="text" name="firstNameReservation" required>
											<span class="form-label">First Name</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="text" name="surNameReservation" required>
											<span class="form-label">Sur Name</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="email" name="emailReservation" required>
											<span class="form-label">Email</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="tel" name="phoneReservation" required>
											<span class="form-label">Phone</span>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-group">
											<span class="form-label">Quantity</span>
											<select class="form-control" name="quantityReservation">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
												<option>8</option>
												<option>9</option>
												<option>10</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-group">
											<span class="form-label">Size</span>
											<select class="form-control" name="sizeReservation">
												<option>XS</option>
												<option>S</option>
												<option>M</option>
												<option>L</option>
												<option>XL</option>
												<option>XXL</option>
												<option>XXXL</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="submit-btn" name="submit">Reserve</button>
                                </div>
                                <input type="hidden" name="hiddenField" id="hiddenField" value="000000"/> 
        
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
