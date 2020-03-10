<br><br><br><br><br>
<?php
    // Get values pass from form in admin_login.php file
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the server and select Database
    $mypassword = md5($_POST['password']);
    $conn = mysqli_connect("localhost", "root", "", "bc") or die($conn);
    mysqli_select_db($conn, "login");


    $sql="select * from users where username='$username' and password='$mypassword'";
    $result=mysqli_query($conn, $sql);

    // to prevent mysql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
 

    // Query the database for user
    $result = mysqli_query($conn, "select * from users where username = '$username' and password = '$password'")
        or die("Failed to query database" . mysqli_error());
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] == $username && $row['password'] == $password) { // IF SUCCESS LOGIN GO HERE
        echo "<center><div style='font-size:60px;color:#0e3c68;font-weight:bold;'> Login success! Welcome <span style='font-size:55px;color:#000000;font-weight:bold;'>" .$row['username'] . "</center></span></div>
        <center><div style='font-size:40px;color:#0e3c68;font-weight:bold;'><a href='adminpanel.php';><input type='button' name='proceed_login' value='Proceed' /></a></center></div>";
    } else { //IF LOGIN IS FAILED ... THEN LET THE USER CLICK THE BUTTON "LOGIN AGAIN" AND IT'LL REDIRECT TO admin_login.php file;
        echo "<center><div style='font-size:80px;color:#0e3c68;font-weight:bold;'> Failed to login! </div></center>
        <center><div style='font-size:40px;color:#0e3c68;font-weight:bold;'><a href='admin_login.php';><input type='button' name='login_again' value='Login Again' /></a></center></div>";
    };

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<link href="assets/css/ADMINConfirmationPage.css" type="text/css" rel="stylesheet"/>

</head>

<div class="headerOfHeaderContainer">

    <div class="headerContainer" id="headContainerSticky">

        <div class="logo">
            <img src="assets/images/bc_header.png">
        </div>
    </div>
</div>



   <br><br><br><br><br>
<body>

    <p>
        <button onclick="topFunction()" id="goTopButton" title="Go to top"><img src="assets/images/topImageButton.png"></button>
    </p>



    
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
