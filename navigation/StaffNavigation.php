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
    $sql ="SELECT * FROM leaveapplicationdetails WHERE appliedStaffId ='$staff_id' AND hrApproval =1 AND seen = 0";
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
         
   
     
    <li class="treeview">
      <a href="leaveapplication.php">
         <i class="fa fa-suitcase"></i>
          <span>Leave Application</span> 
      </a>
    </li>
    <li class="treeview">
      <a href="Unapproved.php">
         <i class="fa fa-suitcase"></i>
          <span>Unapproved Leave</span> 
      </a>
    </li>
    <li class="header">SETTINGS</li>
    <li><a data-toggle="modal" data-target="#formModal" href="#"><i class="fa fa-circle-o text-green"></i> 
      <span>Change Passport</span></a>
    </li>
    <li><a href="logout.php"><i class="fa fa-circle-o text-red"></i> 
      <span>Logout</span></a>
    </li>