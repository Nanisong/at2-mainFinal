<?php 
    include_once('php/connection.php');
    $collection= array();
    $collection2= array();
    $array1;
    $array2;
    if(!empty($_POST['submitbytitle'])){
        $keyword =  $_POST['searchbytitle'];
       if($keyword==''){
        $collection = array();
       }
       else {
        $conn = new connection();
	    $collection = $conn->findByTitle($keyword,'paint');
        //transform to key/pair array
        $collection2 = $conn->findByArtist($keyword);
        //$collection = array_merge($array1,$array2);
	    $conn->close();	
       }
    }
?>   
<!--search all the data from DB-->
<html lang = "en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content = "width=device-width, initial-scale=1">
		<title>Search page</title>
		<!--bootstrape meta data-->
		<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!--javascript link here-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	</head>

    <body>
            <!-- <div class="container-fluid "> -->
                <!--navigation bar plug in-->
                <?php include 'navigation.php';?>
                <!--end of Navigation bar-->
               
            <!--the input form for searching paint-->
            <div class="container bg-white">
            
                <!-- <div class="row row-cols-1 row-cols-md-3 g-4"> -->
                <div class="row row-cols-md ">
                    <div class="col">
                        <form class="input-group rounded" method='POST' enctype='multipart/form-data'>
                            <div class="form-group  row g-3">
                                <input name="searchbytitle"type="search" class="form-control col-md-4 rounded" placeholder="Type in Title or Artist..." aria-label="Search" aria-describedby="search-addon" />
                                
                                <input value ='Search for paintings '  class="btn btn-outline-dark btn-sm" type="submit" name='submitbytitle'/>
                            </div>
                        </form>
                    </div>
                   
                </div>
                <br><br>
            </div>  
            <div class="container ">
            <h6 class="mb-3">Found [<?php echo count($collection) ?>] Paintings</h6>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    $a=1;
                    foreach($collection as $paint)	
                    {
                ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="data:image/png;base64,<?php echo $paint['img']; ?>" class="card-img-top"
                                    alt="search result" />
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $paint['name']; ?></h5>
                                    <p class="card-text">
                                    <?php echo $paint['artist']; ?>
                                    </p>
                                    <p class="card-text">
                                    <?php echo $paint['style']; ?>
                                    </p>
                                    <p class="card-text"><small class="text-muted">
                                    <?php echo $paint['year']; ?>
                                </small></p>
                                </div>
                    
                            </div>
                        </div>
                <?php
                    $a++;
                        }
                ?>
                </div>
            </div>
        </div>
        <hr class="hr hr-blurry" />
        <div class="container ">
               
            
            <!--the input form for searching artist-->
            <div class="container ">
                
            </div>  
            <div class="container ">
            <h6 class="mb-3">Found [<?php echo count($collection2) ?>] of Artists</h6>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    $a=1;
                    foreach($collection2 as $paint)	
                    {
                ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="data:image/png;base64,<?php echo $paint['ptrimg']; ?>" class="card-img-top"
                                    alt="search result" />
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $paint['artist']; ?></h5>
                                    <p class="card-text">
                                    <?php echo $paint['birth']; ?>
                                    </p>
                                    <p class="card-text">
                                    <?php echo $paint['passing']; ?>
                                    </p>
                                    <p class="card-text"><small class="text-muted">
                                    <?php echo $paint['nationality']; ?>
                                </small></p>
                                </div>
                    
                            </div>
                        </div>
                <?php
                    $a++;
                        }
                ?>
                </div>
            </div>
        <!-- </div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>



