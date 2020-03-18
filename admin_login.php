
<?php
 $dbc = mysqli_connect("localhost", "root", "", "bc");  
session_start();

if(isset($_POST["username"]))  
{
    $username = mysqli_real_escape_string ($dbc,  $_POST['username']);
    $password= mysqli_real_escape_string ($dbc,  $_POST['password1']);
   

    $salted = "456y45rghtrhfgrhywsetr".$password."fdgfdsgsfgd";
    $hashed = hash('sha512', $salted);

    $query = "SELECT * FROM users WHERE username='$username' AND passwordchar='$hashed' ";
    $result = mysqli_query($dbc, $query) or die("Bad SQL: $sql");  
   
    if(mysqli_num_rows($result) > 0)
    {  
         /* there is a recordset so fetch into as array */
        $row=mysqli_fetch_assoc( $result );

        /* extract the required variables from recordset array */
        $userid = $row['id'];

        $_SESSION['username'] = $username;
        $_SESSION['id'] = $userid; // <-this variable should now exist
         echo '<script type="text/javascript">
                alert("Logged in Success.");
            </script>';
        echo header("location:adminpanel.php");
    }  
    else  
    {  
        //return false;  
        echo '<script>alert("Wrong User Details")</script>';  
        $_SESSION = [];
        session_destroy();  
    } 
}
?>
<html>
    <head>
        <body style="background-color: rgb(51, 52, 53);">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <link href="assets/css/admin_login.css" type="text/css" rel="stylesheet"/>
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
            <center><img src="assets/images/bc_header.png"></a></center>
            <content><center>
            <div class="container">
                <div class="login">
                    <h1 class="login-heading">
                    <strong>ADMIN</strong> Login</h1></font>

                    <!-- WHEN USER AND PASSWORD IS SUBMITTED, IT WILL GO TO THE loginConfirmation.php file -->
                    <form action="?" method="post" enctype="multipart/form-data"> 
                    <p>
                        <input type="text" name="username" id="username" placeholder="Username" required="required" class="input-txt" />
                    </p>
                    <p>    
                        <input type="password" name="password1" id="password" placeholder="Password" required="required" class="input-txt" />
                    </p> 
                    <p> 
                        <div class="login-footer">
                        <input type="submit" id="btn" class="goToIndexBtn" name="login" value="Login" />
                        <br><br>
                        <a href="admin_register.php" class="goToIndexBtn" name="register">Register a New Admin Account</a>
                        <br><br>
                        <a href="index.php" class="goToIndexBtn">Go to INDEX Homepage</a>
                    </p>
                    </div>
                    <font color="white">[Date / Time] <span id="time"></span></font>
                    <script>
                        let timestamp = '<?=time();?>';
                        function updateTime(){
                        $('#time').html(Date(timestamp));
                        timestamp++;
                        }
                        $(function(){
                        setInterval(updateTime, 1000);
                        }); 
                    </script>
                    </form>
                </div>
            </div>
            </content></center>
       
    <br>

        </body>
    </head>
  </html>