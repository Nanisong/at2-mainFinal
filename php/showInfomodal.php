<?php
//show image modal here
if($showInfoModal) {
				
				// CALL MODAL HERE
				echo '<script type="text/javascript">
					$(document).ready(function(){
						$("#artistHasBeenCreatedInfoModal").modal("show");
					});
				</script>';
				$showInfoModal = false;
			} 
?>