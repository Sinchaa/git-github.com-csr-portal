<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
    <body>
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