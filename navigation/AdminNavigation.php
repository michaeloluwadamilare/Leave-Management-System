<li class="header">MAIN NAVIGATION</li>
           
    <li class="treeview">
      <a href="index.php">
        <i class="fa fa-home"></i>
        <span>Home</span>
      </a>
    </li>

    <li class="treeview">
      <a href="userpage.php">
         <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
          <span>User profile</span> 
      </a>
    </li>
     <?php
    extract($_SESSION);
    $sql ="SELECT * FROM leaveapplicationdetails WHERE appliedStaffId ='$staff_id' AND hrApproval =1 AND seen =0";
     $query=mysql_query($sql) or die(mysql_error());
     if (mysql_num_rows($query)==1) {
        ?>
        <?php
     
          $objLeaveApplication = new LeaveApplication();
              $result = $objLeaveApplication->getApprovalNotification();
              while($row = mysql_fetch_array($result))
              { 
              ?>
     <li class="treeview">
      <a href="approvalnotification.php">
         <i class="glyphicon glyphicon-bell" aria-hidden="true"></i>
          <span>Notification</span><span style="color:red"><?php if($row['COUNT(hrApproval)'] != 0){ ?>[ New <?php echo $row['COUNT(hrApproval)']; ?> ]<?php } ?></span>
      </a>
    </li>
    <?php
              }
              ?>      

     <?php
              }
              else{
                $sql ="SELECT * FROM rejected_leave_notification WHERE appliedStaffId ='$staff_id' AND status ='rejected' AND notStatus =0";
     $query=mysql_query($sql) or die(mysql_error());
     if (mysql_num_rows($query)==1) {
        ?>
   <?php
          $objLeaveApplication = new LeaveApplication();
              $result = $objLeaveApplication->getDisapprovalNotification();
              while($row = mysql_fetch_array($result))
              { 
              ?>
     <li class="treeview">
      <a href="rejectednotification.php">
         <i class="glyphicon glyphicon-bell" aria-hidden="true"></i>
          <span>Notification</span><span style="color:red"><?php if($row['COUNT(status)'] != 0){ ?>[ New <?php echo $row['COUNT(status)']; ?> ]<?php } ?></span>
      </a>
    </li>
    <?php
              } ?>      

     <?php
              }else{

              ?>
    <li class="treeview">
      <a href="notification.php">
         <i class="glyphicon glyphicon-bell" aria-hidden="true"></i>
          <span>Notification</span>
      </a>
    </li>      
              <?php
     }
   }
              ?> 
         
    <?php
              $objLeaveApplication = new LeaveApplication();
              $result = $objLeaveApplication->getForhrApproval();
              while($row = mysql_fetch_array($result))
              { 
              ?>
     <li class="treeview">
      <a href="leaveApplicant.php">
         <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
          <span>Leave Applicant</span><span style="color:red"><?php if($row['COUNT(deanApproval)'] != 0){ ?>[ New <?php echo $row['COUNT(deanApproval)']; ?> ]<?php } ?></span>
      </a>
    </li>
    <?php
              }
              ?>

    <li class="treeview">
      <a href="addDepartment.php">
         <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
          <span>Add Department</span>
      </a>
    </li>
    <li class="treeview">
      <a href="listDepartment.php">
         <i class="glyphicon glyphicon-th" aria-hidden="true"></i>
          <span>List Department</span> 
      </a>
    </li>
       <li class="treeview">
      <a href="addfaculty.php">
         <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
          <span>Add/Delete Faculty</span> 
      </a>
    </li>
       <li class="treeview">
      <a href="addDesignation.php">
         <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
          <span>Add/Delete Designation</span> 
      </a>
    </li>
    <li class="treeview">
      <a href="leaveDetail.php">
         <i class="glyphicon glyphicon-th" aria-hidden="true"></i>
          <span>Staff Leave Details</span> 
      </a>
    </li>
        <li class="treeview">
      <a href="addstaff.php">
         <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
          <span>Add Staff</span>
      </a>
    </li>
    <li class="treeview">
      <a href="liststaff.php">
         <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
          <span>List Staff</span>
      </a>
    </li>
    <li class="header">SETTINGS</li>
    <li><a data-toggle="modal" data-target="#formModal" href="#"><i class="fa fa-circle-o text-green"></i> 
      <span>Change Passport</span></a>
    </li>
  <li>
    <a href="logout.php"><i class="fa fa-circle-o text-red"></i> 
    <span>Logout</span></a>
  </li>