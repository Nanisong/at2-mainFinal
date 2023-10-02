  <!--the filter by style-->
  <div class="container">
        <label for="filterbyNationality" class="form-label">Filter By Nationality:</label>
            <input class="form-control" list="datalistOptions" id="filterbyNationality" placeholder="Type in...">
            <datalist id="datalistOptions">
                <option value="French">
                <option value="Dutch">
                <option value="Italian">
                <option value="Spanish">
            </datalist>
        </div>
        <div class="container">
        <label for="filterbyTime" class="form-label">Filter By the century Artist lived :</label>
            <input class="form-control" list="artistdatalistOptions" id="filterbyTime" placeholder="Type in...">
            <datalist id="artistdatalistOptions">
            <option value="14">
            <option value="15">
            <option value="16">
            <option value="17">
            <option value="18">
            <option value="19">
            <option value="20">
            </datalist>
        </div>
        
         <!--javascript for filter action-->
         <script>
           
           $(document).ready(function(){
               var tablerowcount = document.getElementById("gtable").rows.length;
               $("#filterbyNationality").on("keyup", function() {
                   var value = $(this).val().toLowerCase();
                       $("#tablebody tr").filter(function() {
                       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                       });
                       //remove the style colomn when filtering
                       //document.getElementById("styleth").style.display='none';
                       //table rowscount
                       //for(var i=1; i<tablerowcount; i++) {
                          // document.getElementById(i.toString()).style.display='none';
                       //}
                   
               });
               $("#filterbyTime").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               var c = parseInt(value)-1;
               //alert(c);
                   $("#tablebody tr").filter(function() {
                    //condition here
                    
                    $(this).toggle($(this).text().toLowerCase().indexOf(c) > -1)
                   });
                   //document.getElementById("artistth").style.display='none';
                  //for(var i=100; i<(100+tablerowcount); i++) {
                       
                       //document.getElementById(i.toString()).style.display='none';
                  //}
               });
           });

       </script>
      
      
       <script>
           var reference = 
           (function setValue(id,value){
               document.getElementById(id).value = value;
               return setValue; 
           });
       </script>
       <!--end of filter by style-->
       <!-- javascript for clear the input when click on another input box-->
       <script>
            $(document).ready(function(){
               var tablerowcount = document.getElementById("gtable").rows.length;
               $("#filterbyNationality").on("click", function() {
             
                       reference('filterbyTime','');
                       /*
                       document.getElementById("artistth").style.display='table-cell';
                       for(var i=100; i<(100+tablerowcount); i++) {
                           document.getElementById(i.toString()).style.display='table-cell';
                       }
                       */
                   });
               $("#filterbyTime").on("click", function() {
                   reference('filterbyNationality','');
                   /*
                   document.getElementById("styleth").style.display='table-cell';
                   var tablerowcount = document.getElementById("gtable").rows.length; //table rowscount
                   for(var i=1; i<tablerowcount; i++) {
                       document.getElementById(i.toString()).style.display='table-cell';
                   }
                   */
               });
           });
       </script>

       