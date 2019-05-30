<?php

include('../database.php');
	// contribution_save.php
$EventID = $_POST['eventid'];
$UserID = $_POST['userid'];
if (isset($_POST['submit']))
{
        	$ArrParticulars = $_POST['particulars'];
			$ArrQty         = $_POST['c_qty'];
			$ArrAmount      = $_POST['c_amount'];

            $Rows  			= count($ArrParticulars);
            
			for($i=0;$i<$Rows;$i++) 
			{
				$Particulars = $ArrParticulars[$i];
				$Qty         = $ArrQty[$i];
				$Amount      = $ArrAmount[$i];

				$Particulars = filter_var($Particulars,FILTER_SANITIZE_STRING);
				$Qty         = filter_var($Qty,FILTER_SANITIZE_NUMBER_FLOAT);
				if (!$Qty)
				{
					$Qty = 0;
				}
				$Amount = filter_var($Amount,FILTER_SANITIZE_NUMBER_FLOAT);
				if (!$Amount)
				{
					$Amount = 0;
				}
				
				$Str = "INSERT INTO `contributions`( `UserID`, `EventID`, `Particular`, `Qty`, `Amount`) ";
				$Str .= " Values('$UserID','$EventID','$Particulars','$Qty','$Amount')";
                mysqli_query($conn,$Str);
				$Str = "";
				$Str = "UPDATE requirements SET C_Qty= C_Qty + $Qty,C_Amount= C_Amount + $Amount where Particulars = '$Particulars' AND EventID = '$EventID'";
				mysqli_query($conn,$Str);
				//echo $Str;
			}
			echo "<script>alert('Contribution Saved Successfully')</script>";
		}

header('location: Organisation Front Page\report.php');

?>

