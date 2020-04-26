<?php
    require_once 'session.php';
    confirm_logged_in();
     include("LeaveApplicationModel.php");
  if(isset($_SESSION['staff_id']))
  {
  
  if ($_SESSION['level'] == 3)
  {
?>

<!DOCTYPE html>
<html>
  <head>
    <title>SLMS</title>
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="app/assets/css/font-awesome.css">
    <link rel="stylesheet" href="app/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="app/dist/css/skins/_all-skins.min.css">
    <link href="app/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="app/assets/plugins/magic/magic.css" />
    <link rel="stylesheet" href="app/assets/css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="app/assets/css/main.css" />
    <link rel="stylesheet" href="app/assets/css/theme.css" />
<style type="text/css">
  body{
    background: lightblue;
  }
</style>
  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SLMS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SLMS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <div class="col-md-3"><a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a></div>
           <div class="col-md-9 col-sm-0"><span class="logo-lg" style="font-size: 25px; font-weight: bolder; color: #FFF; ">STAFF LEAVE MANAGEMENT SYSTEM</span></div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <?php include_once('navigation/AdminNavigation.php'); ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="text-align: center; font-size: 25px; "><b> USER PROFILE</b></section>
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <span style="color: red;">
             <?php
                  $objLeaveApplication = new LeaveApplication();
                  $livHistory = $objLeaveApplication->getAllleaveHistory();
                  while($historyForLeave = mysql_fetch_array($livHistory))
                  {
                    echo "<br/><span style='color:#DAA520;' class='glyphicon glyphicon-bell'></span> You were on Leave from <b style='color:#DAA520;'>".$historyForLeave['leaveStart']."</b> To <b style='color:#DAA520;'>".$historyForLeave['leaveEnd']."</b>. Total <b style='color:#DAA520;'>".$historyForLeave['totalLeaveDays']."</b> Days.<br/>";
                  }
              ?>
            </span>
              <div class="row bg-primary">
                <div class="col-md-4">
                  <?php
                  $sql = 'SELECT * FROM staffdetails WHERE staff_id = "'.$_SESSION['staff_id'].'"';
                  $query = mysql_query($sql) or die(mysql_error());
                   if(mysql_num_rows($query)==1) {
                    $result = mysql_fetch_array($query);
                  ?>
                   <?php
              
                  echo '<img class="img-circle img-responsive" src="img/'.$result['passport'].'"width="150" height="100"/>';
                  ?>
                </div>
                <div class="col-md-8" style="text-transform:uppercase; color: white; font-family: cursive; font-size: 18px;">
                      <br>
                      <?php
                  echo $result['name']."<br>";
                  echo $result['staff_id'];
                      ?>
                 </div>
              </div>
                <table class="table table-striped">
                  <tr>
                    <th class="bg-primary">Department</th>
                    <td><?php echo $result['department']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Position</th>
                    <td><?php echo $result['position']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Gender</th>
                    <td><?php echo $result['gender']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Date of Birth</th>
                    <td><?php echo $result['dob']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Email</th>
                    <td><?php echo $result['email']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Phone number</th>
                    <td><?php echo $result['phoneNo']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Address</th>
                    <td><?php echo $result['address']; ?></td>
                  </tr>
                </table> 
                <?php
              } ?> 
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <h3 style="text-align: center; font-family: cursive;"><b>Update Details</b></h3>
                <form method="post" action="process.php">
                  <?php
                  $sql = 'SELECT * FROM staffdetails WHERE staff_id = "'.$_SESSION['staff_id'].'"';
                  $query = mysql_query($sql) or die(mysql_error());
                   if(mysql_num_rows($query)==1) {
                    $result = mysql_fetch_array($query);
                  ?>
                  <div class="form-group">
                    <label>Phone Number</label><input type="text" name="phoneNo" value="<?php echo $result['phoneNo']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label><input type="text" name="address" value="<?php echo $result['address']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label><input type="email" name="email" value="<?php echo $result['email']; ?>" class="form-control"required>
                  </div>
                  <div class="form-group">
                    <label>New Password</label><input type="Password" name="password" value="<?php echo $result['password']; ?>" class="form-control" required>
                  </div>
                  <center><button class="btn btn-danger" name="update">Update</button></center>
                  <?php
                    }
                  ?>
                  <?php 
                    if (isset($_GET['id'])) {
                      echo '<div class="alert alert-success">Details Updated successfully!</div>';
                    }
                   ?>
                </form>
              </div>
            </div>    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
      
      </footer>

</div><!-- ./wrapper -->
<?php include_once('modal/change_passport.php'); ?>
<?php include_once('script.php'); ?>
  
</body>

</html>
<?php

  }
  elseif ($_SESSION['level'] == 2)
  {
    ?>
    <!DOCTYPE html>
<html>
  <head>
    <title>SLMS</title>
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="app/assets/css/font-awesome.css">
    <link rel="stylesheet" href="app/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="app/dist/css/skins/_all-skins.min.css">
    <link href="app/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="app/assets/plugins/magic/magic.css" />
    <link rel="stylesheet" href="app/assets/css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="app/assets/css/main.css" />
    <link rel="stylesheet" href="app/assets/css/theme.css" />
<style type="text/css">
  body{
    background: lightblue;
  }
</style>
  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SLMS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SLMS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <div class="col-md-3"><a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a></div>
           <div class="col-md-9 col-sm-0"><span class="logo-lg" style="font-size: 25px; font-weight: bolder; color: #FFF; ">STAFF LEAVE MANAGEMENT SYSTEM</span></div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <?php include_once('navigation/DeanNavigation.php'); ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 
 

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="text-align: center; font-size: 25px; "><b> USER PROFILE</b></section>
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <span style="color: red;">
             <?php
                  $objLeaveApplication = new LeaveApplication();
                  $livHistory = $objLeaveApplication->getAllleaveHistory();
                  while($historyForLeave = mysql_fetch_array($livHistory))
                  {
                    echo "<br/><span style='color:#DAA520;' class='glyphicon glyphicon-bell'></span> You were on Leave from <b style='color:#DAA520;'>".$historyForLeave['leaveStart']."</b> To <b style='color:#DAA520;'>".$historyForLeave['leaveEnd']."</b>. Total <b style='color:#DAA520;'>".$historyForLeave['totalLeaveDays']."</b> Days.<br/>";
                  }
              ?>
            </span>
              <div class="row bg-primary">
                <div class="col-md-4">
                  <?php
                  $sql = 'SELECT * FROM staffdetails WHERE staff_id = "'.$_SESSION['staff_id'].'"';
                  $query = mysql_query($sql) or die(mysql_error());
                   if(mysql_num_rows($query)==1) {
                    $result = mysql_fetch_array($query);
                  ?>
                   <?php
              
                  echo '<img class="img-circle img-responsive" src="img/'.$result['passport'].'"width="150" height="100"/>';
                  ?>
                </div>
                <div class="col-md-8" style="text-transform:uppercase; color: white; font-family: cursive; font-size: 18px;">
                      <br>
                      <?php
                  echo $result['name']."<br>";
                  echo $result['staff_id'];
                      ?>
                 </div>
              </div>
                <table class="table table-striped">
                  <tr>
                    <th class="bg-primary">Department</th>
                    <td><?php echo $result['department']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Position</th>
                    <td><?php echo $result['position']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Gender</th>
                    <td><?php echo $result['gender']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Date of Birth</th>
                    <td><?php echo $result['dob']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Email</th>
                    <td><?php echo $result['email']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Phone number</th>
                    <td><?php echo $result['phoneNo']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Address</th>
                    <td><?php echo $result['address']; ?></td>
                  </tr>
                </table> 
                <?php
              } ?> 
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <h3 style="text-align: center; font-family: cursive;"><b>Update Details</b></h3>
                <form method="post" action="process.php">
                  <?php
                  $sql = 'SELECT * FROM staffdetails WHERE staff_id = "'.$_SESSION['staff_id'].'"';
                  $query = mysql_query($sql) or die(mysql_error());
                   if(mysql_num_rows($query)==1) {
                    $result = mysql_fetch_array($query);
                  ?>
                  <div class="form-group">
                    <label>Phone Number</label><input type="text" name="phoneNo" value="<?php echo $result['phoneNo']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label><input type="text" name="address" value="<?php echo $result['address']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label><input type="email" name="email" value="<?php echo $result['email']; ?>" class="form-control"required>
                  </div>
                  <div class="form-group">
                    <label>New Password</label><input type="Password" name="password" value="<?php echo $result['password']; ?>" class="form-control" required>
                  </div>
                  <center><button class="btn btn-danger" name="update">Update</button></center>
                  <?php
                    }
                  ?>
                  <?php 
                    if (isset($_GET['id'])) {
                      echo '<div class="alert alert-success">Details Updated successfully!</div>';
                    }
                   ?>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  
                    <table class="table table-bordered table-hover table-striped">
                    
                      <thead>
                      
                        <tr class="success">
                          <th>Leave Name</th>
                          <th>CL</th>
                          <th>AL</th>
                          <th>SL</th>
                          <th>ML</th>
                          <th>SBL</th>
                          <th>Total</th>
                        </tr>
                        
                      </thead>
                      
                                            <tbody>
                        
                        <tr>
                          <td>Total Leave Days Entitled To</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        <tr>
                          <td>Leave Balance</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        <tr>
                          <td>Leave Requested For</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    
                  </div>
              </div>
            </div>    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
      
      </footer>

</div><!-- ./wrapper -->
<?php include_once('modal/change_passport.php'); ?>
<?php include_once('script.php'); ?>
  
</body>

</html>
<?php

  }
  elseif ($_SESSION['level'] == 1)
  {
    ?>
        <!DOCTYPE html>
<html>
  <head>
    <title>SLMS</title>
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="app/assets/css/font-awesome.css">
    <link rel="stylesheet" href="app/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="app/dist/css/skins/_all-skins.min.css">
    <link href="app/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="app/assets/plugins/magic/magic.css" />
    <link rel="stylesheet" href="app/assets/css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="app/assets/css/main.css" />
    <link rel="stylesheet" href="app/assets/css/theme.css" />
<style type="text/css">
  body{
    background: lightblue;
  }
</style>
  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SLMS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SLMS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <div class="col-md-3"><a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a></div>
           <div class="col-md-9 col-sm-0"><span class="logo-lg" style="font-size: 25px; font-weight: bolder; color: #FFF; ">STAFF LEAVE MANAGEMENT SYSTEM</span></div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <?php include_once('navigation/HodNavigation.php'); ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="text-align: center; font-size: 25px; "><b> USER PROFILE</b></section>
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <span style="color: red;">
              <?php
                  $objLeaveApplication = new LeaveApplication();
                  $livHistory = $objLeaveApplication->getAllleaveHistory();
                  while($historyForLeave = mysql_fetch_array($livHistory))
                  {
                    echo "<br/><span style='color:#DAA520;' class='glyphicon glyphicon-bell'></span> You were on Leave from <b style='color:#DAA520;'>".$historyForLeave['leaveStart']."</b> To <b style='color:#DAA520;'>".$historyForLeave['leaveEnd']."</b>. Total <b style='color:#DAA520;'>".$historyForLeave['totalLeaveDays']."</b> Days.<br/>";
                  }
              ?>
            </span>
              <div class="row bg-primary">
                <div class="col-md-4">
                  <?php
                  $sql = 'SELECT * FROM staffdetails WHERE staff_id = "'.$_SESSION['staff_id'].'"';
                  $query = mysql_query($sql) or die(mysql_error());
                   if(mysql_num_rows($query)==1) {
                    $result = mysql_fetch_array($query);
                  ?>
                   <?php
              
                  echo '<img class="img-circle img-responsive" src="img/'.$result['passport'].'"width="150" height="100"/>';
                  ?>
                </div>
                <div class="col-md-8" style="text-transform:uppercase; color: white; font-family: cursive; font-size: 18px;">
                      <br>
                      <?php
                  echo $result['name']."<br>";
                  echo $result['staff_id'];
                      ?>
                 </div>
              </div>
                <table class="table table-striped">
                  <tr>
                    <th class="bg-primary">Department</th>
                    <td><?php echo $result['department']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Position</th>
                    <td><?php echo $result['position']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Gender</th>
                    <td><?php echo $result['gender']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Date of Birth</th>
                    <td><?php echo $result['dob']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Email</th>
                    <td><?php echo $result['email']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Phone number</th>
                    <td><?php echo $result['phoneNo']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Address</th>
                    <td><?php echo $result['address']; ?></td>
                  </tr>
                </table> 
                <?php
              } ?> 
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <h3 style="text-align: center; font-family: cursive;"><b>Update Details</b></h3>
                <form method="post" action="process.php">
                  <?php
                  $sql = 'SELECT * FROM staffdetails WHERE staff_id = "'.$_SESSION['staff_id'].'"';
                  $query = mysql_query($sql) or die(mysql_error());
                   if(mysql_num_rows($query)==1) {
                    $result = mysql_fetch_array($query);
                  ?>
                  <div class="form-group">
                    <label>Phone Number</label><input type="text" name="phoneNo" value="<?php echo $result['phoneNo']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label><input type="text" name="address" value="<?php echo $result['address']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label><input type="email" name="email" value="<?php echo $result['email']; ?>" class="form-control"required>
                  </div>
                  <div class="form-group">
                    <label>New Password</label><input type="Password" name="password" value="<?php echo $result['password']; ?>" class="form-control" required>
                  </div>
                  <center><button class="btn btn-danger" name="update">Update</button></center>
                  <?php
                    }
                  ?>
                  <?php 
                    if (isset($_GET['id'])) {
                      echo '<div class="alert alert-success">Details Updated successfully!</div>';
                    }
                   ?>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  
                    <table class="table table-bordered table-hover table-striped">
                    
                      <thead>
                      
                        <tr class="success">
                          <th>Leave Name</th>
                          <th>CL</th>
                          <th>AL</th>
                          <th>SL</th>
                          <th>ML</th>
                          <th>SBL</th>
                          <th>Total</th>
                        </tr>
                        
                      </thead>
                      
                                            <tbody>
                        
                        <tr>
                          <td>Total Leave Days Entitled To</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        <tr>
                          <td>Leave Balance</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        <tr>
                          <td>Leave Requested For</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    
                  </div>
              </div>
            </div>    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
      
      </footer>

</div><!-- ./wrapper -->
<?php include_once('modal/change_passport.php'); ?>
<?php include_once('script.php'); ?>
  
</body>

</html>
<?php

  }
  elseif ($_SESSION['level'] == 0)
  {
    ?>
            <!DOCTYPE html>
<html>
  <head>
    <title>SLMS</title>
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="app/assets/css/font-awesome.css">
    <link rel="stylesheet" href="app/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="app/dist/css/skins/_all-skins.min.css">
    <link href="app/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="app/assets/plugins/magic/magic.css" />
    <link rel="stylesheet" href="app/assets/css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="app/assets/css/main.css" />
    <link rel="stylesheet" href="app/assets/css/theme.css" />
<style type="text/css">
  body{
    background: lightblue;
  }
</style>
  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SLMS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SLMS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <div class="col-md-3"><a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a></div>
           <div class="col-md-9 col-sm-0"><span class="logo-lg" style="font-size: 25px; font-weight: bolder; color: #FFF; ">STAFF LEAVE MANAGEMENT SYSTEM</span></div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" >
            <?php include_once('navigation/StaffNavigation.php'); ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="text-align: center; font-size: 25px; "><b> USER PROFILE</b></section>
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <span style="color: red;">
              <?php
                  $objLeaveApplication = new LeaveApplication();
                  $livHistory = $objLeaveApplication->getAllleaveHistory();
                  while($historyForLeave = mysql_fetch_array($livHistory))
                  {
                    echo "<br/><span style='color:#DAA520;' class='glyphicon glyphicon-bell'></span> You were on Leave from <b style='color:#DAA520;'>".$historyForLeave['leaveStart']."</b> To <b style='color:#DAA520;'>".$historyForLeave['leaveEnd']."</b>. Total <b style='color:#DAA520;'>".$historyForLeave['totalLeaveDays']."</b> Days.<br/>";
                  }
              ?>
            </span>
              <div class="row bg-primary">
                <div class="col-md-4">
                  <?php
                  $sql = 'SELECT * FROM staffdetails WHERE staff_id = "'.$_SESSION['staff_id'].'"';
                  $query = mysql_query($sql) or die(mysql_error());
                   if(mysql_num_rows($query)==1) {
                    $result = mysql_fetch_array($query);
                  ?>
                   <?php
              
                  echo '<img class="img-circle img-responsive" src="img/'.$result['passport'].'"width="150" height="100"/>';
                  ?>
                </div>
                <div class="col-md-8" style="text-transform:uppercase; color: white; font-family: cursive; font-size: 18px;">
                      <br>
                      <?php
                  echo $result['name']."<br>";
                  echo $result['staff_id'];
                      ?>
                 </div>
              </div>
                 
                <table class="table table-striped">
                  <tr>
                    <th class="bg-primary">Department</th>
                    <td><?php echo $result['department']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Position</th>
                    <td><?php echo $result['position']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Gender</th>
                    <td><?php echo $result['gender']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Date of Birth</th>
                    <td><?php echo $result['dob']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Email</th>
                    <td><?php echo $result['email']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Phone number</th>
                    <td><?php echo $result['phoneNo']; ?></td>
                  </tr>
                  <tr>
                    <th class="bg-primary">Address</th>
                    <td><?php echo $result['address']; ?></td>
                  </tr>
                </table> 
                <?php
              } ?> 
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <h3 style="text-align: center; font-family: cursive;"><b>Update Details</b></h3>
                <form method="post" action="process.php">
                  <?php
                  $sql = 'SELECT * FROM staffdetails WHERE staff_id = "'.$_SESSION['staff_id'].'"';
                  $query = mysql_query($sql) or die(mysql_error());
                   if(mysql_num_rows($query)==1) {
                    $result = mysql_fetch_array($query);
                  ?>
                  
                  <div class="form-group">
                    <label>Phone Number</label><input type="text" name="phoneNo" value="<?php echo $result['phoneNo']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label><input type="text" name="address" value="<?php echo $result['address']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label><input type="email" name="email" value="<?php echo $result['email']; ?>" class="form-control"required>
                  </div>
                  <div class="form-group">
                    <label>New Password</label><input type="Password" name="password" value="<?php echo $result['password']; ?>" class="form-control" required>
                  </div>
                  <center><button class="btn btn-danger" name="update">Update</button></center>
                  <?php
                    }
                  ?>
                  <?php 
                    if (isset($_GET['id'])) {
                      echo '<div class="alert alert-success">Details Updated successfully!</div>';
                    }
                   ?>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  
                    <table class="table table-bordered table-hover table-striped">
                    
                      <thead>
                      
                        <tr class="success">
                          <th>Leave Name</th>
                          <th>CL</th>
                          <th>AL</th>
                          <th>SL</th>
                          <th>ML</th>
                          <th>SBL</th>
                          <th>Total</th>
                        </tr>
                        
                      </thead>
                      
                      <tbody>
                        
                        <tr>
                          <td>Total Leave Days Entitled To</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveDays($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        <tr>
                          <td>Leave Balance</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        <tr>
                          <td>Leave Requested For</td>
                          <?php
                          $livLeaveIdForCl = 1;
                          $objLeaveApplication = new leaveapplication();
                          $result1 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result1; ?></td>
                          <?php
                          $livLeaveIdForCl = 2;
                          $objLeaveApplication = new leaveapplication();
                          $result2 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result2; ?></td>
                          <?php
                          $livLeaveIdForCl = 3;
                          $objLeaveApplication = new leaveapplication();
                          $result3 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result3; ?></td>
                          <?php
                          $livLeaveIdForCl = 4;
                          $objLeaveApplication = new leaveapplication();
                          $result4 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result4; ?></td>
                          <?php
                          $livLeaveIdForCl = 5;
                          $objLeaveApplication = new leaveapplication();
                          $result5 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
                          ?>
                          <td><?php echo $result5; ?></td>
                          <td><?php echo $result1+$result2+$result3+$result4+$result5; ?></td>
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    
                  </div>
              </div>
                
            </div>    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
      
      </footer>

</div><!-- ./wrapper -->

<?php include_once('modal/change_passport.php'); ?>
<?php include_once('script.php'); ?>
  
</body>

</html>
<?php
  }
  }
  else
  {
   header("Location: stafflogin.php?id=error");
  }

?>
