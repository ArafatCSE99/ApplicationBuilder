<?php 

include "../../connection.php";
$id=$_POST["id"];

$sql = "SELECT a.*,b.name,b.file_name FROM basic_form_master a,features b where a.feature_id=b.id and a.id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $file_name=$row["file_name"];
    $id=$row["id"];
    $name=$row["name"];
  }
}


$sql_txt="
    CREATE TABLE IF NOT EXISTS ".$file_name." (
      `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       userid int(10),";

$init_var="";
$assign_value="";
$form_component="";

$get_value="";
$insert_sql_1="";
$insert_sql_2="";
$update_sql_part="";

$sql = "SELECT * FROM basic_form_detail where master_id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $display_name=$row["name"];
    $field_name=$row["field_name"];
    $field_type=$row["field_type"];
    $field_length=$row["field_length"];
    $input_type=$row["input_type"];

    // SQL File Variables .............
    $sql_txt.=" 
    ".$field_name." ".$field_type."(".$field_length."),";

    // PHP File Variables ..............

    $init_var.="
    $".$field_name."=\"\";";


    $assign_value.="
    $".$field_name."=\$row[\"".$field_name."\"];";

    $form_component.="
              <div class=\"form-group\">
                <label for=\"".$field_name."\">".$display_name."</label>
                <input type=\"text\" id=\"".$field_name."\" style=\"width:90%\" class=\"form-control\" value=\"<?php echo \$".$field_name." ?>\" placeholder=\"".$display_name."\">
              </div>";

    // JS File Variable .................
    $get_value.="
    var ".$field_name."=$('#".$field_name."').val();";

    $insert_sql_1.="".$field_name.",";
    $insert_sql_2.="'\"+".$field_name."+\"',";

    $update_sql_part.="".$field_name."='\"+".$field_name."+\"',";

  }
}

$sql_txt.="
`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";

// Create Table ..........
if ($conn->query($sql_txt) === TRUE) {
  //echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// SQL File ...............
$filename="../../../App_Helper/Product_Template/App/DB_Script/".$file_name.".sql";
$file = fopen($filename, "w+") or die("Unable to open file!");
fwrite($file, $sql_txt);
fclose($file);

// PHP File .................
$filename="../../../App_Helper/Product_Template/App/View/".$file_name.".php";
$file = fopen($filename, "w+") or die("Unable to open file!");
include "php_file.php";
fwrite($file, $txt);
fclose($file);

$insert_sql_1=substr($insert_sql_1, 0, -1);
$insert_sql_2=substr($insert_sql_2, 0, -1);
$insert_sql="var sql=\"insert into ".$file_name." (userid,".$insert_sql_1.") values ('\"+userid+\"',".$insert_sql_2.")\";";

$update_sql_part=substr($update_sql_part, 0, -1);
$update_sql="var sql = \"UPDATE ".$file_name." SET ".$update_sql_part." WHERE id=\"+id;";

//JS File ....................
$filename="../../../App_Helper/Product_Template/App/Script/".$file_name.".js";
$file = fopen($filename, "w+") or die("Unable to open file!");
include "js_file.php";
fwrite($file, $txt);
fclose($file);

echo "Form Successfully Published!";

?>