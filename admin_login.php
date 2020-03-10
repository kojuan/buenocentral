<html>
    <head>
        <body>
            <link href="assets/css/admin_login.css" type="text/css" rel="stylesheet"/>
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
            

            <div class="container">
                <div class="login">
                    <h1 class="login-heading">
                    <strong><font face="Arial">ADMIN</strong> Login</h1></font></h1>
                    <!-- WHEN USER AND PASSWORD IS SUBMITTED, IT WILL GO TO THE loginConfirmation.php file -->
                    <form action="loginConfirmation.php" method="post"> 
                    <p>
                        <input type="text" name="username" id="username" placeholder="Username" required="required" class="input-txt" />
                    </p>
                    <p>    
                        <input type="password" name="password" id="password" placeholder="Password" required="required" class="input-txt" />
                    </p> 
                    <p> 
                        <div class="login-footer">
                        <input type="submit" id="btn" class="btn btn--right" value="Login" />
                    </p>
                
                        </div>
                    </form>
                </div>
            </div>
        </body>
    </head>
  </html>