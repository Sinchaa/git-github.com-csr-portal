<?php
	include('database.php');

$StateID = $_POST['StateID'];
$DistrictID = $_POST['DistrictID'];

$html_NGO = "";
$sql = "Select A.UserName,A.UserID from users A,user_type B Where A.UserType = B.ID ";
$sql .= " and B.Name = 'NGO' and A.StateID='$StateID' AND A.DistrictID='$DistrictID'";
$result = mysqli_query($conn,$sql);//echo $sql;
							
$html_NGO = "<option value='' disabled selected>Select NGO*</option>";
while ($row = mysqli_fetch_array($result)) {
	$html_NGO .= "<option value='".$row['UserID']."'>".$row['UserName']."</option>";
}
echo $html_NGO;
?>
