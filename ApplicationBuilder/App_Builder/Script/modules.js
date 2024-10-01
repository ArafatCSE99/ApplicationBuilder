

// Image Brows ........................................

$(document).on("click", ".browse", function() {
  var file = $(this)
  .parent()
  .parent()
  .parent()
  .find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
  // get loaded data and render thumbnail.
  document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});

var imag_name="";

$("#image-form").on("submit", function() {
  debugger;
  $.ajax({
    type: "POST",
    url: "imageUpload/ajax/action.ajax.php",
    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    contentType: false, // The content type used when sending data to the server.
    cache: false, // To unable request pages to be cached
    processData: false, // To send DOMDocument or non processed data file it is set to false
    async:false,
    success: function(data) {

      imag_name=data;
   
    },
    error: function(data) {


    }
  });

  });


// modules is not saved fro here 
function savedata()
{ 

       var userid=$('#userid').val();
       var module_name=$('#module_name').val();
       var product=$('#product').val();

       if(module_name=="")
       {
         alert('Please Insert Module Name ! !');
       }
       else{

       $("#image-form").submit();

       if(id==0){
        var sql="INSERT INTO modules (userid,product_id,name,module_logo) VALUES ('"+userid+"','"+product+"','"+module_name+"','"+imag_name+"')";
       }
       else{

        if(imag_name==""){

          var sql = "UPDATE modules SET name='"+module_name+"',product_id='"+product+"' WHERE id="+id;
      
        }else{

          var sql = "UPDATE modules SET name='"+module_name+"',product_id='"+product+"',module_logo='"+imag_name+"' WHERE id="+id;
        }
      }
      
       save(sql);     
       id=0;
       ScrollToTop();

    }
   
}


function updatedata(updateid,e)
{
  
  id=updateid;

  $('#modulesid').val(updateid);

  var row=$(e).closest('tr');

  $module_name=row.find('.module_name').text();
  $product_name=row.find('.product_name').text();
 
  $('#module_name').val($module_name);
  $("#product option:contains(" + $product_name + ")").attr('selected', 'selected').change();

  ScrollToBottom();

}
