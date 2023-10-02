<?php
    include_once('php/context.php');
    include_once "php/connection.php";  
    //retrieve the prepared data for upadate item.
    session_start();
    $sessionId = new SessionId();	
    $editFormSessionId = $sessionId->currentEditArtistDataSessionId();
    $newFormSessionId = $sessionId->newArtistDataSessionId();
    $modalSessionId = $sessionId->artistModalDataSessionId();
    $currentArtist;

    //if this is an edit action
    if(isset($_SESSION[$editFormSessionId])){
       
        $currentArtist = unserialize($_SESSION[$editFormSessionId]);
    }
    //if this is a new action
    else if(isset($_SESSION[$newFormSessionId])){
       
        $currentArtist = unserialize($_SESSION[$newFormSessionId]);
    }
?>

<?php
    include_once "php/ImageLoader.php";
    $showArtistModal = false; // show the message here
    $img;
    $tn;
    $id;
    
    //update action here
    if(isset($_POST['submitartist']) && $currentArtist[0] != '-1') {
     
        $id = $currentArtist[0];
        $name = $_POST['artistname'];
        $nationality = $_POST['nationality'];
        $birth = $_POST['born'];
        $passing = $_POST['passing'];
        
        try{
            $img = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],100);
            $tn = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],30);
        }catch(Exception $e){ 
            $img =  $currentArtist[5];
            $tn =  $currentArtist[6];
        }
        
        //db call and
       $conn = new connection();
       $conn->updateArtist($id,$name,$nationality,$birth,$passing,$img,$tn,'portrait');
       $updatedArtist=$conn->findArtistById($id);
       
       //here update the popup window with the current paint
       $_SESSION[$modalSessionId] = serialize($updatedArtist);
       $conn->close();
       //very important, clean the session when finished
       //unset($_SESSION[$editFormSessionId]);
       $showArtistModal = true;
      
    }
    //insert action here
    if(isset($_POST['submitartist']) && $currentArtist[0]== '-1') {
    
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
       //reset the session to prestate
        $_SESSION[$newFormSessionId] = serialize($p);
       $showArtistModal = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <!--bootstrape meta data-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title> Edit/Insert An Edit </title>
   
</head>
 
<body>
    <!--navigation bar plug in-->
	<?php include 'navigation.php';?>
	<!--end of Navigation bar-->

    <!--plug in a image card here -->
	<?php include 'php/artistimagecard.php';?>
	<!--end of plug in image card-->

    <!-- the input form -->
    <div class="container">
    <h1>
        <?php
            if($currentArtist[0] == '-1'){
                echo 'create an Artist';
            }
            else{echo 'update an Artist';}
        ?>
    </h1>
        <form method='POST'  
            enctype='multipart/form-data'>
            <div class="form-group">
                <label for="artistname" class="form-label">Artist Name:
                        <input class="form-control" name = "artistname" list="datalistOptionsForArtist" value = '' id="artistname" placeholder="Type in..." required />
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
                </label> <br><br>
              
                <label>  Born :<input type='date' value = '' name='born' id="born" required /> </label> 
                <label>  Passing :<input type='date' value = '' name='passing' id="passing" required /> </label> 
                <br><br>
                
               
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
        <!-- end of the input form -->
    </div>

    <!-- change the value of the input box -->
    <script>
        var reference = 
        (function setValue(id,value){
            document.getElementById(id).value = value;
            return setValue; 
        });
    </script>

    <script>
        reference('artistname','<?php echo $currentArtist[1] ?>');
        reference('nationality','<?php echo $currentArtist[2] ?>');
        reference('born','<?php echo $currentArtist[3] ?>');
        reference('passing','<?php echo $currentArtist[4] ?>');
       
    </script>
     <!--bootstrp js-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
     <!--show the full size image -->
     <?php			
	    include "php/showartistmodal.php";
    ?>
    <script>
       $(document).on('change', 'input', function(){
            //alert($(this).val());
            if($(this).val() == 'hi')
            { alert($(this).val());}
        });
    </script>
</body>
 
</html>

