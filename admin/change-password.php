<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['csmsaid'])==0)
  { 
header('location:index.php');
}
else{
// Code for change Password
if(isset($_POST['change'])){
$admid=$_SESSION['csmsaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$admid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$admid'");
echo '<script>alert("Your password successully changed.")</script>';
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}



}

  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Cold Storage Management System | | Change Password</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   
</script>
    </head>
    <body>
       <?php include_once("includes/navbar.php");?>
        <div id="layoutSidenav">
         <?php include_once("includes/sidebar.php");?>
       
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Change Password</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                        <div class="card mb-4">
                           <div class="card-body">
                                        <form method="post">
                                         
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                         <input class="form-control" id="currentpassword" name="currentpassword"  type="password" required="true">
                                                        <label for="inputFirstName">Current Password</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                             <div class="form-floating mb-3">
                                                <input class="form-control " id="newpassword" type="password" name="newpassword" required="true">
                                                        <label for="inputLastName">New Password</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control " id="confirmpassword" type="password" name="confirmpassword"  required="true">
                                                <label for="inputEmail">Confirm Password</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary" name="change" id="change">Change</button></div>
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