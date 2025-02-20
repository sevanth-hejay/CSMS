<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['csmsuid']==0)) {
echo "<script>alert('Please login for apply for cold storage');</script>";
    echo "<script>window.location.href ='login.php'</script>";
  } else{
if(isset($_POST['submit']))
  {
    $userid=$_SESSION['csmsuid'];
    $coldstorage=$_POST['coldstorage'];
    $type=$_POST['type'];
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $applicationnum=mt_rand(100000000, 999999999);
    $query=mysqli_query($con, "insert into tblapplication(UserID,ColdStorageID,ApplicationNumber,Type,FromDate,ToDate) value('$userid','$coldstorage','$applicationnum','$type','$fromdate','$todate')");
    if ($query) {
   echo '<script>alert("Application has been send. We Will Contact You Soon")</script>';
    echo "<script>window.location.href ='apply.php'</script>";
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
    

    <title>Cold Storage Management System | Application Form</title>
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
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Application Form</p>
      <h2 class="my-3">Application Form</h2>
    
      <p>Nulla dolorem perferendis inventore! posuere cubilia Curae; Nunc non risus in justo convallis feugiat. consectetur adipisicing elit.</p>
    </div>
  </div>
</section>
<div class="contact-form section-gap pt-5" id="contact">
     <div class="container py-lg-5 py-md-4">
         
         
         <div class="contacts12-main mb-5">

             <form action="" method="post">
              
                 <div class="main-input">
                     <div class="d-grid">
                      <strong>Cold Storage:</strong>
                      <select name='coldstorage' id="coldstorage" class="form-control white_bg" required="true" onBlur="checkDetails()" >
                         <option value="">Choose Cold Storage</option>
                        <?php
      
      $query=mysqli_query($con,"select * from  tblstorage");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
             
              <option value="<?php echo $row['ID'];?>"><?php echo $row['Title'];?></option>
                  <?php } ?>  
   </select></div><br />
   <span id="cs-details" style="font-size:12px; color:red;"></span>

                        <div class="d-grid">
                         <strong >Type:</strong>
                        <select name='type' id="type" class="form-control white_bg" required="true">
<option value="">Choose Type</option>
<option value="Fruits">Fruits</option>
<option value="Vegetables">Vegetables</option>
<option value="Grains">Grains</option>
<option value="Pulses">Pulses</option>
<option value="Others">Others</option>
                        </select></div><br />


                         <div class="d-grid">
                         <strong>From:</strong>
                         <input type="date" class="contact-input" id="fromdate" name="fromdate" value=""  required="true"></div>
                         <div class="d-grid">
                         <strong>To:</strong>
                         <input type="date" class="contact-input" id="todate" name="todate" value=""  required="true"></div>
                          <div class="d-grid">
                          <strong>User Address:</strong>
                         <textarea type="text" class="contact-input" id="uaddress" name="uaddress" value=""  required="true" placeholder="Enter Your Address"></textarea></div>
                     </div>
                   
                     
                 </div>
               
                 <div class="text-center">
                     <button type="submit" class="btn btn-secondary btn-theme2" name="submit">Send</button></div>
                  
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


