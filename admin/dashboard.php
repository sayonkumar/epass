<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cpmsaid']==0)) {
  header('location:logout.php');
  } else{
    
  ?>
<!DOCTYPE html>
<html>

<head>
    
    <title>Curfew Pass Management System | Dashboard</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
      <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--end page header -->
            </div>

            <div class="row">
                <!--quick info section -->
                <div class="col-lg-4">
                     
                    <div class="alert alert-danger text-center">
                        <?php 
$sql ="SELECT ID from tblcategory ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalcat=$query->rowCount();
?><div class="panel-body red">  </b><a href=https://docs.google.com/spreadsheets/d/1Lt-D18QWE6pRamyHi2yj7hQFI4tk2548JgDWvQdqGTo/edit?usp=sharing target="_blank">pass requests</a> 
</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    
                    <div class="alert alert-success text-center">
                        <?php 
$sql ="SELECT ID from tblpass";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalpass=$query->rowCount();
?><div class="panel-body yellow"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totalpass);?></b><a href="add-pass.php"> add pass</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="alert alert-info text-center">
 <?php 
//todays Pass Generated
 

$sql ="SELECT ID from tblpass where date(PasscreationDate)=CURDATE();";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$today_pass=$query->rowCount();
?>
 <div class="panel-body red"> <a href="manage-pass.php">Manage Pass</a>
</div>
                    </div>
                </div>
                <div class="col-lg-4"> </div>
                  <div class="col-lg-4"> </div>
                <!--end quick info section -->
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
<?php }  ?>