<?php
	include('database.php');
	//$html_NGO = "";
	//$sql = "Select A.UserName,A.UserID from users A,user_type B Where A.UserType = B.ID ";
	//$sql .= " and B.ID = '3'";
	//$result = mysqli_query($conn,$sql);//echo $sql;

	//while ($row = mysqli_fetch_array($result)) {
	//	$html_NGO .= "<option value='".$row['UserID']."'>".$row['UserName']."</option>";
	//}
	
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
			</script>
		<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title>Event Registration Page</title>
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/git.png">
	<!-- BOOTSTRAP STYLES-->
    	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />

		<meta charset="utf-8">
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
	<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding-top: 0;
  padding-bottom: 10%;
  padding-right: 5%;
  padding-left: 5%;
}

.column {
  float: left;
  width: 50%;
  padding-top: 0;
  padding-bottom: 10%;
  padding-right: 5%;
  padding-left: 5%;
}
.column1 {
  float: left;
  width: 50%;
  padding-top: 0;
  padding-bottom: 10%;
  padding-right: 5%;
  padding-left: 5%;
}
.column2 {
  float: left;
  width: 50%;
  padding-top: 0;
  padding-bottom: 10%;
  padding-right: 5%;
  padding-left: 5%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
	</head>
	<?php
	include("../../database.php");
	//Fetch all the country data
	$query = mysqli_query($conn,"SELECT * FROM mst_states ORDER BY StateName ASC");
	
	//Count total number of rows
	$rowCount = $query->num_rows;
	?>
	<body>

	<div class="wrapper" style="background-image: url('https://image.jimcdn.com/app/cms/image/transf/dimension=990x10000:format=jpg/path/sa6580971beaa79a9/image/i91c9d2fabe14c123/version/1535462639/image.jpg');">
				<div class="inner">
				<form action="EventReg.php" method="POST">
					<h3>Event Registration</h3>
					<div class="row">
					<div class="column">
					<div class="form-wrapper">
						<input type="text" name="event"  placeholder="Event Name*" class="form-control">
						<i class="fas fa-edit" aria-hidden="true"></i>
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
				</div>
				<div class="column">
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
						<select name="ngo" id="ngo" class="form-control">
							<option value="" disabled selected>Select NGO*</option>
							<?php echo $html_NGO; ?>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					
					 <div class="container">
         <div class="row col-md-6">
         	 <div id="show_table" name="show_table" class="table-responsive" '>
         	<caption align='top'><b>Requirements</b></caption>
           		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            	<input type='button' id='addrow' name='addrow' class='btn btn-primary' value='Add Row'/>
            	<input type='submit' id='submit' name='submit' class='btn btn-success' value='Submit'/>
            	<br><br>
            	<table id="requirements_table" class="table table-responsive table-bordered table-striped table-condensed">
            		
            		<thead>
                		<tr>
                			<th>Particulars</th>
                			<th>Qty</th>
                			<th>Amount</th>
                		</tr>
            	    </thead>
            	    <tbody>
                        <tr>
                        <td><input class='form-control' required id='particulars[]' name='particulars[]' type='text'  maxlength='50'></input></td>
                        <td><input class='form-control' id='qty[]'    name='qty[]'    type='number' maxlength='5' ></input></td>
                        <td><input class='form-control' id='amount[]' name='amount[]' type='number' maxlength='12'></input></td>
                        </tr>
            	    </tbody>
            	</table>
            </div>
        </div>
    </div>
				</div>
			</div>
			<div class="form-group">

						<button onclick=window.location.href='../Organisation Front Page/Organisation FP.php' ><i class="fa fa-reply" aria-hidden="true"  style="font-size: 17px"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home
						</button>
						<button>Register&nbsp;
						<i class="fa fa-share" aria-hidden="true" style="font-size: 17px"></i>
						</button>
					</div>
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

				<script src="bootstrap/js/jquery-3.3.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
		$("#addrow").click(function(){
			//alert('addrow clicked');
	        var rows = $('#requirements_table tbody tr').length;
            var html = "";
        	html = "<tr>";
        	html += "<td>"+"<input class='form-control' required id='particulars[]' name='particulars[]' type='text'  maxlength='50'></input>"+"</td>";
        	html += "<td>"+"<input class='form-control' id='qty[]'    name='qty[]'    type='number' maxlength='5' ></input>"+"</td>";
        	html += "<td>"+"<input class='form-control' id='amount[]' name='amount[]' type='number' maxlength='12'></input>"+"</td>";
        	html += "</tr>";
			$('#requirements_table > tbody').eq(rows-1).after(html);			
		});

	    $("form").submit(function(){
            var count = $('#requirements_table tbody tr').length;
            for(var rowIndex=1; rowIndex<=count; rowIndex++) {
                	//event.preventDefault();
                	//return false;
            }
        });			
		$('#district').on('change',function(){
			var stateID = $("#state").val();
			var districtid = $("#district").val();
			
			if(stateID){
				$.ajax({
					type:'POST',
					url:'ajaxngo.php',
					data:'StateID='+stateID+"&DistrictID="+districtid,
					success:function(html){
						alert(html);
						$('#ngo').html(html);
					}
				}); 
			}else{
			}
		});
	</script>
		</body>
