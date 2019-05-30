<?php
        
        include('database.php');
        $sqlC="SELECT * FROM comment WHERE EventID=".$_POST['user'];
        $resultC=mysqli_query($conn,$sqlC);
        if(mysqli_num_rows($resultC)>0)
        {
        while($rowC=mysqli_fetch_assoc($resultC))    //fetchings rows of comments
        {
            $sqlid= "SELECT * FROM users WHERE UserID=".$rowC['UserID'];
            $resultI=mysqli_query($conn,$sqlid);
            $rowI=mysqli_fetch_assoc($resultI);
        $output .='
        <div class="w3-container w3-card w3-white w3-round w3-margin">
        <h6 style="float:left;"> '.$rowI["UserName"].'</h6><hr>
        <span class="w3-right w3-opacity">'.$rowC["Date"].' </span>
        <p> '.$rowC["Detail"].'</p>  
        </div>
        ';

        }
        }
        else
        echo "NO";
        echo $output;
?>
