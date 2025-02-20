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
        
        <title>Cold Storage Management System || Accepted Application</title>
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
                        <h1 class="mt-4">Accepted Application</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accepted Application</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Accepted Application                               
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Accepted Application
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                    <th>#</th>
                   <th>Application Number</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th>Application Date</th>
                     <th>Action</th>
                  </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                     <th>#</th>
                   <th>Application Number</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th>Application Date</th>
                     <th>Action</th>
                  </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $query=mysqli_query($con,"select tblapplication.ID as appid,tblapplication.ApplicationNumber,tblapplication.Status,tblapplication.ApplyDate,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email  from tblapplication join tbluser on tbluser.ID=tblapplication.UserID where tblapplication.Status='Accepted'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
                                       <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $result['ApplicationNumber']?></td>
                    <td><?php echo $result['FirstName']?> <?php echo $result['LastName']?></td>
                    <td><?php echo $result['Email']?></td>
                    <td><?php echo $result['MobileNumber']?></td>
                   <?php if($result['Status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $result['Status'];?></td><?php } ?> 
                                      
                    <td><?php echo $result['ApplyDate']?></td>
                     <td><a href="view-application.php?viewid=<?php echo $result['appid'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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