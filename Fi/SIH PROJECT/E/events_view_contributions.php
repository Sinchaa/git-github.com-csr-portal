<?php
    // events_view_contributions.php
    include("../../database.php");
    
    //$UserID = $_SESSION['LoginID'];
    $html = "";
    $EventID = $_GET['EventID'];

    $sql = "Select A.*,B.UserName,C.EventName from contributions A,users B,events C Where A.EventID = $EventID";
    $sql .= " and A.UserID = B.UserID AND A.EventID = C.EventID Order By C.EventName,B.UserName ";
    $result = mysqli_query($conn,$sql);
    //echo $sql;
    $html = "";
    $html = "<table id='contribution_table' class='table table-responsive table-bordered table-striped table-condensed'>";
    $html .= "<thead>";
    $html .= "<tr>";
        $html .= "<th>EventName</th>";
        $html .= "<th>UserName</th>";
        $html .= "<th>Particulars</th>";
        $html .= "<th>Qty</th>";
        $html .= "<th>Amount</th>";
    $html .= "</tr>";
    $html .= "</thead>";
    $html .= "<tbody>";
    $TotalQty = 0;
    $TotalAmt = 0;
    while($row = mysqli_fetch_array($result)) {
        $html .="<tr>";
        $html .= "<td>".$row['EventName']."</td>";
        $html .= "<td>".$row['UserName']."</td>";
        $html .= "<td>".$row['Particular']."</td>";
        $html .= "<td>".$row['Qty']."</td>";
        $html .= "<td>".$row['Amount']."</td>";
        $html .="</tr>";
        $TotalAmt += $row['Amount'];
        $TotalQty += $row['Qty'];
    }
    $html .="<tr>";
    $html .= "<td>Total</td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td>".$TotalQty."</td>";
    $html .= "<td>".$TotalAmt."</td>";
    $html .="</tr>";
    $html .= "</tbody>";
    $html .= "</table>";
?>

<html>
<head>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <script src="bootstrap/js/jquery-3.3.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<div class='col-12'>
</div>

<div id="results" class="col-md-12 table-responsive" style='margin-top:100px;'>
    <?php echo $html; ?>
</div>

</body>
</html>





