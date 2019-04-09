<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM appointment WHERE appointmentid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
if(isset($_GET[approveid]))
{
	$sql ="UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Appointment record Approved successfully..');</script>";
	}
}
?>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">View Appointment records</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <section class="container">
    
<h2>Search Approved Appointment - <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrer" /></h2>

    <table class="order-table">
      <thead>
        <tr>
          
          <td>Patient detail</td>
          <td>Registration Date &  Time</td>
          <td>Department</td>
          <td>Doctor</td>
          <td>Appointment Reason</td>
          <td>Status</td>
          <td><div align="center">Action</div></td>
        </tr>
        </thead>
        <tbody>
          <?php
		$sql ="SELECT * FROM appointment WHERE (status='Approved' OR status='Active')";
		if(isset($_SESSION['patientid']))
		{
			$patient_id=$_SESSION['patientid'];
			$sql  = $sql . " AND patientid='$patient_id'";
		}
		if(isset($_SESSION['doctorid']))
		{
			$doctor_id=$_SESSION['doctorid'];
			$sql  = $sql . " AND doctorid='$doctor_id'";			
		}
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
			$qsqlpat = mysqli_query($con,$sqlpat);
			$rspat = mysqli_fetch_array($qsqlpat);
			
			
			$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
			$qsqldept = mysqli_query($con,$sqldept);
			$rsdept = mysqli_fetch_array($qsqldept);
			
			$sqldoc= "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
			$qsqldoc = mysqli_query($con,$sqldoc);
			$rsdoc = mysqli_fetch_array($qsqldoc);
        echo "<tr>
         
          <td>&nbsp;$rspat[patientname]<br>&nbsp;$rspat[mobileno]</td>		 
			 <td>&nbsp;$rs[appointmentdate]&nbsp;$rs[appointmenttime]</td> 
		    <td>&nbsp;$rsdept[departmentname]</td>
			   <td>&nbsp;$rsdoc[doctorname]</td>
			    <td>&nbsp;$rs[app_reason]</td>
			    <td>&nbsp;$rs[status]</td>
          <td><div align='center'>";
		  if($rs[status] != "Approved")
		  {
				  if(!(isset($_SESSION['patientid'])))
				  {
						  echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]'>Approve</a><hr>";
				  }
				 echo "  <a href='viewappointment.php?delid=$rs[appointmentid]'>Delete</a>";
		  }
		  else
		  {
				echo "<a href='patientreport.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]'>View Report</a>";
		  }
		 echo "</center></td></tr>";
		}
		?>
      </tbody>
    </table>
    </section>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
?>