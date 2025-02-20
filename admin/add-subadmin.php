<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['csmsaid'])==0)
  { 
header('location:index.php');
}
else{
// Code for Add New Sub Admi
if(isset($_POST['submit'])){
$username=$_POST['sadminusername'];
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobilenumber'];
$password=md5($_POST['inputpwd']);
$usertype='0';
$query=mysqli_query($con,"insert into tbladmin(AdminuserName,AdminName,MobileNumber,Email,Password,UserType ) values('$username','$fname','$mobileno','$email','$password','$usertype')");
if($query){
echo "<script>alert('Sub admin details added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'add-subadmin.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}
}

  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Cold Storage Management System | | Subadmin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#sadminusername").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
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
                        <h1 class="mt-4">Add Subadmin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Subadmin</li>
                        </ol>
                        <div class="card mb-4">
                           <div class="card-body">
                                        <form method="post">
                                         
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input type="text" placeholder="Enter Sub-Admin Username"  name="sadminusername" id="sadminusername" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="Username must be alphanumeric 6 to 12 chars" onBlur="checkAvailability()"  required>
                                                        <label for="inputFirstName">Username (used for login)</label>
                                                        <span id="user-availability-status" style="font-size:14px;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                       <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Sub-Admin Full Name" required>
                                                        <label for="inputLastName">Full Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Enter email" required>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter email" pattern="[0-9]{10}" title="10 numeric characters only" required>
                                                        <label for="inputPassword">Mobile Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="password" class="form-control" id="inputpwd" name="inputpwd" placeholder="Password" required>
                                                        <label for="inputPasswordConfirm">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button></div>
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