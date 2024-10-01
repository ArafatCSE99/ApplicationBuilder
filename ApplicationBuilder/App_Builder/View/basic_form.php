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
            <h1>Basic Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Basic Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>






    <!-- Table -->   

    <section class="content">
      <div class="row">
        <div class="col-md-12">

    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" >List of Basic Form</h3>
                <a href="#add"><span style="float:right; cursor:pointer;">Add New</span></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow:auto;">
                <table id="example1" class="table table-bordered" style="width:100%">
                  <thead class="thead-light">
                  <tr>
                    <th style='text-align:center;'>#</th>
                    <th>Feature Name</th>
                    <th>Product</th>
                    <th>Module</th>
                    <th>Category</th>
                    <th style='text-align:center;'>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

$slno=0;

$sql = "SELECT * FROM basic_form_master where userid=$userid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $slno++;
    $id=$row["id"];
    
    $product_id=$row["product_id"];
    $product_name="";

$sqlc = "SELECT * FROM product where id=$product_id";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {
  // output data of each row
  while($rowc = $resultc->fetch_assoc()) {
    $product_name=$rowc["product_name"];
  }
} else {
 
}


    $module_id=$row["module_id"];
    $module_name="";

$sqlc = "SELECT * FROM modules where id=$module_id";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {
  // output data of each row
  while($rowc = $resultc->fetch_assoc()) {
    $module_name=$rowc["name"];
  }
} else {
 
}


    $category_id=$row["category_id"];
    $category_name="";

$sqlc = "SELECT * FROM features_category where id=$category_id";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {
  // output data of each row
  while($rowc = $resultc->fetch_assoc()) {
    $category_name=$rowc["name"];
  }
} else {
 
}

    $feature_id=$row["feature_id"];
    $feature_name="";

$sqlc = "SELECT * FROM features where id=$feature_id";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {
  // output data of each row
  while($rowc = $resultc->fetch_assoc()) {
    $feature_name=$rowc["name"];
  }
} else {
 
}

     echo "<tr>";
     echo "<td style='text-align:center;'>".$slno."</td>";
     echo "<td class='name'>".$feature_name."</td>"; 
     echo "<td class='product'>".$product_name."</td>"; 
     echo "<td class='module'>".$module_name."</td>"; 
     echo "<td class='category'>".$category_name."</td>"; 
     
     echo "<td class='text-center py-0 align-middle' style='text-align:center;'>
                      <div class='btn-group btn-group-sm'>
                        <a onclick='FormBuilder($id,this)' class='btn btn-primary'><i class='fas fa-eye'></i></a>
                        <a onclick='updatedata($id,this)' class='btn btn-info'><i class='fas fa-edit'></i></a>
                        <a onclick=deletemasterdetail($id,this,'basic_form_master','basic_form_detail','master_id') class='btn btn-danger'><i class='fas fa-trash'></i></a>
                      </div>
                    </td>";
     echo "</tr>";
      

  }
} else {
  
}
                ?>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>


            </div>
        
        </div>
       
      </section>
        

    <!-- End Table -->


     
<!-- Main content -->
<section class="content" id="add">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Basic Form</h3>

             

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body" style="overflow:auto;">

            <form class="form-inline" action="#">

            
<div class="form-group" style='margin:10px;'>
  <label for="category">Product</label>
  <?php
$sqlsem = "SELECT * FROM product where userid=$userid";
$resultse = $conn->query($sqlsem);
echo "<select style='width:100%' class='form-control' id='product' name='product' required>";
echo "<option hidden='' value=''>--Select Product--</option>";
if ($resultse->num_rows > 0) {
while($rowse = $resultse->fetch_assoc()) {
$up_name=$rowse["product_name"];
$upid=$rowse["id"];
echo  "<option value='$upid'>".$up_name."</option>";
}
} else {
echo  "<option >None</option>";
}
echo " </select>";
?>

</div>


<div class="form-group" style='margin:10px;'>
  <label for="category">Module</label>
  <?php
echo "<select style='width:100%' class='form-control' id='module'  required>";
echo "<option hidden='' value=''>--Select Module--</option>";
echo  "<option >None</option>";
echo " </select>";
?>
</div>

<div class="form-group" style='margin:10px;'>
  <label for="category">Category</label>
  <?php
echo "<select style='width:100%' class='form-control' id='category'  required>";
echo "<option hidden='' value=''>--Select Category--</option>";
echo  "<option >None</option>";
echo " </select>";
?>
</div>

<div class="form-group" style='margin:10px;'>
  <label for="category">Feature</label>
  <?php
echo "<select style='width:100%' class='form-control' id='feature'  required>";
echo "<option hidden='' value=''>--Select Featur--</option>";
echo  "<option >None</option>";
echo " </select>";
?>
</div>

              </form>

           

              <form class="form-inline" action="#">

  <div class="form-group" style='margin:10px;'>               
    <input type="text" id="name" style="width:100%; "  placeholder="Field Name" value="" class="form-control">
  </div>

<div class="form-group" style='margin:10px;'>
    
<?php
echo "<select  class='form-control'  style='width:200px; margin-left:20px;' id='field_type' name='field_type' required>";
echo "<option hidden='' value=''>--Select Field Type--</option>";
echo  "<option value='varchar'>Text</option>";
echo  "<option value='int'>Number</option>";
echo  "<option value='Date'>Date</option>";
echo " </select>";

?>

  </div>

  <div class="form-group" style='margin:10px;'>
    <?php
    echo "<select  class='form-control'  style='width:200px; margin-left:20px;' id='input_type' name='input_type' required>";
    echo "<option hidden='' value=''>--Select Input Type--</option>";
    echo  "<option value='text'>Text</option>";
    echo  "<option value='number'>Number</option>";
    echo  "<option value='date'>Date</option>";
    echo  "<option value='time'>Time</option>";
    echo  "<option value='image'>Image</option>";
    echo  "<option value='checkbox'>Checkbox</option>";
    echo  "<option value='radio'>Radio</option>";
    echo  "<option value='dropdown'>Dropdown</option>";
    echo " </select>";
    
    ?>
      </div>

  <div class="form-group" style='margin:10px;'>              
    <input type="text" id="options" style="width:110px; margin-left:20px;" placeholder="Options" class="form-control">
  </div>
  

  <input type="button" onclick="adddata()" style="margin-left:20px;"  value="Add Field" class="btn btn-success float-left">

  </form>


              <!-- Table -->

              <table id="detail" class="table table-bordered" style="width:100%">
                  <thead class="thead-light">
                  <tr>
                    <th style='text-align:center;'>#</th>
                    <th>Field Name</th>
                    <th>Field Type</th>
                    <th>Input Type</th>
                    <th>Options</th>
                    <th style='text-align:center;'>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot style="background-color:white; font-weight: bold;">
                    <tr>
                       
                    </tr>
                  </tfoot>
                  </table>

              <br>

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
