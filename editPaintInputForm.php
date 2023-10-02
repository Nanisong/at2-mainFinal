
<div class="container">
    <h1>
        <?php
            if($currentPaint[0] == '-1'){
                echo 'Create a Record';
            }
            else{echo 'Update a Record';}
        ?>
    </h1>
        <form id='paintForm' method='POST'  
            enctype='multipart/form-data'>
            <div class="form-group">
                <!--<label>  Title :<input type='text' name='title' id = 'title' required /> </label> <br><br>-->
                 <!--artist input -->
                <?php 
                include_once('artistNameInput.php');
                ?>
                <br>
                <label for="title" class="form-label">Title:
                        <input class="form-control" name = "title"  list="datalistOptionsForTitle" id="title" placeholder="Type in..." required />
                        <div>
                            <datalist id="datalistOptionsForTitle">
                                <option value="At the Lapin Agile">
                                <option value="Bal du moulin de la Galetter">
                                <option value="Cafe Terrace at Night">
                                <option value="Doni Tondo (Doni Madonna)">
                                <option value="Houses of Parliament">
                                <option value="Jaz de Bouffan">
                                <option value="Mona Lisa">
                                <option value="Nature morte au compotier">
                                <option value="Sunrise">
                                <option value="The Potato Eaters">
                                <option value="The Persistence of Memory">
                                <option value="The Hallucinogenic Toreador">
                                <option value="The Kingfisher">
                                <option value="Vitruvian Man">
                                <option value="Weaver">
                        
                        </datalist>
                    </div>
                    </label><br><br>
                <!--
                <label>  Year :<input type='date' value = '' name='year' id="date" required /> </label> <br><br>
                -->
                
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                    <label>  Year :<input id ='datepickeryearonly' class="col-md-4 form-control " name="year" type="text" value='' required></label>
                    </div>
                </div>
                

                <label> Painting medium:
                    <select class='form-control' value= '' name = 'media' id='media'  required>
                        <option>watercolor</option>
                        <option>acrylic</option>
                        <option>pen-ink</option>
                        <option>oil</option>
                    </select>
                </label> <br><br>

                <div>
                    <?php
                        if($currentPaint[0] != '-1'){
                            echo '<div class="card" style = "width: 8rem;">';
                            echo '<img class = "card-img-top" src="data:image/png;base64,';
                                        echo $currentPaint[12]; 
                                        echo'"';
                            echo ' class="w-100" />';
                            echo '</div>';
                        }
                    ?>
                </div>
                
                <div class="d-none">
                    <input class="form-control" name = "artistid" type ="text" value = '5' id="artistid" placeholder="Type in..." required />
                </div>
                <label> Style:
                    <select class='form-control' value= '' name = 'style' id='style' required>
                        <option>Impressionism</option>
                        <option>Mannerism</option>
                        <option>Still-life</option>
                        <option>Portrait</option>
                        <option>Realism</option>
                        <option>Cubism</option>
                        <option>Surrealism</option>
                    </select>
                </label> <br><br>
                 <label> Pick an image:  <input type='file' name='file' id = 'fileInput' accept="image/*"  
                 <?php 
                    if($currentPaint[0] == '-1'){
                        echo 'required'; 
                    }
                 ?>/> 
                 </label> <br><br>

                <label> Save your image to database: <input type='submit' value='Save to server' name='submit' /></label><br><br>
            </div>
        </form>
    </div>
            <script>
                var val;
                async function postF(text){
                    let params = {
                    "method": "POST",
                    "headers": {
                        "Content-Type": "text/plain; charset=utf-8"
                    },
                        "body": text
                    }
                    return fetch("prepareArtistForNewPaint.php", params).then(res=>res.text());
                }
            </script>
            <script>
                //$(document).on('change', 'input', function() {
                 $("#artist").on('change', function(){
                   // $("#artist").change(function(){
                        val = $(this).val();
                        postF(val).then(function(result){
                        if(result == 'ask'){
                            //alert(result);
                            //set the modal default value
                            var artistname =  document.getElementById("artist").value;
                            reference('artistname',artistname);
                            //clear the artist input
                            reference('artist','');
                           
                            document.getElementById("newArtistConfirmBTN").click();
                        }
                        else{reference('artistid',result); }
                        });
                });
            </script>
            
            <script> 
                $(window).ready(function() {
                $("#paintForm").on("keypress", function (event) {
                   
                    var keyPressed = event.keyCode || event.which;
                    if (keyPressed === 13) {
                        
                        event.preventDefault();
                        return false;
                    }
                });
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
            <script>
                $("#datepickeryearonly").datepicker({
                    endDate:"1900",
                    autoclose: true,
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years"
                });
            </script>
            