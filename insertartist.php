<?php 
    include_once('php/context.php');
    session_start(); 
    //prepair for a empty form
    //set the id = -1 as a flag for new paint
    $sessionId = new SessionId();	
    //$editPaintSessionId = $sessionId->editFormDataSessionId();	
    $newArtistSessionId = $sessionId->newArtistDataSessionId();
    $editFormSessionId = $sessionId->currentEditArtistDataSessionId();
    $p = array('-1','','','','','','');

    $_SESSION[$newArtistSessionId] = serialize($p);
    unset($_SESSION[$editFormSessionId]);
    header("Location: editArtistForm.php"); //jump to update page
    exit();
?>
