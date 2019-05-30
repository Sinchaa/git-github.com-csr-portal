<?php
session_start();
extract($_POST);
include('../../../database.php');
$UserID = $_SESSION['LoginID'];
$UserType = $_SESSION['type'];

$sql = "INSERT INTO `suggestions`(`UserID`, `Suggestions`) VALUES ('$UserID','$suggestions')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$UserID = $_SESSION['LoginID'];
$UserType = $_SESSION['UserType'];
$sql = "INSERT INTO `suggestions`(`UserID`, `Suggestions`) VALUES ('$UserID','$suggestions')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

$name1="SELECT * FROM users WHERE UserID=".$UserID;
$name=mysqlI_query($conn,$name1);
$r=mysqli_fetch_assoc($name);
$name=$r['UserName'];
	$Html = "Dear sir,\r\nWe are happy to Notify that The New Suggestion By :".$name."\r\n Suggested as :-  ".$suggestions;
	SendEmail2($conn,nl2br($Html));

   // header('location: ../Organisation Front Page/Organisation FP.php');


	
function SendEmail2($conID,$Html)
{
  
   // $Html = "sample.html";
    $Headers  = "MIME-Version: 1.0" . "\r\n";
    $Headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $Headers .= 'From: ' . "\r\n";
    $sql="SELECT EmailID FROM users";
    
    $result=mysqli_query($conID,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $EmailID=$row['EmailID'];
       
        $ReturnedStatus = SendMail($EmailID,"Notification",$Html,$Headers);
    }

    return $ReturnedStatus;
}
	function SendMail($mail_to,$mail_sub,$mail_content,$Headers)
 {
    require_once('../../Event Register Page/PHPMailer-master/class.phpmailer.php');
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
    
if($UserType == 1)
    header('location: ../../Individual Front Page/Individual FP.php');
   // Final\SIH PROJECT\Organisation Front Page\Organisation FP.php
else
    header('location: ../../Organisation Front Page/Organisation FP.php');
   // Final\SIH PROJECT\Individual Front Page\Individual FP.php
?>

