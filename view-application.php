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

                <?php
 $viewid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblapplication.ID as aid,tblapplication.ApplicationNumber,tblapplication.Status,tblapplication.FromDate,tblapplication.ToDate,tblapplication.ApplyDate,tblapplication.Type,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email,tbluser.RegDate,tblstorage.Title,tblstorage.Location,tblstorage.Image,tblstorage.Cost,datediff(tblapplication.ToDate,tblapplication.FromDate) as totaldays from tblapplication join tbluser on tbluser.ID=tblapplication.UserID join tblstorage on tblstorage.ID=tblapplication.ColdStorageID where tblapplication.ID='$viewid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<table class="table table-bordered data-table">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
User Details of (<?php  echo $row['ApplicationNumber'];?>)</td></tr>
 <tr>
    <th>Name</th>
    <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
    <th>Phone Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
    <th>Registration Date</th>
    <td><?php  echo $row['RegDate'];?></td>
  </tr>
  <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Stotarage Details</td></tr>
 <tr>
  <tr>
    <th>Title</th>
    <td><?php  echo $row['Title'];?></td>
       <th>Storage Location</th>
    <td><?php  echo $row['Location'];?></td>
  </tr>
 
  <tr>
   <th>Storage Image</th>
    <td><img src="admin/images/<?php  echo $row['Image'];?>" width="100" height="100"></td>
     <th>Storage Cost</th>
    <td><?php  echo $row['Cost'];?></td>
  </tr>
  <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Application Details</td></tr>
 <tr>
    
  <tr>
    <th>Type</th>
    <td><?php  echo $row['Type'];?></td>
  
     <th>From Date</th>
    <td><?php  echo $fdate=$row['FromDate'];?></td>
     
  </tr>
  <tr>
    <th>To Date</th>
    <td><?php  echo $tdate= $row['ToDate'];?></td>
  
     <th>Total Days</th>
    <td><?php  echo $totaldays= $row['totaldays'];?></td>
     
  </tr>
  <tr>
    <th>Application Status</th>
    <td> <?php  
    $status=$row['Status'];
if($row['Status']=="Accepted")
{
  echo "Application request has been accepted";
}

if($row['Status']=="Rejected")
{
  echo "Application request has been rejected";
}

if($row['Status']=="")
{
  echo "Wait for approval";
}



     ;?></td>
     <th>Application Date</th>
    <td><?php  echo $row['ApplyDate'];?></td>
  </tr>
  <?php if($status=="Accepted"){ ?>
<tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Invoice Details</td></tr>
<tr>
   
     <th>Storage Cost(per day)</th>
    <td colspan="4"><?php  echo $cost= $row['Cost'];?>$</td>
  </tr>
  <tr>
    <th>Total Days</th>
    <td colspan="4"><?php  echo $totaldays= $row['totaldays'];?></td>
  </tr>
  <tr>
    <th>Total Cost</th>
    <td colspan="4"><?php  echo ($cost*$totaldays);?>$</td>
  </tr><?php } ?>
</table>
 <?php } ?></div>
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


