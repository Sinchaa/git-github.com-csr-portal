<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
    <body>

<?php
include("../../database.php");
//Fetch all the country data
$query = mysqli_query($conn,"SELECT * FROM mst_states ORDER BY StateName ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select id="state">
    <option value="">Select state</option>
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

<select id="district" name="district">
    <option value="">Select State first</option>
</select>

<script type="text/javascript">
$(document).ready(function(){
    
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        alert(stateID);
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
</html>
