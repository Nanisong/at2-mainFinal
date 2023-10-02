

<html lang = "en">

	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content = "width=device-width, initial-scale=1">
		<title>Home page</title>
		<!--bootstrape meta data-->
		<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>
        <?php include_once('reference.php');?> 
        <div class="container">
        <!-- Button trigger modal -->
        <div class="d-none">
            <button id="newArtistConfirmBTN" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#workflowNewArtistModal">
            Launch demo modal
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="workflowNewArtistModal" tabindex="-1" aria-labelledby="workflowNewArtistModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header" >
            <div class="alert alert-danger d-flex align-items-center" role="alert">
  				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                <h5 class="modal-title" id="painting">You input an artist not in our system, You must create this artist before creating a painting!</h5>
                </div>
			</div>
            </div>
            <div class="modal-body">
                <div>
                <form method='POST'  
                enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="artistname" class="form-label">Artist Name:
                                <input class="form-control" name = "artistname" list="datalistOptionsForArtist" value = '' id="artistname" placeholder="Type in..." required readonly />
                        </label>

                        <label> Nationality:
                            <select class='form-control' value= '' name = 'nationality' id='nationality' required>
                                <option>French</option>
                                <option>Dutch</option>
                                <option>Italian</option>
                                <option>Spanish</option>
                            </select>
                        </label> <br><br>
                    <!--
                        <label>  Born :<input type='text' value = '' name='born' id="born" required /> </label> <br><br>
                        <label>  Passing :<input type='text' value = '' name='passing' id="passing" required /> </label> <br><br>
                        -->
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <div class="col">
                            <label>  Born : <input id ='birthdatepickeryearonly' class="col-md-3 form-control " name="born" type="text" value='' ></label>
                            </div>
                            <div class="col">
                            <label>  Passing : <input id ='passingdatepickeryearonly' class="col-md-3 form-control " name="passing" type="text" value='' ></label>
                            </div>
                        </div>
                        <label> Pick an image:  <input type='file' name='file' id = 'fileInput' accept="image/*"  required /> 
                        </label> <br><br>
                        <input type='submit' class="btn btn-outline-light btn-sm btn-danger " value='confirm' name='newartist' /><br><br>
                    </div>
                </form>
                </div>
            </div>
            <div class="modal-footer">
           
            </div>
            </div>
        </div>
        </div>
            
            <!-- Bootstrap JS Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            
        </div>	
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script>
            $("#birthdatepickeryearonly").datepicker({
                endDate:"1900",
                autoclose: true,
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        </script>
         <script>
            $("#passingdatepickeryearonly").datepicker({
                endDate:"1900",
                autoclose: true,
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        </script>
	</body>

</html>

