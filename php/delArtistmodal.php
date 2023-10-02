<?php
include_once('php/context.php');
$sessionId = new SessionId();	


//map the data to modal datamodel
$deleteFormSessionId = $sessionId->deleteArtistModalDataSessionId();
if(isset($_SESSION[$deleteFormSessionId])){
	$modalData = unserialize($_SESSION[$deleteFormSessionId]);
	$pid = $modalData[0];
	$imagetitle=$modalData[1];
	$ctitle=$modalData[4];
	$imgCotent=$modalData[6];
	$ctext1=$modalData[5];
	$ctext2=$modalData[2];
}

?>

<!-- Modal: Message box after the data transaction-->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="eModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			
			<div class="alert alert-danger d-flex align-items-center" role="alert">
  				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  			<div>
			  <h5 class="modal-title" id="painting">Really want to delete [<?php if($showDelArtistModal){echo $imagetitle;} ?>] and ALL his paintings?</h5>
  			</div>
			</div>
		</div>
		
		
		<div class="modal-body mx-auto">
			<div class="card  h-100" style = "width: 18rem;">
					<img class = "card-img-top" src="data:image/png;base64,
					<?php 
					
					if($showDelArtistModal){
						echo $imgCotent; 
					}
				
					?>" 
					alt="" class="w-100" />
			</div>
		<!--here add card body with proper information-->
		<h5 class="card-title"><?php if($showDelArtistModal){ echo $ctitle; } ?></h5>
        

		</div>
            <div class="modal-footer">
            <form method='POST' enctype='multipart/form-data'>
                <div class="form-group">
                    <div class="d-none">  <!--invisible in the web page-->
                        <select name ='currentid' id="disabledSelect" class="form-select">
                            <option><?php echo $pid?></option>
                        </select>
                    </div>
                    <div>
                        <input value ='Cancel'  class="btn btn-outline-dark btn-sm" type="submit" name='delcancel'/>
                        <input value ='confirm'  class="btn btn-outline-light btn-sm btn-danger " type="submit" name='delArtistconfirm'/>
                    </div>
                </div>
            </form>	
            </div>
		</div>
	</div>
</div>
<?php 
//very importtant clean the session after use it
	if(isset($_SESSION[$deleteFormSessionId])){
		unset($_SESSION[$deleteFormSessionId]);
	}
?>