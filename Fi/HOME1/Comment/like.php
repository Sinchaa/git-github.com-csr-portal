<?php
  session_start();
?>

<?php
    
    extract($_SESSION);
    include("database.php");
	if (isset($_POST['liked'])) 
	{
		$EventID = $_POST['EventID'];
		$result9000 = mysqli_query($conn, "SELECT * FROM events WHERE EventID='$EventID' ");
		$row9000 = mysqli_fetch_array($result9000);
		$n = $row9000['JoinUser']+1;
		$sql00=" INSERT INTO joins (UserID,EventID) VALUES (".$_SESSION['LoginID'].",".$EventID.") ";
        mysqli_query($conn,$sql00);
		mysqli_query($conn, "UPDATE events SET JoinUser='$n' WHERE EventID=$EventID");
		echo $n ;
		unset($_POST['liked']);
		exit();
	} 
	if (isset($_POST['unliked']))
	 {
		$EventID= $_POST['EventID'];
		$result9000 = mysqli_query($conn, "SELECT * FROM events WHERE EventID='$EventID'");
		$row9000 = mysqli_fetch_array($result9000);
		$n = $row9000['JoinUser'] -1;
        $sql00="DELETE FROM joins WHERE UserID=". $_SESSION['LoginID'] ." AND EventID=$EventID ";
		
		mysqli_query($conn,$sql00);
		
		mysqli_query($conn, "UPDATE events SET JoinUser='$n' WHERE EventID=$EventID");
		unset($_POST['unliked']);
		echo $n;
		exit();
	}
	//$result= mysqli_query($con, "SELECT * FROM  events ORDER BY DateTime DESC");
?>

