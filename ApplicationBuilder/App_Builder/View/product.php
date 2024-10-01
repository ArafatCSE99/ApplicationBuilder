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
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title" >List of Products</h3>
                <a href="#add"><span style="float:right; cursor:pointer;">Add New</span></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow:auto;">
                <table id="example1" class="table table-bordered" style="width:100%">
                  <thead class="thead-light">
                  <tr>
                    <th style='text-align:center;'>#</th>
                    <th>Company Name</th>
                    <th>Company Logo</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th style='text-align:center;'>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

$slno=0;

$sql = "SELECT * FROM product where userid=$userid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $slno++;
    $id=$row["id"];
    $company_name=$row["company_name"];
    if($row["company_logo"]!="")
    {
      $imageurl="imageUpload/uploads/".$row["company_logo"];

    }
    else{
      $imageurl="dist/img/global_logo.png";
    }
    $product_name=$row["product_name"];
    $product_description=$row["product_description"];



     echo "<tr>";
     echo "<td style='text-align:center;'>".$slno."</td>";
     echo "<td class='company_name'>".$company_name."</td>";  
     echo "<td class='company_logo'><img src=$imageurl height='50px' width='50px'></td>"; 
     echo "<td class='product_name'>".$product_name."</td>"; 
     echo "<td class='product_description'>".$product_description."</td>"; 
     echo "<td class='text-center py-0 align-middle' style='text-align:center;'>
                      <div class='btn-group btn-group-sm'>
                        <a onclick='updatedata($id,this)' class='btn btn-info'><i class='fas fa-edit'></i></a>
                        <a onclick=deletedata($id,this,'product') class='btn btn-danger'><i class='fas fa-trash'></i></a>
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
              <h3 class="card-title">Add Product</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">

  <div class="row">


  <div class="col-sm-6">
  
  <input type="hidden" name="productid" id="productid"  value="0">   

<div class="form-group">
  <label for="category">Company Name</label>
  <input type="text" id="company_name" name="company_name" style="width:80%" class="form-control" placeholder="Company Name">
</div>

<div class="form-group">
  <label for="category">Product Name</label>
  <input type="text" id="name" name="name" style="width:80%" class="form-control" placeholder="Product Name">
</div>

<div class="form-group">
  <label for="category">Product Description</label>
  <input type="text" id="product_description" name="product_description" style="width:80%" class="form-control" placeholder="Product Description">
</div>  
  
</div>



 


  <div class="col-sm-6">
  

  <form method="post" id="image-form" enctype="multipart/form-data" onSubmit="return false;">
				<div class="form-group">
					<input type="file" name="file" class="file">
					<div class="input-group my-3" style="width:350px;">
						<input type="text" style="width:20px; display:none;" class="form-control" disabled placeholder="Upload Product Image" id="file">
						<div class="input-group-append">
							<button type="button" style="display:none;" class="browse btn btn-primary">Browse...</button>
						</div>
					</div>
				</div>

      <div class="form-group">
       
					<img src="dist/img/global_logo.png" height="400px;" width="150px;" id="preview" class="img-thumbnail">
			
      </div>

				<div class="form-group">
					<input type="submit" name="submit" value="Upload" style="display:none;" class="btn btn-danger">
				</div>
    </form>
  
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
