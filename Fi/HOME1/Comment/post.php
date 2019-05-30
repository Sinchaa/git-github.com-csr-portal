<?php
session_start();
?>

<?php
    extract($_SESSION);
    include("database.php");
    
    $EID=$_POST['user'];
    $UID=$_SESSION['LoginID'];
    $bodyC=$_POST['comment_body'];
    
    $sqlCC="INSERT INTO `comment` (`EventID`, `UserID`, `Detail`) VALUES ('$EID','$UID','$bodyC')";
    $result=mysqli_query($conn,$sqlCC);
    
    if($result)
       {
        echo "Comment Added Successfully";
        exit();
        }
    else
        {
        echo "COMMENT NOT ADDED";      
        exit();
        }
     

?>
    
