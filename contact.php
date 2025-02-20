<?php
include('includes/config.php');
session_start();
error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Cold Storage Management System | Contact</title>
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
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Contact</p>
      <h2 class="my-3">Contact Us</h2>
    
      <p>Nulla dolorem perferendis inventore! posuere cubilia Curae; Nunc non risus in justo convallis feugiat. consectetur adipisicing elit.</p>
    </div>
  </div>
</section>
<div class="contact-form section-gap pt-5" id="contact">
     <div class="container py-lg-5 py-md-4">
         
        
		 <div class="row">
             <div class="col-md-12">
                 <div class="row">
                  <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                     <div class="col-lg-4 col-md-6">
                         <div class="contact-address">
                             <ul>
                                 <li class="icon-color"><span class="fa fa-map-marker"></span><span><?php  echo $row['PageDescription'];?> </span></li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                         <div class="contact-address">
                             <ul>
                                 <li class="icon-color"><span class="fa fa-phone"></span> <span><a class="" href="<?php  echo $row['MobileNumber'];?>">Phone :+<?php  echo $row['MobileNumber'];?></a>
                                 </span></li><br />
                                 
                             </ul>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                         <div class="contact-address">
                             <ul>
                                 <li class="icon-color"><span class="fa fa-mail-reply"></span><span>
                                     <a href="<?php  echo $row['Email'];?>"> <?php  echo $row['Email'];?></a>
                                   
                                 </span></li><br/>

                             </ul>
                         </div>
                     </div>
                  <?php } ?></div>
             </div>
         </div>
     </div>
    
    </div>
<!-- contact -->

<!-- //contact -->
<!-- grids block 5 -->
<section class="w3l-footer-29-main">
 <?php include_once("includes/footer.php");?>
  <!-- move top -->
  <button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fa fa-angle-up"></span>
  </button>
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- /move top -->
</section>
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


