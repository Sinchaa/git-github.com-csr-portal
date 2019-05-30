<?php

session_start();
extract($_SESSION);
extract($_POST);
include('../../database.php');

//$m = md5($password);
$m = $password;
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
    

$a = rand(1000,9999);
$_SESSION['key']=$a;
echo  $a;
$field = array(
    "sender_id" => "FSTSMS",
    "language" => "english",
    "route" => "qt",
    "numbers" => "$mobilenumber",
    "message" => "6623",
    "variables" => "{#AA#}",
    "variables_values" => "$a",
    
);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($field),
  CURLOPT_HTTPHEADER => array(
    "authorization: J2MY4mokT6uGayyHz1AEeYeQBiEbldXjzEwdkUP9B7Sk17xHI7lq12O4Wv0t",
   "cache-control: no-cache",
  "accept: */*",
  "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err)
{
  echo "cURL Error #:" . $err;
} else
 {
  
header('location: OTP_page.php');
}

?>
