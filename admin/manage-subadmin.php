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
//Code For Deletion the subadmin
if($_GET['action']=='delete'){
$subadminid=intval($_GET['said']);
$query=mysqli_query($con,"delete from tbladmin where ID='$subadminid'");
if($query){
echo "<script>alert('Sub admin record deleted successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-subadmin.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}


  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Cold Storage Management System || Manage Subadmin</title>
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
                        <h1 class="mt-4">Manage Subadmin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Subadmin</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Manage Subadmin
                                
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Manage Subadmin
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email ID</th>
                    <th>Mobile Number</th>
                    <th>Reg. Date</th>
                    <th>Action</th>
                  </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email ID</th>
                    <th>Mobile Number</th>
                    <th>Reg. Date</th>
                    <th>Action</th>
                  </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $query=mysqli_query($con,"select * from tbladmin where UserType=0");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
                                       <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $result['AdminuserName']?></td>
                    <td><?php echo $result['AdminName']?></td>
                   <td><?php echo $result['Email']?></td>
                    <td><?php echo $result['MobileNumber']?></td>
                    <td><?php echo $result['AdminRegdate']?></td>
                    <th>
     <a href="edit-subadmin.php?said=<?php echo $result['ID'];?>" title="Edit Sub Admin Details"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
     <a href="manage-subadmin.php?action=delete&&said=<?php echo $result['ID']; ?>" style="color:red;" title="Delete this record" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
     </th>
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