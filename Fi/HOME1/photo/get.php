<?php 
include('database.php');
extract($_POST);
$sql = "SELECT * FROM photos_files ";
$result = mysqli_query($conn, $sql);
  
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $j =  $row["ID"];
        }
    
    
}} else {
    $j = 0;
    
}

$j = $j + 1;


if(isset($_POST['submit'])){
 // Count total files
 $countfiles = count($_FILES['file']['name']);
 
 // Looping all files
 for($i=0;$i<$countfiles;$i++,$j++){
   $filename = $_FILES['file']['name'][$i];
   $k = $j.'-'.$filename;
   // Upload file
   move_uploaded_file($_FILES['file']['tmp_name'][$i],'img/'.$k);
    
   $sql = "INSERT INTO `photos_files`(`ID`, `FileName`) VALUES ('$j','$k')";
   if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
 }
}
header('location: photo.php') 
?>