<?php
include('includes/config.php');
session_start();
error_reporting(0);
if(strlen($_SESSION['csmsuid'])==0)
  { 
header('location:index.php');
}
else{

?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Cold Storage Management System | Application History</title>
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
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Application History</p>
      <h2 class="my-3">Application History</h2>
    
      <p>Nulla dolorem perferendis inventore! posuere cubilia Curae; Nunc non risus in justo convallis feugiat. consectetur adipisicing elit.</p>
    </div>
  </div>
</section>
<div class="contact-form section-gap pt-5" id="contact">
     <h3 style="color: red;padding-left: 100px;">Application History</h3>
     <div class="container py-lg-5 py-md-4">
         
       
         <div class="row">
             <div class="col-md-12">
                 <div class="row">

                 <table  class="table table-striped" border="1">

                                    <thead>
                                        <tr>
                    <th>#</th>
                   <th>Application Number</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th>Application Date</th>
                     <th>Action</th>
                  </tr>
                                    </thead>
                        
                                    <tbody>
                                        <?php
                                        $uid=$_SESSION['csmsuid'];
                                        $query=mysqli_query($con,"select tblapplication.ID as appid,tblapplication.ApplicationNumber,tblapplication.Status,tblapplication.ApplyDate,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email  from tblapplication join tbluser on tbluser.ID=tblapplication.UserID where tbluser.ID='$uid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
                                       <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $result['ApplicationNumber']?></td>
                    <td><?php echo $result['FirstName']?> <?php echo $result['LastName']?></td>
                    <td><?php echo $result['Email']?></td>
                    <td><?php echo $result['MobileNumber']?></td>
                   <?php if($result['Status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $result['Status'];?></td><?php } ?> 
                                      
                    <td><?php echo $result['ApplyDate']?></td>
                     <td><a href="view-application.php?viewid=<?php echo $result['appid'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                  </tr>
         <?php 
$cnt++;
       } ?>
                            
                                    </tbody>
                                </table></div>
             </div>
         </div>
     </div>
    
    </div>

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

</html><?php } ?>
<!-- // grids block 5 -->


