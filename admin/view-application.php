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
if(isset($_POST['submit']))
  {
    
    $viewid=$_GET['viewid'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];
   $query=mysqli_query($con, "update   tblapplication set Remark='$remark', Status='$ressta' where ID='$viewid'");
    if ($query) {
   
    echo '<script>alert("Application Status Has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-application.php'; </script>";
  }
  else
    {
    
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Cold Storage Management System || View Application</title>
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
                        <h1 class="mt-4">View Application</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">View Application</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                View Application                               
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                View Application
                            </div>
                            <div class="card-body">
                                 <?php
 $viewid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblapplication.ID as aid,tblapplication.ApplicationNumber,tblapplication.Status,tblapplication.FromDate,tblapplication.ToDate,tblapplication.ApplyDate,tblapplication.Type,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email,tbluser.RegDate,tblstorage.Title,tblstorage.Location,tblstorage.Image,tblstorage.Cost,datediff(tblapplication.ToDate,tblapplication.FromDate) as totaldays from tblapplication join tbluser on tbluser.ID=tblapplication.UserID join tblstorage on tblstorage.ID=tblapplication.ColdStorageID where tblapplication.ID='$viewid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<table class="table table-bordered data-table">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
User Details of (<?php  echo $row['ApplicationNumber'];?>)</td></tr>
 <tr>
    <th>Name</th>
    <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
    <th>Phone Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
    <th>Registration Date</th>
    <td><?php  echo $row['RegDate'];?></td>
  </tr>
  <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Stotarage Details</td></tr>
 <tr>
  <tr>
    <th>Title</th>
    <td><?php  echo $row['Title'];?></td>
       <th>Storage Location</th>
    <td><?php  echo $row['Location'];?></td>
  </tr>
 
  <tr>
   <th>Storage Image</th>
    <td><img src="images/<?php  echo $row['Image'];?>" width="100" height="100"></td>
     <th>Storage Cost</th>
    <td><?php  echo $row['Cost'];?></td>
  </tr>
  <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Application Details</td></tr>
 <tr>
    
  <tr>
    <th>Type</th>
    <td><?php  echo $row['Type'];?></td>
  
     <th>From Date</th>
    <td><?php  echo $fdate=$row['FromDate'];?></td>
     
  </tr>
  <tr>
    <th>To Date</th>
    <td><?php  echo $tdate= $row['ToDate'];?></td>
  
     <th>Total Days</th>
    <td><?php  echo $totaldays= $row['totaldays'];?></td>
     
  </tr>
  <tr>
    <th>Application Status</th>
    <td> <?php  
    $status=$row['Status'];
if($row['Status']=="Accepted")
{
  echo "Application request has been accepted";
}

if($row['Status']=="Rejected")
{
  echo "Application request has been rejected";
}

if($row['Status']=="")
{
  echo "Wait for approval";
}



     ;?></td>
     <th>Application Date</th>
    <td><?php  echo $row['ApplyDate'];?></td>
  </tr>
</table>
 <?php } ?>

<?php if($status==""){ ?>

<p align="center" style="padding-top: 20px;">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>

                </main>
                <?php include_once("includes/sidebar.php");?>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
                         

  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Accepted" selected="true">Accepted</option>
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>

</div>
                            </div>
                        </div>
                    </div>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>