<?php

include "../dbconnect.php";
include "../main.php";

if($_SESSION['number']==""){
    header("location: ../signup");
}
if($_SESSION['final']){
    header("location: ../");
}
?>

<!doctype html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Login</title>

		<link rel="stylesheet" href="../design/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../design/css/style.css">
		<link rel="stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	</head>
<body style="font-family: 'Quicksand', sans-serif;">

	<div class="container" style="height: 60vh; margin-top: 20vh">
		<form id="form" action="submit.php" method="post" enctype="multipart/form-data" class="container">

		    <h5 class="text-center">Register</h5><br>
		    <input type="text" name="name" placeholder="name" class="form-control frm" required><br>
		    <input type="email" name="email" placeholder="email" class="form-control frm" required><br>
		    <input type="password" name="password" placeholder="password" class="form-control frm" required  minlength="8"><br>
		    <input type="file" name="image" id="fileToUpload" placeholder="choose a profile picture" required><br><br>
		    <input id="submit" type="submit" value="submit" class="form-control frm btn-success no-border">

		</form>

	</div>

	<div class="load"><div class="load-circle"></div></div>

</body>

    <script src="../design/js/jquery.min.js"></script>
    <script src="../design/bootstrap/js/bootstrap.min.js"></script>
    <script src="../design/js/script.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
	<script type="text/javascript">
		$("#submit").click(function(event){
					$('#form').ajaxForm({
		    	        url: 'submit.php',
		    	        beforeSubmit: function () {
    	        	  		$(".load").fadeIn();
    	       			 },
		    	        uploadProgress: function (event, position, total, percentComplete) {

		    	            
		    	        },
		    	        success: function (data) {

		    	         	if(data==1){
		    	         		window.location.href="../home";
		    	         	}
		    	         	
		    	         	else{
		    	         		alert(data);
		    	         		$(".load").fadeOut();
		    	         	}
		    	         },
		    	         error: function(){
		    	         	alert("Some unknown error");
		    	         	$(".load").fadOut();
		    	         }
		    	    });

		
		});
	</script>
</html>