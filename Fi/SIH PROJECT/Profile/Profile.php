<?php
  session_start();
?>

<?php
    include("../../HOME1/header.php");
    extract($_GET);
?>
<!DOCTYPE html>
<html>
<title>Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<style >
	div.sticky {
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 10%;
}

.column {
  float: left;
  width: 75%;
  padding: 0px;
  top:0;
}

.column1 {
  float: left;
  width: 100%;
  padding: 0px;
  top:0;
}

a:link {
  text-decoration: none;
}
</style>
<body class="w3-theme-l5">



<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->

    <div class="sticky">
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container"><br><br>
         <h4 class="w3-center"></h4>
         <p class="w3-center"><img src="https://avatarfiles.alphacoders.com/115/115265.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <?php
         include("../../database.php");
         
         $sql="SELECT * FROM users,user_type WHERE (users.UserID=1) AND (user_type.ID=users.UserType)";
         $result=mysqli_query($conn,$sql);
         $row=mysqli_fetch_assoc($result);
         {
         ?>
         <p><i class="fas fa-user fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['UserName']; ?></p>
         <p><i class="fa fa-street-view fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['Name']; ?></p>
         <p><i class="fa fa-registered fa-fw w3-margin-right w3-text-theme"></i> Years of registeration</p></p>


          </div>
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-handshake-o fa-fw w3-margin-right"></i>
            <a class="page-scroll" href="#event" >My Events</a></button>

         <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>
                    <a class="page-scroll" href="#contrubution">Contrubutions</a>
                  </button>
          
           <div id="Demo2" class="w3-hide w3-container">
          <?php }
          
          $sql1="SELECT * FROM events,joins WHERE (joins.UserID=".$row['UserID'].") AND (events.UserID=joins.EventID)";
          $result1=mysqli_query($conn,$sql1);
          
          if(mysqli_num_rows($result1)==0)
          { echo "<p>No Events Participated</p>" ;}else {   
         while($row1=mysqli_fetch_assoc($result1))
         { 
          echo "<p> Name  ".$row1['EventName']."</p>"; 
           }} ?>
        </div>
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-phone fa-fw w3-margin-right"></i> Contact</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p><?php echo $row['Mobile']; ?></p>
            <p><?php echo $row['EmailID']; ?></p>
          </div>        

      </div>
      <br>
    </div>
</div>
    <!--left column ends-->
    <!-- Middle Column -->
    <div class="column" id="event">
     
      <div class="column">
      <?php
      extract($_GET);
      extract($_SESSION);
      include("../../database.php");
      $_SERVER['REQUEST_TIME'];
      $mysqlFormat = date('Y-m-d H:i:s');
      //echo ($mysqlFormat);
      $sql="SELECT * FROM  events WHERE UserID=".$id;
       
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result))
      {
        $sql1="SELECT * FROM  users WHERE UserID =".$row['UserID'];  
        //$d="SELECT * FROM joins WHERE UserID=".$_SESSION['LoginID']." AND EventID=".$row['EventID'];  
        //$sp=mysqli_query($conn,$d);
        $date=$row['DateTime'];
        $date1=date('d M Y', strtotime($date));
        $time=date('H-i', strtotime($date));
        $result1=mysqli_query($conn,$sql1);     
        $row1=mysqli_fetch_assoc($result1);                                 //For user detials
        $sql2="SELECT * FROM  sectors WHERE SectorID='".$row['SectorID']."'";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);                                     //For sectors details
        {
        ?>
        <div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <h6><a style='color:Black;' href="profile.php"><?php echo $row1['UserName']; ?> <span class='w3-right w3-opacity'>EDIT</span></a></h6>
        <hr class="w3-clear">
        <p><a style='color:black;' href="">Event Title :<?php  echo " ".$row['EventName']; ?></a></p>
        <span class='w3-right w3-opacity'><?php echo $time; ?></span>
        
        <h5>Sector:<?php echo $row2['SectorName']; ?> </h5>
        
        <p><?php echo $row['EventDetails']; ?></p>
        <div class="w3-row-padding" style="margin:0 -16px">
        <div class='w3-half'> <p>Location:<?php echo $row['EventArea']; ?> </p>
        <p>Budget:<?php echo $row['AmtOutlay']; ?></p></div>
        </div>
        <br>
        </div>
      <?php }} ?>
      
      </div>
      
    
      

      <br><br>
     
    <!-- End for Middle Column's Events-->

     <!-- Middle Column for contribution -->
    <div class="column1" id="contrubution">
      <h6><center><b>Contrubutions To The Society</b></center></h6>
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h3><b>John Doe</b></h3>
        <hr class="w3-clear">
        <span><b>Contrubution</b></span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
        </div>
      </div>
      
     
      <br><br>
     
    <!-- End Middle Column -->
    </div>
    
    </div>
    
  <!-- End Grid -->
  </div>

  
<!-- End Page Container -->
</div>
<br>

  


 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html> 

<?php
include("../../HOME1/footer.html");
?>
