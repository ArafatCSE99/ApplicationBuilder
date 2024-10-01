
<?php

include "../connection.php";

session_start(); 

$userid=$_SESSION["userid"];

// Content  ......................................................

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


     
<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add / Update Company Info</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">


    <?php

    // Get Company Data ...............................................

    
    $company_name="";
    $phone_no="";
    $company_address="";
    
    $insertupdateid=0;
 
$sql = "SELECT * FROM company_info where userid=$userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    
    $company_name=$row["company_name"];
    $phone_no=$row["phone_no"];
    $company_address=$row["company_address"];

    $insertupdateid=$row["id"];

  }
} else {
  

}


    ?>



<div class="row">

    <div class="col-sm-4">


              <input type="hidden" id="insertupdateid" value="<?php echo $insertupdateid ?>">
              
 
              
              <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" id="company_name" style="width:90%" class="form-control" value="<?php echo $company_name ?>" placeholder="Company Name">
              </div>
              <div class="form-group">
                <label for="phone_no">Phone No</label>
                <input type="text" id="phone_no" style="width:90%" class="form-control" value="<?php echo $phone_no ?>" placeholder="Phone No">
              </div>
              <div class="form-group">
                <label for="company_address">Company Address</label>
                <input type="text" id="company_address" style="width:90%" class="form-control" value="<?php echo $company_address ?>" placeholder="Company Address">
              </div>

    </div>


</div> 


<input type="button" onclick="savedata()"  value="Save" class="btn btn-success float-left">
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
     
    </section>
    <!-- /.content -->



</div>
