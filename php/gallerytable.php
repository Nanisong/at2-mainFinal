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
                                        <th scope="col">Title</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Media</th>
                                        <th id='artistth' scope="col">Artist</th>
                                        <th id='styleth' scope="col">Style</th>
                                        <!--	<th scope="col">Image</th> -->
                                        <th scope="col">Thumbnail</th>
                                    </tr>
                                </thead>

                                <tbody class="table-group-divider" id="tablebody"> <!--iterate here-->
                                    <?php
                                        $a=1;
                                        $b=100;
                                        foreach($gallery as $paint)	
                                        {
                            
                                    ?>
                                    <!--<tr class='clickable' data-bs-toggle="modal" data-bs-target="#myModal" >-->
                                    <tr >
                                        <th scope="row"><?php echo $a; ?></th>
                                        <td> 
                                            <?php echo $paint['name']; ?>
                                        </td>
                                        <td> 
                                            <?php echo $paint['year']; ?>
                                        </td>
                                        <td> 
                                            <?php echo $paint['media']; ?>
                                        </td>
                                        <td id = <?php echo $b ?> >
                                           <!-- <?php echo $paint['artist']; ?>-->
                                                <form method='POST' enctype='multipart/form-data'>
                                                    <div class="form-group">
                                                        <div class="d-none">
                                                            <p><?php echo $paint['artist']; ?></p>
                                                        </div>
                                                        <div class="d-none">  <!--invisible in the web page-->
                                                            <select name ='currentindex' id="disabledSelect" class="form-select">
                                                                <option><?php echo $a?></option>
                                                            </select>
                                                        </div>
                                                            <input value ='<?php echo $paint['artist']; ?> ' class="btn btn-info btn-outline-dark btn-sm" type="submit" name='viewArtist'/>
                                                            
                                                        </div>
                                                    </div>
                                                </form>
                                            
                                        </td>

                                        <td id = <?php echo $a ?>> 
                                            <?php echo $paint['style']; ?>
                                        </td>

                                        <td> 
                                            <!--<img src="data:image/png;base64,<?php echo $paint['tn']; ?>" alt="" />-->
                                            <div class="card" style = "width: 4rem;">
                                                <img class = "card-img-top" src="data:image/png;base64,<?php echo $paint['tn']; ?>" alt="" class="w-100" />
                                            </div>
                                            <br>
                                            <form method='POST' enctype='multipart/form-data'>
                                                <div class="form-group">
                                                    <div class="d-none">  <!--invisible in the web page-->
                                                        <select name ='currentindex' id="disabledSelect" class="form-select">
                                                            <option><?php echo $a?></option>
                                                        </select>
                                                    </div>
                                                        <input value ='view'  class="btn btn-outline-dark btn-sm" type="submit" name='view'/>
                                                        <input value ='edit'  class="btn btn-outline-dark btn-sm" type="submit" name='edit'/>
                                                        <input value ='del'   class="btn btn-sm btn-danger " type="submit" name='del'/>
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

