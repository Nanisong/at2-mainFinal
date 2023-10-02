<?php
//show image modal here
if($showArtistModal) {
				// CALL MODAL HERE
				echo '<script type="text/javascript">
					$(document).ready(function(){
						$("#artistModal").modal("show");
					});
				</script>';
				$showArtistModal = false;
			} 
?>