
<section class="w3l-footer-29-main">
  <div class="footer-29">
      <div class="container">
          <div class="d-grid grid-col-4 footer-top-29">
              <div class="footer-list-29 footer-1">
                  <h6 class="footer-title-29">Contact Us</h6>
                  <ul><?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                      <li><p><span class="fa fa-map-marker"></span> <?php  echo $row['PageDescription'];?>.</p></li>
                      <li><a href="tel:+7-800-999-800"><span class="fa fa-phone"></span> +<?php  echo $row['MobileNumber'];?></a></li>
                      <li><a href="mailto:corporate-mail@support.com" class="mail"><span class="fa fa-envelope-open-o"></span> <?php  echo $row['Email'];?></a></li><?php } ?>
                  </ul>
                  <div class="main-social-footer-29">
                      <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
                      <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                      <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
                      <a href="#google-plus" class="google-plus"><span class="fa fa-google-plus"></span></a>
                      <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
                  </div>
              </div>
             
             
              <div class="footer-list-29 footer-4">
                  <ul>
                      <h6 class="footer-title-29">Quick Links</h6>
                      <li><a href="index.php">Home</a></li>
                      <li><a href="contact.php">Contact Us</a></li>
                      <li><a href="about.php">About Us</a></li>
                      <li><a href="admin/index.php">Admin</a></li>
                  </ul>
              </div>
               <div class="footer-list-29 footer-4">
                  <ul><?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutusus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                      <li><p style="color: white"><span class="fa fa-map-marker"></span> <?php  echo $row['PageDescription'];?>.</p></li>
                    <?php } ?>
                  </ul>
              </div>
          </div>
          <div class="d-grid grid-col-2 bottom-copies">
              <p class="copy-footer-29">© 2021 Cold Storage Management System</p>
               <ul class="list-btm-29">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="admin/index.php">Admin</a></li>
                      
                  </ul>
          </div>
      </div>
  </div>
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