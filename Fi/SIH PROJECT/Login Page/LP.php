<?php
session_start();
require_once('../../database.php');
extract($_POST);
extract($_SESSION);

if(isset($submit))
{
	if(isset($fo))
		  {
		  echo "Invalid Captcha";
		  exit();
		  } 
	$password1 = md5($password);
	//echo $password1;
	//echo $username;
	$rs=mysqli_query($conn," SELECT * FROM users WHERE EmailID='$username' AND Password='$password1' ");
    
	if(mysqli_num_rows($rs)==1)
	{
	    $row=mysqli_fetch_assoc($rs);
		$_SESSION['Login']=$row['UserName'];
		$_SESSION['LoginID']=$row['UserID'];
		$_SESSION['type']=$row['UserType'];
		if($row['UserType']==2)
		    header('Location: ../Organisation Front Page/Organisation FP.php');    
		else
		    header('Location: ../Individual Front Page/Individual FP.php');
		//header('Location: ../../HOME1/home1.php');
	}
	else
	{
		$found="N";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="LP.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body onload="createCaptcha()">

			<div class="wrapper" style="background-image: url('https://image.jimcdn.com/app/cms/image/transf/dimension=990x10000:format=jpg/path/sa6580971beaa79a9/image/i91c9d2fabe14c123/version/1535462639/image.jpg');">
				<div class="inner">
				<div class="image-holder">
					<img id = "" src="
					https://previews.123rf.com/images/kchung/kchung1404/kchung140400286/27443072-vector-3d-human-with-word-csr-corporate-social-responsibility-cubes-on-white-background.jpg" height="470" width="405" alt="">
				</div>
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="form2" onsubmit="return(check());">
					<h3>Login Form</h3>
					<div class="form-wrapper">
						<input type="text" name="username" placeholder="EmailID" class="form-control">
						<i class="fas fa-user" aria-hidden="true"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password" placeholder="Password" class="form-control">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</div>
					<div id="captcha">
    					</div>
    				<div class="form-wrapper">
						<input type="text" placeholder="Captcha" class="form-control" id="cpatchaTextBox">
						<i class="fas fa-cog" aria-hidden="true"></i>
					</div>
					<?php
					extract($_SESSION);
		  if(isset($found))
		  {
		  	echo "Invalid Username or Password";
		  }
		  
		  ?>
					<button type="submit" name="submit">Login
						<i class="fa fa-share" aria-hidden="true" style="font-size: 17px"></i>
					</button>
					
						<button>
					<a style="color:white;text-decoration:none;" href="../Front Page/FP.php">
					<i class="fa fa-reply" aria-hidden="true" style="font-size: 17px"></i>&nbsp;&nbsp;&nbsp;&nbsp;
					 Home</a>
					 </button>
			</div>
					
				</form>
				    
		</div>
		<script type="text/javascript">

	var code;
function createCaptcha() {
  //clear the contents of captcha div first
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
  var lengthOtp = 6;
  var captcha = [];
  for (var i = 0; i < lengthOtp; i++) {
    //below code will not allow Repetition of Characters
    var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
    if (captcha.indexOf(charsArray[index]) == -1)
      captcha.push(charsArray[index]);
    else i--;
  }
  var canv = document.createElement("canvas");
  canv.id = "captcha";
  canv.width = 100;
  canv.height = 50;
  var ctx = canv.getContext("2d");
  ctx.font = "25px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
  //storing captcha so that can validate you can save it somewhere else according to your specific requirements
  code = captcha.join("");
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
}


function check()
{

 if(document.form2.username.value=="")
  {
    alert("Please Enter Username or email");
  document.form2.username.focus();
  return false;
  }
   if(document.form2.password.value=="")
  {
    alert("Please Enter password");
  document.form2.password.focus();
  return false;
  }

  if (document.getElementById("cpatchaTextBox").value != code)
   {
    alert("Invalid Captcha. try Again");
    createCaptcha();
  }

  return true;
}

function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

	</body>
</html>
