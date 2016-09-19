<?php
/*
CREATE DATABASE form;

CREATE TABLE form(
  ID INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  firstname VARCHAR(60) NOT NULL,
  lastname VARCHAR(60) NOT NULL,
  email VARCHAR(100) NOT NULL  UNIQUE KEY,
  mobile VARCHAR(10) NOT NULL,
  url VARCHAR(256) NOT NULL ,
  user_registered DATETIME NOT NULL,
  pdf VARCHAR(255) NOT NULL,
  user_status enum('0','1','2') NOT NULL DEFAULT '0',
  position VARCHAR(60) NOT NULL
);

CREATE TABLE users(
  ID INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(60) NOT NULL,
  email VARCHAR(60) NOT NULL UNIQUE KEY,
  password VARCHAR(100) NOT NULL);

*/

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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mobile = $_POST['mobile'];
$url = $_POST['url'];
$pdf = $_POST['resume'];
$position = $_POST['position'];

/* process pdf */

// $filePointer = fopen($_FILES['resume']['tmp_name'], 'r');
// $fileData = fread($filePointer, filesize($_FILES['resume']['tmp_name']));
// $fileData = addslashes($fileData);
// //$sql = "INSERT INTO files (filename, mimetype, data) VALUES( $fileName, $fileType, $fileData )";


$target = "resume/";  
$target = $target . basename( $_FILES['resume']['name']); 
$path = $_FILES['resume']['name'];
if(move_uploaded_file($_FILES['resume']['tmp_name'], $target)){
  //echo 'The file ". basename( $_FILES['file']['name']). " has been uploaded';  
  $fileName = basename( $_FILES['resume']['name']);
  //echo "string";
}else{   
  //echo "Sorry, there was a problem uploading your file.";
} 

/* process pdf */


//store data
$sql = "INSERT INTO form SET user_registered = NOW(), firstname = '$firstname', lastname = '$lastname', mobile = '$mobile', email = '$uemail', url ='$url', position ='$position', pdf ='$fileName' ";

//assign send name and email
$name ="digitallyinspiredmedia";
$email ="admin@digitallyinspiredmedia.com";
$bbname ="career";
$bcc ="career@digitallyinspiredmedia.com";


// check the data
if (mysqli_query($conn, $sql)) {
   

        $recipient = "$uemail";
        $subject = "Thankyou for applying form '$position' @ digitallyinspiredmedia";

        // Build the email content.
        $email_content = "First Name : $firstname\n";
        $email_content .= "Last Name : $lastname\n";
        $email_content .= "Mobile : $mobile\n";
        $email_content .= "Email : $uemail\n";
        $email_content .= "Position: $position\n\n";
        
        $email_headers = "From: $name <$email>". "\r\n" .
          "Reply-To: $name <$email>" . "\r\n" .
          "Bcc: $bbname <$bcc>";


        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
          //echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
          // echo "Oops! Something went wrong and we couldn't send your message.";
        }


    //redirect the message
    header("Location: thankyou.php");
} else {
   //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: thankyou-error.php");
}


mysqli_close($conn);


?>