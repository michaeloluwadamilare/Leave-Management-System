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
        <section class="content">
          <div class="row">
            <div class="col-md-12" style="font-weight: bolder;font-family: hobo std;">
              YOU CURRENTLY DO NOT HAVE ANY NOTIFICATION
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
 <?php include_once('navigation/DeanNavigation.php'); ?>/a>
  </li>'
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <form method="POST" action="process.php">
            <div class="col-md-12">
              <br><br>
              <table class="table table-bordered">
              <thead style="background-color:lightblue;">
                <tr>
                  <th>APPLIED DATE</th>
                  <th>STAFF NAME</th>
                  <th>STAFF ID</th>
                  <th>LEAVE TYPE</th>
                  <th>LEAVE BEGINS</th>
                  <th>LEAVE ENDS</th>
                  <th>STAND-IN STAFF</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM leaveapplicationdetails WHERE hrApproval = 1 AND appliedStaffId = '$staff_id' AND seen=0";
                $query = mysql_query($sql);

                while ($result = mysql_fetch_array($query)) {
                  $id = $result[4];
                  $sql1 = "SELECT * FROM leavetype where leaveTypeId = '$id'";
                  $query1 =mysql_query($sql1) or die(mysql_error());
                  $leave = mysql_fetch_array($query1);
                   echo '<tr>
                   <td>'.$result[3].'</td>
                   <td>'.$result[1].'</td>
                   <td>'.$result[2].'</td>
                   <td>'.$leave['leaveName'].'</td>
                   <td>'.$result[5].'</td>
                   <td>'.$result[6].'</td>
                   <td>'.$result[10].'</td>
                   </tr>';
                   
              ?>

              </tbody>
            </table>
            <div class="col-md-12" style="font-weight: bolder;font-family:verdana; color: green;">The above leave you applied for has been granted. Click the button to proceed<button class="btn btn-danger" name="proceed" value="<?php echo $result[0]; } ?>">Proceed</button></div>
            </div>
            </form>
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
        <section class="content">
          <div class="row">
            <form method="POST" action="process.php">
            <div class="col-md-12">
              <br><br>
              <table class="table table-bordered">
              <thead style="background-color:lightblue;">
                <tr>
                  <th>APPLIED DATE</th>
                  <th>STAFF NAME</th>
                  <th>STAFF ID</th>
                  <th>LEAVE TYPE</th>
                  <th>LEAVE BEGINS</th>
                  <th>LEAVE ENDS</th>
                  <th>STAND-IN STAFF</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM leaveapplicationdetails WHERE hrApproval = 1 AND appliedStaffId = '$staff_id' AND seen=0";
                $query = mysql_query($sql);

                while ($result = mysql_fetch_array($query)) {
                 $id = $result[4];
                  $sql1 = "SELECT * FROM leavetype where leaveTypeId = '$id'";
                  $query1 =mysql_query($sql1) or die(mysql_error());
                  $leave = mysql_fetch_array($query1);
                   echo '<tr>
                   <td>'.$result[3].'</td>
                   <td>'.$result[1].'</td>
                   <td>'.$result[2].'</td>
                   <td>'.$leave['leaveName'].'</td>
                   <td>'.$result[5].'</td>
                   <td>'.$result[6].'</td>
                   <td>'.$result[10].'</td>
                   </tr>';
                   
              ?>

              </tbody>
            </table>
            <div class="col-md-12" style="font-weight: bolder;font-family:verdana; color: green;">The above leave you applied for has been granted. Click the button to proceed<button class="btn btn-danger" name="proceed" value="<?php echo $result[0]; } ?>">Proceed</button></div>
            </div>
            </form>
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
        <section class="content">
          <div class="row">
            <form method="POST" action="process.php">
            <div class="col-md-12">
              <br><br>
              <table class="table table-bordered">
              <thead style="background-color:lightblue;">
                <tr>
                  <th>APPLIED DATE</th>
                  <th>STAFF NAME</th>
                  <th>STAFF ID</th>
                  <th>LEAVE TYPE</th>
                  <th>LEAVE BEGINS</th>
                  <th>LEAVE ENDS</th>
                  <th>STAND-IN STAFF</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM leaveapplicationdetails WHERE hrApproval = 1 AND appliedStaffId = '$staff_id' AND seen=0";
                $query = mysql_query($sql);

                while ($result = mysql_fetch_array($query)) {
                 $id = $result[4];
                  $sql1 = "SELECT * FROM leavetype where leaveTypeId = '$id'";
                  $query1 =mysql_query($sql1) or die(mysql_error());
                  $leave = mysql_fetch_array($query1);
                   echo '<tr>
                   <td>'.$result[3].'</td>
                   <td>'.$result[1].'</td>
                   <td>'.$result[2].'</td>
                   <td>'.$leave['leaveName'].'</td>
                   <td>'.$result[5].'</td>
                   <td>'.$result[6].'</td>
                   <td>'.$result[10].'</td>
                   </tr>';
                   
              ?>

              </tbody>
            </table>
            <div class="col-md-12" style="font-weight: bolder;font-family:verdana; color: green;">The above leave you applied for has been granted. Click the button to proceed<button class="btn btn-danger" name="proceed"  value="<?php echo $result[0]; } ?>">Proceed</button></div>
            </div>
            </form>
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

