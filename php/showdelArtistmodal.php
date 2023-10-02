<?php
//show image modal here
if($showDelArtistModal) {
				// CALL MODAL HERE
				echo '<script type="text/javascript">
					$(document).ready(function(){
						$("#delModal").modal("show");
					});
				</script>';
				$showDelArtistModal = false;
			} 
?>