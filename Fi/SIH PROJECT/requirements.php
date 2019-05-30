<?php
	// Project: csr 
	// requirements.php
	// Author : Anand V Deshpande, NAIN,KLS GIT,Belagavi
	// Started : 25.02.2019
    //Start session
    include_once("database.php");
	$EventID = mysqli_insert_id($conn);
	if($EventID>0) {
		if(isset($_POST['submit'])) {
			$ArrParticulars = $_POST['particulars'];
			$ArrQty         = $_POST['qty'];
			$ArrAmount      = $_POST['amount'];
			$Rows  			= len($ArrParticulars);
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
	}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Requirements</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/git.png">
	<!-- BOOTSTRAP STYLES-->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
         <div class="row col-md-6">
            <div id="show_table" name="show_table" class="table-responsive" '>
            	<input type='button' id='addrow' name='addrow' class='btn btn-primary' value='Add Row'/>
            	<input type='submit' id='submit' name='submit' class='btn btn-success' value='Submit'/>
            	
            	<table id="requirements_table" class="table table-responsive table-bordered table-striped table-condensed">
            		<caption align='top'>Requirements</caption>
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
	</script>
</body>
</html>
