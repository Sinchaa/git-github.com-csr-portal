<?php
extract($_POST);
include('../../database.php');

$m = md5($password);
$sql = "INSERT INTO `users`(`UserName`, `CIN`, 
`Password`, `Address`, `Mobile`, `Latitude`, `Logitude`
, `StateID`, `DistrictID`, `EmailID`, `UserType`
 ) VALUES ( '$username','$Id','$m','$address',
    '$mobilenumber','17.3412','18.3213','$state','$district','$email',
    '$usertype'
    )";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    


?>

 






