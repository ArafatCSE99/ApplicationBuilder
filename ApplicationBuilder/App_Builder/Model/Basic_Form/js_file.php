<?php
$txt= '
function savedata()
{ 
     
       var userid=$("#userid").val();

       '.$get_value.'

       id=$("#insertupdateid").val();

       if(id==0){
           '.$insert_sql.'
       }
       else{    
           '.$update_sql.'
       }

       console.log(sql);
       save(sql);
       id=0;
       ScrollToTop();
}
';

?>