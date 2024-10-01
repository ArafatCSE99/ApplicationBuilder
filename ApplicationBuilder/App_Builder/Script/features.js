function savedata()
{ 

       var userid=$('#userid').val();
       var name=$('#name').val();
       var file_name=name.toLowerCase();
       file_name=file_name.replace(' ', '_');
       var product=$('#product').val();
       var module=$('#module').val();
       var category=$('#category').val();
       var sequence=$('#sequence').val();
       debugger;
       name=name.replace("'", "/'");

       if(name=="")
       {
         alert('Please Insert features Name ! !');
       }
       else{
    
       if(id==0){
        var sql="INSERT INTO features (`userid`, `name`,file_name, `product_id`, `module_id`,category_id, `sequence`) VALUES ('"+userid+"','"+file_name+"','"+name+"','"+product+"','"+module+"','"+category+"','"+sequence+"')";
       }
       else{
          var sql = "UPDATE features SET name='"+name+"',file_name='"+file_name+"',product_id='"+product+"',module_id='"+module+"',category_id='"+category+"',sequence='"+sequence+"' WHERE id="+id;
      }
      
       save(sql);     
       id=0;
       ScrollToTop();

    }
   
}


function updatedata(updateid,e)
{
  
  id=updateid;

  $('#featuresid').val(updateid);

  var row=$(e).closest('tr');

  $name=row.find('.name').text();
  $product=row.find('.product').text();
  $module=row.find('.module').text();
  $category=row.find('.category').text();
  $sequence=row.find('.sequence').text();
  
  $('#name').val($name);
  $('#sequence').val($sequence);
  $("#product option:contains(" + $product + ")").attr('selected', 'selected').change();
  $("#module option:contains(" + $module + ")").attr('selected', 'selected').change();
  $("#category option:contains(" + $category + ")").attr('selected', 'selected').change();
  
  ScrollToBottom();

}


$(document).on('change', '#product',function(){
  getDropDownListByTableField('modules','product_id','product','module','Module');
});


$(document).on('change', '#module',function(){
  getDropDownListByTableField('features_category','module_id','module','category','Category');
});
