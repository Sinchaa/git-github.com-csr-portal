<!DOCTYPE html>
<html lang="en">
<title>Upload</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<style>
.button {
  background-color: #A9A9A9;
  border: black;
  background-border:black;
  color: black;

  
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


a:hover {
  background-color: yellow;
}
</style>
<style>
body {
  margin: 0;
  font-size: 28px;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
}

#navbar {
  overflow: hidden;
  background-color: #333;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}

.btn-group .button{
  float: center;
}
</style>
<style>
body {
  background-color:#DCDCDC ;
}
</style>
<body>

<!-- Sidebar/menu -->

<nav class="w3-sidebar w3-gray w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
  <div class="w3-container">
  <div class="w3-container">
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>MY EVENTS<br>GALLERY</b></h3>
    <p class="w3-center"><img src="https://avatarfiles.alphacoders.com/115/115265.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
  </div>
  <div class="w3-bar-block">
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-#A9A9A9">Home</a> 
    <a href="#services" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-#A9A9A9">Visit Profile</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-#A9A9A9">Contact No.</a>
  </div>
   </div>
    </div>
     </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-grey w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-grey w3-margin-right" onclick="w3_open()">☰</a>
  <span>MY EVENTS</span>

</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
  <div class="sticky">
  <div class="btn-group">

  <form method='post' action="get.php" enctype='multipart/form-data'>
 
    <input  type="file" name="file[]" id="file" multiple>
    <input type='submit' name='submit' value='Upload'>
   
   </form>
  </div>
  </div>
 
   
<h1 class="w3-xxxlarge w3-text-black"><b>Photo Gallery</b></h1>
<hr style="width:50px;border:5px solid black" class="w3-round">   </div>
  
  <!-- Photo grid (modal) -->
  
      
<?php
include('database.php');
$sql = "SELECT * FROM photos_files ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if (mysqli_num_rows($result) > 0) {
       
        // output data of each row
        $n = 0;
        while($row = mysqli_fetch_assoc($result)) {
            

            if($n % 2 == 0)
            {
              echo '<div class="w3-row-padding">
              <div class="w3-half">';
            }
            else
            {
              echo '<div class="w3-half">';
            }
            $path =  $row["FileName"];
            $j = "img/".$path;
            
            echo  '<img src='.$j.'. style="width:100% " onclick="onClick(this)" /> ';
            echo "</div>";
            $n = $n + 1;
          }}
    
    
    
    }
    
    
?>    
     
    
  
  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

  


  
  
<!-- End page content -->
</div>


<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>
