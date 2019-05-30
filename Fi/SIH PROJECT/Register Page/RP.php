
<!DOCTYPE html>

<html>
	<head>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
	
		<meta charset="utf-8">
		<title>Registration Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<script type="text/javascript" src="RP.js"></script>
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		<style>

#ntg{
	color: white;
				text-decoration: none;
} 
			a{
				color: white;
				text-decoration: none;
			}
		</style>
	</head>

	<body>
	<?php
include("../../database.php");
//Fetch all the country data
$query = mysqli_query($conn,"SELECT * FROM mst_states ORDER BY StateName ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>

<div class="wrapper" style="background-image: url('https://image.jimcdn.com/app/cms/image/transf/dimension=990x10000:format=jpg/path/sa6580971beaa79a9/image/i91c9d2fabe14c123/version/1535462639/image.jpg');">
				<div class="inner">
				<div class="image-holder">
					<img src="https://previews.123rf.com/images/kchung/kchung1404/kchung140400286/27443072-vector-3d-human-with-word-csr-corporate-social-responsibility-cubes-on-white-background.jpg" height="600" width="405" alt="">
				</div>
				<form action="../otp/tentative_otp.php" method="post" name="form1" onsubmit="return(check());">
					<h3>Registration Form</h3>
					<div class="form-wrapper">
						<input type="text" placeholder="Username*" name="username" class="form-control">
						<i class="fas fa-user" aria-hidden="true"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address*" name="email" class="form-control">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Mobile Number*" name="mobilenumber" class="form-control">
						<i class="fa fa-mobile" aria-hidden="true"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Address*" name="address" class="form-control">
						<i class="fa fa-home" aria-hidden="true"></i>
					</div>
					<div class="form-group">
						<select name="state" id="state" class="form-control">
							<option value="" disabled selected>State*</option>
							<?php
							if($rowCount > 0){
								while($row = $query->fetch_assoc()){ 
									echo '<option value="'.$row['StateID'].'">'.$row['StateName'].'</option>';
								}
							}else{
								echo '<option value="">State not available</option>';
							}
							?>						
						</select>
						<i class="fa fa-sort-down" aria-hidden="true" style="font-size: 17px"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<select name="district" id="district" class="form-control">
							<option value="" disabled selected>District*</option>

						</select>
						
									

						<i class="fa fa-sort-down" aria-hidden="true" style="font-size: 17px"></i>			
					</div>
					<div class="form-wrapper">
						<select name="usertype" id="" class="form-control">
							<option value="" disabled selected>User Type*</option>
							<option value="1">Individual</option>
							<option value="2">Organisation</option>
							<option value="3">NGO</option>
						</select>
						<i class="fa fa-sort-down" aria-hidden="true" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Company ID" name="Id" class="form-control">
						<i class="fa fa-id-card" aria-hidden="true"></i>
					</div>
					<div class="form-wrapper">
						<select name="sector" id="" class="form-control">
							<option value="" disabled selected>Sector*</option>
		      				<option value="1">Economic Development</option>
		      				<option value="2">Environment Conservation</option>
		      				<option value="3">Social Welfare and Human Development</option>
		      				<option value="4">Arts and Cultural Preservation</option>
		      				<option value="5">Health</option>
		      				<option value="6">Agriculture</option>
		      				<option value="7">Education</option>
		      				<option value="8">Children and Youth</option>
						</select>
						<i class="fa fa-sort-down" aria-hidden="true" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password" placeholder="Password*" class="form-control">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</div>
					<div class="form-group">

					

						<button><i class="fa fa-reply" aria-hidden="true" style="font-size: 17px"></i><a href="../Front Page/FP.php">&nbsp;&nbsp;&nbsp;&nbsp;Home
						</button>

						<button type="submit" ><a>Register<i class="fa fa-share" aria-hidden="true" style="font-size: 17px"></i>
						</button>
						
			</button>

						
					</div>
					
				</form>						
			</div>
		</div>
		<script type="text/javascript">
							$(document).ready(function(){
						
								
								$('#state').on('change',function(){
									var stateID = $(this).val();
									
									if(stateID){
										$.ajax({
											type:'POST',
											url:'ajaxData.php',
											data:'state_id='+stateID,
											success:function(html){
												$('#district').html(html);
											}
										}); 
									}else{
										$('#district').html('<option value="">Select state first</option>'); 
									}
								});
							});
							</script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
