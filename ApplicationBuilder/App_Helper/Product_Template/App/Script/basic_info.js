
function savedata()
{ 
     
       var userid=$("#userid").val();

       
    var company=$('#company').val();
    var mobile=$('#mobile').val();

       id=$("#insertupdateid").val();

       if(id==0){
           var sql="insert into basic_info (company,mobile) values ('"+company+"','"+mobile+"')";
       }
       else{    
           var sql = "UPDATE basic_info SET company='"+company+"',mobile='"+mobile+"' WHERE id="+id;
       }

       console.log(sql);
       save(sql);
       id=0;
       ScrollToTop();
}
