<!DOCTYPE html>

<html>
<body>

<?php
include('database.php');
$sql = "SELECT * FROM photos_files ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $path =  $row["FileName"];
            $j = "img/".$path;
            
            echo " <img src=".$j." width='175' height='200'/> ";
        }}
    
    
    
    }
    
    
?>    
        
        
       
       

</html>