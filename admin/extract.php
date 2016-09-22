<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png"  href="src/images/favicon.png">
    <meta name="contact" content="kavin@digitallyinspiredmedia.com" />
    <meta name="author" content="Digitally Inspired Media ">
    <meta name="keywords" content="DigitallyInspiredMedia, Digitally, inspired, media, Digital, Marketing, DigitalMarketing, AdvertisingAgency, Advertising, Agency, creative, WebDesign, Web, Design, VideoMaking, Video, Making, SocialMediaMarketing, Social, ClientServices, Client, Services, ad, digital, full, interactive, internet, management, online, service, chetpet, chennai, bangalore, bombay, mumbai, Pinstorm, Techshu, Reprise Media, Ogilvy PR, iStrat">
    <meta name="description" content="We craft inspiring stories for the digital age. A Creative Digital Agency based out of Chennai,Banglore &amp; Mumbai.">
    <meta name="theme-color" content="#702a81">
    <meta name="msapplication-navbutton-color" content="#702a81">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta property="og:image" content="src/image/logo.png">
    <meta name="og:description" content="We craft inspiring stories for the digital age. A Creative Digital Agency based out of Chennai,Banglore &amp; Mumbai.">
    <meta property="og:title" content="Careers @ Digitally Inspired Media">
    <meta name="twitter:title" content="Careers @ Digitally Inspired Media">
    
    <title>Admin Login | Digitally Inspired Media</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Open+Sans:400,600,700" rel="stylesheet">
    <link href="../src/css/all.css" rel="stylesheet">
    <link href="../src/css/admin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
-->
  </head>
<body>
  <!-- container -->
<nav class="navbar navbar-default">
      <a class="navbar-brand" href="/">
        <h1 class="logo"> Digitally Inspired Media </h1>
      </a>
</nav>
 <div class="logincontainer extract">
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
?>
<table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>URL</th>
          <th>PDF</th>
          <th>Position</th>
          <th>Approved</th>
          <th>Reject</th>
        </tr>
      </thead>
      <tbody>
<?php

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <td><?php echo $row["firstname"]; ?> </td>
          <td><?php echo $row["email"]; ?> </td>
          <td><?php echo $row["mobile"]; ?> </td>
          <td><?php echo $row["url"]; ?> </td>
          <td><a href="http://careers.digitallyinspiredmedia.com/resume/<?php echo $row["pdf"]; ?>" target="_blank"> Download</a> </td>
          <td><?php echo $row["position"]; ?> </td>
          <td><a href="http://careers.digitallyinspiredmedia.com/admin/trigger-send.php?id=<?php echo $row['ID']?>" target="_blank">Send</a> </td>
          <td><a href="http://careers.digitallyinspiredmedia.com/admin/trigger-delete.php?id=<?php echo $row['ID']?>" target="_blank">Delete</a> </td>
        </tr>
        
     <?php
    }
  } else {
    echo "0 results";
  }


mysqli_close($conn);


?>
      
</div>
   
  <!-- container -->

<script src="../src/js/jquery.js"></script>
  </body>
</html>