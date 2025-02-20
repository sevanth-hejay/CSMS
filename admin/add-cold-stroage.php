<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['csmsaid'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit'])){
$title=$_POST['title'];
$location=$_POST['location'];
$cost=$_POST['cost'];
$pimage=$_FILES["image"]["name"];
// get the image extension
$extension = substr($pimage,strlen($pimage)-4,strlen($pimage));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$newpimage=md5($pimage).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$newpimage);
$query=mysqli_query($con,"insert into tblstorage(Title,Location,Image,Cost ) values('$title','$location','$newpimage','$cost')");
if($query){
echo "<script>alert('Product details added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'add-cold-stroage.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}
}
}
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Cold Storage Management System | |Add Cold Storage</title>
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
                        <h1 class="mt-4">Add Cold Storage</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Cold Storage</li>
                        </ol>
                        <div class="card mb-4">
                           <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                         
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input type="text"  name="title" id="title" class="form-control"  required>
                                                        <label for="inputFirstName">Title</label>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                       <input type="text" class="form-control" id="location" name="location"  required>
                                                        <label for="inputLastName">Location</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="image" name="image" required>
                                                
                                            </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="cost" name="cost" required>
                                                        <label for="inputPassword">Cost(per day)</label>
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