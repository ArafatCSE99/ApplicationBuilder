
<?php

$txt= '
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
            <h1>'.$name.'</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">'.$name.'</li>
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
              <h3 class="card-title">Add / Update '.$name.'</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">


    <?php

    // Get Company Data ...............................................

    '.$init_var.'
    
    $insertupdateid=0;
 
$sql = "SELECT * FROM '.$file_name.' where userid=$userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    '.$assign_value.'

    $insertupdateid=$row["id"];

  }
} else {
  

}


    ?>



<div class="row">

    <div class="col-sm-4">


              <input type="hidden" id="insertupdateid" value="<?php echo $insertupdateid ?>">
              
 
              '.$form_component.'

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
';