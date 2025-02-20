<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['csmsaid'])==0)
  { 
header('location:index.php');
}
else{




  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Cold Storage Management System || Between Dates Report Date Selection</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once("includes/navbar.php");?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
              <?php include_once("includes/sidebar.php");?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Between Dates Report Date Selection</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Between Dates Report Date Selection</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Between Dates Report Date Selection
                            </div>
                            <div class="card-body">
                               <form method="post"  name="bwdatesreportds" action="bwdates-report-details.php">  
                <div class="card-body">

<!-- From Date--->
   <div class="form-group">
                    <strong for="exampleInputFullname">From Dates</strong>
                <input class="form-control" id="fromdate" name="fromdate"  type="date" required="true">
                  </div>
<!---To Date---->

 <div class="form-group" style="padding-top: 20px;">
<strong for="exampleInputEmail1">To Dates</strong>
<input class="form-control " id="todate" type="date" name="todate" required="true">
</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </div>
              </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include_once("includes/sidebar.php");?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>