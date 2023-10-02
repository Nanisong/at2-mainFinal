
<?php
    // once the server get the confirmation
    include_once('php/context.php');
    include_once ('php/connection.php');  
   $sessionId = new SessionId();	
  
   $newFormSessionId = $sessionId->newArtistDataSessionId();
   $ArtistmodalSessionId = $sessionId->artistModalDataSessionId();
  
   $showArtistModal = false; // show the message here
   $showInfoModal = false;
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
       $_SESSION[$ArtistmodalSessionId] = serialize($newArtist);
      
       $conn->close();
       //very important, clean the session when finished
       $p = array('-1','','','','','','');
      //reset the session to ready state
       $_SESSION[$newFormSessionId] = serialize($p);
       $showInfoModal = true;
   }
?>
<?php
    include_once('php/context.php');
    include_once "php/connection.php";  

    //retrieve the prepared data for upadate item.
    session_start();
    $sessionId = new SessionId();	
    $editFormSessionId = $sessionId->currentEditFormDataSessionId();
    $newFormSessionId = $sessionId->newPaintDataSessionId();
    $modalSessionId = $sessionId->currentModalDataSessionId();
    $currentPaint;
    $currentArtist = array('-1','','','','','','');

    //if this is an edit action
    if(isset($_SESSION[$editFormSessionId])){
        $currentPaint = unserialize($_SESSION[$editFormSessionId]);
      
    }
    //if this is a new action
    else if(isset($_SESSION[$newFormSessionId])){
        $currentPaint = unserialize($_SESSION[$newFormSessionId]);
    }

?>

<?php
    include_once "php/ImageLoader.php";

    $showModal = false; // show the message here
    $img;
    $tn;
    $id;
    
    //update action here
    if(isset($_POST['submit']) && $currentPaint[0] != '-1') {
        $id = $currentPaint[0];
        $name = $_POST['title'];
        $year= $_POST['year'];
        $media = $_POST['media'];
        $artist = $_POST['artist'];
        $artistid = $_POST['artistid'];
        $style = $_POST['style'];
        
        try{
            $img = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],100);
            $tn = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],30);
        }catch(Exception $e){ 
            $img =  $currentPaint[12];
            $tn =  $currentPaint[13];
        }
        
        //db call and
       $conn = new connection();
       $conn->update($id,$name,$year,$media,$artistid,$style,$img,$tn,'paint'); //issue
       $updatedPaint=$conn->findPaintWithArtistById($id);
       
       //here update the popup window with the current paint
       $_SESSION[$modalSessionId] = serialize($updatedPaint); 
       $conn->close();
       //very important, clean the session when finished
       //unset($_SESSION[$editFormSessionId]);
       $showModal = true;
      
    }
    //insert action here
    if(isset($_POST['submit']) && $currentPaint[0]== '-1') {
        $name = $_POST['title'];
    
        $year = $_POST['year'];
        $media = $_POST['media'];
        $artistid = $_POST['artistid'];
        $artist = $_POST['artist'];
        $style = $_POST['style'];
        $img = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],100);
        $tn = ImageLoader::loadImageFromFile($_FILES['file']['tmp_name'],30);
        //db call and
        $conn = new connection();
       
        $id = $conn->insert($name,$year,$media,$artistid,$style,$img,$tn);
        
        $newPaint = $conn->findPaintWithArtistById($id);
       //here update the popup window with the current paint
        $_SESSION[$modalSessionId] = serialize($newPaint);
        $conn->close();
        //very important, reset the session when finished
        $p = array('-1','','','','','','','','','','','','','');
        $_SESSION[$newFormSessionId] = serialize($p);
        $showModal = true;
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
        <!--year picker-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

        <title> Edit a Record </title>
	</head>
	<body>
         <!--navigation bar plug in-->
        <?php include_once 'navigation.php';?>
        <!--end of Navigation bar-->

        <!--plug in a image card here -->
        <?php include_once 'php/imagecard.php';?>
        <!--end of plug in image card-->
        
        <!-- the input form -->
        <?php include_once 'editPaintInputForm.php';?>
        <!-- end of the input form -->
    
        <!-- change the value of the input box -->
        <?php include_once 'reference.php'; ?>

        <script>
            reference('title','<?php echo $currentPaint[1] ?>');
            reference('datepickeryearonly','<?php echo date($currentPaint[2]) ?>');// edit 9-19
            reference('media','<?php echo $currentPaint[3] ?>');
            reference('artist','<?php echo $currentPaint[5] ?>');
            reference('artistid','<?php echo $currentPaint[4] ?>');
            reference('style','<?php echo $currentPaint[11] ?>');
        </script>


        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            
        
        </div>	
        <?php
         include_once "php/showmodal.php";
         include_once("workflowNewArtistModal.php");
         include_once "php/showartistmodal.php";
         include_once 'php/artistimagecard.php';
         include_once('php/artistHasBeenCreatedInfoModal.php');
         include_once('php/showInfomodal.php');
        ?>
	</body>

</html>