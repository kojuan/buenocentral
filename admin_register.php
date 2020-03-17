<?php
    $dbc = mysqli_connect("localhost", "root", "", "bc");
    session_start();
    $flag = FALSE;

    if (isset($_POST['username'])) {
        $uName = mysqli_real_escape_string($dbc, $_POST['username']);
        $pass1 = mysqli_real_escape_string($dbc, $_POST['password1']);
        $pass2 = $_POST['password2'];


        if ($pass1 == $pass2) {
            $flag = TRUE;
            echo '<script type="text/javascript">
             alert("Created account successfully. You may log in.");
             </script>';
            //  ADMIN PASSWORD: $2y$10$B54qeKs1xidOKJ4AHJ0MBuuVNkCgjDfHeN/WNJ3IpdPH25cjdSIMu
        }

        if ($pass1 != $pass2) {
            echo '<script type="text/javascript">
             alert("Password does not match. Please try again.");
             </script>';
        }

        if ($flag == TRUE) {
            $sql = "CREATE TABLE IF NOT EXISTS users(
                ID integer not null primary key auto_increment,
                username varchar(128),
                passwordchar varchar(256),
                tm timestamp
                )";
                $result = mysqli_query($dbc, $sql) or die("Bad query: $sql");
                
                $salted = "456y45rghtrhfgrhywsetr".$pass1."fdgfdsgsfgd";

                $hashed = hash('sha512', $salted);

                $sql = "INSERT INTO users(username, passwordchar) VALUES ('$uName', '$hashed')";
                $result = mysqli_query($dbc, $sql) or die("BAD SQL: $sql");
        
        
            } // IF INSERT
    }

?>

<html>
    <head>
        <body style="background-color: rgb(51, 52, 53);">
            <link href="assets/css/admin_login.css" type="text/css" rel="stylesheet"/>
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <content>    
        <center>
            <div class="container">
                <div class="login">
                    <h1 class="login-heading">
                    <strong><font face="Arial">ADMIN</strong> Register</h1></font></h1>
                    <!-- WHEN USER AND PASSWORD IS SUBMITTED, IT WILL GO TO THE loginConfirmation.php file -->
                    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post"> 
                    <p>
                        <input type="text" name="username" id="username" placeholder="Username" required="required" class="input-txt" />
                    </p>
                    <p>    
                        <input type="password" name="password1" id="password" placeholder="Password" required="required" class="input-txt" />
                    </p> 
                    <p>    
                        <input type="password" name="password2" id="password" placeholder="Confirm Password" required="required" class="input-txt" />
                    </p> 
                        <input type="submit" id="btn" class="btn btn--right" name="register" value="  (Register Admin Account)" />
                        <br><br>
                        <a href="admin_login.php"><input type="button" id="btn" class="btn btn--right" name="login" value="(Login to Existing Account)    " /></a>
                    </form>
                </div>
            </div>
        </center>
        </content>
        </body>
    </head>
  </html>