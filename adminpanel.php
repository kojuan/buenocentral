

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


<center>
    <div class="logo">
        <a href="#"><img src="assets/images/bc_header.png"></a>
        <button type="button" class="btn btn-default btn-sm">
        <a href="admin_login.php" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-log-out"></span> Log out</a>
        </button>
    </div>
</center>

<br><br><br><br><br>
<body>
    <center>
    <br><br><br><br><br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($_POST["operation"] == "Add"){
            //Create file

            $createFile = fopen($_POST["filename"]. ".txt", "w") or die("Unable to open file!");
            $txtDesc = $_POST["desc"];
            fwrite($createFile, $txtDesc);
            $currentFilePath = $_POST["filename"]. ".txt";
            $newFilePath = 'assets/txt/'.$_POST["filename"] . ".txt";
            $fileMoved = rename($currentFilePath, $newFilePath);

            fclose($createFile);

            echo $_POST["filename"] . " has been successfully added!<br><br>";
        } 
        else if ($_POST["operation"] == "Edit"){
            //Edit

            $fileOpen = fopen("assets/txt/" . $_POST["filename"], 'r');
            $fileRead = fread($fileOpen, filesize("assets/txt/" . $_POST["filename"]));
            
            while(!feof($fileOpen)) {
                $data = fgets($fileOpen, filesize("assets/txt/" . $_POST["filename"]));
                echo '<textarea name="newDesc" rows="10" cols="200">' . file_get_contents("assets/txt/" . $_POST["filename"]) . '</textarea>';
                
            }
            fclose($fileOpen);

            ?>
            <form action="?" method="post">
                <input type="submit" name="operation" value="EDIT ANNOUNCEMENT">
            </form>
            
            <?php
            if ($_POST["operation"] == "EDIT ANNOUNCEMENT") {
                echo "The announcement has been successfully edited.";
                $fhandle = fopen("assets/txt/" . $_POST["filename"] . ".txt", "r") or die("Unable to open file!");
                $content = fread($_POST["newDesc"]);
                fwrite($fhandle, $content);
                fclose($fhandle);

            }
            ?>
            
<br><br><br><br><br><br><br><br><br><br>
            <?php 
        }

        else if ($_POST["operation"] == "Upload"){
            if (move_uploaded_file($_FILES['file']['tmp_name'], "assets/images/gallery/" . $_FILES['file']['name'])){
                echo "<h1>File has been uploaded</h1>";
            }
            else{
                echo "<h1>File has not been uploaded</h1>";
            }

        }
        else{
            //Delete
            //THIS LINE WILL DELETE A SINGLE .TXT FILE.
            $selectAnnouncementFile = $_POST['filename']; // call out SELECTED File name
            if (isset($selectAnnouncementFile)) {
                echo " The file " . $selectAnnouncementFile . " has been deleted.";
                unlink("assets/txt/". $selectAnnouncementFile); // DELETE .txt File
            }
        }
    }
?>

<div>
<fieldset>
    <form action="?" method="post">
       
            <legend>ADD Announcement</legend>
            Filename ->  <input type="text" size=40% name="filename" placeholder="Enter Filename" required/><br>
            
            Description -> <textarea name="desc" rows="3" cols="100" placeholder="Enter announcement. This entire message of this textbox will display on the user end." required></textarea>
            <br><input type="submit" name="operation" value="Add">

    </form>
    <form action="?" method="post">
            <br><br><br>
            <legend>EDIT Announcement</legend>
            <select id="files" name="filename">
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
            <br>
            <input type="submit" name="operation" value="Edit">
        
    </form>
    <form action="?" method="post">
    <br><br><br>
            <legend>DELETE Announcement</legend>
            <select id="files" name="filename">
            
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
    
                <input type="submit" name="operation" value="Delete">
             
            </select>
    </form>
    </fieldset>
</div>
<br><br><br>
    <h1>Upload Gallery</h1>
    <form action="?" method="post" enctype="multipart/form-data">
        Filename: <input type="file" name="file" accept="image/x-png,image/jpeg"> 
        <input type="submit" name="operation" value="Upload">
    </form>
</center>

</body>

</html>

