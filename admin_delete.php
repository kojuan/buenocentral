<?php
$conn = mysqli_connect("localhost", "root", "", "bc");
error_reporting(E_ALL);
session_start();
$_SESSION['username'];
    // Check connection
    if(isset($_POST['delete_btn']))
    {
        $uName = $_SESSION['username'];
        $query = "delete from users where username= $uName";
        mysqli_query($conn, $query);
        echo '<script type="text/javascript">
            alert("Deleted account successfully.");
            </script>';

    }
?>