<?php
include_once('php/context.php');
$sessionId = new SessionId();	
$currentModalSessionId = $sessionId->artistModalDataSessionId();
//map the data to modal datamodel

if(isset($_SESSION[$currentModalSessionId])){
	
	$modalData = unserialize($_SESSION[$currentModalSessionId]);
	$name=$modalData[1];
	$nationality=$modalData[2];
	$imgCotent=$modalData[5];
	$ctext1=$modalData[3];
	$ctext2=$modalData[4];
	
	
}


?>
<!-- Modal: Message box after the data transaction-->
<div class="modal fade" id="artistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color:#FFD700">
		<div class="modal-header">
			<h5 class="modal-title" id="painting"><?php if(isset($_SESSION[$currentModalSessionId])){ echo $name;} ?> </h5>
			
		</div>
		
		
		<div class="modal-body mx-auto">
			<div class="card  h-100" style = "width: 18rem;">
					<img class = "card-img-top" src="data:image/png;base64,
					<?php 
					
					if(isset($_SESSION[$currentModalSessionId])){
						echo $imgCotent; 
					}
				
					?>" 
					alt="" class="w-100" />
			</div>
		<!--here add card body with proper information-->
		<h5 class="card-title"><?php if(isset($_SESSION[$currentModalSessionId])){echo $nationality;} ?></h5>
        <p class="card-text"><?php if(isset($_SESSION[$currentModalSessionId])){echo $ctext1;} ?></p>
        <p class="card-text"><small class="text-muted"><?php if(isset($_SESSION[$currentModalSessionId])){echo $ctext2;} ?></small></p>

		</div>
		<div class="modal-footer">
		<?php if(isset($_SESSION[$currentModalSessionId])) {unset($_SESSION[$currentModalSessionId]);} ?>	
		</div>
		</div>
	</div>
</div>
