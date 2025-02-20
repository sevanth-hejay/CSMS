<!-- Top Menu 1 -->
<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>
<section class="w3l-top-menu-1">
    <div class="top-hd">
        <div class="container">
    <header class="row top-menu-top">
        <div class="accounts col-md-9 col-6">
          <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <li class="top_li"><span class="fa fa-phone"></span><?php  echo $row['MobileNumber'];?> </li>
                <li class="top_li1"><span class="fa fa-envelope-o"></span> <?php  echo $row['Email'];?>  </li><?php } ?>
        </div>
        <div class="social-top col-md-3 col-6">
            <div>
              <?php if (strlen($_SESSION['csmsuid']==0)) {?>
                <a href="register.php" ><strong style="color: white;">Signup</strong></a>
               
                <a href="login.php" ><strong style="color: white; padding-left: 20px;">Login</strong></a><?php } ?>
                <a href="admin/index.php" ><strong style="color: white; padding-left: 20px;">Admin</strong></a>
                
            </div>
        </div>
    </header>
</div>
</div>
</section>
<section class="w3l-bootstrap-header">
  <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2">
    <div class="container">
      <a class="navbar-brand" href="index.php"><span class="">Cold Storage</span>  Management System</a>
      <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa fa-bars"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mt-2">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          
<li class="nav-item">
             <a class="nav-link" href="contact.php">Contact</a>
          </li>
            <li class="nav-item">
             <a class="nav-link" href="apply.php">Application Form</a>
          </li>                
        </ul>
        <?php if (strlen($_SESSION['csmsuid']>0)) {?>
        <div class="dropdown" style="padding-right: 30px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Cold Storage
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="apply.php">Apply</a>
    <a class="dropdown-item" href="application-history.php">History</a>
    
  </div>
</div>
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    My Account
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="profile.php">Profile</a>
    <a class="dropdown-item" href="change-password.php">Setting</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div><?php } ?>
      </div>
    </div>
  </nav>
</section>