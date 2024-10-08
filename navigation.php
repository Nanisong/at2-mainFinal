<!doctype html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, 
        initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS -->
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity=
    "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous">
    </script>
    <style> img { max-width: 100%; height: auto; object-fit: cover; } 
		.container-fluid {
            background-color: black; width: 100%; max-width: none; margin: 0; padding: 0; }
        /* .nav-link {color:rgb(255,215,0)} */
    </style>
</head>
  
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <div class="container-fluid bg-black">
        <!-- Creating Nav Bar  -->
        <section id="navigation" class="container-fluid bg-black active my-3">
            <nav class="navbar navbar-expand-lg text-info active">
                <!--<div class="container">-->
                    <div class=" navbar-default">
                        <ul class="navbar-nav ml-auto fw-bold">
                            <li class="nav-item ">
                                <!--Initially active class 
                                    is set to home link -->
                                <a class="nav-link" href="index.php" style="color:#FFD700">
                                    Home
                                </a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link" href="gallery.php" style="color:#FFD700">
                                    Art Gallery
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="artist.php" style="color:#FFD700">
                                    Artists
                                </a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link" href="insert.php" style="color:#FFD700">
                                    New Painting
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="insertartist.php" style="color:#FFD700">
                                    New Artist
                                </a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link" href="search.php" style="color:#FFD700">
                                    Search Engine
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php" style="color:#FFD700">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    <!--</div>-->
                </div>
            </nav>
            <script src="scripts/activeBarItem.js"></script>
        </section>
    </div>
</body>
  
</html>