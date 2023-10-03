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
        $name = $_POST['artist'];
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
        //Go back to Artist page
        header("location: /at2-main/artist.php");
        exit;
    }
    //insert action here
    if(isset($_POST['submitartist']) && $currentArtist[0]== '-1') {
    
        $name = $_POST['artist'];
        $nationality = $_POST['nationality'];
        $birth = $_POST['born'];
        $passing = $_POST['passing'];

        $img = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],100);
        $tn = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],30);
        //db call and
        $conn = new connection();
        //here check if the artist already in the db?
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
           //Go back to Artist page
        // header("location: /at2-main/artist.php");
        // exit;
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
   <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
-->
 <!--year picker-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <title> Edit/Insert an Artist </title>
   
</head>
 
<body>
    <!--navigation bar plug in-->
	<?php include_once 'navigation.php';?>
	<!--end of Navigation bar-->

    <!--plug in a image card here -->
	<?php include_once 'php/artistimagecard.php';?>
	<!--end of plug in image card-->

    <!-- the input form -->
   <?php include_once 'editArtistInputForm.php'; ?>
    <!-- end of the input form -->
    <!-- change the value of the input box -->
    <?php include_once 'reference.php'; ?>
    

    <script>
        reference('artist','<?php echo $currentArtist[1] ?>');
        reference('nationality','<?php echo $currentArtist[2] ?>');
        reference('aborn','<?php echo $currentArtist[3] ?>');
        reference('apassing','<?php echo $currentArtist[4] ?>');
       
    </script>
     <!--bootstrp js-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
    <!--show the full size image -->
     <?php			
	    include "php/showartistmodal.php";
    ?>
    
</body>
 
</html>

