<!DOCTYPE html>
<html>
	<head>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
			</script>


		<meta charset="utf-8">
		<title>Event Registration Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		<style>
		 input[type="date"]:before {
    content: attr(placeholder) !important;
    color: #aaa;
    margin-right: 0.5em;
  }
  input[type="date"]:focus:before,
  input[type="date"]:valid:before {
    content: "";
  }
		</style>
	</head>
	<?php
	include("../database.php");
	//Fetch all the country data
	$query = mysqli_query($conn,"SELECT * FROM mst_states ORDER BY StateName ASC");
	
	//Count total number of rows
	$rowCount = $query->num_rows;
	?>
	<body>

	<div class="wrapper" style="background-image: url('https://image.jimcdn.com/app/cms/image/transf/dimension=990x10000:format=jpg/path/sa6580971beaa79a9/image/i91c9d2fabe14c123/version/1535462639/image.jpg');">
				<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.jpg" alt="">
				</div>
				<form action="EventReg.php" method="POST">
					<h3>Event Registration</h3>
					<div class="form-wrapper">
						<input type="text" name="event"  placeholder="Event Name*" class="form-control">
						<i class="fas fa-edit" aria-hidden="true"></i>
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
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<select name="MOI" id="" class="form-control">
							<option value="" disabled selected>Mode Of Implementation*</option>
							<option value="1">Direct From Company</option>
		      				<option value="2">By Other Implementation agency</option>
		      				
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<select name="project" id="" class="form-control">
							<option value="" disabled selected>Project Type*</option>
							<option value="1">Ethical Responsiblity</option>
		      				<option value="2">Environment Responsiblity</option>
		      				<option value="3">Economic Responsiblity</option>
		      				<option value="4">Philanthropic Responsiblity</option>
		      			</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input name ="area" type="text" placeholder="Event Location*" class="form-control">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
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
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<select name="district" id="district" class="form-control">
							<option value="" disabled selected>District*</option>
						</select>		
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>				
					</div>
					
					<div class="form-wrapper">
						<input name="pin" type="text" placeholder="Pincode*" class="form-control">
						<i class="fas fa-map-pin" aria-hidden="true"></i>
					</div>
					<div class="form-wrapper">
						<input name="from" placeholder="From Date*" type="date"  class="form-control">
						<input name="to" placeholder="To Date*" type="date"  class="form-control">
						
					</div>
					<div class="form-wrapper">
						<input name="details" type="text" placeholder="Event Details*" class="form-control">
						<i class="fas fa-info-circle" aria-hidden="true"></i>
						
					</div>
					<div class="form-group">
						<input name="outlay" type="text" placeholder="Amount Outly*" class="form-control">
						<input name="spent" type="text" placeholder="Amount Spent*" class="form-control">
					</div>
					
					<div class="form-group">

						<button><i class="fa fa-reply" aria-hidden="true" style="font-size: 17px"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home
						</button>
						<button>Register&nbsp;
						<i class="fa fa-share" aria-hidden="true" style="font-size: 17px"></i>
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
		</body>