<!DOCTYPE html>
<html lang="en">
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
    <link href="src/css/all.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
-->
  </head>
<body>
<div id="fb-root"></div>

  <!-- container -->
  <nav class="navbar navbar-default">
    <a class="navbar-brand" href="/">
      <h1 class="logo"> Digitally Inspired Media </h1>
    </a>
    <div class="burger-icon">
      <span class="burger-menu">
      </span>
    </div>
    <div class="menu-container">
      <ul class="menu-list">
        <li> <a href="http://digitallyinspiredmedia.com/#slider-section1">Home </a> </li>
        <li> <a href="http://digitallyinspiredmedia.com/#aboutus-section"> About </a> </li>
        <li> <a href="http://digitallyinspiredmedia.com/#what-we-do-section">Services </a> </li>
        <li> <a href="http://digitallyinspiredmedia.com/#clients-section">Clients </a> </li>
        <li> <a href="http://careers.digitallyinspiredmedia.com">Careers </a> </li>
        <li> <a href="http://digitallyinspiredmedia.com/#contact-section">Contact </a> </li>
      </ul>
    </div>
  </nav>
 <div class="logincontainer">
<form action="admin/admin.php" id="ajax-contacts" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="input-group">
              <input type="email" class="form-control" name="email" id="email" required="required"/>
              <label for="email" class="control-label">User Email</label>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
              <input type="password"  class="form-control" name="password" id="password" pattern="[a-zA-Z0-9\s]+" required="required" />
              <label for="password" class="control-label">Password</label>
            </div>
        </div>
        <div class="error-container">
          <ul id="messageBox"> </ul>
        </div>
        <div class="button-container">
          <button type="submit" class="button"><span>Submit</span></button>
        </div>
      </form> 
      <ul id="fuck"> </ul>
      
</div>
   <!-- footer -->
      <footer>
        <p>&copy; 2016 Digitally Inspired Media</p>
        <div class="social-link">
          <ul class="social-icon">
            <li class="facebook">
              <a href="https://www.facebook.com/DigitallyInspiredMedia" >Facebook</a>
            </li>
            <li class="google">
              <a href="https://plus.google.com/+DigitallyInspiredMedia" >Google Plus</a>
            </li>
            <li class="twitter">
              <a href="https://twitter.com/digital_inspire" >Twitter</a>
            </li>
            <li class="behance">
              <a href="https://www.behance.net/digitallyinspired" >Behance</a>
            </li>
           <li class="youtube">
              <a href="https://www.youtube.com/user/DigitallyInspiredTV" >Youtube</a>
            </li>
            <li class="medium">
              <a href="https://medium.com/@digitallyinspiredmedia" >Medium</a>
            </li>
            <li class="instagram">
              <a href="https://www.instagram.com/digitallyinspiredmedia_/" >Instagram</a>
            </li>
            <li class="linkedin">
              <a href="https://www.linkedin.com/company/2634160" >Linkedin</a>
            </li>
            <li class="pinterest">
              <a href="https://in.pinterest.com/digitalinspire/" >Pintrest</a>
            </li>
          </ul>
        </div>
      </footer>
    <!-- footer -->
  <!-- container -->

<script src="src/js/jquery.js"></script>
<script src="src/js/matchHeight.js"></script>
<script src="src/js/parallax.js"></script>
<script src="src/js/jquery.validate.min.js"></script>
<script src="src/js/other.js"></script>
<script type="text/javascript">
  
$(document).ready( function(){
  $.getJSON("admin/extract.php", function(data){
    $("ul").empty();
    $.each(data.result, function(){
      $("ul").append(
        "<li>Id:"+this['ID']+"</li><br><li>firstname:"+this['firstname']+"</li><br><li>lastname:"+this['lastname']+"</li><br><li>email:"+this['email']+"</li><br><li>url:"+this['url']+"</li><br><li>user_registered:"+this['user_registered']+"</li><br><li>pdf:"+this['pdf']+"</li><br><li>user_status:"+this['user_status']+"</li><br><li>position:"+this['position']+"</li><br"
        );
    });
  });
});
</script>
  </body>
</html>