<?php
 $dbc = mysqli_connect("localhost", "root", "", "bc");  
session_start();

if(isset($_POST["username"]))  
{
    $username = mysqli_real_escape_string ($dbc,  $_POST['username']);
    $password= mysqli_real_escape_string ($dbc,  $_POST['password1']);
   

    $salted = "456y45rghtrhfgrhywsetr".$password."fdgfdsgsfgd";
    $hashed = hash('sha512', $salted);

    $query = "SELECT * FROM users WHERE username='$username' AND passwordchar='$hashed'";
    $result = mysqli_query($dbc, $query) or die("Bad SQL: $sql");  
   
    if(mysqli_num_rows($result) > 0)
    {  
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
            <link href="assets/css/admin_login.css" type="text/css" rel="stylesheet"/>
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
            
            <content><center>
            <div class="container">
                <div class="login">
                    <h1 class="login-heading">
                    <strong><font face="Arial">ADMIN</strong> Login</h1></font></h1>
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
                        <input type="submit" id="btn" class="btn btn--right" name="login" value="Login" />
                        <br><br>
                        <a href="admin_register.php"><input type="button" id="btn" class="btn btn--right" name="register" value="(Register a New Admin Account)" /></a>
                    </p>
                
                        </div>
                    </form>
                </div>
            </div>
            </content></center>
        </body>
    </head>
  </html>