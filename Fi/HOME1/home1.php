<?php
  session_start();
  if(!isset($_SESSION['Login']))
  {
    echo "Access Denied";
    exit();
  }
  else
  include("header.php");

?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home1.css">
<link rel="stylesheet" href="home11.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html, body, h1, h2, h3, h4, h5 { font-family: "Open Sans", sans-serif }
</style>
<body class="w3-theme-l5">

<!-- Navbar -->Event RegisterEvent Register PageEvent Register Page Page

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="sticky">
    <div class="w3-col m3">
      


      <!-- Activities -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
        <br>
         <h6>Welcome, <?php echo $_SESSION['Login']; ?></h6>

         <hr>
         <!-- available only for organisation --><?php extract($_SESSION); if($_SESSION['type']==2) : ?><p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <a href="../SIH Project/Event%20Register%20Page/ERP2.php">Post an event</a></p><?php endif; ?>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><a href="photo/photo.php"> Post Your Stories</a></p>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><a href="http://localhost/Fi/SIH%20PROJECT/Organisation%20Front%20Page/report.php"> Search</a></p>
        </div>
      </div>
      <br>

      <!-- EVENTS -->
      
       <!-- Notification Box -->
       <div class="w3-card w3-round w3-white">
        <div class="w3-container">
        
         <h5><center>My notification:</center></h5><hr>

         
         <!-- available only for organisation -->
        </div>
      </div>
      
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">

        
        <?php
          include("../database.php");
          $_SERVER['REQUEST_TIME'];
          $mysqlFormat = date('Y-m-d');
          //echo $mysqlFormat;
          $us=$_SESSION['LoginID'];
          $result=mysqli_query($conn,"SELECT * FROM notification WHERE USERID = '$us'");
          $s=0;
          if(mysqli_num_rows($result)>0)
          {
            while($row=mysqli_fetch_array($result))
            {

            if($mysqlFormat==$row['Date'])
            {
            $s++;
            $s="SELECT * FROM events WHERE EventID=".$row['EventID'];
            $sq=mysqli_query($conn,$s);
            $row4=mysqli_fetch_assoc($sq);
            echo $row4['EventName'];
            }
          }
        }
            if($s==0)
            echo "<p>No Notification</p>";
          
          //DELETE FROM `notification` WHERE 0
          ?>
      </div>
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo1" class="w3-hide w3-container">
            <?php
            include("../database.php");
            $co="SELECT * FROM events WHERE UserID=".$_SESSION['LoginID'];
            $result=mysqli_query($conn,$co);
            if(mysqli_num_rows($result)==0)
            {
              echo "<p> No Projects</p>";
            }
            else {
              while($row=mysqli_fetch_assoc($result)) {?>
            <br>
                <p><?php $row['EventName']?> </p>
              <?php } } ?>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My History</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button  class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> <a href="gallery.php" style="color:white;">My Photos</a></button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
         <br>
          </div>
      <br>

     




    <!-- End Left Column -->
    </div>
    </div>
</div>
</div>
    <!-- Middle Column USERS POSTS-->
    <div class="w3-col m7">

    
      <!--start  php-->
      <?php
      include("../database.php");
      $_SERVER['REQUEST_TIME'];
      $mysqlFormat = date('Y-m-d H:i:s');
      $sql="SELECT * FROM  events ORDER BY DateTime DESC";
       
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result))
      {
        $sql1="SELECT * FROM  users WHERE UserID =".$row['UserID'];    
        $d="SELECT * FROM joins WHERE UserID=".$_SESSION['LoginID']." AND EventID=".$row['EventID'];  
        $sp=mysqli_query($conn,$d);
        $date=$row['DateTime'];
        $date1=date('d M Y', strtotime($date));
        $time=date('H-i', strtotime($date));
        $result1=mysqli_query($conn,$sql1);     
        $row1=mysqli_fetch_assoc($result1);                                 //For user detials
        $sql2="SELECT * FROM  sectors WHERE SectorID='".$row['SectorID']."'";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);                                     //For sectors details
        ?>
        
        
        <div class='w3-container w3-card w3-white w3-round w3-margin'>
        <h6><br><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <a style='color:Black;' href="../SIH PROJECT/Profile/Profile.php?id=<?php echo $row1['UserID'] ?>"><?php echo $row1['UserName']; ?></a>
        <?php 
        //echo $_SESSION['LoginID'];
        //echo $row['UserID'];
                if($_SESSION['LoginID']==$row['UserID'])
                    echo "<span class='w3-right w3-opacity'><a href='../Event Register Page/ERP2.php'>EDIT</a></span>"
         ?></h6>
        
        <hr class="w3-clear">
        <p><a style='color:black;' href=""><strong>Event Title :</strong><?php  echo " ".$row['EventName']; ?></a></p>
        <span class='w3-right w3-opacity'><?php echo $time; ?></span>
        
        <h5>Sector:<?php echo $row2['SectorName']; ?> </h5>
        
        <p><?php echo $row['EventDetails']; ?></p>
        <div class="w3-row-padding" style="margin:0 -16px">
        <div class='w3-half'> <p><strong>Location:</strong><?php echo $row['EventArea']; ?> </p>
        <p><strong>Budget:</strong><?php echo $row['AmtOutlay']; ?></p>
        <p><strong>Event Date:</strong><?php echo $row['FromDate']; ?></p></div><div class='w3-half'></div></div>
        <br>
        
        
    
	
        <!-- JOIN SYSTEM -->
    
        
        <?php 
       if($_SESSION['LoginID']!=$row['UserID'])
       {
        if(mysqli_num_rows($sp)>0)
        { 
        ?>
        <!-- user has  liked post -->
        
        <button type='button'  data-id="<?php echo $row['EventID']; ?>" class='unlike w3-button w3-theme-d1 w3-margin-bottom'>UNREGISTER</button>

        <button type='button'  data-id="<?php echo $row['EventID']; ?>" class='like hide w3-button w3-theme-d1 w3-margin-bottom'>REGISTER </button>

        <?php } else { ?>
						<!-- user has not yet liked post -->

		<button type='button'  data-id="<?php echo $row['EventID']; ?>" class='like  w3-button w3-theme-d1 w3-margin-bottom'> REGISTER</button>
		<button type='button'  data-id="<?php echo $row['EventID']; ?>" class='unlike hide w3-button w3-theme-d1 w3-margin-bottom'>UNREGISTER </button>
		<?php }} ?>
        
        
        
       
         
         
          
        
        
        <!-- END OF Join sysytem -->
        &nbsp;&nbsp;
        <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> &nbsp;&nbsp;&nbsp;<a href="Comment/comment.php?id=<?php echo $row['EventID']; ?>" style="color:white;">COMMENTS</a></button> &nbsp; &nbsp;
        <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> &nbsp;&nbsp;&nbsp;<a href="../SIH PROJECT/contribution.php?eventid=<?php echo $row['EventID']; ?>" style="color:white;"> CONTRIBUTIONS</a></button>
        &nbsp;&nbsp;&nbsp;<button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-cup'></i> &nbsp;SHARE</button><br>
        <span class="likes_count">  <?php if($row['JoinUser'] > 0)  echo $row['JoinUser'] ." joined"; ?>  </span>
        <p style='text-align: right;'> <?php echo $date1; ?></p>
        </div>
        
      <?php } ?>






    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="sticky">
    <!-- Nearby Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><strong>NearBy Events:</strong></p>
          <hr>
          <?php
          include("../database.php");
          $_SERVER['REQUEST_TIME'];
          $mysqlFormat = date('Y-m-d H-i-s');
          //echo $mysqlFormat;
          //$sql100=;
          //echo $sql100;
          $result=mysqli_query($conn,"SELECT * FROM events,users WHERE (users.DistrictID = events.DistrictID) AND (users.StateID = events.StateID) ");
          if(mysqli_num_rows($result)<0)
          {
            echo" No NOTIFICATION";
          }
          else {
            while($row=mysqli_fetch_assoc($result))
            {
              echo "<br>";
              echo "<p>" . $row['EventName']."</p>" ;
            }
          }
          ?>
        </div>
      </div>
      <br>

      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><strong>Todays Events</strong></p>
            <hr>
<!-- Todays event Column -->
            <?php
            include("../database.php");
            $_SERVER['REQUEST_TIME'];
            $mysqlFormat = date('Y-m-d');
            //echo $mysqlFormat;

            $sql0="SELECT * FROM events WHERE DateTime BETWEEN '".$mysqlFormat." 00:00:00' AND '".$mysqlFormat." 23:59:59'";
            //echo $sql0;
            $result=mysqli_query($conn,$sql0);
            if(mysqli_num_rows($result)<1)
            {
              echo "<p>No Events</p>";
            }
            while($row=mysqli_fetch_assoc($result))
            {
              $sql1="SELECT * FROM  users WHERE UserID =".$row['UserID']."";

              $result1=mysqli_query($conn,$sql1);
              $row1=mysqli_fetch_assoc($result1);
              $sql2="SELECT * FROM  sectors WHERE SectorID='".$row['SectorID']."'";
              $result2=mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result2);


              echo "<p>". $row['EventName'] . "</p>"   ;

            }
            ?>
        </div>
      </div>
      <br>



    <!-- End Right Column -->
    </div>
   </div>
  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<script>
        $(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var EventID = $(this).data('id');
			   var post = $(this);

			$.ajax({
				url: 'like.php',
				type: 'post',
				data: {
					'liked': 1,
					'EventID': EventID
				},
				success: function(response){
					post.parent().find('span.likes_count').text(response + " Joined");
					post.addClass('hide');
					post.siblings().removeClass('hide');
					
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var EventID = $(this).data('id');
		    var post = $(this);

			$.ajax({
				url: 'like.php',
				type: 'post',
				data: {
					'unliked': 1,
					'EventID': EventID
				},
				success: function(response){
					post.parent().find('span.likes_count').text(response + " Joined");
					post.addClass('hide');
					post.siblings().removeClass('hide');
				}
			});
		});
	});
        </script>

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
include("footer.html");
?>
