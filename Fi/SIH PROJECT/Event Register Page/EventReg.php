
<?php
session_start();
?>
<?php
extract($_POST);
extract($_SESSION);
$nm=$_SESSION['Login'];
include('../../database.php');
$id=$_SESSION['LoginID'];
$ty=$_SESSION['type'];
$sql = "INSERT INTO `events`(`EventName`, `ProjectTypeID`, `FromDate`, `ToDate`, `UserID`,`PinCode`, `StateID`, `DistrictID`, `EventArea`, `EventDetails`, `AmtOutlay`, `AmtSpent`,`ModeImplementID`, `SectorID`) VALUES ('$event','$project','$from','$to','$id','$pin','$state','$district','$area','$details','$outlay','$spent','$MOI','$sector')";
    if (mysqli_query($conn,$sql)) 
    {
        echo "New record created successfully";
       
        header('../Organisation Front Page/Organisation FP.html');
       
    }
    else
    {
        echo "Error: ".$sql;
    }
    
	$EventID = mysqli_insert_id($conn);
	if($EventID>0) 
	{
		
			$ArrParticulars = $_POST['particulars'];
			$ArrQty         = $_POST['qty'];
			$ArrAmount      = $_POST['amount'];
            $Rows  			= count($ArrParticulars);
            
			for($i=0;$i<$Rows;$i++) {
				$Particulars = $ArrParticulars[$i];
				$Qty         = $ArrQty[$i];
				$Amount      = $ArrAmount[$i];

				$Particulars = filter_var($Particulars,FILTER_SANITIZE_STRING);
				$Qty         = filter_var($Qty,FILTER_SANITIZE_NUMBER_FLOAT);
				$Amount      = filter_var($Amount,FILTER_SANITIZE_NUMBER_FLOAT);

				$Str = "Insert Into requirements (EventID,Particulars,Qty,Amount) ";
				$Str .= " Values('$EventID','$Particulars','$Qty','$Amount')";
                mysqli_query($conn,$Str);
                
			}
		
	}
	
	$Html = "Dear sir,\r\nWe are happy to Notify that The New EVENT:' ".$event."' \r\n DATE :  ".date("D M Y",strtotime($from))."\r\n Location: ".$area.".\n\n It is going to be Organised by  ".$nm ;
	//SendEmail2($conn,nl2br($Html));

    header('location: ../Organisation Front Page/Organisation FP.php');


	
function SendEmail2($conID,$Html){
    
   // $Html = "sample.html";
    $Headers  = "MIME-Version: 1.0" . "\r\n";
    $Headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $Headers .= 'From: ' . "\r\n";
    $sql="SELECT EmailID FROM users";
    
    $result=mysqli_query($conID,$sql);
    while($row = mysqli_fetch_array($result)){
        $EmailID=$row['EmailID'];
       
        $ReturnedStatus = SendMail($EmailID,"Notification",$Html,$Headers);
    }


    return $ReturnedStatus;
}
	function SendMail($mail_to,$mail_sub,$mail_content,$Headers) {
    require_once('PHPMailer-master/class.phpmailer.php');
    $mail = new PHPMailer(true);
    $mail->IsSMTP(); // telling the class to use SMTP
    
    try
    {
        $mail->Host       = "smtp.gmail.com";   // SMTP server
        $mail->SMTPAuth   = true;              // enable SMTP authentication
        $mail->SMTPSecure = "ssl";            // sets the prefix to the servier  
        $mail->Port       = 465;             // set the SMTP port for the GMAIL
  
        $mail->Username = "threepsindia@gmail.com";  // GMAIL username
        $mail->Password = "csrindia";
        $mail->From     = "threepsindia@gmail.com";
        $mail->FromName = "threepsindia@gmail.com";
        $mail->AddReplyTo("noreply@gmail.com","No-Reply");
        $mail->addAddress($mail_to);
        $mail->Subject = $mail_sub;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // 
        $mail->IsHTML(true);
        $mail->Body = $mail_content;
        if($mail->Send())
        {
            return "MailSent";
        }
        else
        {
            
        }
    }
    catch (phpmailerException $e) 
    {
        //echo $e->errorMessage();
        return $e->errorMessage(); 
    } 
    catch (Exception $e) 
    {
        return $e->getMessage(); 
    } 
}	

//SendEmail2($conn,$Html);


?>