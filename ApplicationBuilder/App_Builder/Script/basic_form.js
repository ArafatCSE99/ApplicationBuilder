
function adddata()
{
   var name=$('#name').val();
   var field_type=$('#field_type option:selected').text();
   var input_type=$('#input_type option:selected').text();
   var options=$('#options').val();
   
   if(name=="" || field_type=="" || input_type=="" )
   {
      alert('Plese Insert Data ! !');
   }
   else
   {

      var tabledata="<tr><td style='display:none;' class='detailid'>0</td><td style='text-align:center;' class='slno'></td><td class='name'>"+name+"</td><td class='field_type'>"+field_type+"</td><td class='input_type'>"+input_type+"</td><td class='options'>"+options+"</td>"
      +"<td class='text-center py-0 align-middle' style='text-align:center;'>"
      +"<div class='btn-group btn-group-sm'>"
      +"<a onclick=deletedetaildata(0,this,'basic_form_detail') id='deletebuttondetail' class='btn btn-danger'><i class='fas fa-trash'></i></a>"
      +"</div>"
      +"</td>"
      +"</tr>";
     
      $('#detail tbody').append(tabledata);
                   
      addslno();           

      $('#field_type').val('').change();
      $('#input_type').val('').change();
      $('#name').val('');
      $('#options').val('');
      
   }
   
}

function addslno()
{
  $('#detail tbody tr').each(function (i, row) {

    var $row = $(row);

    $row.find('.slno').text(i+1*1);

  });
}


function savedata()
{ 
     
       var userid=$('#userid').val();

       var feature=$('#feature').val();
       var product=$('#product').val();
       var module=$('#module').val();
       var category=$('#category').val();

       var count=0;
       $('#detail tbody tr').each(function (i, row) { 
        count++;
      });

       if(feature=="")
       {
           alert('Please Select feature ! !');
       }
       else if(count==0){
          alert('Please Add Field ! !');
       }
       else
       {

        if(id==0){
          var sql="INSERT INTO basic_form_master (`product_id`, `module_id`, `category_id`, `feature_id`, `userid`) VALUES ("+product+",'"+module+"','"+category+"','"+feature+"','"+userid+"')";
         }
         else{
          var sql = "UPDATE sales_master SET customerid='"+customerid+"',sales_date='"+sales_date+"',total_price='"+total+"',paid='"+paid+"',due='"+due+"',note='"+note+"' WHERE id="+id;
         }
         var returnsql="SELECT max(id) as id FROM basic_form_master WHERE userid="+userid;       
         savemaster(sql,returnsql);      
       }
}

function savemaster(sql,returnsql)
{
   
var dataString="sql="+sql+"&returnsql="+returnsql;

//alert(dataString);
      
$.ajax({
type: "POST",
url: "Model/savemaster.php",
data: dataString,
cache: false,
success: function(html) {

savedetail(html);

}
});

}


function savedetail(masterid)
{

  if(id!=0)
  {
    masterid=id;
  }
  
  $('#detail tbody tr').each(function (i, row) {

    var $row = $(row);   

    var userid=$('#userid').val();
    var detailid=$row.find('.detailid').text();
    var name=$row.find('.name').text();
    var field_name=name.toLowerCase();
    field_name=field_name.replace(' ', '_');
    var field_type=$row.find('.field_type').text();
    var field_length=200;
    var Default_value="";
    var input_type=$row.find('.input_type').text();
    var options=$row.find('.options').text();

    //alert(detailid);

     if(detailid==0) {
      var sql="INSERT INTO basic_form_detail (userid,`master_id`, `name`, `field_name`, `field_type`, `field_length`, `Default_value`, `input_type`, `options`) VALUES ("+userid+",'"+masterid+"','"+name+"','"+field_name+"','"+field_type+"','"+field_length+"','"+Default_value+"','"+input_type+"','"+options+"')";
     }  
     else
     {
      
      // No chance to update . . . . . . . . . . . . . . . 
      //var sql="INSERT INTO sales_detail (userid,salesid,productid,quantity,unitprice,total_price) VALUES ("+userid+",'"+id+"','"+productid+"','"+qty+"','"+unitprice+"','"+amount+"')";

     }


     // Ajax To Save Data .......
 //alert(sql);      
       
var dataString="sql="+sql;

//alert(dataString);
      
$.ajax({
type: "POST",
url: "Model/savedetail.php",
data: dataString,
cache: false,
success: function(html) {
    //alert(html);
}
});

    
  });

  alert('Data Successfully Saved ! !');
  getcontent(viewcontent);
  id=0;

}



function updatedata(updateid,e)
{

  id=updateid;
  
  var row=$(e).closest('tr');
  
  $customerid=row.find('.customerid').text();
  $customer_name=row.find('.customer_name').text();
  $sales_date=row.find('.sales_date').text();
  $total_price=row.find('.total_price').text();
  $paid=row.find('.paid').text();
  $due=row.find('.due').text();
  $note=row.find('.note').text();

  $('#customer').val($customerid).change();
  $('#sales_date').val($sales_date);
  $('#total').text($total_price);
  $('#paid').val($paid);
  $('#due').text($due);
  $('#note').val($note);
  
  // Get Detail data .............................

  $('#detail tbody').empty();

  var dataString="salesid="+updateid;

  $.ajax({
    type: "POST",
    url: "Model/getsalesdetail.php",
    data: dataString,
    cache: false,
    success: function(html) {
    
      $('#detail tbody').append(html);
    
    }
    });



  ScrollToBottom();

}


function deletemasterdetail(id,e,tablename,detailtablename,masteridname)
{
   if(confirm('Are You Sure?'))
   {

    var dataString="deletedid="+id+"&tablename="+tablename+"&detailtablename="+detailtablename+"&masteridname="+masteridname;

$.ajax({
type: "POST",
url: "Model/deletemasterdetail.php",
data: dataString,
cache: false,
success: function(html) {

 alert(html);
 $(e).closest('tr').remove();
 
 
}
});

   }

}



function deletedetaildata(id,e,tablename)
{
   if(confirm('Are You Sure?'))
   {

    var dataString="deletedid="+id+"&tablename="+tablename;

$.ajax({
type: "POST",
url: "Model/delete.php",
data: dataString,
cache: false,
success: function(html) {

 alert(html);
 $(e).closest('tr').remove();
 
}
});

   }

}


$(document).ready(function(){
 
  if($(window).width()<=768){ 

    $('.form-control').css('margin','0px');

  }

});

$(document).on('change', '#product',function(){
  getDropDownListByTableField('modules','product_id','product','module','Module');
});


$(document).on('change', '#module',function(){
  getDropDownListByTableField('features_category','module_id','module','category','Category');
});


$(document).on('change', '#category',function(){
  getDropDownListByTableField('features','category_id','category','feature','Feature');
});



function FormBuilder(id,e)
{
  dataString="id="+id;

  $.ajax({
    type: "POST",
    url: "Model/Basic_Form/Basic_Form_Builder.php",
    data: dataString,
    cache: false,
    success: function(html) {
    
     alert(html);
     
    }
    });
}