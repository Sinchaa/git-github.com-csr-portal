<?php
    include("../../database.php");
    $UsersIndCount = 0;
    $UsersCompanyCount = 0;

    $str = "Select Count(*) from users Where UserType=1";
    $result = mysqli_query($conn,$str);
    while ($row = mysqli_fetch_array($result)) {
        $UsersIndCount = $row[0];
    }

    $str = "Select Count(*) from users Where UserType!=1";
    $result = mysqli_query($conn,$str);
    while ($row = mysqli_fetch_array($result)) {
        $UsersCompanyCount = $row[0];
    }
    $str = "Select Count(*) from events";
    $result = mysqli_query($conn,$str);
    while ($row = mysqli_fetch_array($result)) {
        $EventsCount = $row[0];
    }
    $str = "Select Sum(AmtOutlay),SUM(AmtSpent) from events";
    $result = mysqli_query($conn,$str);
    while ($row = mysqli_fetch_array($result)) {
        $EventsBudget = $row[0];
        $EventsAmtSpent = $row[1];
    }
    $TodayDate = date("Y-m-d");
    $str = "Select Count(*) from events Where FromDate > '$TodayDate'";
    $result = mysqli_query($conn,$str);
    while ($row = mysqli_fetch_array($result)) {
        $EventsUpcoming = $row[0];
    }

    $str = "Select Count(*) from events Where FromDate < '$TodayDate'";
    $result = mysqli_query($conn,$str);
    while ($row = mysqli_fetch_array($result)) {
        $EventsConducted = $row[0];
    }
    
    /*
    $str = "Select UserType,Count(*) from users Group By UserType";
    $result = mysqli_query($conn,$str);
    while ($row=mysqli_fetch_array($result)) {

    }*/

?>