<?php
include "../dbconnect.php";
error_reporting(0);
if(!$_SESSION['final'] && $_SESSION[number]!=""){
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
		<h5 class="text-center">Login here</h5>
		<br>
		<form id="form" action="login.php" method="post" class="container">
		    <input type="number" placeholder="phone number" name="number" class="form-control frm" required><br>
		    <input type="password" placeholder="password" name="password"class="form-control frm" required><br>
		    <input id="submit" type="submit" value="Login" class="form-control frm btn-primary no-border">
		</form>
		<p class="text-center"><a href="../signup" class="lnk">Create an account</a></p>
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
		    	        url: 'login.php',
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
