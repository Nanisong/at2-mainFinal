<html lang = "en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content = "width=device-width, initial-scale=1">
		<title>Gallery page</title>
		<!--bootstrape meta data-->
		<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!--javascript link here-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
            <section id="display" class="container bg-light text-black my-3">
                        <table id="gtable" class="table table-hover border-primary" >
                                <thead>
                                    <tr class="clickable" onclick="myFunction()">
                                        <th scope="col">Rank</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Nationality</th>
                                        <th scope="col">Born</th>
                                        <th id='artistth' scope="col">Passing</th>
                                        <th scope="col">Thumbnail</th>
                                    </tr>
                                </thead>

                                <tbody class="table-group-divider" id="tablebody"> <!--iterate here-->
                                    <?php
                                        $a=1;
                                        $b=10000;
                                        foreach($artists as $artist)	
                                        {
                            
                                    ?>
                                    <!--<tr class='clickable' data-bs-toggle="modal" data-bs-target="#myModal" >-->
                                    <tr >
                                        <th scope="row"><?php echo $a; ?></th>
                                        <td> 
                                            <?php echo $artist['artist']; ?>
                                        </td>
                                        <td id = <?php echo $a ?>> 
                                            <?php echo $artist['nationality']; ?>
                                        </td>

                                        <td> 
                                            <?php echo $artist['birth']; ?>
                                        </td>
                                        <td id = <?php echo $b ?> > 
                                            <?php echo $artist['passing']; ?>
                                        </td>

                                        <td> 
                                            <!--<img src="data:image/png;base64,<?php echo $artist['ptrthn']; ?>" alt="" />-->
                                            <div class="card" style = "width: 4rem;">
                                                <img class = "card-img-top" src="data:image/png;base64,<?php echo $artist['ptrthn']; ?>" alt="" class="w-100" />
                                            </div>
                                            <br>
                                            <form method='POST' enctype='multipart/form-data'>
                                                <div class="form-group">
                                                    <div class="d-none">  <!--invisible in the web page-->
                                                        <select name ='currentindex' id="disabledArtistSelect" class="form-select">
                                                            <option><?php echo $a?></option>
                                                        </select>
                                                    </div>
                                                        <input value ='view'  class="btn btn-outline-dark btn-sm" type="submit" name='viewArtist'/>
                                                        <input value ='edit'  class="btn btn-outline-dark btn-sm" type="submit" name='editArtist'/>
                                                        <input value ='del'   class="btn btn-sm btn-danger " type="submit" name='delArtist'/>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    //increment of the ids
                                    $a++;
                                    $b++;
                                        }
                                    ?>
                    </tbody>
                </table>
            </section>
		</div>
	</body>
</html>

