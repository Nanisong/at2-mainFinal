<?php 
    include_once('php/context.php');
    session_start();
	
    $sessionId = new SessionId();	
    $editArtistSessionId = $sessionId->editArtistDataSessionId();	
   
    if(isset($_SESSION[$editArtistSessionId])){
        // prepare the data for the paint to pass to edit page
        $currentEditFormDataSessionId =  $sessionId->currentEditArtistDataSessionId();
        $artistToPass = unserialize($_SESSION[$editArtistSessionId]);
       
        $_SESSION[$currentEditFormDataSessionId] = serialize($artistToPass);
        //destroy the session after the job
        unset($_SESSION[$editArtistSessionId]);
    }
    
	
	header("Location: editArtistForm.php"); //jump to update page
	exit();
?>
    