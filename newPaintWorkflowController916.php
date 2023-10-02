
<?php
    // once the server get the confirmation
    include_once('php/context.php');
    include_once ('php/connection.php');  
   $sessionId = new SessionId();	
  
   $newFormSessionId = $sessionId->newArtistDataSessionId();
   $modalSessionId = $sessionId->artistModalDataSessionId();
   $showArtistModal = false; // show the message here
   if(!empty($_POST['newartist'])){
       include_once "php/ImageLoader.php";
       $name = $_POST['artistname'];
       $nationality = $_POST['nationality'];
       $birth = $_POST['born'];
       $passing = $_POST['passing'];

       $img = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],100);
       $tn = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],30);
       //db call and
       $conn = new connection();
       $id = $conn->insertArtist($name,$nationality,$birth,$passing,$img,$tn);
       $newArtist = $conn->findArtistById($id);
    
      //here update the popup window with the current paint
       $_SESSION[$modalSessionId] = serialize($newArtist);
       
       $conn->close();
       //very important, clean the session when finished
       $p = array('-1','','','','','','');
      //reset the session to ready state
       $_SESSION[$newFormSessionId] = serialize($p);
       $showArtistModal = true;
      
   }
?>

<html lang = "en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content = "width=device-width, initial-scale=1">
		<title>Home page</title>
		<!--bootstrape meta data-->
		<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	</head>
	<body>
          <div class="container">
            <?php include_once("workflowNewArtistEntry.php");?>
            <label for="artist" class="form-label">Artist:
                <input class="form-control" name = "artist" list="datalistOptionsForArtist" value = '<?php if(isset($_POST['artistname'])) {echo $_POST['artistname'];} else{echo '';}?>' id="artist" placeholder="Type in..." required  <?php if(isset($_POST['artistname'])) {echo 'readonly';} else{echo '';}?>/>
                <datalist id="datalistOptionsForArtist">
                    <option value="August Renoir">
                    <option value="Claude Monet">
                    <option value="Leonardo da Vinci">
                    <option value="Michelangelo">
                    <option value="Pablo Picasso">
                    <option value="Paul Cezanne">
                    <option value="Salvador Dali">
                    <option value="Vincent Van Gogh">
                </datalist>
            </label>
            <div id="nationality">
            <label> Nationality:
                <select class='form-control' value= '' name = 'nationality' id='nationality' required>
                    <option>Germany</option>
                    <option>French</option>
                    <option>Roma</option>
                    <option>Italy</option>
                    <option>place1</option>
                    <option>place2</option>
                    <option>place3</option>
                </select>
            </label> 
            </div>
            <br><br>

            <input class="form-control" name = "artistid" type ="text" value = '' id="artistid" placeholder="Type in..." required />
   
           

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
            
            <!-- Bootstrap JS Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            
        </div>	
        <?php
         include "php/showartistmodal.php";
         include_once 'php/artistimagecard.php';
       ?>
	</body>

</html>