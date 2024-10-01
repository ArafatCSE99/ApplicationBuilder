

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


// product is not saved fro here 
function savedata()
{ 

       var userid=$('#userid').val();
       var name=$('#name').val();
       debugger;
       name=name.replace("'", "/'");

       if(name=="")
       {
         alert('Please Insert Product Name ! !');
       }
       else{
       
       var company_name=$('#company_name').val();
       var product_description=$('#product_description').val();

       $("#image-form").submit();

       if(id==0){
        var sql="INSERT INTO product (userid,company_name,product_name,product_description,company_logo) VALUES ('"+userid+"','"+company_name+"','"+name+"','"+product_description+"','"+imag_name+"')";
       }
       else{

        if(imag_name==""){

          var sql = "UPDATE product SET product_name='"+name+"',company_name='"+company_name+"',product_description='"+product_description+"' WHERE id="+id;
      
        }else{

          var sql = "UPDATE product SET product_name='"+name+"',company_name='"+company_name+"',product_description='"+product_description+"',company_logo='"+imag_name+"' WHERE id="+id;
        }
      }
      
       save(sql);     
       getcontent(viewcontent);
       id=0;
       ScrollToTop();

    }
   
}


function updatedata(updateid,e)
{
  
  id=updateid;

  $('#productid').val(updateid);

  var row=$(e).closest('tr');

  $name=row.find('.product_name').text();
  $company_name=row.find('.company_name').text();
  $product_description=row.find('.product_description').text();

  $('#name').val($name);
  $('#company_name').val($company_name);
  $('#product_description').val($product_description);

  ScrollToBottom();

}
