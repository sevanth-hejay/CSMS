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

if($_GET['action']=='delete'){
$csaid=intval($_GET['csaid']);
$query=mysqli_query($con,"delete from tblstorage where ID='$csaid'");
if($query){
echo "<script>alert('Sub admin record deleted successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-cold-stroage.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}


  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Cold Storage Management System || Manage Storage</title>
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
                        <h1 class="mt-4">Manage Storage</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Storage</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Manage Storage
                                
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Manage Storage
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Cost</th>
                    <th>Image</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                  </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                     <th>#</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Cost</th>
                    <th>Image</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                  </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $query=mysqli_query($con,"select * from tblstorage");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
                                       <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $result['Title']?></td>
                    <td><?php echo $result['Location']?></td>
                    <td><?php echo $result['Cost']?></td>
                     <td><img src="images/<?php echo $result['Image']?>" width="80"></td>
                    <td><?php echo $result['CreationDate']?></td>
                    <th>
     <a href="edit-coldstorage.php?csaid=<?php echo $result['ID'];?>" title="Edit Cold Storage Details"> <i class="fa fa-edit" aria-hidden="true"></i> </a> ||
     <a href="manage-cold-stroage.php?action=delete&&csaid=<?php echo $result['ID']; ?>" style="color:red;" title="Delete this record" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true"></i></th>
                  </tr>
         <?php 
$cnt++;
       } ?>
                            
                                    </tbody>
                                </table>
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