<?php
extract($_POST);
include('database.php');


$sql = "INSERT INTO `events`( `EventName`, `ProjectType`,
 `StartTime`, `EventHandler`, `PinCode`, `EventState`, `EventArea`
 , `EventDetails`)VALUES ('$name','$projecttype','$evedate','$handler','$pin','$stateslist'
,'$area','$desc' )";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}





?>

 

