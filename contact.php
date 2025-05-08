<?php
  include('dbConnection.php');

  if(isset($_REQUEST['c_submit'])){
    // Checking for Empty Fields
    if(($_REQUEST['c_name'] == "") || ($_REQUEST['c_email'] == "") || ($_REQUEST['c_subject'] == "") || ($_REQUEST['c_message'] == "")){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    } else {
      $sql = "SELECT c_email FROM contact_tb WHERE c_email='".$_REQUEST['c_email']."'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Contacted !Try another email id </div>';
      } else {
        // Assigning User Values to Variable
        $c_name = $_REQUEST['c_name'];
        $c_email = $_REQUEST['c_email'];
        $c_subject = $_REQUEST['c_subject'];
        $c_message = $_REQUEST['c_message'];

        $sql = "INSERT INTO contact_tb(c_name, c_email, c_subject, c_message) VALUES ('$c_name','$c_email', '$c_subject', '$c_message')";
        if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Your feedback has been registered Succefully </div>';
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to send your feedback </div>';
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Services and Repairing Management</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link
        href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700'
        rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/icon-fonts.css">

    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <div id="wrapper">

        <div id="pre-loader" class="loader-container">
            <div class="loader">
                <img src="images/main/preloader.webp" alt="loader">
            </div>
        </div>
        <div class="w1">

        <header id="mt-header" class="style4">

<div class="mt-bottom-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">

                <div class="mt-logo"><a href="index.php" class="logo-main">Home Services</a></div>
                <nav id="nav">
                    <ul>
                        <li>
                            <a href="index.php">HOME</i></a>
                        </li>
                        <li>
                            <a href="#">SERVICES</i></a>
                        </li>                    
                        <li><a href="about.php">About</a></li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>

<span class="mt-side-over"></span>
</header>

            

            

            <main id="mt-main">

                <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
                    style="background-image: url(images/main/contact-1.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <h1>CONTACT</h1>
                                <nav class="breadcrumbs">
                                    <ul class="list-unstyled">
                                        <li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mt-contact-detail content-info wow fadeInUp" data-wow-delay="0.4s">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <div class="txt-wrap">
                                    <h2>Home Services</h2>
                                    <p>Home repair and maintenance are a range of tasks that keep a home <br> in good condition. Home repairs fix problems like a broken window, <br> leaking pipe, or malfunctioning electrical outlet. </p>
                                </div>
                                <ul class="list-unstyled contact-txt">
                                    <li>
                                        <strong>Address</strong>
                                        <address>S-19 Raj Arcade, Vesu, Surat <br>Gujarat</address>
                                    </li>
                                    <li>
                                        <strong>Phone</strong>
                                        <a href="#">9123121354</a>
                                    </li>
                                    <li>
                                        <strong>E_mail</strong>
                                        <a href="#">homeservices@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <h2>Have a question?</h2>

                                <form action=" " class="contact-form" method="post">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Name" name="c_name">
                                        <input type="email" class="form-control" placeholder="E-Mail" name="c_email">
                                        <input type="text" class="form-control" placeholder="Subject" name="c_subject">
                                        <textarea class="form-control" placeholder="Message" name="c_message"></textarea>
                                        <button class="btn-type3" type="submit" name="c_submit">Send</button>
                                    </fieldset>
                                    <?php if(isset($regmsg)) {echo $regmsg; } ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </section>

                <!-- <div class="mt-map-holder wow fadeInUp" data-wow-delay="0.4s" data-lat="52.392363" data-lng="1.480408"
                    data-zoom="8">
                    <div class="map-logo">
                        <a href="#"><img src="images/map-logo.png" alt="home services"></a>
                    </div>
                </div> -->
                <div class="map-1 text-center" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14885.33741420262!2d72.77000084999999!3d21.139088249999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be05276ea0507ad%3A0x73c16cff225b784!2sVesu%2C%20Surat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1725592576219!5m2!1sen!2sin" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </main>

            <footer id="mt-footer" class="montserrat style6 wow fadeInUp" data-wow-delay="0.4s">

                <div class="footer-holder">
                    <div class="container">
                        <div class="row">
                            <nav class="col-xs-12 col-sm-8">

                                <div class="nav-widget-1 f-nav">
                                    <h3 class="f-widget-heading heading">Services</h3>
                                    <ul class="list-unstyled f-widget-nav">
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">AC</a></li>
										<li><a href="#">Washing Machine</a></li>
										<li><a href="#">Water Purifier</a></li>
										<li><a href="#">Refrigerator</a></li>
										<li><a href="#">Microwave</a></li>
										<li><a href="#">Wiring</a></li>
										<li><a href="#">Cleaning</a></li>
                                    </ul>
                                </div>


                                <div class="nav-widget-1 f-nav">
                                    <h3 class="f-widget-heading heading">CUSTOMER</h3>
                                    <ul class="list-unstyled f-widget-nav">
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Repair Center</a></li>
                                    </ul>
                                </div>


                                <div class="nav-widget-1 f-nav">
                                    <h3 class="f-widget-heading heading">PAGES</h3>
                                    <ul class="list-unstyled f-widget-nav">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">SERVICES</a></li>
                                        <li>< href="#">BLOG</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Terms</a></li>
                                    </ul>
                                </div>


                                <div class="nav-widget-1 f-nav">
                                    <h3 class="f-widget-heading heading">SOCIALS</h3>
                                    <ul class="list-unstyled f-widget-nav">
                                        <li><a href="#">twitter</a></li>
                                        <li><a href="#">facebook</a></li>
                                        <li><a href="#">google+</a></li>
                                        <li><a href="#">pinterest</a></li>
                                    </ul>
                                </div>

                            </nav>
                            <div class="col-xs-12 col-sm-4 text-right">

                                <div class="f-widget-about">
                                    <div class="logo" style="margin-bottom:29px;">
                                        <a href="#" class="logo-main" style="font-size:14px;color:black;">Home Services</a>
                                    </div>
                                    <ul class="list-unstyled address-list align-right">
                                    <li><i class="fa fa-map-marker"></i>
											<address>S-19 Raj Arcade, Vesu, Surat <br>Gujarat</address>
										</li>
										<li><i class="fa fa-phone"></i><a href="tel:9123121354">9123121354</a>
										</li>
										<li><i class="fa fa-envelope-o"></i><a
												href="#">homeservices@gmail.com</a>
										</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="footer-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <div class="bank-card-2 align-center copy-right">
                                    <img src="images/bank-card2.png" alt="bank-card">
                                </div>
                                <p>Copyright <a href="index.html">Home Services</a>. All right recerved</p>
                            </div>
                        </div>
                    </div>
                </div>

            </footer>

        </div>
        <span id="back-top" class="fa fa-arrow-up"></span>
    </div>

    <script src="js/jquery.js"></script>

    <script src="js/plugins.js"></script>

    <script src="js/jquery.main.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
</body>


</html>