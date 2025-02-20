<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['csmsaid'])==0)
  { 
header('location:index.php');
}
else{
// Code for update the about us content
if(isset($_POST['update']))
  {
$pagetitle=$_POST['pagetitle'];
$pagedes=$con->real_escape_string($_POST['pagedes']);
$query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
if ($query) {
echo '<script>alert("About Us has been updated.")</script>';
}else{
echo '<script>alert("Something Went Wrong. Please try again.")</script>';
}}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Cold Storage Management System | | About Us</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    </head>
    <body>
       <?php include_once("includes/navbar.php");?>
        <div id="layoutSidenav">
         <?php include_once("includes/sidebar.php");?>
       
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">About Us</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ol>
                        <div class="card mb-4">
                           <div class="card-body">
                                        <form method="post">
                                         <?php
$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                                          <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input type="text" class="form-control" name="pagetitle" value="<?php  echo $row['PageTitle'];?>" required='true'>
                                                       
                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                         <textarea  name="pagedes" class="form-control" required='true' cols="140" rows="10"><?php  echo $row['PageDescription'];?></textarea>
                                                        
                                                    </div>
                                                </div>
                                              
                                            </div><?php } ?>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary" name="update" id="update">Update</button></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                  
                       </div>
                
                </main>
                <?php include_once('includes/footer.php');?> 
                  </div>
         </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>