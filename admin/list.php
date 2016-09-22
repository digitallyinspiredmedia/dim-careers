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
$sql = "SELECT * FROM form ORDER BY user_registered";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo
     "- id: " . $row["ID"]. "
      - Name: " . $row["firstname"]. " 
      - Last Name " . $row["lastname"]. "
      - Email" . $row["email"]. "
      - Mobile" . $row["mobile"]. "
      - url" . $row["url"]. "
      - pdf" . $row["pdf"]. "
      - user_status" . $row["user_status"]. "
      - position" . $row["position"]. "
      - user_registered" . $row["user_registered"]. "
     <br>";
    }
} else {
    echo "0 results";
}


mysqli_close($conn);


?>