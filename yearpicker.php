<html lang = "en">

	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content = "width=device-width, initial-scale=1">
		<title>Test page</title>
		<!--bootstrape meta data-->
		<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
		<!--
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

		-->
	</head>
	<body>
	<div class="container">
		
		
		<!-- Bootstrap JS Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<div class="container">
		<form method='POST'  
            enctype='multipart/form-data'>
            <div class="form-group row">
                <!--<label>  Title :<input type='text' name='title' id = 'title' required /> </label> <br><br>-->
				<div class="col-xs-3">
               	 <label>  Year :<input class="form-control" type='text' value = '' name='datepicker' id="datepicker" required /> </label> <br><br>
				</div>
                
                <label> save to db <input type='submit' value='Save to server' name='submit' /></label><br><br>
            </div>
        </form>   
		    
		</div>
	</div>	
	<script>
		$("#datepicker").datepicker( {
		endDate:"1800",
		//multidateSeparator:"-",
		//multidate: true,
		format: "yyyy", // Notice the Extra space at the beginning
		viewMode: "years", 
		minViewMode: "years"
		
		});
	</script>
	</body>

	

</html>