<?php
session_start();
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
  <style>
    .box1 {
    border: 1px solid lightblue;
    background-color: lightyellow;
    border-radius: 5px;
}
</style>
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
                        <h4 style='color:white;font-size:12px;padding-top:22px;'>Welcome <?php echo $_SESSION['Login']; ?>&nbsp;&nbsp;</h4>
                    </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="../Event Register Page/ERP2.php">Register Event</a></li>
                      <li><a href="../E/events_own_list.php" >List Own Events</a></li>
                      
                      <li><a href="../../HOME1/home1.php" >View Events</a></li>
                      <li>
                    <a class="page-scroll" href="report.php">Search Events</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="../E/users_list.php">Company List</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="../E/Su/Suggestion.html">Suggestion</a>
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
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
             
              <div class="blog-text box1">
                 <h3><center>History</center></h3><hr>
                <marquee behaviour="scroll" SCROLLDELAY=150 direction="up" style="height:180px">
                
                
                <?php
                include('../../database.php');
                $_SERVER['REQUEST_TIME'];
                $today = date('Y-m-d');
                //echo $today;
                $n1="SELECT * FROM events WHERE FromDate < '$today' ORDER BY FromDate DESC ";
                $res=mysqli_query($conn,$n1);
                while($ro=mysqli_fetch_assoc($res))
                {
                  echo "<p><b>".$ro['EventName']."</b></p>";
                }
              ?>
              </marquee>
              </div>
              <div class="blog-text box1">
                 <h3><center>Suggestions</center></h3><hr>
                <marquee behaviour="scroll" direction="up" style="height:160px" SCROLLDELAY=150 onmouseover="this.stop();" onmouseout="this.start();">
                
                
                <?php
                include('../../database.php');
                $_SERVER['REQUEST_TIME'];
                $today = date('Y-m-d');
                //echo $today;
                $n1="SELECT A.*,B.UserName,B.Mobile FROM suggestions A,users B Where A.UserID = B.UserID";
				$n1.= " Order By DateTime Desc";
                $res=mysqli_query($conn,$n1);
                while($ro=mysqli_fetch_assoc($res))
                {

                  //echo "<p><a><b>".$ro['Suggestions']."</b><a></p>";
                  echo "<fieldset>";
				          echo $ro['UserName']. " Date: ".date("d-m-Y",strtotime($ro['DateTime']))."<br/>".$ro['Suggestions']."<hr>";
                  echo "</fieldset>";
                }
              ?>
              </marquee>
              </div>
            </div>

                         
              
            
            
          </div>
          <!-- End Left Blog-->
          <!-- Start middle Blog -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
                <?php include('graph1.php'); ?>

            </div>
            <!-- Start single blog -->
          </div>
          <!-- End Left Blog-->
          <!-- Start Right Blog-->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
               <div class="blog-text box1">
                 <h3><center>Upcoming Events</center></h3>
                <marquee behaviour="scroll" direction="up" style="height:180px" SCROLLDELAY=150>
                 <!-- This is for upcomming events -->
               <?php
                include('../../database.php');
                $_SERVER['REQUEST_TIME'];
                $today = date('Y-m-d');
                //echo $today;
                $n1="SELECT * FROM events WHERE FromDate >'$today' ORDER BY FromDate DESC ";
                $res=mysqli_query($conn,$n1);
                while($ro=mysqli_fetch_assoc($res))
                {
                  echo "<p><b>".$ro['EventName']."</b></p>";
                }
              ?>
              </marquee>
              </div>
               <div class="blog-text box1">
                 <h2><center>Today's Events</center></h2>
                <div style="height:200px">
              
                <?php
                include('../../database.php');
                $_SERVER['REQUEST_TIME'];
                $today = date('Y-m-d');
                //echo $today;
                $n1="SELECT * FROM events WHERE FromDate = '$today' ORDER BY FromDate DESC ";
                $res=mysqli_query($conn,$n1);
                while($ro=mysqli_fetch_assoc($res))
                {
                  echo "<p><b>".$ro['EventName']."</b></p>";
                }
              ?>
              </div> 
              </div>
            </div>
          </div>
          <!-- End Right Blog-->
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog -->
  
   <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Our Gallary</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        <div class="awesome-project-1 fix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="awesome-menu ">
              <ul class="project-menu">
                <li>
                  <a href="#" class="active" data-filter="*">All</a>
                </li>
                <li>
                  <a href="#" data-filter=".development">Education</a>
                </li>
                <li>
                  <a href="#" data-filter=".design">Environment</a>
                </li>
                <li>
                  <a href="#" data-filter=".photo">Economic</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="awesome-project-content">
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="https://t3.ftcdn.net/jpg/02/11/88/90/500_F_211889032_FAMqxrDtDKNK2zApji2sE8q9iNKplJ2q.jpg" alt="" width="800" height="800"/></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="img/portfolio/1.jpg">
                      <h4>Welcome to beautiful glimpse of CSR</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 photo">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="https://images.livemint.com/rf/Image-621x414/LiveMint/Period1/2015/10/16/Photos/NitaAmbani-k6C--621x414@LiveMint.jpg" alt="" width="500" height="300"/></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="img/portfolio/2.jpg">
                      <h4>Reliance wants to do good (and money is no object)</h4>
                     
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="https://thumbor.forbes.com/thumbor/1280x868/https%3A%2F%2Fblogs-images.forbes.com%2Fforbesnonprofitcouncil%2Ffiles%2F2018%2F09%2Fcanva-photo-editor-4.png" alt="" width="800" height="800" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="img/portfolio/3.jpg">
                      <h4>Corporate social responsibility (CSR) has evolved dramatically over the last decade.</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 photo development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="https://previews.123rf.com/images/amlanmathur/amlanmathur1401/amlanmathur140100027/25261669-delhi-india-4th-jan-2014-poor-children-being-taught-in-an-open-air-classroom-by-volunteers-classes-l.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="img/portfolio/4.jpg">
                      <h4>Education to poor children</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="https://thecsrjournal.in/wp-content/uploads/2019/01/Kia-CSR-Press-release.jpg" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="img/portfolio/5.jpg">
                      <h4>Kia launches ‘Green Light Project’ in India</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design photo">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="http://www.tatatinplate.com/content/images/csr-images6.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="img/portfolio/6.jpg">
                      <h4>The Company providing tuition fees for children from AA community</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->
  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About Us</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                  <img src="https://t3.ftcdn.net/jpg/02/11/88/90/500_F_211889032_FAMqxrDtDKNK2zApji2sE8q9iNKplJ2q.jpg" alt="">
                </a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">THE CSR</h4>
              </a>
              <p>

                The Corporate Social Responsibility concept in India is governed by Section 135 of the Companies Act, 2013 and Rules made thereunder wherein the criteria has been provided for assessing the CSR eligibility of a company, Implementation and Reporting of their CSR Policies. 

                The CSR ambit is getting bigger and for upcoming years it would turn as a unique knowledge base for analyzing and achieving sustainability goals as among various large economies India is a country which has assured by mandating CSR through its legislative action.
              </p>

              <div>
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">OUR CSR PORTAL</h4>
              </a>
              <p>
                It provides the national platform for the companies and individuals who want to contribute to society through the different social activities and even allows the other companies and individuals to join such events voluntarily, for such works this is a concept whereby companies integrate social and environmental concerns into their business operations. 
              </p>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- our-skill-area start -->
  <div class="our-skill-area fix hidden-sm">
    <div class="test-overly"></div>
    <div class="skill-bg area-padding-2">
      <div class="container">
        <!-- section-heading end -->
        <div class="row">
          <div class="skill-text">
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="95" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Web Design</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="85" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Graphics Design</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Php Developer</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="65" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Java Script</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- our-skill-area end -->

  <!-- Faq area start -->
  <div class="faq-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>FAQ's</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="faq-details">
            <div class="panel-group" id="accordion">
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                      <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">
                                                <span class="acc-icons"></span>What is Corporate Social Responsibility?
                      </a>
                    </h4>
                </div>
                <div id="check1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p>
                      The concept of Corporate Social Responsibility(CSR) emerged in the latter half of the 20th century. Corporate social responsibility means management and relationship building with partners to improve the image and increase credibility of the company. For members of the Business Leaders Forum, corporate social responsibility is a voluntary commitment by firms to be responsible towards the environment and society in which they operate.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#check2">
                                                <span class="acc-icons"></span> What are the main challenges that the CSR is facing?
                      </a>
                    </h4>
                </div>
                <div id="check2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      In a dynamic phase and moving towards a more holistic representation of the concept. Rather than just trying to "be good" or "do good", there is more of a realization these days that sustainability is a way of business, not just a project which runs alongside the business. No longer just about values or philanthropy, companies now see they can make money through sustainability.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#check3">
                                                <span class="acc-icons"></span>How important is for a company to be transparent about its CSR activities?
                      </a>
                    </h4>
                </div>
                <div id="check3" class="panel-collapse collapse ">
                  <div class="panel-body">
                    <p>
                      We see transparency as a catalyst for performance. The very act of preparing a Sustainability Report causes a company to confront many issues within its business which have never been addressed previously in the same way. Different questions are asked and new measurements are required. Core deliberations about disclosure cause serious discussions in the business at the highest levels. Making a public commitment to targets and action plans carry a certain pressure to deliver, far more than with targets communicated internally.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#check4">
                                                <span class="acc-icons"></span>Why should you communicate about CSR?  
                      </a>
                    </h4>
                </div>
                <div id="check4" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      It is true that the time and financial investment in socially responsible activities must be followed by the same size investment in communication of these activities. CSR is growing in importance for companies especially in improving competitiveness – this is a great opportunity to distinguish yourself from different companies. It can be beneficial not only for well-known transnational companies, but also for smaller companies that are less exposed in media and not so known in society and public interest. Therefore it is urgently necessary to let your successes from your CSR activities be heard in the society.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="tab-menu">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="active">
                <a href="#p-view-1" role="tab" data-toggle="tab">Profit </a>
              </li>
              <li>
                <a href="#p-view-2" role="tab" data-toggle="tab">People</a>
              </li>
              <li>
                <a href="#p-view-3" role="tab" data-toggle="tab">Planet</a>
              </li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="p-view-1">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Profit</h4>
                  <p>
                    The profit or economic bottom line deals with the economic value created by the organization after deducting the cost of all inputs, including the cost of the capital tied up. It therefore differs from traditional accounting definitions of profit. In the original concept, within a sustainability framework, the "profit" aspect needs to be seen as the real economic benefit enjoyed by the host society. It is the real economic impact the organization has on its economic environment. This is often confused to be limited to the internal profit made by a company or organization  Therefore, an original TBL approach cannot be interpreted as simply traditional corporate accounting profit plus social and environmental impacts unless the "profits" of other entities are included as a social benefit.
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-2">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>People</h4>
                  <p>
                    The people, social equity, or human capital bottom line pertains to fair and beneficial business practices toward labour and the community and region in which a corporation conducts its business. A triple bottom line company conceives a reciprocal social structure in which the well-being of corporate, labour and other stakeholder interests are interdependent.
                  </p>
                  <p>
                    An enterprise dedicated to the triple bottom line seeks to provide benefit to many constituencies and not to exploit or endanger any group of them. The "upstreaming" of a portion of profit from the marketing of finished goods back to the original producer of raw materials, for example, a farmer in fair trade agricultural practice, is a common feature.A TBL business also typically seeks to "give back" by contributing to the strength and growth of its community with such things as health care and education. Quantifying this bottom line is relatively new, problematic and often subjective. The Global Reporting Initiative (GRI) has developed guidelines to enable corporations and NGOs alike to comparably report on the social impact of a business.

                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-3">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Planet</h4>
                  <p>
                   The planet, environmental bottom line, or natural capital bottom line refers to sustainable environmental practices. A TBL company endeavors to benefit the natural order as much as possible or at the least do no harm and minimize environmental impact. A TBL endeavour reduces its ecological footprint by, among other things, carefully managing its consumption of energy and non-renewables and reducing manufacturing waste as well as rendering waste less toxic before disposing of it in a safe and legal manner. "Cradle to grave" is uppermost in the thoughts of TBL manufacturing businesses, which typically conduct a life cycle assessment of products to determine what the true environmental cost is from the growth and harvesting of raw materials to manufacture to distribution to eventual disposal by the end user.

                  </p>
              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end Row -->
    </div>
  </div>
  <!-- End Faq Area -->

 

 
  
  <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
              <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
              <!-- start testimonial carousel -->
              <div class="testimonial-carousel">
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      The Best Way To Find Ourself Is To Loss Yourself In The Service Of Society.
                    </p>
                    <h6>Mahatma Ghandi</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      By Getting An Opportunity To Serve Society, We Get A Chance To Repay Our Debt.
                    </p>
                    <h6>Narendra Modi</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      A Nation's Social Culture Resides In The Hearts And In The Soul Of Its People.
                    </p>
                    <h6>Mahatma Gandhi</h6>
                  </div>
                </div>
                <!-- End single item -->
              </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials -->
  
 
 

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>3</span>P's</h2>
                </div>

                <p>This CSR Portal is based on the 3P's Ethical System. Our website is used to bring companies and individuals together to help the society.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4 id="contact">information</h4>
                <p>
                  KLS Googte Institute Of Technology <br>
                  <span>Belgaum,Karnataka,India.
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +91 9740123497</p>
                  <p><span>Email:</span> threepsindia@gmail.com</p>
                  <p><span>Working Hours:</span> 9am-5pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="https://t3.ftcdn.net/jpg/02/11/88/90/500_F_211889032_FAMqxrDtDKNK2zApji2sE8q9iNKplJ2q.jpg" alt=""></a>
                  <a href="#"><img src="https://images.livemint.com/rf/Image-621x414/LiveMint/Period1/2015/10/16/Photos/NitaAmbani-k6C--621x414@LiveMint.jpg" alt=""></a>
                  <a href="#"><img src="https://thumbor.forbes.com/thumbor/1280x868/https%3A%2F%2Fblogs-images.forbes.com%2Fforbesnonprofitcouncil%2Ffiles%2F2018%2F09%2Fcanva-photo-editor-4.png" alt=""></a>
                  <a href="#"><img src="https://previews.123rf.com/images/amlanmathur/amlanmathur1401/amlanmathur140100027/25261669-delhi-india-4th-jan-2014-poor-children-being-taught-in-an-open-air-classroom-by-volunteers-classes-l.jpg" alt=""></a>
                  <a href="#"><img src="https://thecsrjournal.in/wp-content/uploads/2019/01/Kia-CSR-Press-release.jpg" alt=""></a>
                  <a href="#"><img src="http://www.tatatinplate.com/content/images/csr-images6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

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
