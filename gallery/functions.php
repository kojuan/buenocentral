<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'bc_gallery';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	die ('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <div class="headerOfHeaderContainer">
        <div class="headerContainer" id="headContainerSticky">
            <div class="logo">
                <a href="../index.php"><img src="../assets/images/bc_header.png"></a>
            </div>
    
            <div class="nav">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../gallery/gallery_index.php">Gallery</a></li>
                    <li><a href="../contactform.php">Contact Us</a></li>
            </div>
        </div>
    </div>
EOT;
    }


// Template footer
function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>