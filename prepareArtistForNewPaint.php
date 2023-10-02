<?php 
   include_once('php/connection.php');
   include_once('php/context.php');
   $conn = new connection();
	
   if(isset($_POST)){
      $data = file_get_contents("php://input");
      $sessionId = new SessionId();	
      session_start();
      $artistIDForNewPaint =  $sessionId->artistIDDataSessionId();
      $artistSessionId = $sessionId->allArtistDataSessionId();
      //$artists = unserialize($_SESSION[$artistSessionId]);
      $artists = $conn->getAllArtists();
      //prepare ID from Artist
      if(isset($_SESSION[$artistSessionId])){
         $isFound = false;
         foreach($artists as $artist)	{
            if($artist[1] == $data){
               //2 things here
               //1. return the id of the artist if the artist exists
               //2. ask the user if they want to create a new artist if the artist not exists.
               //$_SESSION[$artistIDForNewPaint] = $artist[0];
               $isFound = true;
               echo $artist[0];
               break;
            }
         }
         //if not found
         if($isFound == false){
            echo 'ask';
         }
      }
   }
?>