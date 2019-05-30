<?php
  session_start();
  extract($_SESSION);
  $l=$_SESSION['LoginID'];
?>
<?php
include('../../database.php');
if(isset($_POST['view']))
{

if($_POST["view"] != '')
{
   $update_query = " UPDATE comment,events  SET comment.CommentStatus = 1 WHERE (comment.CommentStatus = 0) AND  (events.EventID= comment.EventID) AND (events.UserID=".$l.") ";
   mysqli_query($conn, $update_query);
}

$query = "SELECT * FROM comment,events,users WHERE  (events.EventID= comment.EventID) AND (users.UserID=comment.UserID) AND (events.UserID=".$l.") ORDER BY comment.CommentID DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["UserName"].'</strong><br/>
  <small><em>'.$row["Detail"].'</em></small>
  </a>
  </li>
  ';
}
}
else
{
    $output .= '<li>No Notification Found</a></li>';
}
$status_query = "SELECT * FROM comment WHERE CommentStatus = '0' ";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}


?>

