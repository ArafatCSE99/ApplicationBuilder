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
            <h1>Features Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Features Category</li>
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
                <h3 class="card-title" >List of Features Category</h3>
                <a href="#add"><span style="float:right; cursor:pointer;">Add New</span></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow:auto;">
                <table id="example1" class="table table-bordered" style="width:100%">
                  <thead class="thead-light">
                  <tr>
                    <th style='text-align:center;'>#</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Module</th>
                    <th>Order</th>
                    <th style='text-align:center;'>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

$slno=0;

$sql = "SELECT * FROM features_category where userid=$userid order by product_id,module_id,sequence";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $slno++;
    $id=$row["id"];
    
    $name=$row["name"];
    
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

     echo "<tr>";
     echo "<td style='text-align:center;'>".$slno."</td>";
     echo "<td class='name'>".$name."</td>"; 
     echo "<td class='product'>".$product_name."</td>"; 
     echo "<td class='module'>".$module_name."</td>"; 
     echo "<td class='sequence'>".$row["sequence"]."</td>"; 
     echo "<td class='text-center py-0 align-middle' style='text-align:center;'>
                      <div class='btn-group btn-group-sm'>
                        <a onclick='updatedata($id,this)' class='btn btn-info'><i class='fas fa-edit'></i></a>
                        <a onclick=deletedata($id,this,'features_category') class='btn btn-danger'><i class='fas fa-trash'></i></a>
                      </div>
                    </td>";
     echo "</tr>";
      

  }
} else {
  
}
                ?>
                  
                </tbody></table>
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
              <h3 class="card-title">Add Features Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">

  <div class="row">

<div class="col-sm-6">
  
<input type="hidden" name="features_categoryid" id="features_categoryid"  value="0">   

<div class="form-group">
  <label for="category">Category Name</label>
  <input type="text" id="name" name="name" style="width:80%" class="form-control" placeholder="Name">
</div>


<div class="form-group">
  <label for="category">Product</label>
  <?php
$sqlsem = "SELECT * FROM product where userid=$userid";
$resultse = $conn->query($sqlsem);
echo "<select style='width:80%' class='form-control' id='product' name='product' required>";
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


<div class="form-group">
  <label for="category">Module</label>
  <?php
echo "<select style='width:80%' class='form-control' id='module'  required>";
echo "<option hidden='' value=''>--Select Module--</option>";
echo  "<option >None</option>";
echo " </select>";
?>
</div>

<div class="form-group">
  <label for="category">Order</label>
  <input type="text" id="sequence"  style="width:80%" class="form-control" placeholder="Order">
</div>
  
</div>



 


  <div class="col-sm-6">
  

  
  </div>


  
</div>



      
        <br>
        <input type="button" onclick="savedata()" class="btn btn-success float-left" value="Save" name="image_upload" id="image_upload" class="btn"/>
        
      

        <!-- for image upload -->

                             
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
     
    </section>
    <!-- /.content -->





    

</div>
