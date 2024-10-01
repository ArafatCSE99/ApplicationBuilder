function savedata()
{ 

       var userid=$('#userid').val();
       var name=$('#name').val();
       var product=$('#product').val();
       var module=$('#module').val();
       var sequence=$('#sequence').val();
       debugger;
       name=name.replace("'", "/'");

       if(name=="")
       {
         alert('Please Insert features_category Name ! !');
       }
       else{
    
       if(id==0){
        var sql="INSERT INTO features_category (`userid`, `name`, `product_id`, `module_id`, `sequence`) VALUES ('"+userid+"','"+name+"','"+product+"','"+module+"','"+sequence+"')";
       }
       else{
          var sql = "UPDATE features_category SET name='"+name+"',product_id='"+product+"',module_id='"+module+"',sequence='"+sequence+"' WHERE id="+id;
      }
      
       save(sql);     
       id=0;
       ScrollToTop();

    }
   
}


function updatedata(updateid,e)
{
  
  id=updateid;

  $('#features_categoryid').val(updateid);

  var row=$(e).closest('tr');

  $name=row.find('.name').text();
  $product=row.find('.product').text();
  $module=row.find('.module').text();
  $sequence=row.find('.sequence').text();
  
  $('#name').val($name);
  $('#sequence').val($sequence);
  $("#product option:contains(" + $product + ")").attr('selected', 'selected').change();
  $("#module option:contains(" + $module + ")").attr('selected', 'selected').change();
  
  ScrollToBottom();

}


$(document).on('change', '#product',function(){
  getDropDownListByTableField('modules','product_id','product','module','Module');
});
