<?php

$servername = "careerdim.db.9731563.hostedresource.com";
$username = "careerdim";
$password = "Admin@123";
$databasename = "careerdim";

// base url
$base_url='http://careers.digitallyinspiredmedia.com/';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

// getdata
$uemail = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

//process data
$sql = "SELECT * FROM form WHERE pdf IS NOT NULL ORDER BY user_registered";
$result = mysqli_query($conn, $sql);

if ( mysqli_num_rows($result) >= 1) {
    
    while($row = mysqli_fetch_assoc($result)) {
      
         $json_output[] = $row;

    echo json_encode($json_output);


    }
} else {
    header("Location: error.php");
}


mysqli_close($conn);


?>