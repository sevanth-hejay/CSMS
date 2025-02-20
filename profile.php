<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $sid=$_SESSION['csmsuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    
   

    $query=mysqli_query($con, "update tbluser set FirstName='$fname', LastName='$lname' where ID='$sid'");


    if ($query) {
    
    echo '<script>alert("Your profile has been updated.")</script>';
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

}
 ?>
<!doctype html>
<html lang="en">
  <head>
    

    <title>Cold Storage Management System | User Profile</title>
    <!-- web fonts -->
   <!-- web fonts -->
   <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
   <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
   <!-- //web fonts -->
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">

  </head>
  <body>


<?php include_once("includes/navbar.php");?>
<section class="w3l-contact-breadcrum">
  <div class="breadcrum-bg">
    <div class="container py-5">
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; My Profile</p>
      <h2 class="my-3">My Profile</h2>
    
      <p>Nulla dolorem perferendis inventore! posuere cubilia Curae; Nunc non risus in justo convallis feugiat. consectetur adipisicing elit.</p>
    </div>
  </div>
</section>
<div class="contact-form section-gap pt-5" id="contact">
     <div class="container py-lg-5 py-md-4">
         
         
         <div class="contacts12-main mb-5">

             <form action="" method="post" name="signup" method="post" onsubmit="return checkpass();">
              <?php
$uid=$_SESSION['csmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 
                 <div class="main-input">
                     <div class="d-grid">
                      <strong>First Name:</strong>
                         <input type="text"  id="firstname" name="firstname" required="true" value="<?php  echo $row['FirstName'];?>" class="contact-input">
                         <strong>Last Name:</strong>
                         <input type="text"  id="lastname" name="lastname" required="true" value="<?php  echo $row['LastName'];?>" class="contact-input">
                     </div>
                     <div class="d-grid">
                      <strong>Email address:</strong>
                         <input type="email" name="email" id="email" value="<?php  echo $row['Email'];?>" class="contact-input" required="true" readonly>
                         <strong>Mobile Number:</strong>
                         <input class="contact-input" type="text" value="<?php  echo $row['MobileNumber'];?>" id="mobilenumber" name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}" readonly>
                     </div>
                     <div class="d-grid">
                      <strong>Registraton Date:</strong>
                         <input type="text" class="contact-input"  value= "<?php  echo $row['RegDate'];?>" name="password" required="true" readonly>
                        
                     </div>
                 </div>
                 <?php } ?>
                 <div class="text-left">
                     <button type="submit" class="btn btn-secondary btn-theme2" name="submit">Update</button></div>
                  
                 </div>
             </form>
         </div>
		
     </div>
    
    </div>
<!-- contact -->

<!-- //contact -->
<!-- grids block 5 -->
<?php include_once("includes/footer.php");?>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<!-- //footer-28 block -->
</section>
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<!-- Template JavaScript -->
<script src="assets/js/all.js"></script>
<!-- Smooth scrolling -->
<!-- <script src="assets/js/smoothscroll.js"></script> -->
<script src="assets/js/owl.carousel.js"></script>

<!-- script for -->
<script>
  $(document).ready(function () {
    $('.owl-one').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      responsiveClass: true,
      autoplay: false,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        480: {
          items: 1,
          nav: false
        },
        667: {
          items: 1,
          nav: true
        },
        1000: {
          items: 1,
          nav: true
        }
      }
    })
  })
</script>
<!-- //script -->

</body>

</html>
<!-- // grids block 5 -->


