<?php include("LeaveApplicationModel.php")?>
<?php
require 'sendgrid/vendor/autoload.php';
 $API_KEY = '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';
    extract($_POST);

  if (isset($_POST['hrapprove'])) {
   
    $message = "YOUR LEAVE HAS BEEN APPROVED";
     $sql2 = "SELECT * FROM leaveapplicationdetails WHERE appliedStaffId = '$hrapprove'";
  $query = mysql_query($sql2) or die(mysql_error());
  $user = mysql_fetch_array($query);
  if (mysql_num_rows($query)==1) {
    $email_id = $user['email'];
   try{
 $xxx = mail($email_id, "UNILORIN HR", $message);
if($xxx){

  echo "successful $xxx";
} 
else {
  echo "errorrr";
}
   } 
    catch(Exception $e){

      echo $e;
    }
    
 }
    $sql1=mysql_query("UPDATE leaveapplicationdetails SET hrApproval =1 WHERE appliedStaffId = '$hrapprove'");

    if ($sql1) {
     
    $sql = "UPDATE staffdetails SET leavestatus = 1 WHERE staff_id ='$hrapprove'";
    $query = mysql_query($sql) or die(mysql_error());

    $sql4 = "DELETE FROM rejected_leave_notification WHERE appliedStaffId = '$hrapprove'";
    $query4 = mysql_query($sql4) or die(mysql_error());

    header("location:leaveApplicant.php");
                  }     
 }
 if (isset($_POST['update'])) { // if save button on the form is clicked
                  extract($_POST);
                  $sql ="UPDATE staffdetails SET email='$email', phoneNo='$phoneNo', address='$address', password='$password' WHERE staff_id='".$_SESSION['staff_id']."'";
                $query = mysql_query($sql) or die(mysql_error());
                if ($query) {
                  header("location:userpage.php?id=Success");
                }
}

 if (isset($_POST['approve'])) {
     $sql1=mysql_query("UPDATE leaveapplicationdetails SET hodApproval =1 WHERE appliedStaffId = '$approve'");
     header("location:leaveApplicant.php");
 }

  if (isset($_POST['proceed'])) {
     $sql1=mysql_query("UPDATE leaveapplicationdetails SET seen =1 WHERE leaveApplicationId = '$proceed'");
     header("location:userpage.php");
 }

  if (isset($_POST['rejectproceed'])) {
     $sql1=mysql_query("UPDATE rejected_leave_notification SET notStatus =1 WHERE rejectedLeaveId = '$rejectproceed'");
     header("location:userpage.php");
 }

 if (isset($_POST['deanapprove'])) {
     $sql1=mysql_query("UPDATE leaveapplicationdetails SET deanApproval =1 WHERE appliedStaffId = '$deanapprove'");
     header("location:leaveApplicant.php");
 }
 
 if (isset($_POST['reject'])) {
   $status ="rejected";
  $sql2=mysql_query("SELECT * FROM leaveapplicationdetails WHERE leaveApplicationId = '$reject'");
  $user = mysql_fetch_array($sql2);
  if (mysql_num_rows($sql2)==1) {
    $staff_id= $user['appliedStaffId'];
    
     header("location:reasonDoc.php?id=$staff_id &leaveApplicationId=$reject");

   }    }                      

if (isset($_POST['detail'])) {
    $id = $_POST['detail'];

    // fetch file to download from database
    $sql = "SELECT * FROM leaveapplicationdetails WHERE leaveApplicationId ='$id' ";
    $result = mysql_query($sql);

    $file = mysql_fetch_assoc($result);
    $filepath = 'uploads/' . $file['reasonDoc'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['reasonDoc']));
        readfile('uploads/' . $file['reasonDoc']);

        exit;
    }
  }
if (isset($_POST['rejectDetail'])) {
    $id = $_POST['rejectDetail'];
    // fetch file to download from database
    $sql = "SELECT * FROM rejected_leave_notification WHERE rejectedLeaveId ='$id' ";
    $result = mysql_query($sql);

    $file = mysql_fetch_assoc($result);
    $filepath = 'uploads/' . $file['rejectDoc'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['rejectDoc']));
        readfile('uploads/' . $file['rejectDoc']);

        exit;
    }
  }

  if (isset($_POST['delete'])) {
     $sql = "DELETE FROM staffdetails WHERE staff_detail_id ='$delete' ";
    $query = mysql_query($sql) or die(mysql_error());
    header("location:addstaff.php");
  }

  if (isset($_POST['unapprovedDelete'])) {
     $sql = "DELETE FROM leaveapplicationdetails WHERE appliedStaffId ='$unapprovedDelete' AND hrApproval= 0 ";
    $query = mysql_query($sql) or die(mysql_error());
    header("location:Unapproved.php");
  }


  if (isset($_POST['deletefaculty'])) {
                 $sql = "DELETE FROM faculty WHERE faculty_id ='$deletefaculty' ";
                $query = mysql_query($sql) or die(mysql_error());
                header("location:addfaculty.php");
              }
    if (isset($_POST['deleteDesignation'])) {
                 $sql = "DELETE FROM position WHERE position_id ='$deleteDesignation' ";
                $query = mysql_query($sql) or die(mysql_error());
                header("location:addDesignation.php");
              }
              

  if (isset($_POST['add'])) {
                extract($_POST);

                                $leavestatus = 0;

                $passport = $_FILES['passport']['name'];


                if(move_uploaded_file($_FILES['passport']['tmp_name'], 'img/'.$passport)) {

                $sq2 = "SELECT * FROM staffdetails WHERE name = '$name' AND department ='$department' AND phoneNo ='$phoneNo' ";
                $query2 = mysql_query($sq2) or die(mysql_error());
                if (mysql_num_rows($query2)==1) {
                    header("location:addstaff.php?id=error");
                }
                else{
                    $sql = "INSERT INTO staffdetails(name, dob, gender, staff_id, staff_type, department,faculty, position, level, passport, phoneNo, email, address, password, leavestatus)
                                        VALUES('$name','$dob','$gender','$staff_id','$staffType','$department','$faculty','$position','$level','$passport','$phoneNo','$email','$address','$password','$leavestatus')";
                            $query = mysql_query($sql) or die(mysql_error());
     
                            if($query){
                  header("location:addstaff.php?id2=success");
                                
                    }
                  }
                }
  }


  if (isset($_POST['passportChange'])) { 
       // name of the uploaded file
   extract($_POST);
    $passport = $_FILES['passport']['name'];

    // destination of the file on the server
    $destination = 'img/' . $passport;

    // get the file extension
    $extension = pathinfo($passport, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['passport']['tmp_name'];

     if (!in_array($extension, ['jpg', 'png', 'jpeg'])) {
        echo "Your file extension must be .JPG, .PNG or .JPEG";
    } elseif ($_FILES['passport']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        if (move_uploaded_file($file, $destination)) {
            $status ="rejected";
            $sql=mysql_query("UPDATE staffdetails SET passport = '$passport' WHERE staff_id = '$staff_id'") or die(mysql_error());
             if ($sql) {
                      header("location:userpage.php");
                  }    

                }
                else{echo "error";}
}
}

?>
