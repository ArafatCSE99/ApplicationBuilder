<html>
<head>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

<?php

include "connection.php";

$email=$_POST["email"];

$pass=$_POST["password"];

session_start(); 
		 
// Check .......................................................

$sql = "SELECT id FROM user where email='$email' and password='$pass' ";
$result = $conn->query($sql);

$validatuser=0;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION["userid"] = $row["id"];
    $_SESSION["subuserid"] = 0;
    $validatuser=1;
  }
} else {


$sqls = "SELECT * FROM subuser where user_name='$email' and password='$pass' ";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
  // output data of each row
  while($rows = $results->fetch_assoc()) {
    $_SESSION["userid"] = $rows["userid"];
    $_SESSION["subuserid"] = $rows["id"];
    $validatuser=1;
  }
}

  
}


// Redirect .......................................................

if($validatuser==1)
{

  echo "<script>
 
  swal('Login Successful ! ! !','')
  .then((willDelete) => {
if (willDelete) {

window.location.href='home.php';

}
});

</script>";

}
else{

  
  echo "<script>
  swal('Login Failed !','Wrong Email or Password ! Try Again ')
    .then((willDelete) => {
if (willDelete) {

window.location.href='index.html';
  
}
});
</script>";

}




?>

</body>

</html>