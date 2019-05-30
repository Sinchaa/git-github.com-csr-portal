<?php 
  session_start();
$l=$_SESSION['type'];
?>
<?php
    $html="";
    include("../../database.php");
    //Fetch all the country data
    $query = mysqli_query($conn,"SELECT * FROM mst_states ORDER BY StateName ASC");
    $query1 = mysqli_query($conn,"SELECT * FROM users where UserType = '2' ORDER BY UserName ASC");
    $querry_sectors =  mysqli_query($conn,"SELECT * FROM sectors");
    //Count total number of rows
    $rowCount1 = $query1->num_rows;
    $rowCount2 = $querry_sectors->num_rows;

    $rowCount = $query->num_rows;

if(isset($_POST['submit'])) {


    $html = "";
    $UserID     = filter_input(INPUT_POST,'UserID',FILTER_SANITIZE_NUMBER_INT);
    $StateID    = filter_input(INPUT_POST,'StateID',FILTER_SANITIZE_NUMBER_INT);
    $DistrictID = filter_input(INPUT_POST,'DistrictID',FILTER_SANITIZE_NUMBER_INT);
    $SectorID   = filter_input(INPUT_POST,'SectorID',FILTER_SANITIZE_NUMBER_INT);

    $sql="SELECT A.*,B.UserName,C.SectorName ,D.StateName ,E.DistrictName,F.ModeName  FROM events A,users B,sectors C ,mst_states D
    ,mst_districts E,moi F  Where A.UserID = B.UserID AND A.SectorID = C.SectorID AND A.StateID = D.StateID
     AND A.DistrictID = E.DistrictID AND A.ModeImplementID = F.ID ";
    if($SectorID>0) {
        $sql .= " And A.SectorID = $SectorID ";
    }
    if($StateID>0) {
        $sql .= " And A.StateID = $StateID ";
    }
    if($DistrictID>0) {
        $sql .= " And A.DistrictID = $DistrictID ";
    }
    if($UserID>0) {
        $sql .= " And A.UserID = $UserID ";
    }

    $sql00 = mysqli_query($conn,$sql);

    $html .= "<table class='table table-responsive table-bordered table-striped table-condensed'>
            <tr>
            <th>Organization</th>
            <th>Event Name</th>
            <th>Sector</th>
            <th>State</th>
            <th>District</th>
            <th>Place</th>
            <th>From</th>
            <th>To</th>
            <th>Budget</th>
            <th>Spent</th>
            <th>Mode of Implementation</th>
            <th>Help</th>
            </tr>";
     
       
    $TotalBudget = 0;
    $TotalSpent  = 0;

    while($row = mysqli_fetch_assoc($sql00))
    {
       
        $html .= '<tr>';
        $html .= "<td>".$row['UserName']."</td>";
        $html .= "<td>".$row['EventName']."</td>";
        $html .= "<td>".$row['SectorName']."</td>";
        $html .= "<td>".$row['StateName']."</td>";
        $html .= "<td>".$row['DistrictName']."</td>";
        $html .= "<td>".$row['EventArea']."</td>";
        $html .= "<td nowrap>".date("d-m-Y",strtotime($row['FromDate']))."</td>";
        $html .= "<td nowrap>".date("d-m-Y",strtotime($row['ToDate']))."</td>";
        $html .= "<td>".$row['AmtOutlay']."</td>";
        $html .= "<td>".$row['AmtSpent']."</td>";
        $html .= "<td>".$row['ModeName']."</td>";
      //  echo $row['EventID'];
        $html .= '<td><a id="dynamicLink" href="../contribution.php?eventid='.$row['EventID'].'">Wish to Contribute</a></td>';
        $html .= "</tr>";
        $TotalBudget += $row['AmtOutlay'];
        $TotalSpent  += $row['AmtSpent'];

    }
    $html .= '<tr>';
    $html .= "<td>Total</td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    
    $html .= "<td>".$TotalBudget."</td>";
    $html .= "<td>".$TotalSpent."</td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "</tr>";


    $html .= "</table>";    
    //echo $html;
}

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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                <!-- Brand -->

                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>3</span>P's</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <?php
                      if ($l!=1)
                     echo '<a class="page-scroll" href="http://localhost/Fi/SIH%20PROJECT/Organisation%20Front%20Page/Organisation%20FP.php">Home</a>';
                   else
                    echo '<a class="page-scroll" href="http://localhost/Fi/SIH%20PROJECT/Individual%20Front%20Page/Individual%20FP.php">Home</a>';
                  ?>
                  </li>
              
                  <li>
                    <a class="page-scroll" href="../logout.php">Signout</a>
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
<script src="E/bootstrap/js/jquery-3.3.1.js"></script>
<script src="E/bootstrap/js/bootstrap.min.js"></script>
<link href="E/bootstrap/css/bootstrap.css" rel="stylesheet" />
<div style='margin-top:100px;'>

<form action="<?php  $_SERVER['PHP_SELF'] ?>" method="POST">
<select id="UserID" name="UserID">
    <option value="0">Select Organisation</option>
    <?php
    if($rowCount1 > 0){
        while($row = $query1->fetch_assoc()){ 
            
            echo '<option value="'.$row['UserID'].'">'.$row['UserName'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
    ?>


</select>
<select id="SectorID" name="SectorID">
    <option value="0">Select Sector</option>
    <?php
    if($rowCount2 > 0){
        while($row = $querry_sectors->fetch_assoc()){ 
            
            echo '<option value="'.$row['SectorID'].'">'.$row['SectorName'].'</option>';
        }
    }else{
        echo '<option value="">Sector Not Available</option>';
    }
    ?>


</select>

<select id="StateID" name="StateID">
    <option value="0">Select state</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['StateID'].'">'.$row['StateName'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
    ?>
</select>

<select id="DistrictID" name="DistrictID">
    <option value="0">Select State first</option>
</select>
<input type="submit" id="submit" name="submit">
</form>


<?php echo $html; ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
    
    
    $('#StateID').on('change',function(){
        var stateID = $(this).val();
        //alert(stateID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#DistrictID').html(html);
                }
            }); 
        }else{
            $('#DistrictID').html('<option value="">Select state first</option>'); 
        }
    });
});
 
</script>

<div style="margin-bottom:100px;">


<?php
//include("../../HOME1/footer.html");
?>
</div>

</body>
</html>