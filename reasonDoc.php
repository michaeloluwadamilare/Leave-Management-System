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
     <link href="app/assets/css/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
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
            <?php include_once('navigation/AdminNavigation.php'); ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header" style="text-align: center; font-size: 25px; "><b></b></section>
        <section class="content">
           <form method="post" action="applyScript.php" enctype="multipart/form-data">
            <div class="row">
               
              <div class="col-md-10">
                <div class="form-group">
                  <?php
                    extract($_GET);
                  ?>
                  <marquee  style="color: blue;">UPLOAD A DOCUMENT CONTAINING REASONS FOR REJECTING LEAVE!!!</marquee>
                  <label class="control-label col-md-5">Upload Document For Leave Rejection <span style="color: red">(*Optional)</span></label>
                  <div class="col-md-7">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                          <span class="btn btn-file btn-info">
                              <span class="fileupload-new">Select file</span>
                              <span class="fileupload-exists">Change</span>
                              <input type="file" name="myfile"/>
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
                    <label for="limiter" class="control-label col-md-3">Reason for leave rejection</label>

                    <div class="col-md-8">
                        <textarea id="limiter" class="form-control" name="textReason"></textarea>
                    </div>
                </div>
              <div class="form-group col-md-12">
                <br><center><button class="btn btn-danger" name="Send" value="<?php extract($_GET); echo $id;?>">Send</button></center>
              </div>
          </div>
           </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
      
      </footer>

</div><!-- ./wrapper -->
<?php include_once('modal/change_passport.php'); ?>
<?php include_once('script.php'); 
extract($_GET);
$sql3=mysql_query("DELETE FROM leaveapplicationdetails WHERE leaveApplicationId = '$leaveApplicationId'");

?>
  
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

    <link href="app/assets/css/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
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
            <?php include_once('navigation/DeanNavigation.php'); ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="text-align: center; font-size: 25px; "><b></b></section>
        <section class="content">
           <form method="post" action="applyScript.php" enctype="multipart/form-data">
            <div class="row">
               
              <div class="col-md-10">
                <div class="form-group">
                  <?php
                    extract($_GET);
                  ?>
                  <marquee  style="color: blue;">UPLOAD A DOCUMENT CONTAINING REASONS FOR REJECTING LEAVE!!!</marquee>
                  <label class="control-label col-md-5">Upload Document For Leave Rejection <span style="color: red">(*Optional)</span></label>
                  <div class="col-md-7">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                          <span class="btn btn-file btn-info">
                              <span class="fileupload-new">Select file</span>
                              <span class="fileupload-exists">Change</span>
                              <input type="file" name="myfile"/>
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
                    <label for="limiter" class="control-label col-md-3">Reason for leave rejection</label>

                    <div class="col-md-8">
                        <textarea id="limiter" class="form-control" name="textReason"></textarea>
                    </div>
                </div>
              <div class="form-group col-md-12">
                <br><center><button class="btn btn-danger" name="Send" value="<?php extract($_GET); echo $id;?>">Send</button></center>
              </div>
          </div>
           </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
      
      </footer>

</div><!-- ./wrapper -->

<?php include_once('modal/change_passport.php'); ?>
<?php include_once('script.php');
extract($_GET);
$sql3=mysql_query("DELETE FROM leaveapplicationdetails WHERE leaveApplicationId = '$leaveApplicationId'");

 ?>
  
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

     <link href="app/assets/css/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
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
       
        <section class="content-header" style="text-align: center; font-size: 25px; "><b></b></section>
        <section class="content">
           <form method="post" action="applyScript.php" enctype="multipart/form-data">
            <div class="row">
               
              <div class="col-md-10">
                <div class="form-group">
                  <?php
                    extract($_GET);
                  ?>
                  <marquee  style="color: blue;">UPLOAD A DOCUMENT CONTAINING REASONS FOR REJECTING LEAVE!!!</marquee>
                  <label class="control-label col-md-5">Upload Document For Leave Rejection <span style="color: red">(*Optional)</span></label>
                  <div class="col-md-7">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                          <span class="btn btn-file btn-info">
                              <span class="fileupload-new">Select file</span>
                              <span class="fileupload-exists">Change</span>
                              <input type="file" name="myfile"/>
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
                    <label for="limiter" class="control-label col-md-3">Reason for leave rejection</label>

                    <div class="col-md-8">
                        <textarea id="limiter" class="form-control" name="textReason"></textarea>
                    </div>
                </div>
              <div class="form-group col-md-12">
                <br><center><button class="btn btn-danger" name="Send" value="<?php extract($_GET); echo $id;?>">Send</button></center>
              </div>
          </div>
           </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
      
      </footer>

</div><!-- ./wrapper -->

<?php include_once('modal/change_passport.php'); ?>
<?php include_once('script.php'); 
extract($_GET);
$sql3=mysql_query("DELETE FROM leaveapplicationdetails WHERE leaveApplicationId = '$leaveApplicationId'");

?>
  
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