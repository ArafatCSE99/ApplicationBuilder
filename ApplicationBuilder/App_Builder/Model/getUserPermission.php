<?php 

include "../connection.php";

session_start(); 
$userid=$_SESSION["userid"];
$subuserid=$_SESSION["subuserid"];
$file_name=$_POST["file_name"];

$roleid=0;
$featureid=0;

$sqlr = "SELECT roleid FROM subuser where id=$subuserid";
$resultr = $conn->query($sqlr);
if ($resultr->num_rows > 0) {
  while($rowr = $resultr->fetch_assoc()) {
    $roleid=$rowr["roleid"];
  }
}

$sqlr = "SELECT * FROM `features` where `file_name`='$file_name'";
$resultr = $conn->query($sqlr);
if ($resultr->num_rows > 0) {
  while($rowr = $resultr->fetch_assoc()) {
    $featureid=$rowr["id"];
  }
}

$sqlr = "SELECT * FROM role_permissions where roleid=$roleid and featureid=$featureid";
$resultr = $conn->query($sqlr);

if ($resultr->num_rows > 0) {
  // output data of each row
  while($rowr = $resultr->fetch_assoc()) {
    $view=$rowr["is_view"];
    $add=$rowr["is_add"];
    $edit=$rowr["is_edit"];
    $delete=$rowr["is_delete"];

    $return_arr[] = array("view_permission" => $view,
    "add_permission" => $add,
    "edit_permission" => $edit,
    "delete_permission" => $delete); 
  }
} else {
  $view="0";
  $add="0";
  $edit="0";
  $delete="0";

  $return_arr[] = array("view_permission" => $view,
    "add_permission" => $add,
    "edit_permission" => $edit,
    "delete_permission" => $delete); 
}


echo json_encode($return_arr);

?>