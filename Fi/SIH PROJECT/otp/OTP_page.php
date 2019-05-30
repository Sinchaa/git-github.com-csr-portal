<?php
session_start();
extract($_SESSION);
extract($_POST);
if(isset($_SESSION['F']))
{
	unset($_SESSION['F']);
}

if(isset($submit2))
{
	
	if($_SESSION['key']==$otpkey)
	{
		//echo "Correct OTP";
		unset($_SESSION['F']);

	if($_SESSION['type']==1)
	{
		header('location: ../Individual Front Page/Individual FP.php');
	}
	if($_SESSION['type']==2)
	{
		header('location: ../Organisation Front Page/Organisation FP.php');
		//Final\SIH PROJECT\Organisation Front Page\Organisation FP.php
	}
	}
	else
	$_SESSION['F']='N';

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Otp Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		
			<div class="wrapper" style="background-image: url('https://image.jimcdn.com/app/cms/image/transf/dimension=990x10000:format=jpg/path/sa6580971beaa79a9/image/i91c9d2fabe14c123/version/1535462639/image.jpg');">
				<div class="inner">
				<div class="image-holder">
					<img src="	https://previews.123rf.com/images/kchung/kchung1404/kchung140400286/27443072-vector-3d-human-with-word-csr-corporate-social-responsibility-cubes-on-white-background.jpg" width="405" height="350" alt="">
				</div>
				<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
					<h3>Please Enter The OTP You Received On Your Registered Mobile no.</h3>
					
					<div class="form-wrapper">
						<input type="text" placeholder="Enter OTP" name="otpkey" class="form-control">
						<i class="zmdi zmdi-label-alt"></i>
					</div>
					<?php
					extract($_SESSION);
					if(isset($_SESSION['F']))
					{
						echo"<p>ENTER CORRECT OTP</p>";
					}
					?>
					
					<script>
		function ghar()
		{
			
		
		window.location.href="http://www.w3schools.com";
		
		}
		
		</script>
		<div class="form-group">
					

					&nbsp;<button type="submit" name="submit2">Submit
					<i class="fa fa-share" aria-hidden="true" style="font-size: 17px"></i></button>
	</div>
				
				<button>
					<a style="color:white;text-decoration:none;" href="../Front Page/FP.php">
					<i class="fa fa-reply" aria-hidden="true" style="font-size: 17px"></i>&nbsp;&nbsp;Home</a>
						
					</button>
			</div>
		</div>
		</form>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
