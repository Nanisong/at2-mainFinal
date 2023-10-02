<?php
include_once('php/connection.php');
$conn = new connection();
$basicArtistSet = array ('August Renoir' => 1, 
                         'Claude Monet' => 1,
                         'Leonardo da Vinci' => 1,
                         'Michelangelo'=> 1,
                         'Pablo Picasso' => 1,
                         'Paul Cezanne' => 1,
                         'Salvador Dali' => 1,
                         'Vincent Van Gogh' => 1,
                         'Jan Vermeer' => 1,
                         'Raphael' => 1
                        );

                        
$keys = array_keys($basicArtistSet);

?>

<div>
    <label for="artist" class="form-label">Artist:
            <input class="form-control" name = "artist" list="datalistOptionsForArtist" value = '' id="artist" placeholder="Type in..." required />
            <datalist id="datalistOptionsForArtist">
                <?php
                    foreach($keys as $key){
                        echo '<option value="';
                        echo $key;
                        echo '">';
                    }
                
                ?>
            </datalist>
    </label>
</div>