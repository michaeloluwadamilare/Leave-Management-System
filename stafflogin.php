<?php
 require_once 'session.php';
   
    require_once'app/connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | SLMS</title>

        <meta charset="UTF-8">

        <meta name="description" content="Student Performance Tracking System">
        <meta name="keywords" content="student,record,marks,chart">
        <meta name="author" content="Navendra Singh">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        
        <link rel="icon" type="image/png" href="img/favicon.png">

        <script src="js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </head>

<body>
    
    <!-- Navigation bar start here -------->

    <nav id="nav" class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    
                    <!-- Header left start -->
                    
                    <div class="navbar-left">
                        <div class="brandname smooth-scroll clearfix">

                            <!-- logo -->

                            <div class="logo smooth-scroll">
                                <a href="#banner"><img id="logo" src="img/SLMS.png" alt="SLMS"></a>
                            </div>

                            <!-- Brandname -->

                            <div class="site-name">
                                <a href="#banner">Staff Leave Management System</a>
                            </div>
                       </div>
                    </div>
                    
                    <!-- Header left Ends Here -->
                    
                </div>
                
                <div class=" col-sm-8 col-md-8 col-lg-8">
                    <div class="navbar-right clearfix">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span> 
                        </button>
                        
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                              <li class="active"><a href="#nav">Home</a></li>
                              <li><a href="#about">About SLMS</a></li>
                              <li><a href="#contact">Contact Us</a></li>
                              <li><a href="stafflogin.php"><span class='glyphicon glyphicon-log-in'></span>Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav> 
     <!-- Navigation bar Ends here -------->

<!------- student login section start here ------->

<div class="container-fluid admin_banner " id="banner">
     <div class="row">

         <div class="banner_cont col-xs-6  col-xs-offset-3 col-sm-4 col-sm-offset-4">

             <div class="well wellform">
                 <form method="post" action="login.php">
                     <h1 class="text-center">Staff Login</h1><hr>

                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="text" class="form-control form-control-lg input-lg" placeholder="Enter Username" name="username" required>
                    </fieldset>
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg" placeholder="Enter Password" name="password" required>
                    </fieldset>
                        <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Login</button>
                          <?php 
                    if (isset($_GET['id'])) {
                      echo '<div class="alert alert-danger">Oops ! incorrect login details</div>';
                    }
                   ?>
                    </form>
             </div>
         </div>

    </div>
</div>




<!--Main section start here  -->
    <section  id="about" class=" welcome">
        <div class="container">
            <div class="row" >
            
             <!-- Up icon -------->
                <div class="text-center">
                    <a href="#nav" title="To Top">
                        <span class="glyphicon glyphicon-chevron-up"></span>
                    </a>
                </div>
            
             <!-- Starting of about section -------->            
                <div class="col-md-12  welcome-cont space">
                    <h1 class="text-center">About <span >(SLMS)</span></h1>
                    <p class="text-center">A leave application website for Unilorin staff</p><hr>
                </div>
                
                <div class="row ">
                    <div class="col-md-6 space">
                        <img class="img-responsive" src="img/Unilorin.jpg">
                    </div>
                    
                    <div class="col-md-6 space">
                        <p>Staff Leave Management System is developed by Michael Oluwadamilare for Unilorin staffs. Staff leave data is stored by admin which is further cross checked by higher authorities. 
                        <p>This system provides an automated meduim through which HRM can handle staff leave with ease and less error prone.
                        <p>SLMS works seamlessly from administrator level to staff level. Key Point of SLMS are : </p>
                        <ul>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i>Application of leave by all staff</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> HR/Staff can track their leave using the website</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> Only Authentic login</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i>Report generation on staff leave</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </section>


         <!-- Footer section start here -------->
    
    <footer id="footer">
        <div class="section">
            <div class="container">
                <div class="text-center">
                    <a href="#nav" title="To Top">
                        <span class="glyphicon glyphicon-chevron-up"></span>
                    </a>
                </div>
                <h1 class="title text-center space" id="contact">Contact Us</h1><hr>
                <div class="row">
                    <div class="col-sm-12 space">
                        <div class="footer-content">
                            <p class="large">Feel free to get in touch with us for more information.</p>
                            <ul class="list-icons">
                                <li><i class="fa fa-map-marker pr-10"></i>Unilorin</li>
                                <li><i class="fa fa-phone pr-10"></i>08134603858</li>
                                <li><i class="fa fa-envelope-o pr-10">
                                </i><a href="http://www.darefelix3858gmail.com">darefelix3858@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="subfooter text-center footer">
            <a href="#nav" title="To Top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
            <p class="text-primary">&copy; Copyright Reserved | Developed and Design By <a href="#" >Michael Oluwadamilare</a></p>
        </div>
    </footer>
    
    <!-- Footer section Ends here -------->
    
</body>
</html>

	
	


