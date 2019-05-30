<?php
session_start();
?>
<?php
    include('database.php');
    extract($_SESSION);
    $EID=$_POST['eid'];
    $Detail=$_POST['comment_body'];
    $UID=$_SESSION['LoginID'];
    $CID=$_POST['Cid'];
    $sqlCC="INSERT INTO `reply` (`EventID`, `CommentID`,`UserID`, `Reply`) VALUES ('$EID','$CID','$UID','$Detail')";
    $result=mysqli_query($conn,$sqlCC);
    
    if($result)
       {
        echo "Reply Added Successfully";
        exit();
        }
    else
        {
        echo "Reply NOT ADDED";      
        exit();
        }    



?>
