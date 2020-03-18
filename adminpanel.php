<?php
    $conn = mysqli_connect("localhost", "root", "", "bc");
    error_reporting(E_ALL);
    session_start();
    $_SESSION['username'];

?> 
<?php
if(isset($_POST['delete_btn']))
{
    $uName = $_SESSION['username'];
    $query = "delete from users where username= $uName";
    mysqli_query($conn, $query);
    header("Refresh:1; url=admin_login.php");
    echo '<script type="text/javascript">
        alert("Deleted account successfully.");
        </script>';


}
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
    <link href="assets/css/AdminPage.css" type="text/css" rel="stylesheet"/>
    
    </head>
    <hr>
    <center>

        <div class="logo">
            <a href="#"><img src="assets/images/bc_header.png"></a>
            <br><br>
            <button type="button" class="btn btn-default btn-sm"><a href="admin_logout.php" ><span class="glyphicon glyphicon-log-out"></span> Log out</a></button>
            <br>
            <form method="post" action="">
                <td><button type="submit" class="btn btn-danger" name="delete_btn">Delete Admin Account</button></td>
            </form>
        </div>
    </center>
    <hr>
    <hr>
    <br><br><br><br><br>
    <body>
        <center>
        <br><br><br><br><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_POST["operationAdd"])){
                $addOperation = $_POST["operationAdd"];
                $fileOperation = $_POST["filename"];
                //Create file
    
                $createFile = fopen($fileOperation. ".txt", "w") or die("Unable to open file!");
                $txtDesc = $_POST["desc"];
                fwrite($createFile, $txtDesc);
                $currentFilePath = $fileOperation. ".txt";
                $newFilePath = 'assets/txt/'.$fileOperation . ".txt";
                $fileMoved = rename($currentFilePath, $newFilePath);
    
                fclose($createFile);
    
                echo $_POST["filename"] . " has been successfully added!<br><br>";
            } 
            else if (isset($_POST["operationEditt"])){
                $edittOpertation = $_POST["operationEditt"];
                $fileOperation = $_POST["filename"];
                //Edit
                
                $fileOpen = fopen("assets/txt/" . $fileOperation, 'w');
                $txtDesc = $_POST["newDesc"];
                $fileRead = fwrite($fileOpen, filesize("assets/txt/" . $fileOperation));
                
                if (!feof($fileOpen)) {
                    
                    $editOperation = $_POST["operationEditt"];
                    $fileOperation = $_POST["filename"];
                    fwrite($fileOpen, $txtDesc);
                    fclose($fileOpen);
                    echo "The announcement has been successfully edited.";
                }
    
                ?>
                
    <br><br><br><br><br><br><br><br><br><br>
                <?php 
            }
    
            else if (isset($_POST["operationUpload"])){
                $uploadOperation = $_POST["operationUpload"];
                if (move_uploaded_file($_FILES['file']['tmp_name'], "assets/images/gallery/" . $_FILES['file']['name'])){
                    echo "<h1>File has been uploaded</h1>";
                }
                else{
                    echo "<h1>File has not been uploaded</h1>";
                }
    
            }
            else if (isset($_POST["operationDelete"])){
                //Delete
                $fileOperation = $_POST['filename'];
                //THIS LINE WILL DELETE A SINGLE .TXT FILE.
                if (isset($fileOperation)) {
                    echo " The file " . $fileOperation . " has been deleted.";
                    unlink("assets/txt/". $fileOperation); // DELETE .txt File

                }
                
            }
        }
    ?>
    
    <div>
    <fieldset>
        <form action="?" method="post" enctype="multipart/form-data">
           
                <legend>ADD Announcement</legend>
                Filename ->  <?php echo '<input type="text" size=40% name="filename" placeholder="Enter Filename" required/>' ?> <br>
                
                Description -> <?php echo '<textarea name="desc" rows="3" cols="100" placeholder="Enter announcement. This entire message of this textbox will display on the user end." required></textarea>' ?>
                <br><input type="submit" name="operationAdd" value="Add">
    
        </form>
        <form action="?" method="post" enctype="multipart/form-data">
                <br><br><br>
                <legend>EDIT Announcement</legend>
                <select id="files" name="filename" class="select-css">

                    <?php
                    $fileNotExist = true;
                    foreach (scandir("assets/txt/") as $announcement){
                        if ($announcement != "." && $announcement != ".."){
                            echo '<option value="' . $announcement . '">' . $announcement . '</option>';
                            $fileNotExist = false;
                        }
                         }
                    if ($fileNotExist){
                        echo '<option value="None">None</option>';
                    }
                    ?>
                    
                </select>

                <textarea name="newDesc" rows="10" cols="150"></textarea>
                   
                <input type="submit" name="operationEditt" value="Edit">
            
        </form>
        <form action="?" method="post" enctype="multipart/form-data">
        <br><br><br>
                <legend>DELETE Announcement</legend>
                <select id="files" name="filename" class="select-css">
                
                    <?php
                    $fileNotExist = true;
                    foreach (scandir("assets/txt/") as $announcement){
                        if ($announcement != "." && $announcement != ".."){
                            echo '<option value="' . $announcement . '">' . $announcement . '</option>';
                            $fileNotExist = false;
                            
                        } 
                    }
                    if ($fileNotExist){
                        echo '<option value="None">None</option>';
                    }
                    ?>
                    <input type="submit" name="operationDelete" value="Delete">
                 
                </select>
        </form>
        </fieldset>
    </div>
    <br><br><br>
        <h1>Upload Gallery</h1>
        <form action="?" method="post" enctype="multipart/form-data">
            Filename: <input type="file" name="file" accept="image/x-png,image/jpeg"> 
            <input type="submit" name="operationUpload" value="Upload">
        </form>
    </center>
    <br><br><br>
    
    </body>
    
    </html>
