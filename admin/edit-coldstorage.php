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
$title=$_POST['title'];
$location=$_POST['location'];
$cost=$_POST['cost'];
$csaid=intval($_GET['csaid']);
$query=mysqli_query($con,"update tblstorage set Title='$title',Location='$location',Cost='$cost' where ID='$csaid'");
if($query){
echo "<script>alert('Storage details has been updated successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-cold-stroage.php'; </script>";
} else {
echo "<script>alert('Something went wron. Please try again.');</script>";
}
}

  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Cold Storage Management System | | Edit/Update Cold Storage</title>
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
                        <h1 class="mt-4">Edit Cold Storage Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Cold Storage Details</li>
                        </ol>
                        <div class="card mb-4">
                           <div class="card-body">
                                        <form method="post">
                                         <?php 
$csaid=intval($_GET['csaid']);
$query=mysqli_query($con,"select * from tblstorage where ID='$csaid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input type="text"   name="title" id="title" class="form-control" value="<?php echo $result['Title'];?>" required>
                                                     
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                       <input type="text" class="form-control" id="location" name="location" value="<?php echo $result['Location'];?>" required>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="cost" name="cost" required value="<?php echo $result['Cost'];?>">
                                               
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <img src="images/<?php echo $result['Image']?>" width="120">
               <a href="update-image.php?lid=<?php echo $result['ID'];?>">Update Image</a>
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