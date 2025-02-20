<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Cold Storage Management System | Home Page</title>
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
<section class="w3l-main-slider" id="home">
  <!-- main-slider -->
  <div class="companies20-content">
   
    <div class="owl-one owl-carousel owl-theme">
      <div class="item">
        <li>
          <div class="slider-info banner-view bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5>Garden fresh organic vegetables </h5>
                 <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="about.php">Read More</a>
                </div>
                
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info  banner-view banner-top1 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5> Fruits from premium gardens</h5>
                  <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="about.php">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info banner-view banner-top2 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5>We provide organic products</h5>
                 <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="about.php">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info banner-view banner-top3 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5>We grow food for all appetites</h5>
                  <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="about.php">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
    </div>
  </div>

</div>


  <script src="assets/js/owl.carousel.js"></script>
  <!-- script for -->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
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
  <!-- /main-slider -->
</section>
<section class="w3l-feature-3" id="">
	<div class="grid top-bottom mb-lg-5 pb-lg-5">
		<div class="container">
			
			<div class="middle-section grid-column text-center">
				<div class="three-grids-columns">
					<span class="fa fa-viadeo"></span>
					<h4>Natural Products</h4>
					<p>Auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet</p>
			
				</div>
				<div class="three-grids-columns">
					<span class="fa fa-pagelines"></span>
					<h4>Wheat Cultivation</h4>
					<p>Auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet</p>
			
				</div>
				<div class="three-grids-columns">
					<span class="fa fa-apple"></span>
					<h4>Modern Truck</h4>
					<p>Auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet</p>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/lightbox-plus-jquery.min.js"></script>
<section class="w3l-features-4">

</section>
<section class="w3l-news" id="news">
  <section id="grids5-block" class="py-5">
    <div class="container py-lg-3">
      <div class="heading text-center mx-auto">
				<h3 class="head">Our Storage</h3>
				<p class="my-3 head"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
				  Nulla mollis dapibus nunc, ut rhoncus
				  turpis sodales quis. Integer sit amet mattis quam.</p>
			  </div>
      <div class="grid-view">
        <div class="row"><?php
$ret=mysqli_query($con,"select * from tblstorage");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 
          <div class="col-lg-4 col-md-6 mt-md-4 mt-4">
            <div class="grids5-info">
              <a href="#" class="d-block zoom"><img src="admin/images/<?php  echo $row['Image'];?>" alt=""  width="100" height="250"></a>
              <div class="blog-info">
                <p class="date"><?php  echo $row['Location'];?></p>
                <h4><a href="#"><?php  echo $row['Title'];?></a></h4>
               
                <p class="blog-text">Cost: <?php  echo $row['Cost'];?></p>
                <a href="apply.php" class="btn btn-news">Apply Now <span class="fa fa-angle-right pl-1"></span> </a>
              </div>
            </div>
          </div><?php } ?>
         
         
        </div>
      </div>
    </div>
  </section>
</section>
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