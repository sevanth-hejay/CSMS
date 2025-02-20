<?php //error_reporting(0);
include('includes/config.php');

if(isset($_POST['resetpwd']))
  {
$uname=$_POST['username'];
$mobile=$_POST['mobileno'];
$newpassword=md5($_POST['newpassword']);
$sql =mysqli_query($con,"SELECT ID FROM tbladmin WHERE AdminuserName='$uname' and MobileNumber='$mobile'");
$rowcount=mysqli_num_rows($sql);

if($rowcount >0)
{
$query=mysqli_query($con,"update tbladmin set Password='$newpassword' where AdminuserName='$uname' and MobileNumber='$mobile'");
if($query){
echo "<script>alert('Your Password succesfully changed');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Cold Storage Management System||Password Recovery</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script><script type="text/javascript">
function valid()
{
if(document.passwordrecovery.newpassword.value!= document.passwordrecovery.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.passwordrecovery.confirmpassword.focus();
return false;
}
return true;
}
</script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset your password</h3></div>
                                    <div class="card-body">
                                        <form method="post" onSubmit="return valid();" name="passwordrecovery">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="Username" name="username"  required>
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="Mobile Number" name="mobileno"  required>
                                                <label for="inputPassword">Mobile Number</label>
                                            </div>
                                           <div class="form-floating mb-3">
                                                <input type="password" class="form-control" placeholder="Password" name="newpassword" id="newpassword"  required>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                             <div class="form-floating mb-3">
                                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword"  required>
                                                <label for="inputPassword">Confirm Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="../index.php">Home</a>
                                                <button type="submit" class="btn btn-primary btn-block" name="resetpwd">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Signin</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
