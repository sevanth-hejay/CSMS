<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['csmsaid'])==0)
  { 
header('location:index.php');
}
else{
// Code for Update  Sub Admin Details
if(isset($_POST['update'])){
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobilenumber'];
$subadminid=intval($_GET['said']);
$query=mysqli_query($con,"update tbladmin set AdminName='$fname',MobileNumber='$mobileno',Email='$email' where UserType=0 and ID='$subadminid'");
if($query){
echo "<script>alert('Sub admin details added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
} else {
echo "<script>alert('Something went wron. Please try again.');</script>";
}
}

  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Cold Storage Management System | | Edit/Update Sub admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
       <?php include_once("includes/navbar.php");?>
        <div id="layoutSidenav">
       
         <?php include_once("includes/sidebar.php");?>
           
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Subadmin Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Subadmin Details</li>
                        </ol>
                        <div class="card mb-4">
                           <div class="card-body">
                                        <form method="post">
                                         <?php 
$said=intval($_GET['said']);
$query=mysqli_query($con,"select * from tbladmin where UserType=0 and ID='$said'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input type="text"   name="sadminusername" id="sadminusername" class="form-control" value="<?php echo $result['AdminuserName'];?>" readonly>
                                                        <label for="inputFirstName">Username (used for login)</label>
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                       <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $result['AdminName'];?>" placeholder="Enter Sub-Admin Full Name" required>
                                                        <label for="inputLastName">Full Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Enter email" required value="<?php echo $result['Email'];?>">
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter email" pattern="[0-9]{10}" title="10 numeric characters only" required value="<?php echo $result['MobileNumber'];?>">
                                                        <label for="inputPassword">Mobile Number</label>
                                                    </div>
                                                </div>
                                               <?php } ?>
                                            </div>
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
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>