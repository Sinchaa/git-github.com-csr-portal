
<?php
include('../../HOME1/header.php');
?>
<?php
    extract($_SESSION);
    include("../../database.php");
    $UserID  = $_SESSION['LoginID'];
   
  //  $EventID = $_GET['eventid'];
    // echo $EventID;
    // echo "Here";

    //$EventID = 13;
    $sql = "Select * from contributions Where UserID = $UserID AND (Qty != 0 or Amount != 0)";
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    $html = "";
    $html = "<table id='contribution_table' class='table table-responsive table-bordered table-striped table-condensed'>";
    $html .= "<tr class='text-center'>";
        $html .= "<th colspan=2 align ='center'>Details</th>";
        $html .= "<th colspan=2 align = 'center'>Contribution</th>";
    $html .= "<tr>";
    $html .= "<tr>";
        $html .= "<th>Event Name</th>";
        $html .= "<th>Particulars</th>";
        $html .= "<th>Qty</th>";
        $html .= "<th>Amount</th>";
    $html .= "</tr>";

    while($row = mysqli_fetch_array($result)) {
        $eventid=$row['EventID'];
        $r="SELECT * FROM events WHERE EventID='$eventid'";
        $r2 =mysqli_query($conn,$r);
        $r1=mysqli_fetch_assoc($r2);
        
        $EventName = $r1['EventName'];
        $Particulars = $row['Particular'];
        $Qty         = $row['Qty'];
        $Amount      = $row['Amount'];


        $html .= "<tr>";
        $html .= "<td><input class='form-control' type='text' name='particulars[]' id='particulars[]' readonly value='$EventName'/></td>";
        $html .= "<td><input class='form-control' type='text' name='particulars[]' id='particulars[]' readonly value='$Particulars'/></td>";
        $html .= "<td><input  class='form-control' type='text' name='qty[]' id='qty[]' readonly value='$Qty'/></td>";
        $html .= "<td><input  class='form-control' type='text' name='amount[]' id='amount[]' readonly value='$Amount'/></td>";
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

</head>
<body>
    <div class="container" style="margin-top:100px;">
         <div class="row col-md-12">
            <form id='contribution' method='post' action='contribution_save.php'>
           
                <input type='hidden' id='eventid' name='eventid' value='<?php echo $EventID;?>'/>
                <input type='hidden' id='userid' name='userid' value='<?php echo $UserID;?>'/>
                <div id="show_table" name="show_table" class="table-responsive" '>
                    <?php  
                     echo $html;
                        //echo "<button id='submit' name='submit' class='btn btn-success'><a href='http://localhost/anand2/Final/SIH%20PROJECT/Individual%20Front%20Page/Individual%20FP.php' style='color: inherit;'>
                        // </button></a>";
                    ?>
                    
                </div>
                
                
                
            </form>
        </div>
    </div>
    <script src="E/bootstrap/js/jquery-3.3.1.js"></script>
    <script src="E/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
