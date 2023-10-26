<script src="jquery-1.12.4.min.js"></script>
<script src="dataTable.js"></script>
<script>
    
    function deleteConfirm(){
        confirm('Are you sure to delete this');
    }
    
    
$(document).ready(function(){
   $(document).on("click","#selectAllBoxes",function(){
       if(this.checked){
           $('.checkBoxes').each(function(){
            this.checked = true;   
           });
       }else{
           $('.checkBoxes').each(function(){
            this.checked = false;   
           });
       }
   });
    
   $("#table-pagination").DataTable();    
});

    
    
</script>
</body>
</html>