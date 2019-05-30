<?php

extract($_SESSION);
$i=$_SESSION['LoginID'];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CSR</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                
                <!-- Brand -->

                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>3</span>P's</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  
                </a>
              </div>
             
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                <li >
                        <a style='font-color:blue;font-size:12px'>Welcome <?php echo $_SESSION['Login']; ?>,&nbsp;&nbsp;</a>
                    </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="../Event Register Page/ERP2.php">Register Event</a></li>
                      <li><a href="../E/events_own_list.php" >List Own Events</a></li>
                      
                      <li><a href="../../HOME1/home1.php" >View Events</a></li>
                      <li>
                    <a class="page-scroll" href="../report.php">Search Events</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="../E/users_list.php">Company List</a>
                  </li>
                     
                    </ul> 
                  </li>

                  <li class="active">
                  <a class='page-scroll' href='../Profile/Profile.php?id=<?php echo $i; ?>' style='color:white;'>My Profile</a>
                  </li>
                  
                  

                  <li>
                    <a class="page-scroll" href="#about">About</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                  </li>
                  <li class="dropdown">
      <a href="#" class="dropdown-toggle" id="dropdowntoggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span  class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
      <ul class="dropdown-menu" id="dropdownmenu"></ul>
     </li>
     <li>
                    <a class="page-scroll" href="../../HOME1/logout.php">Signout</a>
                  </li>
                    
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Slider Area -->
   <!-- End Slider Area -->

<!-- Start Blog Area -->
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start Left Blog -->
          
  <!-- End Blog -->
  
   <!-- Start portfolio Area -->
  
  <!-- Start Footer bottom Area -->


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
  <script src="fet.js"></script>
</body>

</html>
