<?php
session_start();
?>
<?php
    extract($_SESSION);
    include("../database.php");
    $UserID  = $_SESSION['LoginID'];
   
    $EventID = $_GET['eventid'];
    // echo $EventID;
    // echo "Here";

    //$EventID = 13;
    $sql = "Select * from requirements Where EventID = $EventID";
    $result = mysqli_query($conn,$sql);
    $html = "";
    $html = "<table id='contribution_table' class='table table-responsive table-bordered table-striped table-condensed'>";
    $html .= "<tr class='text-center'>";
        $html .= "<th colspan=3 align ='center'>Requirements</th>";
        $html .= "<th colspan=2 align = 'center'>Balance</th>";
        $html .= "<th colspan=2 align = 'center'>Contribution</th>";
    $html .= "<tr>";
    $html .= "<tr>";
        $html .= "<th>Particulars</th>";
        $html .= "<th>Qty</th>";
        $html .= "<th>Amount</th>";
        $html .= "<th>Qty</th>";
        $html .= "<th>Amount</th>";
        $html .= "<th>Qty</th>";
        $html .= "<th>Amount</th>";
    $html .= "</tr>";

    while($row = mysqli_fetch_array($result)) {
        $Particulars = $row['Particulars'];
        $Qty         = $row['Qty'];
        $Amount      = $row['Amount'];
        $BalQty      = $row['Qty'] - $row['C_Qty'];
        $BalAmount   = $row['Amount'] - $row['C_Amount'];


        $html .= "<tr>";
        $html .= "<td><input class='form-control' type='text' name='particulars[]' id='particulars[]' readonly value='$Particulars'/></td>";
        $html .= "<td><input  class='form-control' type='text' name='qty[]' id='qty[]' readonly value='$Qty'/></td>";
        $html .= "<td><input  class='form-control' type='text' name='amount[]' id='amount[]' readonly value='$Amount'/></td>";

        $html .= "<td><input  class='form-control' type='text' name='balqty[]' id='balqty[]' readonly value='$BalQty'/></td>";
        $html .= "<td><input  class='form-control' type='text' name='balamount[]' id='balamount[]' readonly value='$BalAmount'/></td>";
        $html .= "<td><input  class='form-control' type='number' name='c_qty[]' id='c_qty[]'  value=''/></td>";
        $html .= "<td><input  class='form-control' type='number' name='c_amount[]' id='c_amount[]'  value=''/></td>";
        $html .= "</tr>";
    }


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Requirements</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/git.png">
	<!-- BOOTSTRAP STYLES-->
    <link href="E/bootstrap/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
         <div class="row col-md-12">
            <form id='contribution' method='post' action='contribution_save.php'>
           
                <input type='hidden' id='eventid' name='eventid' value='<?php echo $EventID;?>'/>
                <input type='hidden' id='userid' name='userid' value='<?php echo $UserID;?>'/>
                <div id="show_table" name="show_table" class="table-responsive" '>
                    <?php  echo $html;  echo "<button type='submit' id='submit' name='submit' class='btn btn-success'>Submit</button>"?>
                    
                </div>
                
                
                
            </form>
        </div>
    </div>
    <script src="E/bootstrap/js/jquery-3.3.1.js"></script>
    <script src="E/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
