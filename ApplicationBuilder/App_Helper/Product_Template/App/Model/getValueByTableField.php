<?php

session_start(); 

$table=$_POST["table"];
$target_field=$_POST["target_field"];
$condition_field=$_POST["condition_field"];
$condition_field_value=$_POST["condition_field_value"];

$userid=$_SESSION["userid"];

if(isset($_POST["Param"]))
{
    $Param=$_POST["Param"];
}


include "../connection.php";

$sqlsem = "SELECT $target_field FROM $table where $condition_field=$condition_field_value  $Param";

//echo $sqlsem;
$resultse = $conn->query($sqlsem);

if ($resultse->num_rows > 0) {
	
    while($rowse = $resultse->fetch_assoc()) {
       
        echo $rowse[$target_field];
	   
    }

} else {
   
   echo  "";

}


$conn->close();

?>