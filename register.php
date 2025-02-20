<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo '<script>alert("This email or Contact Number already associated with another account.")</script>';
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    
    echo '<script>alert("You have successfully registered.")</script>';
  }
  else
    {
      
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}
}

 ?>
<!doctype html>
<html lang="en">
  <head>
    

    <title>Cold Storage Management System | Registration Form</title>
    <!-- web fonts -->
   <!-- web fonts -->
   <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
   <!-- //web fonts -->
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>
  </head>
  <body>


<?php include_once("includes/navbar.php");?>
<section class="w3l-contact-breadcrum">
  <div class="breadcrum-bg">
    <div class="container py-5">
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Register Form</p>
      <h2 class="my-3">Registration Form</h2>
    
      <p>Nulla dolorem perferendis inventore! posuere cubilia Curae; Nunc non risus in justo convallis feugiat. consectetur adipisicing elit.</p>
    </div>
  </div>
</section>
<div class="contact-form section-gap pt-5" id="contact">
     <div class="container py-lg-5 py-md-4">
         
         
         <div class="contacts12-main mb-5">

             <form action="" method="post" name="signup" method="post" onsubmit="return checkpass();">
                 <div class="main-input">
                     <div class="d-grid">
                      <strong>First Name:</strong>
                         <input type="text" value="" id="firstname" name="firstname" required="true" placeholder="First Name" class="contact-input">
                         <strong>Last Name:</strong>
                         <input type="text" value="" id="lastname" name="lastname" required="true" placeholder="Last Name" class="contact-input">
                     </div>
                     <div class="d-grid">
                      <strong>Email address:</strong>
                         <input type="email" name="email" id="email" placeholder="Your Email id" class="contact-input" required="true">
                         <strong>Mobile Number:</strong>
                         <input class="contact-input" type="text" value="" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]{10}">
                     </div>
                     <div class="d-grid">
                      <strong>Password:</strong>
                         <input type="password" class="contact-input" id="password" value="" name="password" placeholder="Password" required="true">
                         <strong>Repeat password:</strong>
                         <input type="password" class="contact-input" id="repeatpassword" value="" name="repeatpassword" placeholder="Repeat password" required="true"> 
                     </div>
                 </div>
                 <div class="text-left">
                     <button type="submit" class="btn btn-secondary btn-theme2" name="submit">Register</button>
                      <a class="small" href="login.php"  ><strong style="padding-bottom: 30px;">Login!!</a></strong>
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


