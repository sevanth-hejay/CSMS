<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $Password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID,Email from tbluser where  Email='$email' && Password='$Password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['csmsuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
    echo "<script>alert('Invalid Details.');</script>";          
    }
  }
  ?>
<!doctype html>
<html lang="en">
  <head>
    

    <title>Cold Storage Management System | Login Form</title>
    <!-- web fonts -->
   <!-- web fonts -->
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
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Login Form</p>
      <h2 class="my-3">Login Form</h2>
    
      <p>Nulla dolorem perferendis inventore! posuere cubilia Curae; Nunc non risus in justo convallis feugiat. consectetur adipisicing elit.</p>
    </div>
  </div>
</section>
<div class="contact-form section-gap pt-5" id="contact">
     <div class="container py-lg-5 py-md-4">
         <h4 style="padding-bottom: 10px;color: red;">User Login</h4>
         
         <div class="contacts12-main mb-5">
             <form action="" method="post">
                 <div class="main-input">
                     <div class="d-grid">
                         <input type="email" name="email" id="email" placeholder="Your Email id" class="contact-input" required="true">
                     </div>
                     <a class="small" href="password-recovery.php"><strong style="padding-bottom: 30px;">Forgot Password?</a></strong>
                     <div class="d-grid">
                         <input type="password" class="contact-input" id="password" value="" name="password" required="true" placeholder="Enter Password">
                     </div>
                 </div>

                 <div class="text-left">
                     <button type="submit" class="btn btn-secondary btn-theme2" name="login">Login</button>
                      <a class="small" href="register.php"  ><strong style="padding-bottom: 30px;">Register with us!!</a></strong>
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


