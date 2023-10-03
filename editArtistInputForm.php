

<div  class="container">
   
    <h1>
        <?php
            if($currentArtist[0] == '-1'){
                echo 'Create an Artist';
            }
            else{echo 'Update an Artist';}
        ?>
    </h1>
        <form id="artistInputForm" method='POST'  
            enctype='multipart/form-data'>
            <div class="form-group">
                <?php 
                include_once('basicArtistNameInput.php');
                ?>

                <label> Nationality:
                    <select class='form-control' value= '' name = 'nationality' id='nationality' required>
                        
                        <option>French</option>
                        <option>Dutch</option>
                        <option>Italian</option>
                        <option>Spanish</option>
                       
                    </select>
                </label> 
                <!--
                <label>  Born :<input type='date' value = '' name='born' id="born" required /> </label> 
                <label>  Passing :<input type='date' value = '' name='passing' id="passing" required /> </label> 
                 -->
                <br> 
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                    <label>  Born : <input id ='aborn' class="col-md-3 form-control " name="born" type="text" value='' required></label>
                    <div class="col">
                    <label>  Passing : <input id ='apassing' class="col-md-3 form-control " name="passing" type="text" value='' required></label>
                </div>
               <br>
                <?php
               if($currentArtist[0] != '-1'){
                 echo '<div class="card" style = "width: 8rem;">';
                   echo '<img class = "card-img-top" src="data:image/png;base64,';
                            echo $currentArtist[6]; 
                            echo'"';
                   echo ' class="w-100" />';
		        echo '</div>';
                }
                ?>
               
                 <label> Pick an image:  <input type='file' name='file' id = 'fileInput' accept="image/*"  
                 <?php 
                    if($currentArtist[0] == '-1'){
                        echo 'required'; 
                    }
                 ?>/> 
                 </label> <br><br>

                <label> Save new Artist to database: <input type='submit' value='Save to server' name='submitartist' /></label><br><br>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
            
   <script>
         $(document).ready(function() {
            $("#aborn").datepicker({
            // endDate:"1900",
            autoclose: true,
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
         });
        });
       
    </script>
    <script>
        $("#apassing").datepicker({
            // endDate:"1900",
            autoclose: true,
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
    
   