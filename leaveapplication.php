<?php
    require_once 'session.php';
    confirm_logged_in();
require_once("LeaveApplicationModel.php");
extract($_SESSION);
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
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
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
        <section class="content-header" style="text-align: center; font-size: 25px; "><b>LEAVE APPLICATION</b></section>
        <section class="content">
          <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-1"></div>
            <div class="col-md-5"></div>
          </div>
            <div class="row">
              
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
        <section class="content-header" style="text-align: center; font-size: 25px; "><b>LEAVE APPLICATION</b></section>
        <section class="content">
          <?php 
                    if (isset($_GET['id'])) {
                      echo '<div class="alert alert-success">Your leave application has been sent!</div>';
                    }
                   ?>
          <?php 
                    if (isset($_GET['id2'])) {
                      echo '<div class="alert alert-danger">Oops ! There is a problem applying for leave</div>';
                    }
                   ?>


         <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <form  method="post" action="applyScript.php" id="leave_form" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Staff Name</label><input type="text" value="<?php echo $name;?>" name="name" class="form-control" readonly>
                </div>
                <div class="form-group">
                <label>Staff ID</label><input type="text" value="<?php echo $staff_id;?>" name="staff_id" class="form-control" readonly> 
                </div>
                <div class="form-group">
                    <label>Email</label><input type="email" value="<?php echo $email;?>" name="email" class="form-control" readonly>
                </div>
                <div class="form-group">
                <input type="hidden" value="<?php echo $department ?>" name="department" class="form-control"> 
                </div> 
                <div class="form-group">
                <input type="hidden" value="<?php echo $faculty;?>" name="faculty" class="form-control"> 
                </div> 
                <div class="form-group">
                    <label>Leave Type</label>
                    <select name="leaveType" class="form-control">
                          <?php
                          $sql = "SELECT * FROM leaveType ";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['leaveTypeId'].'">' .$result['leaveName']. '</option>';
                          }


                          ?>
                      </select>
                </div>  
                <div class="form-group">
                  <marquee  style="color: blue;">UPLOAD A DOCUMENT CONTAINING LEAVE REASONS!!!</marquee>
                        <label class="control-label col-lg-5">Attach a document on reason for leave </label>
                  <div class="col-lg-7">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                          <span class="btn btn-file btn-info">
                              <span class="fileupload-new">Select file</span>
                              <span class="fileupload-exists">Change</span>
                              <input type="file" name="myfile" required />
                          </span> 
                          <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                          
                          <br /> <br />
                          <div class="col-lg-3">
                              <i class="icon-file fileupload-exists"></i>
                              <span class="fileupload-preview"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label>Date Leave Begins</label><input type="date" name="lBegins" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Leave Due Date</label><input type="date" name="lEnds" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label>Stand-In Staff</label>
                    <select name="standIn" class="form-control">
                          <?php
                          $sql = "SELECT * FROM staffdetails WHERE level <= 1 AND leavestatus ='$leavestatus' AND faculty ='$faculty' AND  staff_type ='$staff_type' AND staff_id != '$staff_id'";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['staff_id'].'">' .$result['name']. '</option>';
                          }

                          ?>
                      </select>
                </div>  
                <?php
                $date = date('y-m-d');
                
                // $staff_id = $_SESSION['staff_id'];
                $sql1 = "SELECT * FROM leaveapplicationdetails WHERE appliedStaffId ='$staff_id' AND leaveEnd >'$date'";
                $query1 =  mysql_query($sql1) or die(mysql_error());
                if (mysql_num_rows($query1)==1) {
                  echo '<div class="alert alert-danger">You have a pending leave. Therefore you cannot apply for leave</div>';
                }
                else{
                  $sql ="UPDATE staffdetails SET leavestatus = 0 WHERE staff_id ='$staff_id'";
                  $query = mysql_query($sql) or die(mysql_error());
                  if ($query) {
                    echo '<div><center><button class="btn btn-danger" name="apply2" value=>Apply</button></center></div>';
                  }
               
                }
                ?>
              </form>
            </div>
            <div class="col-md-2"></div>
          </div>
            <div class="row">
              
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
    <link rel="stylesheet" href="app/assets/css/MoneAdmin.css" />
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
        <section class="content-header" style="text-align: center; font-size: 25px; "><b>LEAVE APPLICATION</b></section>
        <section class="content">
          <?php 
                    if (isset($_GET['id'])) {
                      echo '<div class="alert alert-success">Your leave application has been sent!</div>';
                    }
                   ?>
          <?php 
                    if (isset($_GET['id2'])) {
                      echo '<div class="alert alert-danger">Oops ! There is a problem applying for leave</div>';
                    }
                   ?>


         <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <form  method="post" action="applyScript.php" id="leave_form" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Staff Name</label><input type="text" value="<?php echo $name;?>" name="name" class="form-control" readonly>
                </div>
                <div class="form-group">
                <label>Staff ID</label><input type="text" value="<?php echo $staff_id;?>" name="staff_id" class="form-control" readonly> 
                </div>
                <div class="form-group">
                    <label>Email</label><input type="email" value="<?php echo $email;?>" name="email" class="form-control" readonly>
                </div>
                <div class="form-group">
                <input type="hidden" value="<?php echo $department ?>" name="department" class="form-control"> 
                </div> 
                <div class="form-group">
                <input type="hidden" value="<?php echo $faculty;?>" name="faculty" class="form-control"> 
                </div> 
                <div class="form-group">
                    <label>Leave Type</label>
                    <select name="leaveType" class="form-control">
                          <?php
                          $sql = "SELECT * FROM leaveType ";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['leaveTypeId'].'">' .$result['leaveName']. '</option>';
                          }


                          ?>
                      </select>
                </div>  
                <div class="form-group">
                  <marquee  style="color: blue;">UPLOAD A DOCUMENT CONTAINING LEAVE REASONS!!!</marquee>
                         <label class="control-label col-lg-5">Attach a document on reason for leave </label>
                  <div class="col-lg-7">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                          <span class="btn btn-file btn-info">
                              <span class="fileupload-new">Select file</span>
                              <span class="fileupload-exists">Change</span>
                              <input type="file" name="myfile" required />
                          </span> 
                          <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                          
                          <br /> <br />
                          <div class="col-lg-3">
                              <i class="icon-file fileupload-exists"></i>
                              <span class="fileupload-preview"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label>Date Leave Begins</label><input type="date" name="lBegins" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Leave Due Date</label><input type="date" name="lEnds" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Stand-In Staff</label>
                    <select name="standIn" class="form-control">
                          <?php
                          $sql = "SELECT * FROM staffdetails WHERE leavestatus = 0 AND department ='$department' AND  staff_type ='$staff_type' AND staff_id != '$staff_id'";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['staff_id'].'">' .$result['name']. '</option>';
                          }

                          ?>
                      </select>
                </div>  
                <?php
                $date = date('y-m-d');
                
                // $staff_id = $_SESSION['staff_id'];
                $sql1 = "SELECT * FROM leaveapplicationdetails WHERE appliedStaffId ='$staff_id' AND leaveEnd >'$date'";
                $query1 =  mysql_query($sql1) or die(mysql_error());
                if (mysql_num_rows($query1)==1) {
                  echo '<div class="alert alert-danger">You have a pending leave. Therefore you cannot apply for leave</div>';
                }
                else{
                  $sql ="UPDATE staffdetails SET leavestatus = 0 WHERE staff_id ='$staff_id'";
                  $query = mysql_query($sql) or die(mysql_error());
                  if ($query) {
                    echo '<div><center><button class="btn btn-danger" name="apply1" value=>Apply</button></center></div>';
                  }
               
                }
                ?>
              </form>
            </div>
            <div class="col-md-2"></div>
          </div>
            <div class="row">
              
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
    <link rel="stylesheet" href="app/assets/css/MoneAdmin.css" />
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
            <?php include_once('navigation/StaffNavigation.php'); ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="text-align: center; font-size: 25px; "><b>LEAVE APPLICATION</b></section>
        <section class="content">
          <?php 
                    if (isset($_GET['id'])) {
                      echo '<div class="alert alert-success">Your leave application has been sent!</div>';
                    }
                   ?>
          <?php 
                    if (isset($_GET['id2'])) {
                      echo '<div class="alert alert-danger">Oops ! There is a problem applying for leave</div>';
                    }
                   ?>


         <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <form  method="post" action="applyScript.php" id="leave_form" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Staff Name</label><input type="text" value="<?php echo $name;?>" name="name" class="form-control" readonly>
                </div>
                <div class="form-group">
                <label>Staff ID</label><input type="text" value="<?php echo $staff_id;?>" name="staff_id" class="form-control" readonly> 
                </div>
                <div class="form-group">
                    <label>Email</label><input type="email" value="<?php echo $email;?>" name="email" class="form-control" readonly>
                </div>
                <div class="form-group">
                <input type="hidden" value="<?php echo $department ?>" name="department" class="form-control"> 
                </div> 
                <div class="form-group">
                <input type="hidden" value="<?php echo $faculty;?>" name="faculty" class="form-control"> 
                </div> 
                <div class="form-group">
                    <label>Leave Type</label>
                    <select name="leaveType" class="form-control">
                          <?php
                          $sql = "SELECT * FROM leaveType ";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['leaveTypeId'].'">' .$result['leaveName']. '</option>';
                          }


                          ?>
                      </select>
                </div>  
                <div class="form-group">
                  <marquee  style="color: blue;">UPLOAD A DOCUMENT CONTAINING LEAVE REASONS!!!</marquee>
                        <label class="control-label col-lg-5">Attach a document on reason for leave </label>
                  <div class="col-lg-7">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                          <span class="btn btn-file btn-info">
                              <span class="fileupload-new">Select file</span>
                              <span class="fileupload-exists">Change</span>
                              <input type="file" name="myfile" required />
                          </span> 
                          <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                          
                          <br /> <br />
                          <div class="col-lg-3">
                              <i class="icon-file fileupload-exists"></i>
                              <span class="fileupload-preview"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label>Date Leave Begins</label><input type="date" name="lBegins" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Leave Due Date</label><input type="date" name="lEnds" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Stand-In Staff</label>
                    <select name="standIn" class="form-control">
                          <?php
                          $sql = "SELECT * FROM staffdetails WHERE leavestatus ='$leavestatus' AND department ='$department' AND  staff_type ='$staff_type' AND staff_id != '$staff_id'";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['staff_id'].'">' .$result['name']. '</option>';
                          }

                          ?>
                      </select>
                </div>  
                <?php
                $date = date('y-m-d');
                
                // $staff_id = $_SESSION['staff_id'];
                $sql1 = "SELECT * FROM leaveapplicationdetails WHERE appliedStaffId ='$staff_id' AND leaveEnd >'$date'";
                $query1 =  mysql_query($sql1) or die(mysql_error());
                if (mysql_num_rows($query1)==1) {
                  echo '<div class="alert alert-danger">You have a pending leave. Therefore you cannot apply for leave</div>';
                }
                else{
                  $sql ="UPDATE staffdetails SET leavestatus = 0 WHERE staff_id ='$staff_id'";
                  $query = mysql_query($sql) or die(mysql_error());
                  if ($query) {
                    echo '<div><center><button class="btn btn-danger" name="apply" value=>Apply</button></center></div>';
                  }
               
                }
                ?>
                
              </form>
            </div>
            <div class="col-md-2"></div>
          </div>
            <div class="row">
              
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
