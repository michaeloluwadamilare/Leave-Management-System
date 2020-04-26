<?php include("LeaveApplicationModel.php")?>
<?php
require_once("app/connect.php");

if (isset($_POST['apply'])) { // if save button on the form is clicked
	extract($_POST);
    $leaveType = $_POST['leaveType'];
    $_SESSION['leaveType'] = $leaveType;
	$date1 = date_create($_POST["lEnds"]);
	$date2 = date_create($_POST["lBegins"]);
	$diff=date_diff($date1,$date2 );
	$totalLeaveDays = $diff->format("%a");

    $objForLeaveDaysRemain = new LeaveApplication();
        $result  = $objForLeaveDaysRemain->forLeaveDaysRemain($leaveType);
    
        if (mysql_fetch_array($result) == null)
        {
            
            $objForLeaveDaysRemain = new LeaveApplication();
            $leaveTotal  = $objForLeaveDaysRemain->forLeaveDays($leaveType);
            while($rowTotal = mysql_fetch_array($leaveTotal))
            {
                $livTotalLeaveDaysRemain = $rowTotal['totalDays'] - $totalLeaveDays;
               
            }
            //echo "From If : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
        }
        else
        {
            $objForLeaveDaysRemain = new LeaveApplication();
            $result  = $objForLeaveDaysRemain->forLeaveDaysRemain($leaveType);
            while($row = mysql_fetch_array($result))
            {
                $livTotalLeaveDaysRemain = $row['TotalLeaveDaysRemain'] - $totalLeaveDays;
                //echo "From Else : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
                
            }
        }
        
 $hodApproval = 0; 
 $deanApproval = 0;
 $hrApproval = 0;
$seen = 0;
$status ="not approved";
$notStatus = 0;

    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'PDF', 'pdf','doc','docx'])) {
        echo "Your file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            
                    $sql = "INSERT INTO leaveapplicationdetails (staffName,appliedStaffId,appliedDate,leaveType,leaveStart,leaveEnd,totalLeaveDays,reasonDoc,docSize,standIn,email,hodApproval,deanApproval,hrApproval,department,faculty,TotalLeaveDaysRemain,seen) VALUES ('$name','$staff_id',now(),'$leaveType','$lBegins','$lEnds','$totalLeaveDays','$filename','$size','$standIn','$email','$hodApproval','$deanApproval','$hrApproval','$department','$faculty','$livTotalLeaveDaysRemain','$seen')";

            $sql1="INSERT INTO rejected_leave_notification (staffName, appliedStaffId, leaveType, status, notStatus) VALUES('$name','$staff_id','$leaveType','$status','$notStatus')";
            $query1= mysql_query($sql1) or die(mysql_error());

            if (mysql_query($sql)) {
               header("Location: leaveapplication.php?id=Success");
            }
                // }
            

        } else {
            header("Location: leaveapplication.php?id2=error");
        }
    }
}



if (isset($_POST['apply1'])) { // if save button on the form is clicked
    extract($_POST);
    $leaveType = $_POST['leaveType'];
    $_SESSION['leaveType'] = $leaveType;
    $date1 = date_create($_POST["lEnds"]);
    $date2 = date_create($_POST["lBegins"]);
    $diff=date_diff($date1,$date2 );
    $totalLeaveDays = $diff->format("%a");

    $objForLeaveDaysRemain = new LeaveApplication();
        $result  = $objForLeaveDaysRemain->forLeaveDaysRemain($leaveType);
    
        if (mysql_fetch_array($result) == null)
        {
            
            $objForLeaveDaysRemain = new LeaveApplication();
            $leaveTotal  = $objForLeaveDaysRemain->forLeaveDays($leaveType);
            while($rowTotal = mysql_fetch_array($leaveTotal))
            {
                $livTotalLeaveDaysRemain = $rowTotal['totalDays'] - $totalLeaveDays;
               
            }
            //echo "From If : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
        }
        else
        {
            $objForLeaveDaysRemain = new LeaveApplication();
            $result  = $objForLeaveDaysRemain->forLeaveDaysRemain($leaveType);
            while($row = mysql_fetch_array($result))
            {
                $livTotalLeaveDaysRemain = $row['TotalLeaveDaysRemain'] - $totalLeaveDays;
                echo $livTotalLeaveDaysRemain;
                //echo "From Else : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
                
            }
        }

    $hodApproval = 1;
    $deanApproval = 0;
    $hrApproval = 0;
    $seen = 0;
    $status ="not approved";
    $notStatus = 0;

    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

     if (!in_array($extension, ['zip', 'PDF', 'pdf','doc','docx'])) {
        echo "Your file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
       if (move_uploaded_file($file, $destination)) {
            
                    $sql = "INSERT INTO leaveapplicationdetails (staffName,appliedStaffId,appliedDate,leaveType,leaveStart,leaveEnd,totalLeaveDays,reasonDoc,docSize,standIn,email,hodApproval,deanApproval,hrApproval,department,faculty,TotalLeaveDaysRemain,seen) VALUES ('$name','$staff_id',now(),'$leaveType','$lBegins','$lEnds','$totalLeaveDays','$filename','$size','$standIn','$email','$hodApproval','$deanApproval','$hrApproval','$department','$faculty','$livTotalLeaveDaysRemain','$seen')";

            $sql1="INSERT INTO rejected_leave_notification (staffName, appliedStaffId, leaveType, status, notStatus) VALUES('$name','$staff_id','$leaveType','$status','$notStatus')";
            $query1= mysql_query($sql1) or die(mysql_error());

            if (mysql_query($sql)) {
               header("Location: leaveapplication.php?id=Success");
            }
                // }
            

        } else {
            header("Location: leaveapplication.php?id2=error");
        }
    }
}


if (isset($_POST['apply2'])) { // if save button on the form is clicked
   extract($_POST);
    $leaveType = $_POST['leaveType'];
    $_SESSION['leaveType'] = $leaveType;
    $date1 = date_create($_POST["lEnds"]);
    $date2 = date_create($_POST["lBegins"]);
    $diff=date_diff($date1,$date2 );
    $totalLeaveDays = $diff->format("%a");

    $objForLeaveDaysRemain = new LeaveApplication();
        $result  = $objForLeaveDaysRemain->forLeaveDaysRemain($leaveType);
    
        if (mysql_fetch_array($result) == null)
        {
            
            $objForLeaveDaysRemain = new LeaveApplication();
            $leaveTotal  = $objForLeaveDaysRemain->forLeaveDays($leaveType);
            while($rowTotal = mysql_fetch_array($leaveTotal))
            {
                $livTotalLeaveDaysRemain = $rowTotal['totalDays'] - $totalLeaveDays;
               
            }
            //echo "From If : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
        }
        else
        {
            $objForLeaveDaysRemain = new LeaveApplication();
            $result  = $objForLeaveDaysRemain->forLeaveDaysRemain($leaveType);
            while($row = mysql_fetch_array($result))
            {
                $livTotalLeaveDaysRemain = $row['TotalLeaveDaysRemain'] - $totalLeaveDays;
                //echo "From Else : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
                
            }
        }
        
    $hodApproval = 1;
    $deanApproval = 1;
    $hrApproval = 0;
    $seen = 0;
    $status ="not approved";
    $notStatus = 0;

    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

     if (!in_array($extension, ['zip', 'PDF', 'pdf','doc','docx'])) {
        echo "Your file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
       if (move_uploaded_file($file, $destination)) {
            
                    $sql = "INSERT INTO leaveapplicationdetails (staffName,appliedStaffId,appliedDate,leaveType,leaveStart,leaveEnd,totalLeaveDays,reasonDoc,docSize,standIn,email,hodApproval,deanApproval,hrApproval,department,faculty,TotalLeaveDaysRemain,seen) VALUES ('$name','$staff_id',now(),'$leaveType','$lBegins','$lEnds','$totalLeaveDays','$filename','$size','$standIn','$email','$hodApproval','$deanApproval','$hrApproval','$department','$faculty','$livTotalLeaveDaysRemain','$seen')";

            $sql1="INSERT INTO rejected_leave_notification (staffName, appliedStaffId, leaveType, status, notStatus) VALUES('$name','$staff_id','$leaveType','$status','$notStatus')";
            $query1= mysql_query($sql1) or die(mysql_error());

            if (mysql_query($sql)) {
               header("Location: leaveapplication.php?id=Success");
            }
                // }
            

        } else {
            header("Location: leaveapplication.php?id2=error");
        }
    }
}

if (isset($_POST['Send'])) {
    extract($_POST);
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
if ($filename != null) {
     if (!in_array($extension, ['zip', 'PDF', 'pdf','doc','docx'])) {
        echo "Your file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $status ="rejected";
            // $sql2=mysql_query("DELETE FROM leaveapplicationdetails WHERE appliedStaffId = '$reject'");
            $sql3=mysql_query("UPDATE rejected_leave_notification SET status = '$status',rejectDoc='$filename',docSize='$size' WHERE appliedStaffId = '$Send' AND notStatus=0")or die(mysql_error());
             if ($sql3) {
                      header("Location: leaveApplicant.php");
                  }    

                }
                else{echo "error";}
}
    
}else{
    $status ="rejected";
    $sql3=mysql_query("UPDATE rejected_leave_notification SET status = '$status', reason='$textReason' WHERE appliedStaffId = '$Send' AND notStatus=0")or die(mysql_error());
             if ($sql3) {
                      header("Location: leaveApplicant.php");
                  }   

                }
                
}


?>