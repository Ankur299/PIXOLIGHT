
<?php
    include "../dbconnect.php";
    include "../main.php";
    error_reporting(0);
    if($_SESSION['number']!=""){
        header("location: final_submission.php");
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
		<h5 class="text-center">Sign Up</h5>
		<br>
		<form action="register_number.php" method="post" class="container" id="form">
		    <input type="number" name="phone" placeholder="phone number" class="form-control frm" minlength="10" maxlength="10" required><br>
		    <input id="submit" type="submit" value="submit" class="form-control btn-warning no-border frm" style="color: white">
		</form>
		<p class="text-center"><a href="../login" class="lnk">Already have an account? Login</a></p>
	</div>




</body>

    <script src="../design/js/jquery.min.js"></script>
    <script src="../design/bootstrap/js/bootstrap.min.js"></script>
    <script src="../design/js/script.js"></script>
	<script src="../design/js/form.js"></script>
	<script type="text/javascript">
		$("#submit").click(function(event){
					event.preventDefault();
					$('#form').ajaxSubmit({
		    	        url: 'register_number.php',
		    	        success: function (data) {

		    	         	if(data==1){
		    	         		window.location.href="final_submission.php";
		    	         	}
		    	         	
		    	         	else{
		    	         		alert(data);
		    	         	}
		    	         },
		    	         error: function(){
		    	         	alert("Some unknown error");
		    	         }
		    	    });

		
		});
	</script>

</html>

