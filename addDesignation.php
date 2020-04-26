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
        <section class="content-header" style="text-align: center; font-size: 25px; "><b>ADD DESIGNATION</b></section>
        <section class="content">
          
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <form method="post">
              <div class="form-group">
                 <label>Designation</label><input type="text" name="position" placeholder="Designation name" class="form-control" required>
              </div>
              <center><button class="btn btn-danger" name="addDesignation">ADD</button></center>
              <?php
              if (isset($_POST['addDesignation'])) {
                  extract($_POST);
                   $sql = "SELECT * FROM position WHERE position_name='$position'";
                  $query = mysql_query($sql) or die(mysql_error());
                  if (mysql_num_rows($query)==1) {
                     echo '<div class="alert alert-danger">Designation already exist</div>';   
                  }
                  else{
                  $sql = "INSERT INTO position(position_name)VALUES('$position')";
                  $query = mysql_query($sql) or die(mysql_error());
                    echo '<div class="alert alert-success">Designation added successfully</div>'; 
                  }
                                 
                }
             ?>
            </form>
            </div>
          
          </div><br><br>
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
              <form method="post" action="process.php">
              <section class="content-header" style="text-align: center; font-size: 25px; "><b>DELETE DESIGNATION</b></section>
               <table class="table table-bordered">
              <thead style="background-color:lightblue;">
                <tr>
                  
                  <th>DESIGNATION NAME</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM position";
                $query = mysql_query($sql) or die(mysql_error());

                while ($result = mysql_fetch_array($query)) {
                   echo '<tr>
                   
                   <td>'.$result[1].'</td>
                   <td><button class="btn btn-success" name="deleteDesignation" value="'.$result[0].'">Delete</button></td></tr>';
                            
                        }

                   
              ?>

              </tbody>
            </table>

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