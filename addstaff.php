 <?php
    require_once 'session.php';
    confirm_logged_in();
// require_once("LeaveApplicationModel.php");
include("process.php");


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
        <section class="content-header" style="text-align: center; font-size: 25px; "><b>ADD STAFF</b></section>
        <section class="content">
          <form method="post" action="process.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <?php 
                    if (isset($_GET['id'])) {
                     echo '<div class="alert alert-danger">Oops ! STAFF ALREADY EXIST</div>';
                    }
                   ?>
                     <?php 
                    if (isset($_GET['id2'])) {
                      extract($_SESSION);
                       echo '<div class="alert alert-success">STAFF ADDED SUCCESSFULLY.</div>';
                      
                    }
                   ?>
                 <div class="form-group">
                        <label class="control-label col-lg-4">Upload Passport</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file"  name="passport" required/></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label><input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Staff ID</label><input type="text" name="staff_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label><input type="date" name="dob" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <input type="radio" name="gender" value="male" required> Male
                      <input type="radio" name="gender" value="female" required> Female
                    </div>
                    <div class="form-group">
                        <label>Staff Type</label>
                        <select name="staffType" class="form-control">
                          <?php
                          $sql = "SELECT * FROM staff_type ";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['type'].'">' .$result['type']. '</option>';
                          }


                          ?>

                        </select>
                    </div>
                     <div class="form-group">
                        <label>Faculty</label>
                        <select name="faculty" class="form-control">
                          <?php
                          $sql = "SELECT * FROM faculty ";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['faculty_name'].'">' .$result['faculty_name']. '</option>';
                          }


                          ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <select name="department" class="form-control">
                          <?php
                          $sql = "SELECT * FROM department ";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['department'].'">' .$result['department']. '</option>';
                          }


                          ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select name="position" class="form-control">
                          <?php
                          $sql = "SELECT * FROM position ";
                          $query = mysql_query($sql);
                          while($result = mysql_fetch_array($query)){
                            echo '<option value = "'.$result['position_name'].'">' .$result['position_name']. '</option>';
                          }


                          ?>

                        </select>
                    </div>
                    <div class="form-group">
                      <label>Level:</label><br>
                      <input type="radio" name="level" required>level 0 <b>(NORMAL STAFF)</b><br>
                      <input type="radio" name="level" required> Level 1 <b>(FOR HOD)</b><br>
                      <input type="radio" name="level" required> Level 2 <b>(FOR DEAN)</b><br>
                      <input type="radio" name="level" required> Level 3 <b>(FOR ADMIN)</b>
                    </div>
                    <div class="form-group">
                      <label>Address</label><input type="text" name="address" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Phone Number</label><input type="text" name="phoneNo" class="form-control" required>
                  </div>
                  <div class="form-group">

                      <label>Email</label><input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="form-group">

                      <label>Password</label><input type="password" name="password" class="form-control" required>
                  </div>

                    <center><button class="btn btn-danger" name="add">ADD</button></center>
            
           
            </div>
            <div class="col-md-2"></div>
          </div>
        </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
      
      </footer>

</div><!-- ./wrapper -->

<?php include_once('modal/change_passport.php'); ?>
<?php include_once('script.php'); ?>
  
</body>

</html>
  
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