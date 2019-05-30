<?php 
include('../../HOME1/header.php');
?>


<?php
// events_own_list.php

    include("../../database.php");
    
    $UserID = $_SESSION['LoginID'];
    $html = "";

    $sql="SELECT A.*,B.UserName,C.SectorName ,D.StateName ,E.DistrictName,F.ModeName  FROM events A,users B,sectors C ,mst_states D
    ,mst_districts E,moi F  Where A.UserID = B.UserID AND A.SectorID = C.SectorID AND A.StateID = D.StateID
     AND A.DistrictID = E.DistrictID AND A.ModeImplementID = F.ID ";
    $sql .= " And A.UserID = $UserID ";
   // echo $sql;
    $sql00 = mysqli_query($conn,$sql);

    $html .= "<table class='table table-responsive table-bordered table-striped table-condensed'>
            <tr>
            <th>Sl.No</th>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Sector</th>
            <th>State</th>
            <th>District</th>
            <th>Place</th>
            <th>From</th>
            <th>To</th>
            <th>Budget</th>
            <th>Spent</th>
            <th>Mode of Implementation</th>
            <th>Action</th>
            </tr>";

    $TotalBudget = 0;
    $TotalSpent  = 0;
    $SerialNo=1;
    while($row = mysqli_fetch_assoc($sql00))
    {
        $EventID = $row['EventID'];
        $HRef = "<a href='event_edit.php?EventID=$EventID'>Edit Event</a>";
        $HRef2 = "<br><a href='events_view_contributions.php?EventID=$EventID'>View Contributions</a>";
        $html .= '<tr>';
        $html .= "<td>".$SerialNo."</td>";
        $html .= "<td>".$row['EventID']."</td>";
        $html .= "<td>".$row['EventName']."</td>";
        $html .= "<td>".$row['SectorName']."</td>";
        $html .= "<td>".$row['StateName']."</td>";
        $html .= "<td>".$row['DistrictName']."</td>";
        $html .= "<td>".$row['EventArea']."</td>";
        $html .= "<td nowrap>".date("d-m-Y",strtotime($row['FromDate']))."</td>";
        $html .= "<td nowrap>".date("d-m-Y",strtotime($row['ToDate']))."</td>";
        $html .= "<td>".$row['AmtOutlay']."</td>";
        $html .= "<td>".$row['AmtSpent']."</td>";
        $html .= "<td>".$row['ModeName']."</td>";
        $html .= "<td nowrap>".$HRef.$HRef2."</td>";
        $html .= "</tr>";
        $TotalBudget += $row['AmtOutlay'];
        $TotalSpent  += $row['AmtSpent'];
        $SerialNo++;

    }
    $html .= '<tr>';
    $html .= "<td>Total</td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td>".$TotalBudget."</td>";
    $html .= "<td>".$TotalSpent."</td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "</tr>";


    $html .= "</table>";    
?>



<div class='col-12'>
</div>

<div id="results" class="col-md-12 table-responsive" style='margin-top:100px;'>
    <?php echo $html; ?>
</div>

</body>
</html>

