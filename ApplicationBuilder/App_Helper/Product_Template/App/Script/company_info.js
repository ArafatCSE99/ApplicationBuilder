
function savedata()
{ 
     
       var userid=$("#userid").val();

       
    var company_name=$('#company_name').val();
    var phone_no=$('#phone_no').val();
    var company_address=$('#company_address').val();

       id=$("#insertupdateid").val();

       if(id==0){
           var sql="insert into company_info (userid,company_name,phone_no,company_address) values ('"+userid+"','"+company_name+"','"+phone_no+"','"+company_address+"')";
       }
       else{    
           var sql = "UPDATE company_info SET company_name='"+company_name+"',phone_no='"+phone_no+"',company_address='"+company_address+"' WHERE id="+id;
       }

       console.log(sql);
       save(sql);
       id=0;
       ScrollToTop();
}
