<?php

include "connection.php";

session_start(); 

$userid=$_SESSION["userid"];
$subuserid=$_SESSION["subuserid"];

$loadcontent='';
if(isset($_GET['content']))
{
  $loadcontent=$_GET['content'];
}

echo "<input type='hidden' id='userid' value=$userid >";
echo "<input type='hidden' id='subuserids' value=$subuserid >";



// Get User Data ..................................................

$username="";

$sql = "SELECT * FROM user where id=$userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $username=$row["name"];
  }
} else {
  
}

    $companyname="Mkrow";
    $logo="";

/*
// Get Company Data ..................................................

$companyname="Shop Name";

$sql = "SELECT * FROM basic_info where userid=$userid limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $companyname=$row["shop_name"];
    $logo=$row["logo"];
  }
} else {
  
}


// Get Purchase .........................
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mkrow Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">


  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link href="dist/css/select2-bootstrap.css" rel="stylesheet" />


<!-- For Common Modal -->

<style>
/*body {font-family: Arial, Helvetica, sans-serif;} */

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 120px; /* Location of the box */
  left: 125px;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  padding-left:98%;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

<!-- End Style For Common Modal -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    
    
<!-- Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="modal-body">Some text in the Modal..</div>
  </div>

</div>


    
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" id="menubar" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
      


      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-calculator"></i> &nbsp; 
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"  id="calculator" style="height:450px; overflow:hidden;">
        
        </div>
      </li>

     
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link btn btn-danger" style='color:white;'>Log Out</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>


      </li>


      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $companyname ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $username ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="home.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
             
            </ul>
          </li>
         
          <!--
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 Configuration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="#" onclick="getcontent('basic_info')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Basic Setting</p>
                </a>
              </li>           
             
            </ul>
          </li>


         


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Code Generator
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="#" onclick="getcontent('loan_setting')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Code Base</p>
                </a>
              </li>

            <li class="nav-item">
                <a href="#" onclick="getcontent('loan_setting')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Auto Code</p>
                </a>
              </li>
             
            </ul>
          </li>

-->

          <li class="nav-item has-treeview">
            <a href="#"  class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Application
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#"  onclick="getcontent('product')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#"  onclick="getcontent('modules')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Module</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#"  onclick="getcontent('features_category')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Features Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#"  onclick="getcontent('features')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Features</p>
                </a>
              </li>

             
            </ul>
          </li>
       
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Form Builder
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="#" onclick="getcontent('basic_form')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Basic Form</p>
                </a>
              </li>

            <li class="nav-item">
                <a href="#" onclick="getcontent('parameter_form')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Parameter Form</p>
                </a>
              </li>

              
              <li class="nav-item">
                <a href="#" onclick="getcontent('master_detail_form')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Detail Form</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" onclick="getcontent('tabuler_form')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabuler Form</p>
                </a>
              </li>

             
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Report Builder
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="#" onclick="getcontent('basic_form')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Basic Report</p>
                </a>
              </li>

            <li class="nav-item">
                <a href="#" onclick="getcontent('parameter_form')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Complex Report</p>
                </a>
              </li>
             
            </ul>
          </li>


        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" onclick="getcontent('roles')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" onclick="getcontent('role_permission')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role Permission</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" onclick="getcontent('subuser')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Info</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>

              </ul>

          <li class="nav-item">
            <a href="index.html" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Log Out  
              </p>
            </a>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <div id="content">  <!-- Content Div -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo 0 ?></h3>

                <h4>Total Employee</h4>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#"  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo 0 ?><sup style="font-size: 20px"><sup style="font-size: 20px"></sup></h3>

                <h4>Total Branch</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#"  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo 0 ?></h3>
                <h4>Total Memeber</h4>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#"  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo 0 ?></h3>

                <h4>Total Loan</h4>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" onclick="getcontent('purchase')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo 0 ?> Tk/=</h3>

                <h4>Total Invest</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#"  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo 0 ?> Tk/=<sup style="font-size: 20px"><sup style="font-size: 20px"></sup></h3>

                <h4>Total Income</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" onclick="getcontent('sales')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo 0 ?> Tk/=</h3>
                <h4>Total Expense</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" onclick="getcontent('sales')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo 0 ?> Tk/=</h3>

                <h4>Total Cash</h4>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" onclick="getcontent('purchase')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Loan Curve
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            

            <!-- TO DO List -->
            
            
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-card-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Loan Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  </div>  <!-- Content Div -->


  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="http://mkrow.com" target="_blank">Mkrow Services</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>



<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>

$(document).on('draw.dt', function () {
    
     $('.HideAfterDT').hide();
    
});

$(document).ready(function(){
  
  var loadcontent="<?php echo $loadcontent ?>";

  if(loadcontent!='')
  {
    getcontent(loadcontent);
  }

  loadcalc();


});

var id=0;

// Change Input Size if Android . . . .

function ChangeSize()
{
var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

if(isAndroid) {

  $('inoput').css('width','100%');
  
}

//$('inoput').css('width','100%');

}

// Common DataTable Function .........................................................

function AddDataTable()
{

  if($(window).width()>768){  // Dont Add DT in Android . . .

  $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

  }
  else{
    $('.form-control').css('width','100%');
  }

  $('.HideAfterDT').hide();

}


function AddSelect2()
{
  $("select").not(".notSelect").select2({
        theme: "bootstrap"
  });


}

// Get Content Start ..........................................................................

var viewcontent="";

var view_permission=1;
var add_permission=1;
var edit_permission=1;
var delete_permission=1;





function getcontent(viewname)
{

var subuserid=$('#subuserids').val();

if(subuserid>0){

var dataString="file_name="+viewname;
 
$.ajax({
type: "POST",
url: "Model/getUserPermission.php",
data: dataString,
cache: false,
success: function(html) {
  
  var res = $.parseJSON(html);

  view_permission=res[0]["view_permission"];
  add_permission=res[0]["add_permission"];
  edit_permission=res[0]["edit_permission"];
  delete_permission=res[0]["delete_permission"];

  if(view_permission==1){
    getPermittedcontent(viewname);
  }
  else{
    alert("Sorry, Access Denied !");
  }


}
});

}
else{
  getPermittedcontent(viewname);
}

}



function getPermittedcontent(viewname)
{

id=0;

viewcontent=viewname;
document.getElementById("content").innerHTML="<center><img style='opacity:0.4;'   src='dist/img/loader.gif' /><center>";


if($(window).width()<=768)
{
  $("#menubar").trigger("click");
}

$.ajax({
type: "POST",
url: "View/"+viewname+".php",
data: "",
cache: false,
success: function(html) {

 document.getElementById("content").innerHTML = html;

 var scripturl="Script/"+viewname+".js";

 $.getScript( scripturl, function( data, textStatus, jqxhr ) {
        // do some stuff after script is loaded
    } );

 //ChangeSize();
 AddDataTable();
 AddSelect2();

 
}
});


}

// End Content ...... ..........................................................................


// Common Function .............................................................................


function save(sql)
{

if( (add_permission==1 && id==0) || (edit_permission==1 && id>0) ){

var dataString="sql="+sql;
//alert(dataString); 
$.ajax({
type: "POST",
url: "Model/save.php",
data: dataString,
cache: false,
success: function(html) {

 alert(html);
 getcontent(viewcontent);
 id=0;
 //document.getElementById("content").innerHTML = html;

}
});

}
else{
  alert("Sorry, Access Denied !");
}


}




function saveWithoutMessage(sql)
{

  if( (add_permission==1 && id==0) || (edit_permission==1 && id>0) ){

var dataString="sql="+sql;
//alert(dataString);
      
$.ajax({
type: "POST",
url: "Model/save.php",
data: dataString,
cache: false,
success: function(html) {

 //alert(html);
 //getcontent(viewcontent);
 id=0;
 //document.getElementById("content").innerHTML = html;

}
});

  }
  else{
    alert("Sorry, Access Denied !");
  }


}


function deletedata(id,e,tablename)
{
   
  if(delete_permission==1){

   if(confirm('Are You Sure?'))
   {
    
    var dataString="deletedid="+id+"&tablename="+tablename;

$.ajax({
type: "POST",
url: "Model/delete.php",
data: dataString,
cache: false,
success: function(html) {

 alert(html);
 $(e).closest('tr').remove();
 //getcategory();
 //document.getElementById("content").innerHTML = html;
 
}
});

   }

  }
  else{
    alert("Sorry, Access Denied !");
  }

}


function ScrollToBottom()
{
  window.scrollTo(0, document.body.scrollHeight);
}  

function ScrollToTop()
{
  document.documentElement.scrollTop = 0;
}  



function loadcalc(){
  document.getElementById("calculator").innerHTML='<object type="text/html" style="height:450px;" data="Calculator/index.html" ></object>';
}




function showModal(content){

// Modal Open Content Report Close ..............

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


$('#modal-body').html(content);

// When the user clicks the button, open the modal 
//btn.onclick = function() {
  modal.style.display = "block";
//}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


}



function printDiv(div) { 

   document.getElementById('content').innerHTML = document.getElementById(div).innerHTML;
   document.getElementById("myModal").style.display = "none";
   $("#print,#pdf,#excel,.main-footer").hide();
      window.print();
   $("#print,#pdf,#excel,.main-footer").show();
   window.location.href="home.php?content="+viewcontent;

        } 


        
function ReportRefresh()
{ 

var s_dtfrom=$('#s_dtfrom').val();
var s_dtto=$('#s_dtto').val();
var s_ctg=$('#s_ctg').val();
var s_model=$('#s_model').val();
var s_code=$('#s_code').val();
var s_name=$('#s_name').val();
var s_customer=$('#s_customer').val();

var dataString="s_dtfrom="+s_dtfrom+"&s_dtto="+s_dtto+"&s_ctg="+s_ctg+"&s_model="+s_model+"&s_code="+s_code+"&s_name="+s_name+"&s_customer="+s_customer;
//alert(s_code);
$.ajax({
type: "POST",
url: "Model/Session_ReportSearch.php",
data: dataString,
cache: false,
success: function(html) {

  getcontent(viewcontent);
 
}
});

  

}


var Param="";

function getDropDownListByTableField(table,field,getFromId,SetToId,name)
{
var fieldValue=document.getElementById(getFromId).value;
var dataString = 'table='+table+'&field='+field+'&fieldValue=' + fieldValue+'&name='+name+'&Param='+Param;
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "Model/getDropDownListByTableField.php",
data: dataString,
cache: false,
async:false,
success: function(html) {
  console.log(html);
 document.getElementById(SetToId).innerHTML = html;
 Param="";
}
});
}


function getValueByTableField(table,target_field,condition_field)
{
var condition_field_value=document.getElementById(condition_field).value;
var dataString = 'table='+table+'&target_field='+target_field+'&condition_field=' + condition_field+'&condition_field_value='+condition_field_value+'&Param='+Param;
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "Model/getValueByTableField.php",
data: dataString,
cache: false,
async:false,
success: function(html) {
 document.getElementById(target_field).value = html;
 $('#'+target_field).trigger("change");
 Param="";
}
});
}


</script>



