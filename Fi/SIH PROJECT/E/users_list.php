


<?php
    include("../../database.php");
    $sql  = "SELECT A.*, B.Name, C.StateName , D.DistrictName FROM users A, user_type B, mst_states C,mst_districts D Where A.UserID = B.ID AND A.StateID = C.StateID AND A.DistrictID = D.DistrictID Order By UserName";
    //echo $sql;
    $sql00 = mysqli_query($conn,$sql);
    $html = "";
    $html .= "<table class='table table-responsive table-bordered table-striped table-condensed'>
        <tr>
        <th>Sl.No</th>
        <th>Organization</th>
        <th>CIN</th>
        <th>Address</th>
        <th>State</th>
        <th>District</th>
        <th>Mobile</th>
        <th>EmailID</th>
        </tr>";
    $SerialNo=1;
    while($row = mysqli_fetch_assoc($sql00)) {
        $html .= '<tr>';
        $html .= "<td>".$SerialNo."</td>";
        $html .= "<td>".$row['UserName']."</td>";
        $html .= "<td>".$row['CIN']."</td>";
        $html .= "<td>".$row['Address']."</td>";
        $html .= "<td>".$row['StateName']."</td>";
        $html .= "<td>".$row['DistrictName']."</td>";
        $html .= "<td>".$row['Mobile']."</td>";
        $html .= "<td>".$row['EmailID']."</td>";
        $html .= "</tr>";
        $SerialNo++;
    }
    $html .= "</table>";    
?>

<?php
include('../../HOME1/header.php');
?>
<div id='results' class='col-md-12 table-responsive' style="margin-top:100px;">
    <?php echo $html; ?>
</div>
</body>
</html>
<?php
include('footer.html');
?>

