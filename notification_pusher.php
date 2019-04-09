<?php
include("dbconnection.php");

date_default_timezone_set('Asia/Kathmandu');
$sql ="SELECT prescription_records.medicine_name,prescription_records.dosage,prescription.patientid FROM prescription_records
LEFT JOIN prescription ON prescription.prescriptionid=prescription_records.prescription_id
 where prescription_records.status='Active'";
$qsql = mysqli_query($con,$sql);
$date=date('Y-m-d');

// $rs = mysqli_fetch_array($qsql);
while($rs = mysqli_fetch_array($qsql))
			{
        switch ($rs[dosage]) {
          case '1-0-0':
              if(date('H:i')=="00:48"){
                $message="Do you have your ".$rs[medicine_name]." on 6 am?";
                $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
                mysqli_query($con,$sql);
              }
              break;
          case '1-1-0':
              if(date('H:i')=="06:00"){
                $message="Do you have your ".$rs[medicine_name]." on 6 am?";
                $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
                mysqli_query($con,$sql);
              }
              if(date('H:i')=="10:00"){
                $message="Do you have your ".$rs[medicine_name]." after dinner ?";
                $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
                mysqli_query($con,$sql);
              }
              break;
          case '1-1-1':
              if(date('H:i')=="06:00"){
                $message="Do you have your ".$rs[medicine_name]." on 6 am?";
                $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
                mysqli_query($con,$sql);
              }
              if(date('H:i')=="10:00"){
                $message="Do you have your ".$rs[medicine_name]." after dinner ?";
                $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
                mysqli_query($con,$sql);
              }
              if(date('H:i')=="18:00"){
                $message="Do you have your ".$rs[medicine_name]." in noon ?";
                $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
                mysqli_query($con,$sql);
              }
              break;
          case '0-1-1':
            if(date('H:i')=="10:00"){
              $message="Do you have your ".$rs[medicine_name]." after dinner ?";
              $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
              mysqli_query($con,$sql);
            }
            if(date('H:i')=="18:00"){
              $message="Do you have your ".$rs[medicine_name]." in noon ?";
              $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
              mysqli_query($con,$sql);
            }
            break;
          case '0-1-0':
            if(date('H:i')=="10:00"){
              $message="Do you have your ".$rs[medicine_name]." after dinner ?";
              $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
              mysqli_query($con,$sql);
            }
            break;
          case '0-0-1':
            if(date('H:i')=="18:00"){
              $message="Do you have your ".$rs[medicine_name]." in noon ?";
              $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
              mysqli_query($con,$sql);
            }
            break;
          case '1-0-1':
          if(date('H:i')=="06:00"){
            $message="Do you have your ".$rs[medicine_name]." on 6 am?";
            $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
            mysqli_query($con,$sql);
          }
          if(date('H:i')=="18:00"){
            $message="Do you have your ".$rs[medicine_name]." in noon ?";
            $sql ="INSERT INTO notification(userid,message,date) values('$rs[patientid]','$message','$date')";
            mysqli_query($con,$sql);
          }
            break;
          default:
      }
      }
      ?>