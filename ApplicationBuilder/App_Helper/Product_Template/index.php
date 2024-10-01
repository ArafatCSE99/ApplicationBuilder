<?php

session_start();

include "App/connection.php";

$company_name="Mkrow Services";
$company_logo="Mkrow Services";
$product_name="Mkrow ERP";
$product_description="Best ERP Application";

$product_id=1;
if(isset($_GET['product_id']))
{
  $product_id=$_GET['product_id'];
}

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
$company_name=$row["company_name"];

if($row["company_logo"]!="")
{
  $comp_imageurl="../../App_Builder/imageUpload/uploads/".$row["company_logo"];
}
else{
  $comp_imageurl="../../App_Builder/dist/img/global_logo.png";
}

$product_name=$row["product_name"];
$product_description=$row["product_description"];

  }
} 

// get from database ...

$_SESSION["product_name"]=$product_name;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $company_name ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="src/css/style.css">

</head>
<body>

<form action='App/' method='post' id='loginForm'>
  <input type='hidden' value='0' id='moduleid' name='moduleid'>
</form>

<div class="heading">
  <h1><?php echo $product_name ?></h1>
  <p><?php echo $product_description ?></p> 
</div>
  
<div class="container">
  <div class="row">

<?php

$sql = "SELECT * FROM modules where product_id=$product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    $module_id=$row["id"];
    $module_name=$row["name"];
    if($row["module_logo"]!="")
    {
      $imageurl="../../App_Builder/imageUpload/uploads/".$row["module_logo"];

    }
    else{
      $imageurl="../../App_Builder/dist/img/global_logo.png";
    }

    echo '<div class="col-sm-3">
    <center>
      <img src="'.$imageurl.'" class="img-thumbnail module" alt="Cinque Terre" height="200px" width="200px" onclick="Login('.$module_id.')">   
      <p class="texts">'.$module_name.'</p>
    </center>
    </div>';

    
  }
} 
    
?>

  </div>
</div>

</body>
</html>

<script>
  function Login(moduleid)
  {
     //alert(moduleid);
     $('#moduleid').val(moduleid);
     $('#loginForm').submit();
  }
</script>