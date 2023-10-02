
<?php 
	include_once('php/connection.php');
	include_once('php/context.php');
?>    
<!--query all the data from DB-->
<?php 
	$conn = new connection();
	$artists = $conn->getAllArtists("portrait");
	$gallery = $conn->getWholeGalleryWithArtist("paint","portrait");
	$sessionId = new SessionId();	
	$gallerySessionId = $sessionId->galleryDataSessionId();		
	$artistSessionId = $sessionId->allArtistDataSessionId();
	
	$editArtistSessionId = $sessionId->editFormDataSessionId();	
	$viewModlSessionId = $sessionId->artistModalDataSessionId();
	$deleteArtistSessionId = $sessionId->deleteArtistModalDataSessionId();
?>
	
<?php
	//store the gallery in the session on server
	session_start();
	$_SESSION[$gallerySessionId] = serialize($gallery);
	$_SESSION[$artistSessionId] = serialize($artists);

?>

<!-- view, edit, del functions-->
<?php 
	$showArtistModal = false; // disable the image card first
	if(!empty($_POST['viewArtist'])){
		$artistToView = $artists[$_POST['currentindex'] -1];
		$_SESSION[$viewModlSessionId]= serialize($artistToView);
		$showArtistModal = true;
		//very important, destroy the session after finished the viewing
		//unset($_SESSION[$artistSessionId]);
	}
?>

<?php 
	 $showDelArtistModal = false; 
	//delete step1 "retrieve the data of paint from server and show the confirmation window
	if(!empty($_POST['delArtist'])){
		$index = $_POST['currentindex'] -1;
		$artistToDelete = $artists[$_POST['currentindex'] -1];
		$_SESSION[$deleteArtistSessionId]= serialize($artistToDelete);
		$showDelArtistModal = true;
	}
?>

<?php 
//delete step2, after confirmation ,delete it from DB
	if(!empty($_POST['delArtistconfirm'])){
		$pid = $_POST['currentid'];
		$deleresult=$conn->delArtist($pid);
	}
	$artists = $conn->getAllArtists("portrait");
?>

<?php 
	if(!empty($_POST['editArtist'])){
		$index = $_POST['currentindex'] -1;
		$pickedArtist = $artists[$index];
		$sessionId = new SessionId();	
	    $editArtistSessionId = $sessionId->editArtistDataSessionId();	
		
		$_SESSION[$editArtistSessionId] = serialize($pickedArtist);

		header("Location: updateArtist.php"); //jump to update page
		exit();
	}
	
?>

<html lang = "en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content = "width=device-width, initial-scale=1">
		<title>Artists</title>
		<!--bootstrape meta data-->
		<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>

	<body>
		<!-- <div class="container"> -->
			<!--navigation bar plug in-->
			<?php include 'navigation.php';?>
			<!--end of Navigation bar-->
			<?php
        		include 'php/artistFilter.php';
        	?>
			<!--table plug in-->
			<?php 
				include 'php/artisttable.php';
			?>
			<!--end of table bar-->
			
		<!-- </div> -->
		
		<!--definition of a image card here -->
		<?php require 'php/artistImagecard.php';?>
		<?php require 'php/delArtistmodal.php';?>
		<!--end of plug in image card-->
		
		<!--image plug-in controller here -->			
		<?php require 'php/showartistmodal.php';?>
		<?php require 'php/showdelArtistmodal.php';?>
		<!--end of plug in image controller here -->	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		
	</body>
</html>