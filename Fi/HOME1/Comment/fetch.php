
<?php
        
        include('database.php');
        $output = "";
        $sqlC="SELECT * FROM comment WHERE EventID=".$_POST['user']." ORDER BY Date DESC";
        $resultC=mysqli_query($conn,$sqlC);
        if(mysqli_num_rows($resultC)>0)
        {
        while($rowC=mysqli_fetch_assoc($resultC))    //fetchings rows of comments
         {
            $sqlid= "SELECT * FROM users WHERE UserID=".$rowC['UserID'];
            $resultI=mysqli_query($conn,$sqlid);
            $rowI=mysqli_fetch_assoc($resultI);
            $sqlR="SELECT * FROM reply WHERE EventID=".$_POST['user']." AND CommentID=".$rowC['CommentID'];
            $re=mysqli_query($conn,$sqlR);
             
       
            $output .='
                    <div class="w3-container w3-card w3-white w3-round w3-margin">
                    <h6 style="float:left;"> '.$rowI["UserName"].'</h6><hr>
                    <span class="w3-right w3-opacity">'.$rowC["Date"].' </span>
                    <p> '. $rowC["Detail"] .'</p>
                    <button type="button" id="'.$rowC['CommentID'].'" class="btn btn-default reply" >Reply</button><br>
                    
                    ';
             
            while($rowR=mysqli_fetch_assoc($re))
            {
            $sqlid2= "SELECT * FROM users WHERE UserID=".$rowR['UserID'];
            $resultR=mysqli_query($conn,$sqlid2);
            $rowP=mysqli_fetch_assoc($resultR);
             
             $output .='
                        <div class="w3-container w3-card w3-white w3-round w3-margin">
                        <h6 style="float:left;"> '.$rowP["UserName"].' </h6><hr>
                        <span class="w3-right w3-opacity">'.$rowR["Date"].' </span>
                        <p>'.$rowR["Reply"].'</p>
                          </div>     
                        ';
       
            }
            $output .='
                        </div>
                        ';
            
                    
            }
          }
        
        
        echo $output;
?>



