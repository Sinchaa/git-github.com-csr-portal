<?php
session_start();
?>
<?php
include("header.html");
?>

<?php
      extract($_GET);
      extract($_SESSION);
      include("database.php");
      $_SERVER['REQUEST_TIME'];
      $mysqlFormat = date('Y-m-d H:i:s');
      //echo ($mysqlFormat);
      $sql="SELECT * FROM  events WHERE EventID=".$id;
       
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);
      
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
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 2em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
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
        <div class="w3-container">
        <br>
         <h5 >Event Organizer</h5>
         
         <hr >
         <p><i class="fas fa-user fa-fw w3-margin-right w3-text-theme"></i><a href=""> <?php  echo $row1['UserName']; ?></a></p>
         
         

          </div>
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-phone fa-fw w3-margin-right"></i> Contact</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p><?php echo $row1['Mobile']; ?></p>
            <p><?php echo $row1['EmailID']; ?></p>
        </div>

         

      </div>
      <br>
    </div>
</div>

    <!--left column ends-->
    <!-- Middle Column -->
    <div class="column">
      
        <div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <h6>PROFILE:<a style='color:Black;' href="profile.php"><?php echo $row1['UserName']; ?></a></h6>
        <hr class="w3-clear">
        <p><a style='color:black;' href="">Event Title :<?php  echo " ".$row['EventName']; ?></a></p>
        <span class='w3-right w3-opacity'><?php echo $time; ?></span>
        
        <h5>Sector:<?php echo $row2['SectorName']; ?> </h5>
        
        <p><?php echo $row['EventDetails']; ?></p>
        <div class="w3-row-padding" style="margin:0 -16px">
        <div class='w3-half'> <p>Location:<?php echo $row['EventArea']; ?> </p>
        <p>Budget:<?php echo $row['AmtOutlay']; ?></p></div><div class='w3-half'></div></div>
        <br>
        
        <!-- JOIN SYSTEM -->
    
        
        <?php 
       
        if(mysqli_num_rows($sp)>0)
        { 
        ?>
        <!-- user has  liked post -->
        
        <button type='button'  data-id="<?php echo $row['EventID']; ?>" class='unlike w3-button w3-theme-d1 w3-margin-bottom'>UnRegister</button>
        <button type='button'  data-id="<?php echo $row['EventID']; ?>" class='like hide w3-button w3-theme-d1 w3-margin-bottom'>Register</button>

        <?php } else { ?>
						<!-- user has not yet liked post -->

		<button type='button'  data-id="<?php echo $row['EventID']; ?>" class='like  w3-button w3-theme-d1 w3-margin-bottom'>Register</button>
		<button type='button'  data-id="<?php echo $row['EventID']; ?>" class='unlike hide w3-button w3-theme-d1 w3-margin-bottom'>UnRegister </button>
		<?php } ?>
        
        
        
       
         
         
          
        
        
        <!-- END OF Join sysytem -->
        &nbsp;&nbsp;
        <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> &nbsp;&nbsp;&nbsp;COMMENT</button>
        &nbsp;&nbsp;&nbsp;<button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-cup'></i> &nbsp;SHARE</button><br>
        <span class="likes_count">  <?php if($row['JoinUser'] > 0)  echo $row['JoinUser'] ." joined"; ?>  </span>
        <p style='text-align: right;'> <?php echo $date1; ?></p>
        </div>
        
      

      
       <form id="frm-comment">
        
        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
             <input type="hidden"  id="name" value="<?php echo $id; ?>" />
             <input type="hidden" name="comment_id" value="0" id="comment_id" />
            <textarea type="text" placeholder="Post your Comment..." row="4" cols="100" id="comment"></textarea>
            <button type="button" name="submit" value="Submit" class=" w3-button w3-theme-d2 w3-margin-bottom" id="submitButton" style="float:right;" >&nbsp;POST&nbsp;</button><br><br>
            
      </div>
    </form>
    
   
    <div id="display_comment"></div>
    
     </div>
    

      
    <!-- End Middle Column -->
    </div>
    
    </div> 
    
  <!-- End Grid -->
  </div>

   
<!-- End Page Container -->
</div>
<br>
<script type="text/javascript" src="comment.js"></script>
<!-- REPLY -->



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
<!-- Script for Join system -->
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
        <!-- End of script for join system -->
</body>
</html>
<?php
include("footer.html");
?>



