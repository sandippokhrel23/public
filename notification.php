<?php
session_start();
include("dbconnection.php");
if(!isset($_SESSION['patientid']))
{
	echo "<script>window.location='patientlogin.php';</script>";
}
include("header.php");
if(isset($_SESSION['patientid'])){
    $notification_count=0;
    $p_id=$_SESSION['patientid'];
    $sql ="SELECT * FROM notification where is_read=0 and userid=$p_id";
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
    {
        echo '<div class="jumbotron">
        <p class="lead">'.$rs[message].'</p>
      </div>';
    }
}
?>


<?php
include("footer.php");
$sql ="UPDATE notification
SET is_read = 1
WHERE userid=$p_id;";
$qsql = mysqli_query($con,$sql);
?>