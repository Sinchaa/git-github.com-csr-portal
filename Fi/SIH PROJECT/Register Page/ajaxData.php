<?php
//Include the database configuration file
include ('../../database.php');

if(!empty($_POST["state_id"])){
    //Fetch all city data
    $query = mysqli_query($conn,"SELECT * FROM mst_districts WHERE StateID = ". $_POST['state_id'] ." ORDER BY DistrictName ASC");
    
    $rowCount = mysqli_num_rows($query);
    //City option list
   if($rowCount > 0){
        echo '<option value="">Select District</option>';
        while($row = $query->fetch_assoc()){ 
        
            echo '<option value="'.$row['DistrictID'].'">'.$row['DistrictName'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
    
}
?>
